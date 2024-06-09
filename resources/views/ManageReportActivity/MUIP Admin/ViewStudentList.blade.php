@extends('ManageRegistration.Muip Admin.template')

@section('content')
    <!-- Search Bar -->
    <div class="input-group mb-3">
        <input type="text" class="form-control" id="searchInput" placeholder="Search..." aria-label="Search"
            aria-describedby="basic-addon2">
        <div class="input-group-append">
            <button class="btn btn-outline-secondary" type="button" onclick="searchStudent()">Search</button>
        </div>
    </div>

    <!-- List of Students -->
    <div class="list-group" id="studentList">
        @foreach ($students as $student)
            <button type="button" class="list-group-item list-group-item-action"
                onclick="window.location='{{ route('report.ViewAcademicPerformance', $student->studentIC) }}'">
                {{ $student->studentName }}
            </button>
        @endforeach
    </div>


    <!-- Alert for Student Not Available -->
    <div class="alert alert-danger mt-3" role="alert" id="notFoundAlert" style="display: none;">
        Student not found.
    </div>

    <script>
        function searchStudent() {
            var searchInput = document.getElementById('searchInput').value.toLowerCase();
            var studentList = document.getElementById('studentList');
            var studentButtons = studentList.getElementsByClassName('list-group-item');

            var studentFound = false;

            for (var i = 0; i < studentButtons.length; i++) {
                var studentName = studentButtons[i].textContent.toLowerCase();
                if (studentName.includes(searchInput)) {
                    studentButtons[i].style.display = "block";
                    studentFound = true;
                } else {
                    studentButtons[i].style.display = "none";
                }
            }

            if (!studentFound) {
                document.getElementById('notFoundAlert').style.display = "block";
            } else {
                document.getElementById('notFoundAlert').style.display = "none";
            }
        }
    </script>
@endsection
