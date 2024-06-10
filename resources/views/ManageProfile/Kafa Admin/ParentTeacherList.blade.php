@extends('ManageRegistration.Kafa Admin.template')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Parents</h3>
                    </div>
                    <div class="card-body">
                        <div class="list-group" id="parentList">
                            @foreach ($parents as $parent)
                                <button type="button"
                                    class="list-group-item list-group-item-action d-flex justify-content-between align-items-center"
                                    onclick="window.location='{{ route('profile.showParent', $parent->id) }}'">
                                    <span>{{ $parent->user->name }}</span> <!-- Assuming 'name' is the attribute in the User model -->
                                </button>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-4">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Teachers</h3>
                    </div>
                    <div class="card-body">
                        <div class="list-group" id="teacherList">
                            @foreach ($teachers as $teacher)
                                <button type="button"
                                    class="list-group-item list-group-item-action d-flex justify-content-between align-items-center"
                                    onclick="window.location='{{ route('profile.showTeacher', $teacher->id) }}'">
                                    <span>{{ $teacher->fullname }}</span> <!-- Assuming 'fullname' is the attribute in the Teacher model -->
                                </button>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
