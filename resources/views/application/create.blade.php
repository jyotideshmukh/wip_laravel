<?php //    ddd($zipDetails);?>
<x-layout>
    <x-slot name="content" :zipDetails="$zipDetails">

    <h2>Basic Information</h2>
        <div>
            @foreach($errors->all() as $message)
            <p class="text-alert text-xs">{{ $message }}</p>
            @endforeach
        </div>
    <form class="row g-3" action="/app/basic-info" method="POST">
        @csrf
        <div class="col-3">
            <label for="suffix" class="form-label">Suffix</label>
            <input type="text" class="form-control" name="suffix" id="suffix">
        </div>
        <div class="col-3">
            <label for="first_name" class="form-label">First Name</label>
            <input type="text" class="form-control" name="firstname" id="firstname" value="{{ old('firstname') }}">
            @error('firstname')
            <p class="text-danger text-xs">{{ $message }}</p>
            @enderror
        </div>
        <div class="col-3">
            <label for="middle_name" class="form-label">Middle Name</label>
            <input type="text" class="form-control"  name="middle_name" id="middle_name" value="{{ old('middle_name') }}">
        </div>
        <div class="col-3">
            <label for="lastname" class="form-label">Last Name</label>
            <input type="text" class="form-control" name="lastname" id="lastname" value="{{ old('lastname') }}">
            @error('lastname')
            <p class="text-danger text-xs">{{ $message }}</p>
            @enderror
        </div>
        <div class="col-6">
            <label for="birth_date" class="form-label">Birth Date</label>
            <input type="text" class="form-control" name="birthdate" id="birthdate" value="{{ old('birthdate') }}">
            @error('birthdate')
            <p class="text-danger text-xs">{{ $message }}</p>
            @enderror
        </div>
        <div class="col-6">
            <label for="birth_date" class="form-label">Email</label>
            <input type="text" class="form-control" name="email" id="email" value="{{ old('email') }}">
            @error('email')
            <p class="text-danger text-xs">{{ $message }}</p>
            @enderror
        </div>
        <div class="col-12">
            <label for="Gender" class="form-label">Gender</label><br />

            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="gender" id="genderMale" value="male">
                <label class="form-check-label" for="genderMale">Male</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="gender" id="genderFemale" value="female">
                <label class="form-check-label" for="genderFemale">Female</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="gender" id="genderOther" value="other">
                <label class="form-check-label" for="genderOther">Other</label>
            </div>
            @error('gender')
            <p class="text-danger text-xs">{{ $message }}</p>
            @enderror
        </div>
        <div class="col-6">
            <label for="street_address" class="form-label">Street Address</label>
            <input type="text" class="form-control" name ="street_address" id="street_address" value="{{ old('street_address') }}">
        </div>

        <div class="col-6">
            <label for="apartment" class="form-label">Apartment</label>
            <input type="text" class="form-control" name="apartment" id="apartment" value="{{ old('apartment') }}">
        </div>
        <div class="col-4">
            <label for="city" class="form-label">City</label>
            <input type="text" class="form-control" name="city" id="city" value="{{ old('city',($zipDetails ? $zipDetails['city']:'')) }}">
            @error('city')
            <p class="text-danger text-xs">{{ $message }}</p>
            @enderror

        </div>
        <div class="col-4">
            <label for="state" class="form-label">State</label>
            <input type="text" class="form-control" name="state" id="state" value="{{ old('state',($zipDetails ? $zipDetails['state']:'')) }}">
            @error('state')
            <p class="text-danger text-xs">{{ $message }}</p>
            @enderror
        </div>
        <div class="col-4">
            <label for="zip" class="form-label">Zip</label>
            <input type="text" class="form-control" name="zip" id="zip" value="{{ old('zip', ($zipDetails ? $zipDetails['zip']:'')) }}">
            @error('zip')
            <p class="text-danger text-xs">{{ $message }}</p>
            @enderror
        </div>

        <div class="col-12">
            <button type="submit" class="btn btn-primary">Next</button>
        </div>
    </form>
    </x-slot>
</x-layout>
