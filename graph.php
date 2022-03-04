<?php

session_start();

include 'berkahcovid.php';
// include 'config.php';

?>

<div class="col-12" id="graph">
    <div class="card">

        <div class="card-body">
            <h5 class="card-title">Reports <span>/Today</span></h5>

            <!-- Line Chart -->
            <div id="reportsChart">

            </div>

            <script>
                document.addEventListener("DOMContentLoaded", () => {
                    new ApexCharts(document.querySelector("#reportsChart"), {
                        series: [{
                            name: 'Kelembaban',
                            data: [
                                <?php
                                // $kelembaban = mysqli_query($conn, "SELECT kelembaban FROM datasensor ORDER BY id");
                                $kelembaban = mysqli_query($conn, "SELECT temp_humd FROM tbl_temp ORDER BY id");
                                foreach ($kelembaban as $data) {
                                    echo $data['kelembaban'];
                                    echo ",";
                                }
                                ?>
                            ],
                        }, {
                            name: 'Suhu',
                            data: [
                                <?php
                                $suhu = mysqli_query($conn, "SELECT temp_value FROM tbl_temp ORDER BY id");
                                foreach ($suhu as $data) {
                                    echo $data['suhu'];
                                    echo ",";
                                }
                                ?>
                            ]
                        }, {
                            name: 'Kadar Amonia',
                            data: [
                                <?php
                                $amonia = mysqli_query($conn, "SELECT tbl_amonia FROM tbl_temp ORDER BY id");
                                foreach ($amonia as $data) {
                                    echo $data['amonia'];
                                    echo ",";
                                }
                                ?>
                            ]
                        }],
                        chart: {
                            height: 350,
                            type: 'area',
                            toolbar: {
                                show: true
                            },
                        },
                        markers: {
                            size: 4
                        },
                        colors: ['#4154f1', '#2eca6a', '#ff771d'],
                        fill: {
                            type: "gradient",
                            gradient: {
                                shadeIntensity: 1,
                                opacityFrom: 0.3,
                                opacityTo: 0.4,
                                stops: [0, 90, 100]
                            }
                        },
                        dataLabels: {
                            enabled: false
                        },
                        stroke: {
                            curve: 'smooth',
                            width: 2
                        },
                        xaxis: {
                            type: 'datetime',
                            categories: [
                                <?php
                                $waktu = mysqli_query($conn, "SELECT waktu FROM datasensor ORDER BY waktu");
                                foreach ($waktu as $data) {
                                    echo "'";
                                    echo date("Y-m-d\TH:i:s.000\Z", strtotime($data['waktu']));
                                    echo "'";
                                    echo ",";
                                }
                                ?>
                            ]
                        },
                        tooltip: {
                            x: {
                                format: 'dd/MM/yy HH:mm'
                            },
                        }
                    }).render();
                });
            </script>
            <!-- End Line Chart -->
        </div>

    </div>
</div>
<!-- End Reports -->
<script src="assets/vendor/apexcharts/apexcharts.min.js"></script>