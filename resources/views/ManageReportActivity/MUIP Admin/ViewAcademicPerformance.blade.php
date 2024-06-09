@extends('ManageRegistration.Muip Admin.template')

@section('content')
    <div class="container mt-5">
        <h2>Academic Performance</h2>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Subject Name</th>
                    <th>Result Mark</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($results as $result)
                    <tr>
                        <td>{{ optional($result->subject)->subjectName }}</td>
                        <td>{{ $result->resultMark }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
