@extends('layouts.master')

@section('content')
<div class="app-page-title">
    <div class="page-title-wrapper">
        <div class="page-title-heading">
            <div class="page-title-icon">
                <i class="pe-7s-phone icon-gradient bg-premium-dark">
                    </i>
            </div>
            <div>Dashboard
                <div class="page-title-subheading">Welcome to SPE Admin
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-6 col-xl-4">
        <div class="card mb-3 widget-content">
            <div class="widget-content-outer">
                <div class="widget-content-wrapper">
                    <div class="widget-content-left">
                        <div class="widget-heading">Pharmacies</div>
                        <div class="widget-subheading">Active Pharmacy</div>
                    </div>
                    <div class="widget-content-right">
                        <div class="widget-numbers text-success">{{ $pharmacies }}</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-6 col-xl-4">
        <div class="card mb-3 widget-content">
            <div class="widget-content-outer">
                <div class="widget-content-wrapper">
                    <div class="widget-content-left">
                        <div class="widget-heading">Users</div>
                        <div class="widget-subheading">Active Users</div>
                    </div>
                    <div class="widget-content-right">
                        <div class="widget-numbers text-warning">{{ $users }}</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-6 col-xl-4">
        <div class="card mb-3 widget-content">
            <div class="widget-content-outer">
                <div class="widget-content-wrapper">
                    <div class="widget-content-left">
                        <div class="widget-heading">Monthly Bill</div>
                        <div class="widget-subheading">Total Collected Bill by this Month</div>
                    </div>
                    <div class="widget-content-right">
                        <div class="widget-numbers text-danger">13</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-6">
        <div class="main-card mb-3 card">
            <div class="card-body">
                <div class="chartjs-size-monitor" style="position: absolute; left: 0px; top: 0px; right: 0px; bottom: 0px; overflow: hidden; pointer-events: none; visibility: hidden; z-index: -1;">
                    <div class="chartjs-size-monitor-expand" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;">
                        <div style="position:absolute;width:1000000px;height:1000000px;left:0;top:0"></div>
                    </div>
                    <div class="chartjs-size-monitor-shrink" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;">
                        <div style="position:absolute;width:200%;height:200%;left:0; top:0"></div>
                    </div>
                </div>
                <h5 class="card-title">Pharmacy Status</h5>
                <canvas id="doughnut-chart-new" width="1230" height="614" class="chartjs-render-monitor" style="display: block; height: 307px; width: 615px;"></canvas>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="main-card mb-3 card">
            <div class="card-body">
                <div class="chartjs-size-monitor" style="position: absolute; left: 0px; top: 0px; right: 0px; bottom: 0px; overflow: hidden; pointer-events: none; visibility: hidden; z-index: -1;">
                    <div class="chartjs-size-monitor-expand" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;">
                        <div style="position:absolute;width:1000000px;height:1000000px;left:0;top:0"></div>
                    </div>
                    <div class="chartjs-size-monitor-shrink" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;">
                        <div style="position:absolute;width:200%;height:200%;left:0; top:0"></div>
                    </div>
                </div>
                <h5 class="card-title">Coupon</h5>
                <canvas id="polar-chart-new" width="1230" height="614" class="chartjs-render-monitor" style="display: block; height: 307px; width: 615px;"></canvas>
            </div>
        </div>
    </div>
    <!--<div class="col-md-12">
        <div class="main-card mb-3 card">
            <div class="card-body">
                <div class="card-title">Dashboard</div>
            </div>
        </div>
    </div>-->
</div>
<script>
var doughnut_chart = document.getElementById('doughnut-chart-new').getContext('2d');
var doughnutData = {
    datasets: [{
        data: [<?php echo $inactive_pharmacies; ?>, <?php echo $removed_pharmacies; ?>, <?php echo $active_pharmacies; ?>],
        backgroundColor: ["#ffcd56", "#b50026", "#029e3f"]
    }],
    labels: [
        'Inactive',
        'Removed',
        'Active'
    ]
};
var myDoughnutChart = new Chart(doughnut_chart, {
    type: 'doughnut',
    data: doughnutData,
});

var polar_chart = document.getElementById('polar-chart-new').getContext('2d');

var PolarData = {
    datasets: [{
        data: [10, 20, 30],
        backgroundColor: ["#ffcd56", "#b50026", "#029e3f"]
    }],
    labels: [
        'Active',
        'Used',
        'Inactive'
    ]
};

var myPolarChart = new Chart(polar_chart, {
    type: 'polarArea',
    data: PolarData,
});
</script>
@endsection
