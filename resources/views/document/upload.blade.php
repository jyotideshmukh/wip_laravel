@extends('layouts.default')

@section('content')

<h2>Upload Documents</h2>

<form class="row g-3" method="post" action="{{ route('app.processUpload') }}" enctype="multipart/form-data">
    @csrf

    <div class="col-12">
        <label for="driving_license" class="form-label">Upload Driving License</label>
        <input type="file" class="form-control" name="driving_license" id="driving_license">
        @error('driving_license')
        <p class=" text-danger text-xs">{{ $message }}</p>
        @enderror
    </div>
    <div class="col-12">
        <label for="ehs" class="form-label">Upload EHS</label>
        <input type="file" class="form-control" name="ehs" id="ehs">
        @error('ehs')
        <p class=" text-danger text-xs">{{ $message }}</p>
        @enderror
    </div>
    <div class="col-12">
        <label for="profile_picture" class="form-label">Upload Latest Picture</label>
        <input type="file" class="form-control" name="profile_picture" id="profile_picture">
        @error('profile_picture')
        <p class=" text-danger text-xs">{{ $message }}</p>
        @enderror
    </div>

    <div class="col-12">
        <button type="button" class="btn btn-dark">Back</button>
        <button type="submit" class="btn btn-primary">Next</button>
    </div>

</form>

@endsection