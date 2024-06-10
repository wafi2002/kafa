<!-- resources/views/post_mortem/create.blade.php -->
@extends('ManageRegistration.Kafa Admin.template')

@section('content')
<div class="container">
    <h2>Create Post Mortem</h2>

    <form method="POST" action="{{ route('report.PostMortemStore', $activity->id) }}">

    @csrf
    <div class="form-group">
        <label for="postDescription">Description</label>
        <textarea class="form-control" id="postDescription" name="postDescription" rows="3" required></textarea>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>

</div>
@endsection
