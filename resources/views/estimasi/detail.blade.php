@extends('layouts.master')

@section('title')
    Detail Estimasi
@endsection

@section('breadcrumb')
    @parent
    <li class="active">Detail Estimasi</li>
@endsection

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="box" style="padding-top: 5rem; padding-inline: 3rem">
          <div style="display: grid;grid-template-columns: 1fr 1fr">
            <div>        
                <label class="control-label">Nomor Plat :</label>
                <h5>{{ $estimasi-> no_plat }}</h5>
                <label class="control-label">Nilai PKB :</label>
                <h5>{{ $estimasi-> nilai_pkb }}</h5>        
                <label class="control-label">Swdkllj :</label>
                <h5>{{ $estimasi-> swdkllj }}</h5>
                <label class="control-label">Masa Berlaku Stnk :</label>
                <h5>{{ $estimasi-> masa_berlaku_stnk->isoFormat('D MMMM Y') }}</h5>
                <label class="control-label">Admin STNK :</label>
                <h5>{{ $estimasi-> admin_stnk }}</h5>
                <label class="control-label">Tanggal Buat</label>
                <h5>{{ $estimasi-> created_at->isoFormat('D MMMM Y') }}</h5>
            </div>
            <div class="">
                <label class="control-label">Admin TNKB :</label>
                <h5>{{ $estimasi-> admin_tnkb }}</h5>
                <label class="control-label">Biaya Proses :</label>
                <h5>{{ $estimasi-> biaya_proses }}</h5>
                <label class="control-label">Biaya Admin :</label>
                <h5>{{ $estimasi-> biaya_admin_pelanggan }}</h5>
                <label class="control-label">Upping</label>
                <h5>{{ $estimasi-> upping }}</h5>
                <label class="control-label">Biaya Estimasi</label>
                <h5>{{ $estimasi-> biaya_estimasi }}</h5>
            </div>
            <button style="background-color: rgb(61, 51, 51); width: max-content; border-radius: 5px"><a href="/estimasi" style="color: white">Back</a></button>
          </div>
    </div>
</div>

@endsection

@push('scripts')
@endpush