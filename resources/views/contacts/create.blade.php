@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="my-4 text-center">Add New Contact</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="card p-4 shadow-sm rounded">
        <form action="{{ url('/contacts') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" required>
            </div>

            <div class="mb-3">
                <label for="phone_number" class="form-label">Phone Number</label>
                <input type="text" class="form-control" id="phone_number" name="phone_number" value="{{ old('phone_number') }}" required>
            </div>

            <div class="d-flex justify-content-between">
                <button type="submit" class="btn btn-primary px-4">Save Contact</button>
                <a href="{{ url('/contacts') }}" class="btn btn-secondary px-4">Back to Contact List</a>
            </div>
        </form>
    </div>

</div>
@endsection
