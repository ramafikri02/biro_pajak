@extends('layouts.master')

@section('title')
    Tambah Estimasi
@endsection

@section('breadcrumb')
    @parent
    <li class="active">Tambah Estimasi</li>
@endsection

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="box">
            <form action="{{ route('estimasi.save') }}" class="form-penjualan" method="post" name="FormName">
                @csrf
                <input type="hidden" name="admin_stnk" id="admin_stnk">
                <input type="hidden" name="admin_tnkb" id="admin_tnkb">
                <input type="hidden" name="biaya_proses" id="biaya_proses">
                <input type="hidden" name="biaya_admin_pelanggan" id="biaya_admin_pelanggan">
                <input type="hidden" name="upping" id="upping">
                <input type="hidden" name="biaya_estimasi" id="biaya_estimasi">
                <div class="box-body">
                    <div class="alert alert-info alert-dismissible" style="display: none;">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <i class="icon fa fa-check"></i> Perubahan berhasil disimpan
                    </div>
                    <!-- <div class="form-group row">
                        <label for="no_plat" class="col-lg-2 col-lg-offset-1 control-label">Nomor Plat</label>
                        <div class="col-md-2">
                            <input type="text" name="no_plat" class="form-control" id="no_plat" required autofocus>
                            <span class="help-block with-errors"></span>
                        </div>
                    </div> -->
                    <div class="form-row">
                        <div class="col">
                            <label for="id_kendaraan" class="col-lg-2 col-lg-offset-1 control-label">Nomor Plat</label>
                            <div class="col-md-2">
                                <select name="id_kendaraan" id="id_kendaraan" class="form-control" required>
                                    <option value="">Pilih Kendaraan</option>
                                    @foreach ($kendaraan as $key => $item)
                                    <option value="{{ $key }}">{{ $item }}</option>
                                    @endforeach
                                </select>
                                <span class="help-block with-errors"></span>
                            </div>
                            <label for="nilai_pkb" class="col-lg-2 col-lg-offset-1 control-label">Nilai PKB</label>
                            <div class="col-md-2">
                                <input type="text" name="nilai_pkb" id="nilai_pkb" class="form-control digits" required >
                                <span class="help-block with-errors"></span>
                            </div>
                            <label for="swdkllj" class="col-lg-2 col-lg-offset-1 control-label">SWDKLLJ</label>
                            <div class="col-md-2">
                                <input type="text" name="swdkllj" id="swdkllj" class="form-control digits" required >
                                <span class="help-block with-errors"></span>
                            </div>
                            <label for="masa_berlaku_stnk" class="col-lg-2 col-lg-offset-1 control-label">Masa berlaku STNK</label>
                            <div class="col-md-2">
                                <input type="text" name="masa_berlaku_stnk" id="masa_berlaku_stnk" class="form-control datepicker" required autofocus
                                    style="border-radius: 0 !important;" >
                                <span class="help-block with-errors"></span>
                            </div>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="col">
                            <label for="id_tipe_pengurusan" class="col-lg-2 col-lg-offset-1 control-label">Tipe Pengurusan</label>
                            <div class="col-md-2">
                                    <select name="id_tipe_pengurusan" id="id_tipe_pengurusan" class="form-control" required>
                                        <option value="">Pilih Tipe Pengurusan</option>
                                        @foreach ($tipe_pengurusan as $key => $item)
                                        <option value="{{ $key }}">{{ $item }}</option>
                                        @endforeach
                                    </select>
                                    <span class="help-block with-errors"></span>
                                </div>
                            <label for="id_wilayah" class="col-lg-2 col-lg-offset-1 control-label">Wilayah</label>
                            <div class="col-md-2">
                                <select name="id_wilayah" id="id_wilayah" class="form-control" required>
                                    <option value="">Pilih Wilayah</option>
                                    @foreach ($wilayah as $key => $item)
                                    <option value="{{ $key }}">{{ $item }}</option>
                                    @endforeach
                                </select>
                                <span class="help-block with-errors"></span>
                            </div>
                            <label for="id_jenis_kendaraan" class="col-lg-2 col-lg-offset-1 control-label">Jenis Kendaraan</label>
                            <div class="col-md-2">
                                <select name="id_jenis_kendaraan" id="id_jenis_kendaraan" class="form-control" required>
                                    <option value="">Pilih Jenis Kendaraan</option>
                                    @foreach ($jenis_kendaraan as $key => $item)
                                    <option value="{{ $key }}">{{ $item }}</option>
                                    @endforeach
                                </select>
                                <span class="help-block with-errors"></span>
                            </div>
                            <label for="id_pelanggan" class="col-lg-2 col-lg-offset-1 control-label">Pelanggan</label>
                            <div class="col-md-2">
                                <select name="id_pelanggan" id="id_pelanggan" class="form-control" required>
                                    <option value="">Pilih Pelanggan</option>
                                    @foreach ($pelanggan as $key => $item)
                                    <option value="{{ $key }}">{{ $item }}</option>
                                    @endforeach
                                </select>
                                <span class="help-block with-errors"></span>
                            </div>
                            </div>
                        </div>
                    </div>
                <div class="box-footer text-right">
                    <button type="button" class="btn btn-sm btn-flat btn-success" id="addRow"><i class="fa fa-percent"></i> Hitung</button>
                    <div class="box-body table-responsive text-left">
                        <table class="table table-stiped table-bordered" id="table-hitung">
                            <thead>
                                <th>Tahun pajak</th>
                                <th>Pokok pkb</th>
                                <th>Denda pkb</th>
                                <th>Swdkllj</th>
                                <th>Denda swdkllj</th>
                                <th>Jumlah</th>
                            </thead>
                        </table>
                    </div>
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
<script src="{{ asset('/AdminLTE-2/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/cleave.js/1.6.0/cleave.min.js"></script>
<script>
    $('.digits').each(function (index, ele) {
    var cleaveCustom = new Cleave(ele, {
        numeral: true,
        numeralThousandsGroupStyle: 'thousand'
        });
    });

    $(function () {
        $('.datepicker').datepicker({
            format: 'yyyy-mm-dd',
            autoclose: true
        });
    });
    

    let admin_stnk = 1000,
        admin_tnkb = 1000,
        biaya_proses = 1000,
        biaya_admin_pelanggan = 1000,
        upping = 1000,
        biaya_estimasi = 1000

    function addNewRow() {
        let dateold = new Date(document.forms["FormName"]["masa_berlaku_stnk"].value),
            datenew = new Date();

        const ms = datenew.getTime() - dateold.getTime();

        const date = new Date(ms);

        const difference_year = Math.abs(date.getUTCFullYear() - 1970);
        const difference_month = datenew.getMonth() - dateold.getMonth() + 12 * (datenew.getFullYear() - dateold.getFullYear())

        let dataRow = []

        if (difference_year > 0) {
            for (var i = 0; i < difference_year; i++) {
                const tahun_pajak = new Date(new Date(document.forms["FormName"]["masa_berlaku_stnk"].value).setFullYear(new Date(document.forms["FormName"]["masa_berlaku_stnk"].value).getFullYear() + i + 1))
                    nilai_pkb = parseInt(document.forms["FormName"]["nilai_pkb"].value.replace(',','')),
                    swdkllj = parseInt(document.forms["FormName"]["swdkllj"].value.replace(',','')),
                    jenis_kendaraan = document.forms["FormName"]["id_jenis_kendaraan"].value
                
                let rumus_denda_swdkllj = 0

                if (jenis_kendaraan == "1") {
                    rumus_denda_swdkllj = 8000
                } else if (jenis_kendaraan == "2") {
                    rumus_denda_swdkllj = 25000
                }

                const difference_month = datenew.getMonth() - tahun_pajak.getMonth() + 12 * (datenew.getFullYear() - tahun_pajak.getFullYear())

                let denda_pkb = (nilai_pkb * difference_month) / 100,
                    denda_swdkllj = 0

                if (difference_month > 24) {
                    denda_pkb = (nilai_pkb * 24) / 100
                }

                if (difference_month > 3) {
                    denda_swdkllj = rumus_denda_swdkllj * 3
                }
                if (difference_month > 6) {
                    denda_swdkllj = rumus_denda_swdkllj * 6
                }
                if (difference_month > 9) {
                    denda_swdkllj = rumus_denda_swdkllj * 9
                }
                if (difference_month > 12) {
                    denda_swdkllj = rumus_denda_swdkllj * 12
                }

                const objRow = [
                    tahun_pajak.getFullYear(),
                    nilai_pkb,
                    denda_pkb,
                    swdkllj,
                    denda_swdkllj,
                    nilai_pkb + swdkllj
                ]
                dataRow.push(objRow)
            }
        }

        const table =  $('#table-hitung').DataTable({
            data: dataRow,
            bDestroy: true,
            bFilter: false,
            bInfo: false,
            bLengthChange: false,
            bSort: false,
            columnDefs: [
                {
                    targets: 1,
                    render: $.fn.dataTable.render.number(',', '.', 0, '')
                },
                {
                    targets: 2,
                    render: $.fn.dataTable.render.number(',', '.', 0, '')
                },
                {
                    targets: 3,
                    render: $.fn.dataTable.render.number(',', '.', 0, '')
                },
                {
                    targets: 4,
                    render: $.fn.dataTable.render.number(',', '.', 0, '')
                },
                {
                    targets: 5,
                    render: $.fn.dataTable.render.number(',', '.', 0, '')
                },
            ],
        })

        document.getElementById("admin_stnk").value = admin_stnk
        document.getElementById("admin_tnkb").value = admin_tnkb
        document.getElementById("biaya_proses").value = biaya_proses
        document.getElementById("biaya_admin_pelanggan").value = biaya_admin_pelanggan
        document.getElementById("upping").value = upping
        document.getElementById("biaya_estimasi").value = biaya_estimasi

        console.log("admin_stnk", admin_stnk)
        console.log("admin_tnkb", admin_tnkb)
        console.log("biaya_proses", biaya_proses)
        console.log("biaya_admin_pelanggan", biaya_admin_pelanggan)
        console.log("upping", upping)
        console.log("biaya_estimasi", biaya_estimasi)
    }
 
document.querySelector('#addRow').addEventListener('click', addNewRow);
</script>
@endpush