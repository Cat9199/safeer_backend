<div class="bulk-delete-wrapper">
    <div class="select-box-wrap">
        <select name="bulk_option" id="bulk_option">
            <option value="">{{ __('Bulk Action') }}</option>
            <option value="delete">{{ __('Delete') }}</option>
            <option value="download_qr">{{ __('Download QR Codes') }}</option>
        </select>
        <button class="btn btn-primary btn-sm" id="bulk_action_btn">{{ __('Apply') }}</button>
    </div>
</div>