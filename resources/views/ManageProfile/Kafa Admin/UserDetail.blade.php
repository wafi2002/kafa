@extends('ManageRegistration.Kafa Admin.template')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">User Detail</h3>
                    </div>
                    <div class="card-body">

                        @if(isset($parent))
                            <h5>Parent Details</h5>
                            <p>Name: {{ $parent->user->name }}</p>
                            <p>Parent IC: {{ $parent->parentIC }}</p>
                            <p>Phone No: {{ $parent->phoneNo }}</p>
                            <p>Address: {{ $parent->address }}</p>
                            <p>Relation: {{ $parent->relation }}</p>
                        @endif

                        @if(isset($teacher))
                            <h5>Teacher Details</h5>
                            <p>Fullname: {{ $teacher->fullname }}</p>
                            <p>Gender: {{ $teacher->gender }}</p>
                            <p>Address: {{ $teacher->address }}</p>
                            <p>Education Level: {{ $teacher->educationLevel }}</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
