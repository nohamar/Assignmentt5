<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;

class StudentController extends Controller
{
    // Display a list of students
    public function index(Request $request)
        {
            if ($request->ajax()) {
                $query = trim($request->input('search'));
                $min = $request->input('min', 0); 
                $max = $request->input('max', 100); 

                if (!empty($query)) {
                   

                $students = Student::where('name', 'LIKE', "%{$query}%")
                ->whereBetween('age', [$min, $max])
                  ->get();

                } else {
                    $students = Student::all();
                }
                return response()->json($students, 200);
            }
        
            // For regular requests (non-AJAX), return the view
            if ($request->has('search', 'min', 'max')) {
                $query = $request->search;
                $min = $request->min; 
                $max = $request->max; 

                $students = Student::where('name', 'LIKE', "%{$query}%")
                    ->whereBetween('age', [$min, $max])
                    ->get();
            } else {
                $students = Student::all();
            }
            
            return view('students.index', compact('students'));
        }
        
    

    // Show the form to create a new student
    public function create()
    {
        return view('create');
    }

    // Store a newly created student
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'age'  => 'required|integer|min:1|max:100',
        ]);

        Student::create([
            'name' => $request->name,
            'age'  => $request->age,
        ]);

        return redirect()->route('student.index')->with('success', 'Student added successfully!');
    }

    public function show($id) {}
    public function edit($id) {}
    public function update(Request $request, $id) {}
    public function destroy($id) {}
}
