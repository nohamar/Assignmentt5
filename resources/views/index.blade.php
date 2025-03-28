
@extends('layout')
@section('title', 'Students')
@section('content')
<h2>Students</h2>
<!-- TODO: Add search bar here -->
<table class="table mt-3">
    <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Age</th>
        </tr>
    </thead>
    <tbody id="student-table">
        @foreach ( $students as $student)
            <tr>
         <td>{{$student ->id }}</td>
         <td>{{$student->name}}</td>
         <td>{{$student->age}}</td>
    </tr>
        @endforeach
    </tbody>
</table>


<div class="mb-3">
    <label for="search" class="form-label">Search by Name:</label>
    <input type="text" class="form-control" id="search" >
  </div>

  <div class="mb-3">
    <label for="maxage" class="form-label">Maximum Age</label>
    <input type="number" class="form-control" id="maxage">
  </div>

  <div class="mb-3">
    <label for="minage" class="form-label">Minimum Age</label>
    <input type="number" class="form-control" id="minage">
  </div>

  <script>
   $(document).ready(function () {
    $('#search, #minage, #maxage').on('input', function () {
        let query = $('#search').val().trim();
        let min = $('#minage').val();
        let max = $('#maxage').val();

        $.ajax({
            url: '/students',
            method: 'GET',
            data: { search: query, min: min, max: max },
            dataType: 'json',
            success: function (response) {
                let studentList = '';
                if (response.length > 0) {
                    response.forEach(function (student) {
                        studentList += `
                            <tr>
                                <td>${student.id}</td>
                                <td>${student.name}</td>
                                <td>${student.age}</td>
                            </tr>`;
                    });
                } else {
                    studentList = `<tr><td colspan="3">No students found</td></tr>`;
                }

                $('#student-table').html(studentList);
            }
        });
    });
});
  </script>
@endsection