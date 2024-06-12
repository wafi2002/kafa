<!-- resources/views/activity/show.blade.php -->
@extends('ManageRegistration.Kafa Admin.template')

@section('content')
    <div class="card">
        <div class="card-header">
            {{ $activity->activityName }}
        </div>
        <div class="card-body">
            <p>Description: {{ $activity->activityDescription }}</p>
            <p>Date: {{ $activity->activityDate }}</p>
            <p>Time: {{ $activity->activityDescription }}</p>
            <!-- Add other details as needed -->

            <!-- Edit Button -->
            <form method="POST" action="{{ route('report.AddPostMortemForm', $activity->id) }}">
                @csrf
                <button type="submit" class="btn btn-primary">Create Post-Mortem</button>
            </form>



            <!-- Back Button -->
            <a href="{{ url()->previous() }}" class="btn btn-secondary">Back</a>
        </div>
    </div>
@endsection
