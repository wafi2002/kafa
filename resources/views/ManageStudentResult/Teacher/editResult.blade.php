@extends('ManageRegistration.Teacher.template')

@section('content')
<div class="container mt-5">
    <h2>Edit Result for {{ $result->studentName }}</h2>

    {{-- Edit Result Form --}}
    <form action="{{ route('results.update', $result->id) }}" method="POST">
        @csrf
        @method('PUT')

        <input type="hidden" id="studentId" name="studentId" value="{{ $result->student_id }}">

        <div class="mb-3">
            <label for="studentName" class="form-label">Student Name</label>
            <input type="text" class="form-control" id="studentName" name="studentName" value="{{ $result->studentName }}" readonly>
        </div>

        <div class="mb-3">
            <label for="subject" class="form-label">Subject</label>
            <select class="form-control" id="subjectName" name="subject" required>
                @foreach($subjects as $subject)
                    <option value="{{ $subject->id }}" {{ $subject->subjectName == $result->subjectName ? 'selected' : '' }}>{{ $subject->subjectName }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="mark" class="form-label">Mark</label>
            <input type="number" class="form-control" id="mark" name="mark" value="{{ $result->resultMark }}" required>
        </div>

        <div class="mb-3">
            <label for="grade" class="form-label">Grade</label>
            <input type="text" class="form-control" id="grade" name="grade" value="{{ $result->grade }}" required>
        </div>

        <button type="submit" class="btn btn-success">Update Result</button>
    </form>
</div>
@endsection
