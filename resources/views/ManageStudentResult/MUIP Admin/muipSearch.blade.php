<!-- resources/views/ManageStudentResult/MUIP_Admin/muipSearch.blade.php -->

@extends('ManageRegistration.Muip Admin.template')

@section('content')
<div class="container mt-5">
    <h2>Search Students</h2>

    {{-- Search Form --}}
    <form action="{{ route('muip.search') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="studentName" class="form-label">Student Name</label>
            <input type="text" class="form-control" id="studentName" name="studentName" required>
        </div>

        <button type="submit" class="btn btn-primary">Search</button>
    </form>

    {{-- Search Results --}}
    @if(isset($students))
    <h3>Search Results for: {{ $studentName }}</h3>

    @if($students->isEmpty())
    <p>No students found with the name {{ $studentName }}.</p>
    @else
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Year</th>
                <th class="text-end">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($students as $student)
            <tr style="background-color: #808080; border: 1px solid #000;">
                <td>{{ $student->id }}</td>
                <td>{{ $student->studentName }}</td>
                <td>{{ $student->studentYear }}</td>
                <td class="text-end">
                    <a href="{{ route('muip.searchStudent', $student->id) }}" class="btn btn-info">View</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    @endif
    @endif
</div>
@endsection