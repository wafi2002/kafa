@extends('ManageRegistration.Muip Admin.template')

@section('content')
    <div class="container">
        <h2>Details for Activity: {{ $activity->activityName }}</h2>

        <div class="card mb-3">
            <div class="card-header">
                Activity Details
            </div>
            <div class="card-body">
                <p><strong>Description:</strong> {{ $activity->activityDescription }}</p>
                <p><strong>Date:</strong> {{ $activity->activityDate }}</p>
                <p><strong>Time:</strong> {{ $activity->activityTime }}</p>
                <p><strong>Tentative:</strong> {{ $activity->activityTentative }}</p>
            </div>
        </div>

        <h3>Post-Mortem Reports</h3>

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @if($activity->postMortems->isEmpty())
            <p>No post-mortem reports available for this activity.</p>
        @else
            <ul class="list-group">
                @foreach($activity->postMortems as $postMortem)
                    <li class="list-group-item">
                        <p><strong>Description:</strong> {{ $postMortem->postDescription }}</p>
                        <p><strong>Date:</strong> {{ $postMortem->postDate }}</p>
                        <p><strong>Status:</strong> {{ $postMortem->postStatus }}</p>
                        <a href="{{ route('report.EditPostMortemForm', ['id' => $activity->id, 'postMortemId' => $postMortem->id]) }}" class="btn btn-warning">Edit</a>
                    </li>
                @endforeach
            </ul>
        @endif

        <a href="{{ route('report.ViewFinishActivityList') }}" class="btn btn-secondary mt-3">Back to Activities</a>
    </div>
@endsection
