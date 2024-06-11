@extends('ManageRegistration.Kafa Admin.template')


@section('content')
<div class="container mt-5">
    <h2>Delete Student Result</h2>
    <p>Student Name: {{ $student->studentName }}</p>

    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Subject</th>
                            <th>Mark</th>
                            <th>Grade</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($results as $result)
                        <tr>
                            <td>{{ $result->subjectName }}</td>
                            <td>{{ $result->resultMark }}</td>
                            <td>{{ $result->grade }}</td>
                            <td>
                                <form action="{{ route('results.deletekafa', ['student_id' => $student->id, 'result_id' => $result->id]) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection


