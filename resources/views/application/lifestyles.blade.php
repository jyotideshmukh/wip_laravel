@extends('layouts.default')

@section('content')

<h2>Lifestyles</h2>

<form class="row g-3" method="post" action="{{ route('app.storeLifeStyle') }}">
    @csrf

    @foreach($lifestyles as $lifestyle)
    <div class="form-check">
        <input class="form-check-input" type="checkbox" name="lifestyle_{{ $loop->index }}" value="{{ $lifestyle->id }}" id="lifestyle_{{ $loop->index }}">
        <label class="form-check-label" for="lifestyle_{{ $loop->index }}">{{ $lifestyle->name }}</label>
    </div>
    @endforeach

    <div class="row mb-3">
        <label for="usCitizenYes" class="col-sm-2 col-form-label">Driving history</label>
        <p>Have you had any motor vehicle accidents in the past 7 years or violations in the past 10 years?</p>
        <div class="col-sm-5">
            <div class="form-check">
                <input class="form-check-input" type="radio" name="is_vehical_accident_violations_positive" id="is_vehical_accident_violations_positive_yes" value="1">
                <label class="form-check-label" for="is_vehical_accident_violations_positive_yes">Yes</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="is_vehical_accident_violations_positive" id="is_vehical_accident_violations_positive_no" value="0">
                <label class="form-check-label" for="is_vehical_accident_violations_positive_no">No</label>
            </div>
        </div>
    </div>

    <div class="col-12">
        <button type="button" class="btn btn-dark">Back</button>
        <button type="submit" class="btn btn-primary">Next</button>
    </div>

</form>

@endsection