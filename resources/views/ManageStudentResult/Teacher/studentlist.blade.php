@extends('ManageRegistration.Teacher.template')

@section('content')
<div class="container mt-5">
    <h2>Search Results</h2>

    {{-- Search Form --}}
    <form action="{{ route('results.search') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="grade" class="form-label">Grade</label>
            <input type="text" class="form-control" id="grade" name="grade" required>
        </div>

        <button type="submit" class="btn btn-primary">Search</button>
    </form>

    {{-- Search Results --}}
    @if(request()->isMethod('post'))
        @if($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <h3>Search Results for Grade: {{ $grade }}</h3>

        @if($results->isEmpty())
            <p>No results found for grade {{ $grade }}.</p>
        @else
            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Student ID</th>
                        <th>Subject</th>
                        <th>Mark</th>
                        <th>Grade</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($results as $result)
                        <tr>
                            <td>{{ $result->id }}</td>
                            <td>{{ $result->student_id }}</td>
                            <td>{{ $result->subject }}</td>
                            <td>{{ $result->mark }}</td>
                            <td>{{ $result->grade }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    @endif
</div>
@endsection
