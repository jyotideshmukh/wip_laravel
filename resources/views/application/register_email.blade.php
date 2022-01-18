@extends('layouts.default')

@section('content')
<h2>Register an Email</h2>


<form class="row g-3" method="post" action="{{ route('app.storeRegisterEmail') }}">
    @csrf

    <div class="col-6">
        <label for="email" class="form-label">Email</label>
        <input type="text" class="form-control" name="email" id="email" value="{{ old('email') }}">
        @error('email')
        <p class="text-danger text-xs">{{ $message }}</p>
        @enderror
    </div>

    <div class="col-12">
        <button type="button" class="btn btn-dark">Back</button>
        <button type="submit" class="btn btn-primary">Next</button>
    </div>

</form>

@endsection