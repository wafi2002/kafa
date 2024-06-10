@extends('ManageRegistration.Teacher.template')

@section('content')
<div class="container mt-5">
    <h2>Add New Result for {{ $student->studentName }}</h2>

    {{-- Add Result Form --}}
    <form action="{{ route('results.store') }}" method="POST">
        @csrf

        <input type="hidden" id="studentId" name="studentId" value="{{ $student->id }}">

        <div class="mb-3">
            <label for="studentName" class="form-label">Student Name</label>
            <input type="text" class="form-control" id="studentName" name="studentName" value="{{ $student->studentName }}" readonly>
        </div>

        <div class="mb-3">
            <label for="subject" class="form-label">Subject</label>
            <select class="form-control" id="subjectName" name="subject" required>
                @foreach($subjects as $subject)
                    <option value="{{ $subject->id }}">{{ $subject->subjectName }}</option>
                @endforeach
            </select>
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


