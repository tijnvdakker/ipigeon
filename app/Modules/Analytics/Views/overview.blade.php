@extends('layout.main')
@section('content')
<?php
$pageHeader = new pageHeader("<span class='las la-chart-bar'></span> Analytics");
$pageHeader->addSubTitle("Analytics and statistics");
echo $pageHeader->render();
?>
        <div class="chart-grid">
                <div class="chart-single">
                    <canvas id="bar-chart-1"  style="max-height:300px; width:100%"></canvas>
                </div>
                <div class="chart-single">
                    <canvas id="bar-chart-2"  style="max-height:300px;"></canvas>
                </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <script>
                // Bar chart
                new Chart(document.getElementById("bar-chart-1"), {
                    type: 'bar',
                    data: {
                      labels: ["29-04", "30-04", "01-05", "02-05"],
                      datasets: [
                        {
                          label: "Reservations per day",
                          backgroundColor: ["#3e95cd", "#8e5ea2","#3cba9f","#e8c3b9"],
                          data: [17, 19, 13, 25]
                        }
                      ]
                    }
                });
                new Chart(document.getElementById("bar-chart-2"), {
                    type: 'bar',
                    data: {
                      labels: ["29-04", "30-04", "01-05", "02-05"],
                      datasets: [
                        {
                          label: "Reservations per day",
                          backgroundColor: ["#3e95cd", "#8e5ea2","#3cba9f","#e8c3b9"],
                          data: [17, 19, 13, 25]
                        }
                      ]
                    }
                });
        </script>
@endsection
