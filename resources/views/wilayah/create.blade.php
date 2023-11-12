@extends('layouts.master')

@section('title')
    Tambah Wilayah
@endsection

@section('breadcrumb')
    @parent
    <li class="active">Tambah Wilayah</li>
@endsection

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="box">
            <form action="{{ route('wilayah.save') }}" class="form-penjualan" method="post">
                @csrf
                <div class="box-body">
                    <div class="alert alert-info alert-dismissible" style="display: none;">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <i class="icon fa fa-check"></i> Perubahan berhasil disimpan
                    </div>
                    <div class="form-group row">
                        <label for="nama_wilayah" class="col-lg-2 control-label">Nama Wilayah</label>
                        <div class="col-md-2">
                            <input type="text" name="nama_wilayah" class="form-control" id="nama_wilayah" required autofocus>
                            <span class="help-block with-errors"></span>
                        </div>
                    </div>
                </div>
                <div class="box-footer text-right">
                    <a href="{{ route('wilayah.index') }}" class="btn btn-sm btn-flat btn-warning">
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