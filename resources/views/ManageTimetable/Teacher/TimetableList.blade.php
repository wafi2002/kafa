@extends('ManageTimetable.Teacher.TeacherTemplate')

@section('content')
    <div class="card">
        <div class="card-header">
            CLASS TIMETABLE LIST
        </div>
        <div class="card-body d-flex justify-content-center align-items-center">
            <div>
                <table>
                    <thead>
                      <tr>
                        <th>ID</th>
                        <th>Timetable Name</th>
                        <th>Created Date</th>
                        <th>Updated Date</th>
                        <th>Actions</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach($timetables as $timetable)
                      <tr>
                        <td>{{ $timetable->id }}</td>
                        <td>{{ $timetable->timetable_classname}}</td>
                        <td>{{ $timetable->created_at }}</td>
                        <td>{{ $timetable->updated_at }}</td>
                        <td>
                          <a href="{{ route('manage.timetable.view', $timetable->id) }}">View</a>
                          <a href="{{ route('manage.timetable.edit', $timetable->id) }}">Edit</a>
                        </td>
                      </tr>
                      @endforeach
                    </tbody>
                  </table>
            </div>
        </div>
    </div>
@endsection