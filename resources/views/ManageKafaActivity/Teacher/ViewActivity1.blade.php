@extends('ManageRegistration.Teacher.template')

@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search Activities</title>
</head>
<body>
    <form action="{{ route('activities.search') }}" method="get">
        <input type="text" name="search_term" placeholder="Search for activities..." value="{{ request()->input('search_term') }}">
        <button type="submit">Search</button>
    </form>

    <h2>Search Results:</h2>
    @if($activities->isEmpty())
        <p>No activities found.</p>
    @else
        <ul>
            @foreach($activities as $activity)
                <li>{{ $activity->activityName }} - {{ $activity->activityDescription }}</li>
            @endforeach
        </ul>
    @endif
</body>
</html>

@endsection

