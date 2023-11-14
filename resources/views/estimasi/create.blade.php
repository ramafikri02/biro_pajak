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
                            <label for="id_tipe_pengurusan" class="col-lg-2 col-lg-offset-1 control-label">Id Upping</label>
                            <div class="col-md-2">
                                    <select name="id_upping" id="id_upping" class="form-control" required onchange="setBiayaUpp()">
                                        <option value="">Pilih Biaya Upping</option>
                                        @foreach ($biaya_uppings as $key => $item)
                                        <option value="{{ $key }}">{{ $item }}</option>
                                        @endforeach
                                    </select>
                                    <span class="help-block with-errors"></span>
                            </div>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="col">
                            <label for="no_plat" class="col-lg-2 col-lg-offset-1 control-label">Nomor Plat</label>
                            <!-- <div class="col-md-2">
                                <select name="id_kendaraan" id="id_kendaraan" class="form-control" required>
                                    <option value="">Pilih Kendaraan</option>
                                    @foreach ($kendaraan as $key => $item)
                                    <option value="{{ $key }}">{{ $item }}</option>
                                    @endforeach
                                </select>
                                <span class="help-block with-errors"></span>
                            </div> -->
                            <div class="col-md-2">
                                <input type="text" name="no_plat" id="no_plat" class="form-control checked" required autocomplete="no_plat" data-name="no_plat">
                                <span class="help-block with-errors"></span>
                            </div>
                            <!-- <label for="swdkllj" class="col-lg-2 col-lg-offset-1 control-label">SWDKLLJ</label>
                            <div class="col-md-2">
                                <input type="text" name="swdkllj" id="swdkllj" class="form-control digits" required >
                                <span class="help-block with-errors"></span>
                            </div> -->
                            <label for="id_tipe_pengurusan" class="col-lg-2 col-lg-offset-1 control-label">Jenis Pengurusan</label>
                            <div class="col-md-2">
                                    <select name="id_tipe_pengurusan" id="id_tipe_pengurusan" class="form-control" required onchange="setBiayaProsesValue()">
                                        <option value="">Pilih Tipe Pengurusan</option>
                                        @foreach ($tipe_pengurusan as $key => $item)
                                        <option value="{{ $key }}">{{ $item }}</option>
                                        @endforeach
                                    </select>
                                    <span class="help-block with-errors"></span>
                                </div>
                            <label for="nilai_pkb" class="col-lg-2 col-lg-offset-1  control-label">Nilai PKB</label>
                            <div class="col-md-2">
                                <input type="text" name="nilai_pkb" id="nilai_pkb" class="form-control digits" required >
                                <span class="help-block with-errors"></span>
                            </div>
                            <label for="masa_berlaku_stnk" class="col-lg-2 col-lg-offset-1 control-label">Masa berlaku Pajak di STNK</label>
                            <div class="col-md-2">
                                <input type="text" name="masa_berlaku_stnk" id="masa_berlaku_stnk" class="form-control datepicker" required autofocus autocomplete="off"
                                    style="border-radius: 0 !important;" >
                                <span class="help-block with-errors"></span>
                            </div>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="col">
                        <label for="swdkllj" class="col-lg-2 col-lg-offset-1 control-label">SWDKLLJ</label>
                            <div class="col-md-2">
                                <input type="text" name="swdkllj" id="swdkllj" class="form-control digits" required >
                                <span class="help-block with-errors"></span>
                            </div>
                            <!-- <label for="id_tipe_pengurusan" class="col-lg-2 col-lg-offset-1 control-label">Tipe Pengurusan</label>
                            <div class="col-md-2">
                                    <select name="id_tipe_pengurusan" id="id_tipe_pengurusan" class="form-control" required>
                                        <option value="">Pilih Tipe Pengurusan</option>
                                        @foreach ($tipe_pengurusan as $key => $item)
                                        <option value="{{ $key }}">{{ $item }}</option>
                                        @endforeach
                                    </select>
                                    <span class="help-block with-errors"></span>
                                </div> -->
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
                                <select name="id_jenis_kendaraan" id="id_jenis_kendaraan" class="form-control" required onchange="setAdminValue()">
                                    <option value="">Pilih Jenis Kendaraan</option>
                                    @foreach ($jenis_kendaraan as $key => $item)
                                    <option value="{{ $key }}">{{ $item }}</option>
                                    @endforeach
                                </select>
                                <span class="help-block with-errors"></span>
                            </div>
                            <label for="id_pelanggan" class="col-lg-2 col-lg-offset-1 control-label">Pelanggan</label>
                            <div class="col-md-2">
                                <select name="id_pelanggan" id="id_pelanggan" class="form-control" required onchange="setPelangganAdm()">
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
                    
                    <div class="box-footer text-start">
                        <h5 class="fw-bold">NOTED</h5>
                        <ul>
                            <li class="fw-bold">ESTIMASI INI HANYA PERKIRAAN BIAYA</li>
                            <li class="fw-bold">HITUNGAN ESTIMASI DI LUAR BIAYA PROGRESIF JIKA KENDARAAN LEBIH DARI SATU</li>
                            <li class="fw-bold">BIAYA UPING SEBAGAI ANTISIPASI KEKURANGAN PERUBAHAN NILAI PAJAK SETIAP TAHUN NYA</li>
                        </ul>
                    </div> 
            </form>
        </div>
    </div>
</div>

@endsection

@push('scripts')
<script src="{{ asset('/AdminLTE-2/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/cleave.js/1.6.0/cleave.min.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script>
    document.getElementById('no_plat').addEventListener('blur', function () {
        var inputNomorPlat = this.value;

        fetch('/check-nomor-plat/' + inputNomorPlat, {
            method: 'GET',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            }
        })
        .then(response => response.json())
        .then(data => {
            if (data.nomorPlatExists) {
                showSweetAlert();
            }
        })
        .catch(error => {
            console.error('Terjadi kesalahan: ', error);
        });
    });
    
    function showSweetAlert() {
        swal({
            title: "Nomor Plat Sudah Ada",
            text: "Berkas ini sudah pernah di estimasi. Ingin melanjutkan?",
            icon: "warning",
            buttons: {
                cancel: "Tidak",
                confirm: "Ya"
            },
        }).then((value) => {
            if (value) {
                $(document).ready(function() {
                window.location.href = 'http://127.0.0.1:8000/estimasi/';

                $('#modal-form').modal('show');
            });
            } else {
                window.location.href = 'http://127.0.0.1:8000/estimasi/create';
            }
        });
    }
</script>
<script>
    // Start get adm_stnk&tnkb
    var jenis_kendaraan = {!! json_encode($adminTnkbData) !!};
    var jenis_kendaraantwo = {!! json_encode($adminStnkData) !!};

    function setAdminValue() {
    var jenisKendaraanDropdown = document.getElementById('id_jenis_kendaraan');
    var selectedJenisKendaraanIndex = jenisKendaraanDropdown.selectedIndex;
    var selectedJenisKendaraanId = jenisKendaraanDropdown.options[selectedJenisKendaraanIndex].value;

    var adminTnkbValue = jenis_kendaraan[selectedJenisKendaraanId];
    document.getElementById('admin_tnkb').value = adminTnkbValue;

    var adminStnkValue = jenis_kendaraantwo[selectedJenisKendaraanId];
    document.getElementById('admin_stnk').value = adminStnkValue;
    }
    document.getElementById('id_jenis_kendaraan').addEventListener('change', setAdminValue);
    // ~ End get ~

    // Start get biaya_proses
    var biayaProses = {!! json_encode($biayaProsesData) !!}
    function setBiayaProsesValue() {
    var tipePengurusanDropdown = document.getElementById('id_tipe_pengurusan');
    var selectedTipeKepengurusanIndex = tipePengurusanDropdown.selectedIndex;

    var selectedTipeKepengurusanId = tipePengurusanDropdown.options[selectedTipeKepengurusanIndex].value;

    var biayaProsesValue = biayaProses[selectedTipeKepengurusanId];
    document.getElementById('biaya_proses').value = biayaProsesValue;
    }
    // ~ End get ~

    // Start get biaya_admin
    var biayaAdmin = {!! json_encode($biayaAdminData) !!}
    
    function setPelangganAdm() {
    var pelangganDropdown = document.getElementById('id_pelanggan');
    var selectedPelangganIndex = pelangganDropdown.selectedIndex;

    var selectedPelangganId = pelangganDropdown.options[selectedPelangganIndex].value;

    var biayaPelangganValue = biayaAdmin[selectedPelangganId];
    document.getElementById('biaya_admin_pelanggan').value = biayaPelangganValue;
    }
    // End get ~

    // Start get biaya upping
    var biayaUpp =  {!! json_encode($biaya_uppings) !!}

    function setBiayaUpp() {
    var uppingDropdown = document.getElementById('id_upping');
    var selectedUppingIndex = uppingDropdown.selectedIndex;

    var selectedUppingId = uppingDropdown.options[selectedUppingIndex].value;

    var biayaUppingValue = biayaUpp[selectedUppingId];
    document.getElementById('upping').value = biayaUppingValue;
    }
    // End  get ~

    $('.digits').each(function (index, ele) {
    var cleaveCustom = new Cleave(ele, {
        numeral: true,
        numeralThousandsGroupStyle: 'thousand'
        });
    });
    
    $(function () {
        $('#no_plat').keyup(function() {
            this.value = this.value.toUpperCase();
        });

        $('.datepicker').datepicker({
            format: 'yyyy-mm-dd',
            autoclose: true
        });
    });
    

    function addNewRow() {
    let dateold = new Date(document.forms["FormName"]["masa_berlaku_stnk"].value),
        datenew = new Date();

    const ms = datenew.getTime() - dateold.getTime();

    const date = new Date(ms);

    const difference_year = Math.abs(date.getUTCFullYear() - 1970);
    const difference_month = datenew.getMonth() - dateold.getMonth() + 12 * (datenew.getFullYear() - dateold.getFullYear())

    let dataRow = [];

    let adminTnkbValueS = parseInt(document.getElementById('admin_tnkb').value.replaceAll(',', '')) || 0;
    let adminStnkValueS = parseInt(document.getElementById('admin_stnk').value.replaceAll(',', '')) || 0;
    let biayaProses = parseInt(document.getElementById('biaya_proses').value.replaceAll(',', '')) || 0;
    let biayaAdminPelanggan = parseInt(document.getElementById('biaya_admin_pelanggan').value.replaceAll(',', '')) || 0;
    let biayaUpp = parseInt(document.getElementById('upping').value.replaceAll(',', '')) || 0;
    let total_biaya_estimasi = 0; 

    if (difference_year > 0) {
        for (var i = 0; i < difference_year + 1; i++) {
            const tahun_pajak = new Date(new Date(document.forms["FormName"]["masa_berlaku_stnk"].value).setFullYear(new Date(document.forms["FormName"]["masa_berlaku_stnk"].value).getFullYear() + i))
            nilai_pkb = parseInt(document.forms["FormName"]["nilai_pkb"].value.replaceAll(',', '')),
                swdkllj = parseInt(document.forms["FormName"]["swdkllj"].value.replaceAll(',', '')),
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

            if (difference_month > 6) {
                denda_swdkllj = rumus_denda_swdkllj * 2
            }
            if (difference_month > 9) {
                denda_swdkllj = rumus_denda_swdkllj * 3
            }
            if (difference_month > 12) {
                denda_swdkllj = rumus_denda_swdkllj * 4
            }

            setAdminValue();
            setBiayaProsesValue();
            setPelangganAdm()
            setBiayaUpp();

            let total_biaya = adminTnkbValueS + adminStnkValueS + biayaProses + biayaUpp;
            let biaya_presentasi = parseFloat(document.getElementById('biaya_admin_pelanggan').value) || 0;
            let biayaAdminPelanggan = (biaya_presentasi / 100) * total_biaya;
            let afterPresent = biayaAdminPelanggan + total_biaya
            
            const objRow = [
                tahun_pajak.getFullYear(),
                nilai_pkb,
                denda_pkb,
                swdkllj,
                denda_swdkllj,
                nilai_pkb + denda_pkb + swdkllj + denda_swdkllj + afterPresent
            ]
            dataRow.push(objRow);
            total_biaya_estimasi += objRow[objRow.length - 1];
        }
    }

    const table = $('#table-hitung').DataTable({
        data: dataRow,
        bDestroy: true,
        paging: false,
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
    
    document.getElementById("admin_stnk").value = adminStnkValueS
    document.getElementById("admin_tnkb").value = adminTnkbValueS;
    document.getElementById("biaya_proses").value = biayaProses
    document.getElementById("biaya_admin_pelanggan").value = biayaAdminPelanggan
    document.getElementById("upping").value = biayaUpp
    document.getElementById("biaya_estimasi").value = total_biaya_estimasi;

    console.log("admin_stnk", adminStnkValueS)
    console.log("admin_tnkb", adminTnkbValueS);
    console.log("biaya_proses", biayaProses)
    console.log("biaya_admin_pelanggan", biayaAdminPelanggan)
    console.log("upping", biayaUpp)
    console.log("biaya_estimasi", total_biaya_estimasi)
}

 
document.querySelector('#addRow').addEventListener('click', addNewRow);
</script>
@endpush