<div class="modal fade" id="modal-form" tabindex="-1" role="dialog" aria-labelledby="modal-form">
    <div class="modal-dialog modal-lg" role="document">
        <form action="" method="post" class="form-horizontal">
            @csrf
            @method('post')

            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title"></h4>
                </div>
                <div class="modal-body">
                    <div class="inputHidden">
                        <input type="hidden" name="admin_stnk" id="admin_stnk">
                        <input type="hidden" name="admin_tnkb" id="admin_tnkb">
                        <input type="hidden" name="biaya_proses" id="biaya_proses">
                        <input type="hidden" name="biaya_admin_pelanggan" id="biaya_admin_pelanggan">
                        <input type="hidden" name="upping" id="upping">
                        <input type="hidden" name="biaya_estimasi" id="biaya_estimasi">
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <label for="no_plat" class="control-label">Nomor Plat</label>
                            <div>
                                <input type="text" name="no_plat" id="no_plat" class="form-control" required autofocus>
                                <span class="help-block with-errors"></span>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <label for="no_plat" class="control-label">Id Upping</label>
                                <select name="id_upping" id="id_upping" class="form-control" required
                                onchange="setBiayaUpp()">
                                <option value="">Pilih Biaya Upping</option>
                                @foreach ($biaya_uppings as $key => $item)
                                <option value="{{ $key }}">{{ $item }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <label for="id_tipe_pengurusan" class="control-label">Jenis
                                Pengurusan</label>
                            <select name="id_tipe_pengurusan" id="id_tipe_pengurusan" class="form-control" required
                                onchange="setBiayaProsesValue()">
                                <option value="">Pilih Tipe Pengurusan</option>
                                @foreach ($tipe_pengurusan as $key => $item)
                                <option value="{{ $key }}">{{ $item }}</option>
                                @endforeach
                            </select>
                            <span class="help-block with-errors"></span>
                        </div>
                        <div class="col-lg-6">
                            <label for="nama_wilayah" class="control-label">Wilayah</label>
                            <select name="id_wilayah" id="id_wilayah" class="form-control" required>
                                <option value="">Pilih Wilayah</option>
                                @foreach ($wilayah as $key => $item)
                                <option value="{{ $key }}">{{ $item }}</option>
                                @endforeach
                            </select>
                            <span class="help-block with-errors"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6" style="padding-left: 5rem">
                            <label for="masa_berlaku_stnk" class="control-label">Masa berlaku
                                Pajak di STNK</label>
                                <input type="text" name="masa_berlaku_stnk" id="masa_berlaku_stnk" class="form-control datepicker" required autofocus autocomplete="off"
                                style="border-radius: 0 !important;" >
                            <span class="help-block with-errors"></span>
                        </div>

                        <div class="col-lg-6" style="padding-left: 5rem">
                            <label for="nilai_pkb" class="control-label">Nilai PKB</label>
                            <input type="text" name="nilai_pkb" id="nilai_pkb" class="form-control digits" required >
                                <span class="help-block with-errors"></span>
                        </div>
                    </div>

                    <div class="row">
                       <div class="col-lg-6" style="padding-left: 5rem">
                        <label for="swdkllj" class="control-label">SWDKLLJ</label>
                        <input type="text" name="swdkllj" id="swdkllj" class="form-control digits" required >
                        <span class="help-block with-errors"></span>
                       </div>
                       <div class="col-lg-6" style="padding-left: 5rem">
                        <label for="id_jenis_kendaraan" class="control-label">Jenis Kendaraan</label>
                        <select name="id_jenis_kendaraan" id="id_jenis_kendaraan" class="form-control" required onchange="setAdminValue()">
                            <option value="">Pilih Jenis Kendaraan</option>
                            @foreach ($jenis_kendaraan as $key => $item)
                            <option value="{{ $key }}">{{ $item }}</option>
                            @endforeach
                            </select>
                        <span class="help-block with-errors"></span>
                       </div>
                    </div>
                    <div class="row">
                       <div class="col-lg-6 me-4" style="padding-left: 5rem">
                        <label for="id_pelanggan" class="control-label">Pelanggan</label>
                        <select name="id_pelanggan" id="id_pelanggan" class="form-control" required onchange="setPelangganAdm()">
                            <option value="">Pilih Pelanggan</option>
                            @foreach ($pelanggan as $key => $item)
                            <option value="{{ $key }}">{{ $item }}</option>
                            @endforeach
                        </select>
                        <span class="help-block with-errors"></span>
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
            </div>
        </form>
    </div>
</div>

@push('scripts')
<script src="{{ asset('/AdminLTE-2/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/cleave.js/1.6.0/cleave.min.js"></script>
<script>
    @if(Session::has('success'))
    toastr.success("{{ Session::get('success') }}")
    @endif
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

   
    
    $(function () {
        $('#no_plat').keyup(function() {
            this.value = this.value.toUpperCase();
        });
    });
    document.addEventListener('DOMContentLoaded', function() {
    $('.datepicker').datepicker({
        format: 'yyyy-mm-dd',
        autoclose: true
    });

    $('.digits').each(function (index, ele) {
    var cleaveCustom = new Cleave(ele, {
        numeral: true,
        numeralThousandsGroupStyle: 'thousand'
        });
    });
});
    

function addNewRow() {
    const masaBerlakuStnkElement = document.getElementById("masa_berlaku_stnk");
    const nilaiPkbElement = document.getElementById("nilai_pkb");
        
    if (masaBerlakuStnkElement) {
        const masaBerlakuStnkValue = masaBerlakuStnkElement.value.trim();
        
        if (masaBerlakuStnkValue !== '') {
            let dateold = new Date(masaBerlakuStnkValue),
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
                    const tahun_pajak = new Date(new Date(masaBerlakuStnkValue).setFullYear(new Date(masaBerlakuStnkValue).getFullYear() + i));
                    let nilai_pkb = parseInt(nilaiPkbElement.value.replaceAll(',', ''));

                    let swdklljElement = document.getElementById("swdkllj");
                    let swdkllj = 0;
                    if (swdklljElement) {
                        swdkllj = parseInt(swdklljElement.value.replaceAll(',', '')) || 0;
                    } else {
                        console.error("Elemen 'swdkllj' tidak ditemukan");
                    }

                    let jenisKendaraanDropdown = document.getElementById('id_jenis_kendaraan');
                    let jenisKendaraanValue = jenisKendaraanDropdown.value;

                    let jenisKendaraan = jenis_kendaraan[jenisKendaraanValue];
                    
                    let rumus_denda_swdkllj = 0;

                    if (jenis_kendaraan == "1") {
                        rumus_denda_swdkllj = 8000;
                    } else if (jenis_kendaraan == "2") {
                        rumus_denda_swdkllj = 25000;
                    }

                    const difference_month = datenew.getMonth() - tahun_pajak.getMonth() + 12 * (datenew.getFullYear() - tahun_pajak.getFullYear());

                    let denda_pkb = (nilai_pkb * difference_month) / 100,
                        denda_swdkllj = 0;

                    if (difference_month > 24) {
                        denda_pkb = (nilai_pkb * 24) / 100;
                    }

                    if (difference_month > 6) {
                        denda_swdkllj = rumus_denda_swdkllj * 2;
                    }
                    if (difference_month > 9) {
                        denda_swdkllj = rumus_denda_swdkllj * 3;
                    }
                    if (difference_month > 12) {
                        denda_swdkllj = rumus_denda_swdkllj * 4;
                    }

                    setAdminValue();
                    setBiayaProsesValue();
                    setPelangganAdm();
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
                    ];
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
                bSort: false,
                columnDefs: [
                    { targets: 1, render: $.fn.dataTable.render.number(',', '.', 0, '') },
                    { targets: 2, render: $.fn.dataTable.render.number(',', '.', 0, '') },
                    { targets: 3, render: $.fn.dataTable.render.number(',', '.', 0, '') },
                    { targets: 4, render: $.fn.dataTable.render.number(',', '.', 0, '') },
                    { targets: 5, render: $.fn.dataTable.render.number(',', '.', 0, '') }
                ],
            });

            document.getElementById("admin_stnk").value = adminStnkValueS;
            document.getElementById("admin_tnkb").value = adminTnkbValueS;
            document.getElementById("biaya_proses").value = biayaProses;
            document.getElementById("biaya_admin_pelanggan").value = biayaAdminPelanggan;
            document.getElementById("upping").value = biayaUpp;
            document.getElementById("biaya_estimasi").value = total_biaya_estimasi;
        } else {
            console.error("Nilai 'masa_berlaku_stnk' kosong");
        }
    } else {
        console.error("Elemen 'masa_berlaku_stnk' tidak ditemukan");
    }
}

document.querySelector('#addRow').addEventListener('click', addNewRow);
</script>
@endpush