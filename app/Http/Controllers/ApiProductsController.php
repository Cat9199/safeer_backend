<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Products;
use App\ProductsLang;
use App\ProductColor;
use App\Settings;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;

class ApiProductsController extends Controller
{
    public function index(Request $request)
    {
        $locale = $request->header('lang', 'en_GB');
        App::setLocale($locale);

        // Retrieve or cache product data
        $products = $this->cacheProductData($locale);

        // Search within cached products
        if ($request->filled('query')) {
            $searchTerm = strtolower($request->input('query'));
            $products = array_filter($products, function ($product) use ($searchTerm) {
                return str_contains(strtolower($product['name']), $searchTerm) ||
                    str_contains(strtolower($product['description']), $searchTerm);
            });
        }

        // Apply filters to the product data
        $products = $this->applyFilters($products, $request);

        // Paginate the filtered results
        $page = $request->input('page', 1);
        $perPage = 10;
        $total = count($products);
        $products = array_slice($products, ($page - 1) * $perPage, $perPage);

        // Prepare the paginated response
        return response()->json([
            'data' => array_values($products),
            'meta' => [
                'current_page' => $page,
                'from' => ($page - 1) * $perPage + 1,
                'last_page' => ceil($total / $perPage),
                'path' => URL::to('/api/products'),
                'per_page' => $perPage,
                'to' => min($page * $perPage, $total),
                'total' => $total
            ]
        ]);
    }

    // Cache product data to reduce database queries
    private function cacheProductData($locale)
    {
        return Cache::remember("products_data_{$locale}", 3600, function () use ($locale) {
            return Products::with([
                'productLangs' => function ($query) use ($locale) {
                    $query->where('lang', $locale);
                },
                'colors'
            ])
                ->get()
                ->map(function ($product) use ($locale) {
                    $productLang = $product->productLangs->first();
                    $attributesTitles = @unserialize($productLang->attributes_title) ?: [];
                    $attributesDescriptions = @unserialize($productLang->attributes_description) ?: [];

                    // Fetch category name from `product_category_langs` table
                    $categoryName = DB::table('product_category_langs')
                        ->where('category_id', $product->category_id)
                        ->where('lang', $locale)
                        ->value('name') ?? 'N/A';

                    return [
                        'id' => $product->id,
                        'main_image_url' => URL::to("api/image?image_id={$product->image}"),
                        'size_width' => $product->regular_price,
                        'size_height' => $product->sale_price,
                        'status' => $product->status,
                        'name' => $productLang->title ?? 'N/A',
                        'description' => $productLang->short_description ?? 'N/A',
                        'product_type' => $categoryName,
                        'material' => $attributesDescriptions[array_search('material', $attributesTitles) ?? -1] ?? 'N/A',
                        'room_type' => $attributesDescriptions[array_search('room_type', $attributesTitles) ?? -1] ?? 'N/A',
                        'application' => $attributesDescriptions[array_search('application', $attributesTitles) ?? -1] ?? 'N/A',
                        'shape' => $attributesDescriptions[array_search('shape', $attributesTitles) ?? -1] ?? 'N/A',
                        'images' => $this->formatImages($product->gallery),
                        'colors' => $product->colors->map(function ($color) {
                            return [
                                'id' => $color->id,
                                'name' => $color->name,
                                'hex_code' => $color->hex_code,
                                'images' => $this->formatImages($color->image_ids)
                            ];
                        })->all(),
                    ];
                })->toArray();
        });
    }

    // Apply filters from the request on the cached product data
    private function applyFilters(array $products, Request $request): array
    {
        $filterableAttributes = ['product_type', 'material', 'room_type', 'application', 'shape', 'status'];

        foreach ($filterableAttributes as $attribute) {
            if ($request->filled($attribute)) {
                $filterValue = strtolower($request->input($attribute));
                $products = array_filter($products, function ($product) use ($attribute, $filterValue) {
                    return strtolower($product[$attribute] ?? '') === $filterValue;
                });
            }
        }

        // Additional filter for product size if provided
        if ($request->filled('size')) {
            $size = $request->input('size');
            $products = array_filter($products, function ($product) use ($size) {
                return $product['size_width'] == $size['width'] && $product['size_height'] == $size['height'];
            });
        }

        // Filter by color name if provided
        if ($request->filled('color')) {
            $colorName = strtolower($request->input('color'));
            $products = array_filter($products, function ($product) use ($colorName) {
                return collect($product['colors'])->contains(function ($color) use ($colorName) {
                    return strtolower($color['name']) === $colorName;
                });
            });
        }

        return array_values($products);
    }

    public function show($id, Request $request)
    {

        $locale = $request->header('lang', 'en_GB');
        App::setLocale($locale);

        $product = Products::with([
            'productLangs' => function ($query) use ($locale) {
                $query->where('lang', $locale);
            },
            'colors'
        ])->findOrFail($id);

        $productLang = $product->productLangs->first();
        if (!$productLang) {
            return response()->json(['success' => false, 'message' => 'Localized product information not found'], 404);
        }

        $colorId = $request->query('color_id');
        $selectedColorImages = [];

        $colors = $product->colors->map(function ($color) use ($colorId, &$selectedColorImages) {
            $images = $this->formatImages($color->image_ids);
            if ($colorId && $color->id == $colorId) {
                $selectedColorImages = $images;
            }
            return [
                'id' => $color->id,
                'name' => $color->name,
                'hex_code' => $color->hex_code,
                'images' => $images
            ];
        })->all();


        $attributesTitles = @unserialize($productLang->attributes_title) ?: [];
        $attributesDescriptions = @unserialize($productLang->attributes_description) ?: [];

        if (empty($selectedColorImages)) {
            $selectedColorImages = !empty($colors) ? $colors[0]['images'] : [];
        }

        $categoryName = DB::table('product_category_langs')
            ->where('category_id', $product->category_id)
            ->where('lang', $locale)
            ->value('name') ?? 'N/A';
        return response()->json([
            'data' => [
                'id' => $product->id,
                'main_image_url' => URL::to("api/image?image_id={$product->image}"),
                'size_width' => $product->regular_price,
                'size_height' => $product->sale_price,
                'status' => $product->status,
                'name' => $productLang->title,
                'description' => $productLang->short_description,
                'product_type' => $categoryName,
                'material' => $attributesDescriptions[array_search('material', $attributesTitles) ?? -1] ?? 'N/A',
                'room_type' => $attributesDescriptions[array_search('room_type', $attributesTitles) ?? -1] ?? 'N/A',
                'application' => $attributesDescriptions[array_search('application', $attributesTitles) ?? -1] ?? 'N/A',
                'shape' => $attributesDescriptions[array_search('shape', $attributesTitles) ?? -1] ?? 'N/A',
                'images' => $selectedColorImages,
                'colors' => $colors,
                'similar_products' => []
            ]
        ], 200);
    }

    private function formatImages($galleryJson)
    {
        $filenames = json_decode($galleryJson, true);
        if (json_last_error() !== JSON_ERROR_NONE) {
            Log::error("JSON decoding error for gallery: " . json_last_error_msg());
            return [];
        }

        return array_map(function ($filename) {
            return URL::to("storage/gallery/{$filename}");
        }, $filenames ?: []);
    }

    public function availableFilters(Request $request)
    {
        $locale = $request->header('lang', 'en_GB');
        $products = $this->cacheProductData($locale);

        // Define filterable attributes
        $filterableAttributes = ['product_type', 'material', 'room_type', 'application', 'shape', 'status'];
        $filters = [];

        // Get a mapping of category IDs to names in the specified locale
        $categoryNames = DB::table('product_category_langs')
            ->where('lang', $locale)
            ->pluck('name', 'category_id')
            ->all();

        // Collect unique values for each filterable attribute
        foreach ($filterableAttributes as $attribute) {
            $filters[$attribute] = collect($products)
                ->pluck($attribute)
                ->unique()
                ->filter()
                ->map(function ($value) use ($attribute, $categoryNames) {
                    // Replace product_type ID with name if applicable
                    return $attribute === 'product_type' && isset($categoryNames[$value])
                        ? $categoryNames[$value]
                        : $value;
                })
                ->values();
        }

        // Collect unique color values
        $colorValues = collect($products)
            ->pluck('colors')
            ->flatten(1)
            ->unique('name')
            ->values()
            ->map(function ($color) {
                return ['hex_code' => $color['hex_code'], 'name' => $color['name']];
            });

        $filters['colors'] = $colorValues;

        return response()->json([
            'success' => true,
            'data' => $filters
        ], 200);
    }
    public function getSettings(Request $request)
    {
        // Optionally, set the locale based on the request header
        $locale = $request->header('lang', 'en_GB');
        App::setLocale($locale);

        // Fetch the settings
        $settings = Settings::first();

        if (!$settings) {
            return response()->json([
                'success' => false,
                'message' => 'Settings not found.'
            ], 404);
        }

        return response()->json([
            'success' => true,
            'data' => [
                'domain' => $settings->domain,
                'email' => $settings->email,
                'phone' => $settings->phone,
                'address' => $settings->address,
                'facebook' => $settings->facebook,
                'twitter' => $settings->twitter,
                'instagram' => $settings->instagram,
                'linkedin' => $settings->linkedin,
                'whatsapp' => $settings->whatsapp,
                'about_us' => $settings->about_us,
                'terms_and_conditions' => $settings->terms_and_conditions,
                'privacy_policy' => $settings->privacy_policy,
            ]
        ], 200);
    }


}