@extends('layouts.master')

@section('title')
    Dashboard
@endsection

@section('breadcrumb')
    @parent
    <li class="active">Dashboard</li>
@endsection

@section('content')
<!-- Small boxes (Stat box) -->
<div class="row">
    <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-aqua">
            <div class="inner">
                <h2>Estimasi</h2>

                <!-- <p>Total Kategori</p> -->
            </div>
            <div class="icon">
                <i class="fa fa-calculator"></i>
            </div>
            <a href="{{ route('estimasi.create') }}" class="small-box-footer">Lihat <i class="fa fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-green">
            <div class="inner">
                <h2>Tipe pengurusan</h2>

                <!-- <p>Total Produk</p> -->
            </div>
            <div class="icon">
                <i class="fa fa-file"></i>
            </div>
            <a href="{{ route('tipe_pengurusan.index') }}" class="small-box-footer">Lihat <i class="fa fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-yellow">
            <div class="inner">
                <h2>Biaya Admin</h2>

                <!-- <p>Total Member</p> -->
            </div>
            <div class="icon">
                <i class="fa fa-bank"></i>
            </div>
            <a href="{{ route('biaya_admin.index') }}" class="small-box-footer">Lihat <i class="fa fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-red">
            <div class="inner">
                <h2>Pelanggan</h2>

                <!-- <p>Total Supplier</p> -->
            </div>
            <div class="icon">
                <i class="fa fa-people-plus"></i>
            </div>
            <a href="{{ route('pelanggan.index') }}" class="small-box-footer">Lihat <i class="fa fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <!-- ./col -->
</div>
<!-- /.row -->
<!-- Main row -->
<!-- <div class="row">
    <div class="col-lg-12">
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">Grafik Pendapatan {{ tanggal_indonesia($tanggal_awal, false) }} s/d {{ tanggal_indonesia($tanggal_akhir, false) }}</h3>
            </div> -->
            <!-- /.box-header -->
            <!-- <div class="box-body">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="chart"> -->
                            <!-- Sales Chart Canvas -->
                            <!-- <canvas id="salesChart" style="height: 180px;"></canvas> -->
                        <!-- </div> -->
                        <!-- /.chart-responsive -->
                    <!-- </div>
                </div> -->
                <!-- /.row -->
            <!-- </div>
        </div> -->
        <!-- /.box -->
    <!-- </div> -->
    <!-- /.col -->
<!-- </div> -->
<!-- /.row (main row) -->
@endsection

@push('scripts')
<!-- ChartJS -->
<script src="{{ asset('AdminLTE-2/bower_components/chart.js/Chart.js') }}"></script>
<script>
$(function() {
    // Get context with jQuery - using jQuery's .get() method.
    var salesChartCanvas = $('#salesChart').get(0).getContext('2d');
    // This will get the first returned node in the jQuery collection.
    var salesChart = new Chart(salesChartCanvas);

    var salesChartData = {
        labels: {{ json_encode($data_tanggal) }},
        datasets: [
            {
                label: 'Pendapatan',
                fillColor           : 'rgba(60,141,188,0.9)',
                strokeColor         : 'rgba(60,141,188,0.8)',
                pointColor          : '#3b8bba',
                pointStrokeColor    : 'rgba(60,141,188,1)',
                pointHighlightFill  : '#fff',
                pointHighlightStroke: 'rgba(60,141,188,1)',
                data: {{ json_encode($data_pendapatan) }}
            }
        ]
    };

    var salesChartOptions = {
        pointDot : false,
        responsive : true
    };

    salesChart.Line(salesChartData, salesChartOptions);
});
</script>
@endpush