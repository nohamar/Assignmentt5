@extends('layout')
@section('title', 'Home')
@section('content')
<h1 class="text-center">Welcome to Laravel Kickstart</h1>
<div class="text-center mt-4">
    
        <p class="mt-4 text-gray-700 text-lg">Manage students  easily.</p>

        <div class="mt-6 space-x-4">
            <a href="/students" class="bg-green-500 text-black px-6 py-2 rounded-lg shadow-md hover:bg-green-600">
                View Students
            </a>
            <a href="/students/create" class="bg-blue-500 text-black px-6 py-2 rounded-lg shadow-md hover:bg-blue-600">
                Add Students
            </a>
        </div>
   


</div>
@endsection