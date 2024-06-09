@extends('ManageRegistration.Muip Admin.template')

@section('content')
    <div class="container mt-5">
        <div class="card">
            <div class="card-body">
                <h2 class="card-title">Academic Performance</h2>
                <canvas id="performanceChart" width="800" height="400"></canvas>
            </div>
        </div>
    </div>
    <a href="{{ url()->previous() }}" class="btn btn-secondary mt-3 float-right ml-3">Back</a>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Extracting labels and data from the results
            var labels = {!! json_encode($results->pluck('subject.subjectName')) !!};
            var data = {!! json_encode($results->pluck('resultMark')) !!};

            // Chart configuration
            var config = {
                type: 'bar',
                data: {
                    labels: labels,
                    datasets: [{
                        label: 'Result Mark',
                        data: data,
                        backgroundColor: 'rgba(54, 162, 235, 0.2)',
                        borderColor: 'rgba(54, 162, 235, 1)',
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            };

            // Initialize the chart
            var ctx = document.getElementById('performanceChart').getContext('2d');
            new Chart(ctx, config);
        });
    </script>
@endsection
