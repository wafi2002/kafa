@extends('ManageRegistration.Kafa Admin.template')

@section('content')
    <div class="container">
        <h2>Edit Post-Mortem for Activity: {{ $activity->activityName }}</h2>

        <form method="POST" action="{{ route('report.PostMortemUpdate', ['id' => $activity->id, 'postMortemId' => $postMortem->id]) }}">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="postDescription">Description</label>
                <input type="text" class="form-control" id="postDescription" name="postDescription" value="{{ $postMortem->postDescription }}" required>
            </div>

            <div class="form-group">
                <label for="postDate">Date</label>
                <input type="date" class="form-control" id="postDate" name="postDate" value="{{ $postMortem->postDate }}" required>
            </div>

            <div class="form-group">
                <label for="postStatus">Status</label>
                <input type="text" class="form-control" id="postStatus" name="postStatus" value="{{ $postMortem->postStatus }}" required>
            </div>

            <button type="submit" class="btn btn-primary">Update</button>
            <a href="{{ route('report.ViewCompletePostMortem', $activity->id) }}" class="btn btn-secondary">Back</a>
        </form>
    </div>
@endsection
