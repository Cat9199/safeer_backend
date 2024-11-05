<?php

namespace App\Http\Controllers;

use App\StaticOption;
use App\Travel;

use App\TravelLang;
use App\Helpers\FlashMsg;
use App\Language;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

use function PHPUnit\Framework\throwException;

class TravelController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    public function index()
    {
        $all_travels = Travel::with('lang')->get();
        return view('backend.pages.travel.index')->with([
            'all_travels' => $all_travels
        ]);
    }
    public function new_Travel()
    {
        return view('backend.pages.travel.new');
    }
    public function store_new_Travel(Request $request)
    {
        $all_languages = Language::all();

        // Validation
        $this->validate($request, [
            'title' => 'check_array:1',
            'price' => 'check_array:1',
            'currency' => 'check_array:1',
            'content' => 'check_array:1',
            'offer' => 'check_array:1',  // Validation for offer title
        ], [
            'title.check_array' => __('Enter Travel Title'),
            'price.check_array' => __('Enter Price Title'),
            'currency.check_array' => __('Enter Currency Title'),
            'content.check_array' => __('Enter Content Title'),
            'offer.check_array' => __('Enter Offer Title'),  // Custom message for offer validation
        ]);

        DB::beginTransaction();

        try {
            // Create Travel record
            $travel = Travel::create([
                'image' => $request->image,
                'phone' => $request->phone,
                'gallery' => $request->gallery,
            ]);

            // Loop through languages and create TravelLang records
            foreach ($all_languages as $lang) {
                $lang_slug = $lang->slug;

                // Safely check if the array key exists
                $title = $request->title[$lang_slug] ?? null;
                $price = $request->price[$lang_slug] ?? null;
                $currency = $request->currency[$lang_slug] ?? null;
                $content = $request->content[$lang_slug] ?? null;
                $from = $request->from[$lang_slug] ?? null;
                $to = $request->to[$lang_slug] ?? null;
                $offer_title = $request->offer_[$lang_slug] ?? null;

                // Create the TravelLang record
                TravelLang::create([
                    'lang' => $lang_slug,
                    'travel_id' => $travel->id,
                    'title' => $title,
                    'price' => $price,
                    'currency' => $currency,
                    'from' => $from,
                    'to' => $to,
                    'content' => $content,
                ]);

                // Handle StaticOption creation for offer title
                if ($offer_title) {
                    $option_name = 'offer_' . $lang_slug . '_title';
                    StaticOption::updateOrCreate(
                        ['option_name' => $option_name],
                        ['option_value' => $offer_title]
                    );
                }
            }

            DB::commit();
            return back()->with(FlashMsg::item_new());

        } catch (\Exception $e) {
            DB::rollBack();
            return back()->withErrors(['error' => $e->getMessage()]);
        }
    }


    public function edit_Travel($id)
    {
        $travel = Travel::with('lang_all')->findOrFail($id);
        $check_diff = array_merge(array_diff(exist_slugs($travel), all_lang_slugs()), array_diff(all_lang_slugs(), exist_slugs($travel)));
        if ($check_diff != null) {
            foreach ($check_diff as $key => $lang) {
                TravelLang::create([
                    'lang' => $lang,
                    'travel_id' => $id,
                    'title' => null,
                    'currency' => null,
                    'price' => null,
                    'content' => null
                ]);
            }
        }
        $travel = Travel::with('lang_all')->findOrFail($id);
        return view('backend.pages.travel.edit')->with([
            'travel' => $travel
        ]);
    }
    public function update_Travel(Request $request, $id)
    {
        $all_languages = Language::all();

        // Validation
        $this->validate($request, [
            'title' => 'check_array:1',
            'price' => 'check_array:1',
            'currency' => 'check_array:1',
            'content' => 'check_array:1',
        ], [
            'title.check_array' => __('Enter Travel Title'),
            'price.check_array' => __('Enter Price Title'),
            'currency.check_array' => __('Enter Currency Title'),
            'content.check_array' => __('Enter Content Title'),
        ]);

        // Update the travel record
        Travel::find($id)->update([
            'image' => $request->image,
            'phone' => $request->phone,
            'gallery' => $request->gallery,
        ]);

        // Loop through languages and update TravelLang records
        foreach ($all_languages as $lang) {
            $lang_slug = $lang->slug;

            // Update existing TravelLang records
            TravelLang::where(['travel_id' => $id, 'lang' => $lang_slug])->update([
                'title' => $request->title[$lang_slug],
                'price' => $request->price[$lang_slug],
                'currency' => $request->currency[$lang_slug],
                'content' => $request->content[$lang_slug],
                'from' => $request->from[$lang_slug],
                'to' => $request->to[$lang_slug],
            ]);

            // Update or create StaticOption for offer title
            $option_name = 'offer_' . $lang_slug . '_title';
            $offer_title = $request->offer_[$lang_slug];

            StaticOption::updateOrCreate(
                ['option_name' => $option_name],
                ['option_value' => $offer_title]
            );
        }

        return back()->with(FlashMsg::item_update());
    }

    public function delete_Travel($id)
    {
        Travel::find($id)->delete();
        TravelLang::where('travel_id', $id)->delete();
        return redirect()->back()->with([
            'msg' => __('Travel Post Deleted Successfully...'),
            'type' => 'danger'
        ]);
    }
    public function bulk_action_Travel(Request $request)
    {
        Travel::whereIn('id', $request->ids)->delete();
        TravelLang::whereIn('travel_id', $request->ids)->delete();
        return response()->json(['status' => 'ok']);
    }



}
