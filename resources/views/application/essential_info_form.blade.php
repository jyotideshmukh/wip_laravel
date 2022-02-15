@extends('layouts.default')

@section('content')
<h3>Essensial Information</h3>
<form method="post" action="{{ route('app.storeEssentialInfo') }}">
    @csrf
    <div class="row mb-3">
        <label for="height_feet" class="col-sm-2 col-form-label">How old are you?</label>
        <div class="col-sm-5">
            <select name="height_feet" id="height_feet" class="form-select">
                <option value="" selected>Select</option>
                @for($i =1; $i<=7 ;$i++) <option value="{{ $i }}">{{ $i }} feet</option>
                    @endfor
            </select>
            @error('height_feet')
            <p class="text-danger text-xs">{{ $message }}</p>
            @enderror
        </div>
        <div class="col-sm-5">
            <select name="height_inches" id="height_inches" class="form-select">
                <option value="" selected>Select</option>
                @for($i =1; $i<=11 ;$i++) <option value="{{ $i }}">{{ $i }} Inch</option>
                    @endfor
            </select>
            @error('height_inches')
            <p class="text-danger text-xs">{{ $message }}</p>
            @enderror
        </div>
    </div>


    <div class="row mb-3">
        <label for="weight" class="col-sm-2 col-form-label">What is your weight?</label>
        <div class="col-sm-5">
            <select name="weight" class="form-select">
                <option value="" selected>Select</option>
                @for($i =1; $i<=250 ;$i++) <option value="{{ $i }}">{{ $i }}</option>
                    @endfor
            </select>
            @error('weight')
            <p class="text-danger text-xs">{{ $message }}</p>
            @enderror
        </div>
    </div>

    <div class="row mb-3 usCitizenSection">
        <label for="usCitizenYes" class="col-sm-2 col-form-label">Are you a US citizen?</label>
        <div class="col-sm-5">
            <div class="form-check">
                <input class="form-check-input" type="radio" name="is_us_citizen" id="usCitizenYes" value="yes" checked="checked">
                <label class="form-check-label" for="usCitizenYes">Yes</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="is_us_citizen" id="usCitizenNo" value="no">
                <label class="form-check-label" for="usCitizenNo">No</label>
            </div>
        </div>
        @error('is_us_citizen')
        <p class="text-danger text-xs">{{ $message }}</p>
        @enderror
    </div>

    <div class="row mb-3 greenCardSection">
        <label for="isGreenCardHolder12Plus" class="col-sm-2 col-form-label">Do you hold a green card?</label>
        <div class="col-sm-5">
            <div class="form-check">
                <input class="form-check-input" type="radio" name="is_green_card_holder" id="isGreenCardHolder12Plus" value="12Plus">
                <label class="form-check-label" for="isGreenCardHolder12Plus">Yes (12 months +)</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="is_green_card_holder" id="isGreenCardHolder12Minus" value="12Minus">
                <label class="form-check-label" for="isGreenCardHolder12Minus">Less than 12 months</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="is_green_card_holder" id="isGreenCardHolderNo" value="no">
                <label class="form-check-label" for="isGreenCardHolderNo">No</label>
            </div>
        </div>
        @error('is_green_card_holder')
        <p class="text-danger text-xs">{{ $message }}</p>
        @enderror
    </div>

    <div class="col-12">
        <button type="button" class="btn btn-default">Back</button>
        <button type="submit" class="btn btn-default">Next</button>
    </div>
</form>
@endsection

@push('pageJs')
<script>
    $('input[name="is_us_citizen"]').click(function() {
        if ($(this).val() === 'yes') {
            $('.greenCardSection').show();
        } else {
            $('.greenCardSection').hide();
        }
    })
</script>

@endpush