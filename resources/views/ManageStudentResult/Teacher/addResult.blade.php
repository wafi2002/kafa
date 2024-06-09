@extends('ManageRegistration.Teacher.template')

@section('content')
<div class="container mt-5">
    <h2>Add New Result</h2>

    {{-- Add Result Form --}}
    <form action="{{ route('results.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="studentId" class="form-label">Student ID</label>
            <input type="text" class="form-control" id="studentId" name="studentId" required>
        </div>

        <div class="mb-3">
            <label for="subject" class="form-label">Subject</label>
            <input type="text" class="form-control" id="subject" name="subject" required>
        </div>

        <div class="mb-3">
            <label for="mark" class="form-label">Mark</label>
            <input type="number" class="form-control" id="mark" name="mark" required>
        </div>

        <div class="mb-3">
            <label for="grade" class="form-label">Grade</label>
            <input type="text" class="form-control" id="grade" name="grade" required>
        </div>

        <button type="submit" class="btn btn-success">Add Result</button>
    </form>
</div>
@endsection
