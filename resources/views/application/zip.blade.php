@extends('layouts.default')

@section('content')

<h1>Your health Insurance</h1>
<div class="row">
    <div class="col-12">
        <p>
            Term insurance is a type of life insurance that provides coverage for a
            specific period of time or years. This type of life insurance provides financial
            protection to the nominee in case of any unfortunate event with the policyholder
            during the policy term. Term Insurance policies provide high life cover at lower
            premiums.
            For e.g.: Premium for ₹ 1 Crore Term Insurance cover could be as low as ₹ 441* p.m.
            These fixed premiums can be paid at once or at regular intervals for the entire policy
            term or for a limited period.
            Premium amount varies basis the type of the premium payment method opted by the buyer.
        </p>

    </div>
    <div class="col-12">
        <form method="POST" action="{{ route('app.storeZip') }}">
            @csrf
            <div class="row">
                <div class="input-group mb-3">
                    <input type="form-control" name="zip" id="zip" placeholder="zip">
                    <button class="btn btn-primary btn-sm">Go</button>
                </div>
                @error('zip')
                <span class="text-xs text-danger">{{ $message }}</span>
                @enderror
            </div>


        </form>
    </div>
</div>

@endsection