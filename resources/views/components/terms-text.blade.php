<div class="form-group row col-md-12">
    <div class="checkboxes float-left add_bottom_15 add_top_15">
        <label class="container_check">
            I hereby agree to the <a target="_blank" href="{{ route('disclaimer') }}">website disclaimer</a> and <a target="_blank" href="{{ route('privacy') }}">privacy policy</a> of {{ config('app.name') }}
            <input type="checkbox" name="terms" value="agree">
            <span class="checkmark"></span>
        </label>
        @error('terms')
            <span class="text-danger"><small>{{ $message }}</small></span>
        @enderror
    </div>
</div>
