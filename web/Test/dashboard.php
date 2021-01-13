<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Responsive Admin &amp; Dashboard Template based on Bootstrap 5">
    <meta name="author" content="AdminKit">
    <meta name="keywords" content="adminkit, bootstrap, bootstrap 5, admin, dashboard, template, responsive, css, sass, html, theme, front-end, ui kit, web">


    <title>AdminKit Demo - Bootstrap 5 Admin Template</title>

    <link href="dashboard/css/app.css" rel="stylesheet">
    <!-- <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap" rel="stylesheet"> -->
    <link href="dashboard/css/css2.css" rel="stylesheet">

</head>
<?php

error_reporting(0);

//***************************************

$client = new SoapClient("https://callservicechat.gosoft.co.th/ws_billingnotify/getbillingInfoServer.php?wsdl");
$token = 'uaAJrDjhhq38A6JKttfP2dVHPByeutMYCi3VdAjO56J';
$jdata = json_decode($client->getBillingInfo($token), true);
$jdata = $client->getBillingInfo($token);
//print_r($jdata);
$jdata = json_decode($jdata);
$jdata = json_decode(json_encode($jdata), true);
// echo '<pre>';
// print_r($jdata);

// echo '</pre>';

// Array
// (
//     [billing] => Array
//         (
//             [trunk07] => 3,721
//             [trunk44] => 2,854
//             [trunk31] => 104
//             [trunk32] => 0
//             [trunk33] => 7,937
//             [trunk35] => 635
//             [trunk52] => 0
//             [0] => 0
//         )

//     [cmsrpt] => Array
//         (
//             [0] => Array
//                 (
//                     [row_date] => 2021-01-06
//                     [tkgrp] => 43
//                     [incalls] => 0
//                     [outcalls] => 1240
//                     [allinusetime] => 38932
//                     [secsperday] => 86400
//                     [0] => 45.060185185185
//                 )

//             [1] => Array
//                 (
//                     [row_date] => 2021-01-06
//                     [tkgrp] => 44
//                     [incalls] => 0
//                     [outcalls] => 732
//                     [allinusetime] => 6334
//                     [secsperday] => 86400
//                     [0] => 7.3310185185185
//                 )

//             [2] => Array
//                 (
//                     [row_date] => 2021-01-06
//                     [tkgrp] => 50
//                     [incalls] => 5
//                     [outcalls] => 20
//                     [allinusetime] => 0
//                     [secsperday] => 86400
//                     [0] => 0
//                 )
//         )

//     [servey] => Array
//         (
//             [01] => Array
//                 (
//                     [start] => 13
//                     [stop] => 27
//                 )

//             [02] => Array
//                 (
//                     [start] => 4
//                     [stop] => 17
//                 )

//             [03] => Array
//                 (
//                     [start] => 16
//                     [stop] => 29
//                 )
//         )

// )
?>


<html>

<body>
    <div class="wrapper">
        <div class="main">
            <main class="content">
                <div class="container-fluid p-0">

                    <div class="row">
                        <!-- กราฟเส้นน -->

                        <div class="col-xl-12 col-xxl-12">
                            <div class="card flex-fill w-100">
                                <div class="card-header">

                                    <h5 class="card-title mb-0">กราฟเส้น(บนสุด)</h5>
                                </div>
                                <div class="card-body py-3">
                                    <div class="chart chart-sm">
                                        <canvas id="chartjs-dashboard-line"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12 col-md-6 col-xxl-3 d-flex order-2 order-xxl-3">
                            <div class="card flex-fill w-100">
                                <div class="card-header">

                                    <h5 class="card-title mb-0">Browser Usage</h5>
                                </div>
                                <div class="card-body d-flex">
                                    <div class="align-self-center w-100">
                                        <div class="py-3">
                                            <div class="chart chart-xs">
                                                <canvas id="chartjs-dashboard-pie"></canvas>
                                            </div>
                                        </div>

                                        <table class="table mb-0">
                                            <tbody>
                                                <tr>
                                                    <td>Chrome</td>
                                                    <td class="text-right">4306</td>
                                                </tr>
                                                <tr>
                                                    <td>Firefox</td>
                                                    <td class="text-right">3801</td>
                                                </tr>
                                                <tr>
                                                    <td>IE</td>
                                                    <td class="text-right">1689</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="row">
                            <div class="col-12 col-lg-8 col-xxl-9 d-flex">
                                <div class="card flex-fill">
                                    <div class="card-header">

                                        <h5 class="card-title mb-0">Report</h5>
                                    </div>
                                    <table class="table table-hover my-0">
                                        <thead>
                                            <!-- แก้เอาเองนะครับ -->
                                            <tr>
                                                <th>Name</th>
                                                <th class="d-none d-xl-table-cell">Start Date</th>
                                                <th class="d-none d-xl-table-cell">End Date</th>
                                                <th>Status</th>
                                                <th class="d-none d-md-table-cell">Assignee</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php

                                            foreach ($jdata['cmsrpt'] as $k => $item) {
                                                foreach ($item as $k2 => $item2) {                                            ?>


                                                    <tr>
                                                        <td><?php echo $item['row_date'] ?></td>
                                                        <td><?php echo $item['tkgrp'] ?></td>
                                                        <td><?php echo $item['incalls'] ?></td>
                                                        <td><?php echo $item['outcalls'] ?></td>
                                                        <td><?php echo $item['allinusetime'] ?></td>
                                                        <td><?php echo $item['secsperday'] ?></td>
                                                        <td><?php echo $item[0] ?></td>
                                                    </tr>



                                            <?php
                                                    // $num = json_decode($item['tkgrp'],true);
                                                    // echo $num;
                                                    // echo array_map('intval',$item['tkgrp']);
                                                    //print_r($integerIDs);

                                                    $integerIDs_tkgrp = json_decode('[' . $item['tkgrp'] . ']', true);
                                                    $sum_tkgrp += (array_sum($integerIDs_tkgrp));
                                                    //--
                                                    $integerIDs_incalls = json_decode('[' . $item['incalls'] . ']', true);
                                                    $sum_incalls += $item['incalls'];
                                                    //--
                                                    $integerIDs_outcalls = json_decode('[' . $item['outcalls'] . ']', true);
                                                    $sum_outcalls += $item['outcalls'];
                                                    //--
                                                    $integerIDs_allinusetime = json_decode('[' . $item['allinusetime'] . ']', true);
                                                    $sum_allinusetime += $item['allinusetime'];
                                                    //--
                                                    $integerIDs_secsperday = json_decode('[' . $item['secsperday'] . ']', true);
                                                    $sum_secsperday += $item['secsperday'];
                                                    // echo "incall->";
                                                    // echo $item['incalls'];
                                                    // echo "<-->";
                                                    // echo $sum_incalls;
                                                    // echo "<br>";
                                                    //echo ($integerIDs[0]);
                                                    //implode($sum);
                                                    //print_r($sum);
                                                    // echo $sum;
                                                    //echo $sum;
                                                    //echo("sssss");
                                                    //echo end($sum_tkgrp);
                                                    //  $a=$item['tkgrp'];
                                                    //  echo array_sum($a);
                                                    // echo  $item['tkgrp'];
                                                    //echo array_sum($integerIDs);
                                                    // echo $b;
                                                    // echo "<br>";
                                                    break;
                                                }

                                            }
                                            // echo($sum_outcalls);
                                            //echo $sum_tkgrp;
                                            echo "<hr>";

                                            ?>
                                            <tr>
                                                <td>total </td>
                                                <td> <?php echo $sum_tkgrp; ?> </td>
                                                <td> <?php echo $sum_incalls; ?> </td>
                                                <td> <?php echo $sum_outcalls; ?> </td>
                                                <td> <?php echo $sum_allinusetime; ?> </td>
                                                <td> <?php echo $sum_secsperday; ?> </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="col-12 col-lg-4 col-xxl-3 d-flex">
                                <div class="card flex-fill w-100">
                                    <div class="card-header">

                                        <h5 class="card-title mb-0 ">กราฟแท่ง</h5>
                                    </div>
                                    <div class="card-body d-flex w-100">
                                        <div class="align-self-center chart chart-lg">
                                            <canvas id="chartjs-dashboard-bar"></canvas>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
            </main>


        </div>
    </div>

    <script src="dashboard/js/app.js"></script>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            var ctx = document.getElementById("chartjs-dashboard-line").getContext("2d");
            var gradient = ctx.createLinearGradient(0, 0, 0, 225);
            gradient.addColorStop(0, "rgba(215, 227, 244, 1)");
            gradient.addColorStop(1, "rgba(215, 227, 244, 0)");
            // Line chart
            new Chart(document.getElementById("chartjs-dashboard-line"), {
                type: "line",
                data: {
                    labels: ["first", "secound", "Mar", "Apr", "May", "Jun", "Jul", "Augห", "Sep", "Oct", "Nov", "Dec"],
                    datasets: [{
                        label: "Sales ($)",
                        fill: true,
                        backgroundColor: gradient,
                        borderColor: window.theme.primary,
                        data: [
                            9000,
                            1562,
                            1584,
                            1892,
                            1587,
                            1923,
                            2566,
                            2448,
                            2805,
                            3438,
                            2917,
                            3327
                        ]
                    }]
                },
                options: {
                    maintainAspectRatio: false,
                    legend: {
                        display: false
                    },
                    tooltips: {
                        intersect: false
                    },
                    hover: {
                        intersect: true
                    },
                    plugins: {
                        filler: {
                            propagate: false
                        }
                    },
                    scales: {
                        xAxes: [{
                            reverse: true,
                            gridLines: {
                                color: "rgba(0,0,0,0.0)"
                            }
                        }],
                        yAxes: [{
                            ticks: {
                                stepSize: 1000
                            },
                            display: true,
                            borderDash: [3, 3],
                            gridLines: {
                                color: "rgba(0,0,0,0.0)"
                            }
                        }]
                    }
                }
            });
        });
    </script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            // Pie chart
            new Chart(document.getElementById("chartjs-dashboard-pie"), {
                type: "pie",
                data: {
                    labels: ["Chrome", "Firefox", "IE"],
                    datasets: [{
                        data: [4306, 3801, 1689],
                        backgroundColor: [
                            window.theme.primary,
                            window.theme.warning,
                            window.theme.danger
                        ],
                        borderWidth: 5
                    }]
                },
                options: {
                    responsive: !window.MSInputMethodContext,
                    maintainAspectRatio: false,
                    legend: {
                        display: false
                    },
                    cutoutPercentage: 75
                }
            });
        });
    </script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            // Bar chart
            new Chart(document.getElementById("chartjs-dashboard-bar"), {
                type: "bar",
                data: {
                    labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
                    datasets: [{
                        label: "This year",
                        backgroundColor: window.theme.primary,
                        borderColor: window.theme.primary,
                        hoverBackgroundColor: window.theme.primary,
                        hoverBorderColor: window.theme.primary,
                        data: [54, 67, 41, 55, 62, 45, 55, 73, 60, 76, 48, 79],
                        barPercentage: .75,
                        categoryPercentage: .5
                    }]
                },
                options: {
                    maintainAspectRatio: false,
                    legend: {
                        display: false
                    },
                    scales: {
                        yAxes: [{
                            gridLines: {
                                display: false
                            },
                            stacked: false,
                            ticks: {
                                stepSize: 20
                            }
                        }],
                        xAxes: [{
                            stacked: false,
                            gridLines: {
                                color: "transparent"
                            }
                        }]
                    }
                }
            });
        });
    </script>
</body>

</html>


<script src="dashboard/js/app.js"></script>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        var ctx = document.getElementById("chartjs-dashboard-line").getContext("2d");
        var gradient = ctx.createLinearGradient(0, 0, 0, 225);
        gradient.addColorStop(0, "rgba(215, 227, 244, 1)");
        gradient.addColorStop(1, "rgba(215, 227, 244, 0)");
        // Line chart
        new Chart(document.getElementById("chartjs-dashboard-line"), {
            type: "line",
            data: {
                labels: ["First", "secound", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
                datasets: [{
                    label: "Sales ($)",
                    fill: true,
                    backgroundColor: gradient,
                    borderColor: window.theme.primary,
                    data: [
                        9000,
                        1562,
                        1584,
                        1892,
                        1587,
                        1923,
                        2566,
                        2448,
                        2805,
                        3438,
                        2917,
                        3327
                    ]
                }]
            },
            options: {
                maintainAspectRatio: false,
                legend: {
                    display: false
                },
                tooltips: {
                    intersect: false
                },
                hover: {
                    intersect: true
                },
                plugins: {
                    filler: {
                        propagate: false
                    }
                },
                scales: {
                    xAxes: [{
                        reverse: true,
                        gridLines: {
                            color: "rgba(0,0,0,0.0)"
                        }
                    }],
                    yAxes: [{
                        ticks: {
                            stepSize: 1000
                        },
                        display: true,
                        borderDash: [3, 3],
                        gridLines: {
                            color: "rgba(0,0,0,0.0)"
                        }
                    }]
                }
            }
        });
    });
</script>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        // Pie chart
        new Chart(document.getElementById("chartjs-dashboard-pie"), {
            type: "pie",
            data: {
                labels: ["Chrome", "Firefox", "IE"],
                datasets: [{
                    data: [4306, 3801, 1689],
                    backgroundColor: [
                        window.theme.primary,
                        window.theme.warning,
                        window.theme.danger
                    ],
                    borderWidth: 5
                }]
            },
            options: {
                responsive: !window.MSInputMethodContext,
                maintainAspectRatio: false,
                legend: {
                    display: false
                },
                cutoutPercentage: 75
            }
        });
    });
</script>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        // Bar chart
        new Chart(document.getElementById("chartjs-dashboard-bar"), {
            type: "bar",
            data: {
                labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
                datasets: [{
                    label: "This year",
                    backgroundColor: window.theme.primary,
                    borderColor: window.theme.primary,
                    hoverBackgroundColor: window.theme.primary,
                    hoverBorderColor: window.theme.primary,
                    data: [54, 67, 41, 55, 62, 45, 55, 73, 60, 76, 48, 79],
                    barPercentage: .75,
                    categoryPercentage: .5
                }]
            },
            options: {
                maintainAspectRatio: false,
                legend: {
                    display: false
                },
                scales: {
                    yAxes: [{
                        gridLines: {
                            display: false
                        },
                        stacked: false,
                        ticks: {
                            stepSize: 20
                        }
                    }],
                    xAxes: [{
                        stacked: false,
                        gridLines: {
                            color: "transparent"
                        }
                    }]
                }
            }
        });
    });
</script>
</body>