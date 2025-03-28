@extends('layout')
@section('title', 'Add Student')
@section('content')
<h2>Add New Student</h2>
<form method="POST" action="{{ route('students.store') }}" class="mt-3">
    @csrf
    <div class="mb-3">
    <label for="name" class="form-label">Name</label>
    <input type="text" class="form-control" id="name">
    </div>

    <div class="mb-3">
    <label for="age" class="form-label">Age</label>
    <input type="number" class="form-control" id="age">
    </div>

    <button type="submit" class="btn btn-primary">Submit</button>
</form>
@endsection
