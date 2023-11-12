@extends('layouts.master')

@section('title')
    Ubah Estimasi
@endsection

@section('breadcrumb')
    @parent
    <li class="active">Ubah Estimasi</li>
@endsection

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="box">
            <form action="{{ route('estimasi.update') }}" class="form-penjualan" method="post">
                @csrf
                <div class="box-body">
                    <div class="alert alert-info alert-dismissible" style="display: none;">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <i class="icon fa fa-check"></i> Perubahan berhasil disimpan
                    </div>
                    <div class="form-group row">
                        <label for="no_plat" class="col-lg-2 control-label">Nomor Plat</label>
                        <div class="col-md-2">
                            <input type="text" name="no_plat" class="form-control" id="no_plat" value="{{ $data_estimasi->no_plat }}" required autofocus>
                            <span class="help-block with-errors"></span>
                        </div>
                    </div>
                </div>
                <div class="box-footer text-right">
                    <a href="{{ route('estimasi.index') }}" class="btn btn-sm btn-flat btn-warning">
                        <i class="fa fa-arrow-left"></i> <span>Kembali</span>
                    </a>
                    <button class="btn btn-sm btn-flat btn-primary"><i class="fa fa-save"></i> Simpan Perubahan</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection

@push('scripts')
@endpush