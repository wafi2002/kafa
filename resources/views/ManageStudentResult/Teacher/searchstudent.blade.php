@extends('ManageRegistration.Teacher.template')

@section('content')
<div class="container mt-5">
    <h2>Search Students</h2>

    <!-- Search Form -->
    <form action="{{ route('students.search') }}" method="POST">
        @csrf <!-- CSRF protection token -->

        <!-- Input field for student name -->
        <div class="mb-3">
            <label for="studentName" class="form-label">Student Name</label>
            <input type="text" class="form-control" id="studentName" name="studentName" required>
        </div>

        <!-- Submit button for the search form -->
        <button type="submit" class="btn btn-primary">Search</button>
    </form>

    <!-- Search Results -->
    @if(isset($students)) <!-- Check if $students is set -->
    <h3>Search Results for: {{ $studentName }}</h3>

    @if($students->isEmpty()) <!-- If no students found -->
    <p>No students found with the name {{ $studentName }}.</p>
    @else
    <!-- Display students in a table if found -->
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Year</th>
                <th class="text-end">Actions</th> <!-- Actions column -->
            </tr>
        </thead>
        <tbody>
            @foreach($students as $student) <!-- Loop through each student -->
            <tr style="background-color: #808080; border: 1px solid #000;">
                <td>{{ $student->id }}</td>
                <td>{{ $student->studentName }}</td>
                <td>{{ $student->studentYear }}</td>
                <td class="text-end">
                    <!-- Action buttons for each student -->
                    <a href="{{ route('results.view', $student->id) }}" class="btn btn-info">View</a>
                    <a href="{{ route('results.add', $student->id) }}" class="btn btn-success">Add</a>
                    <a href="{{ route('results.edit', $student->id) }}" class="btn btn-warning">Edit</a>
                    <a href="{{ route('results.showDeleteForm', $student->id) }}" class="btn btn-danger">Delete</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    @endif
    @endif
</div>
@endsection
