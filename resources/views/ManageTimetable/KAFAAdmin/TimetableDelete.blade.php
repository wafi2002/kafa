@extends('ManageTimetable.KAFAAdmin.KafaTemplate')

@section('kafapunya')
<div class="container">
    <div class="card" style="margin-left: auto; margin-right: auto; width: 50%; margin-top: 20px; text-align: center;">
        <div class="card-header">
            <h4>Confirmation</h4>
        </div>
        <div class="card-body">
            <p>Are you sure you want to DELETE this table?</p>
            <div class="d-flex justify-content-center mt-4">
                <form method="POST" action="{{ route('manage.timetable.list.destroy', $timetable->id) }}">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger" style="margin-right: 10px;">Yes</button>
                </form>
                <a href="javascript:history.back()" class="btn btn-secondary">No</a>
            </div>
        </div>
    </div>
</div>
@endsection