@extends('ManageRegistration.Muip Admin.template')

@section('content')
    <div class="container mt-5">
        <h2>Select Year</h2>
        <div class="btn-group" role="group" aria-label="Year Selection">
            @foreach($years as $year)
                <a href="{{ route('report.StudentByYear', ['year' => $year]) }}" class="btn btn-primary">{{ $year }}</a>
            @endforeach
        </div>
    </div>
@endsection
