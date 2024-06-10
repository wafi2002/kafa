@extends('ManageRegistration.Teacher.template')

@section('content')

<h1>All Activities</h1>

    @if($activities->isEmpty())
        <p>No activities found</p>
    @else
        <table border="1">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <!-- Add other columns as necessary -->
                </tr>
            </thead>
            <tbody>
                @foreach($activities as $activity)
                    <tr>
                        <td>{{ $activity->id }}</td>
                        <td>{{ $activity->activityName }}</td>
                        <td>{{ $activity->activityDescription }}</td>
                        <td>{{ $activity->activityDate }}</td>
                        <td>{{ $activity->activityTime }}</td>
                        <td>{{ $activity->activityTentative }}</td>

                        <!-- Add other fields as necessary -->
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
@endsection

