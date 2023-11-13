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
</div>
<!-- /.row (main row) -->
@endsection