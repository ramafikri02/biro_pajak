@extends('layouts.master')

@section('title')
    Daftar Estimasi
@endsection

@section('breadcrumb')
    @parent
    <li class="active">Daftar Estimas 2</li>
@endsection

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="box">
            <div class="box-header with-border">
                <a href="{{ route('estimasi.create') }}" class="btn btn-success btn-xs btn-flat">
                    <i class="fa fa-plus-circle"></i> <span>Tambah</span>
                </a>
            </div>
            <div class="box-body table-responsive">
                <table class="table tableOne table-stiped table-bordered">
                    <thead>
                        <th width="5%">No</th>
                        <th>No Plat</th>
                        <th>Nilai PKB</th>
                        <th>Swdkllj</th>
                        <th>Masa STNK</th>
                        <th>Admin STNK</th>
                        <th>Admin TNKB</th>
                        <th>Biaya Proses</th>
                        <th>Biaya Admin</th>
                        <th>Upping</th>
                        <th>Biaya Estimasi</th>
                        <th>Tanggal Buat</th>
                        <th width="15%"><i class="fa fa-cog"></i></th>
                    </thead>
                </table>
            </div>
        </div>
    </div>
</div>

@includeIf('estimasi.form')
@endsection

@push('scripts')
{{--  --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/validator/13.7.0/validator.min.js"
    integrity="sha512-rJU+PnS2bHzDCvRGFhXouCSxf4YYaUyUfjXMHsHFfMKhWDIEBr8go2LZ2EYXOqASey1tWc2qToeOCYh9et2aGQ=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"
    integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
    let tableOne;

    $(function () {
        tableOne = $('.tableOne').DataTable({
            responsive: true,
            processing: true,
            serverSide: true,
            autoWidth: false,
            ajax: {
                url: '{{ route('estimasi.data') }}',
            },
            columns: [
                {data: 'DT_RowIndex', searchable: false, sortable: false},
                {data: 'no_plat'},
                {data: 'nilai_pkb'},
                {data: 'swdkllj'},
                {data: 'masa_berlaku_stnk',
                render: function (data) {
                    const date = new Date(data);
                    const options = { day: 'numeric', month: 'long', year: 'numeric' };
                    return date.toLocaleDateString('id-ID', options);
                    }
                },
                {data: 'admin_stnk'},
                {data: 'admin_tnkb'},
                {data: 'biaya_proses'},
                {data: 'biaya_admin_pelanggan'},
                {data: 'upping'},
                {data: 'biaya_estimasi'},
                {
                data: 'created_at',
                render: function (data) {
                    const date = new Date(data);
                    const options = { day: 'numeric', month: 'long', year: 'numeric' };
                    return date.toLocaleDateString('id-ID', options);
                    }
                },
                {data: 'aksi', searchable: false, sortable: false},
            ],
            columnDefs: [
                {
                    targets: 2,
                    render: $.fn.dataTable.render.number(',', '.', 0, '')
                },
                {
                    targets: 3,
                    render: $.fn.dataTable.render.number(',', '.', 0, '')
                },
                {
                    targets: 5,
                    render: $.fn.dataTable.render.number(',', '.', 0, '')
                },
                {
                    targets: 6,
                    render: $.fn.dataTable.render.number(',', '.', 0, '')
                },
                {
                    targets: 7,
                    render: $.fn.dataTable.render.number(',', '.', 0, '')
                },
                {
                    targets: 8,
                    render: $.fn.dataTable.render.number(',', '.', 0, '')
                },
                {
                    targets: 9,
                    render: $.fn.dataTable.render.number(',', '.', 0, '')
                },
               
            ],
        });

        $('#modal-form').validator().on('submit', function (e) {
            if (! e.preventDefault()) {
                $.post($('#modal-form form').attr('action'), $('#modal-form form').serialize())
                    .done((response) => {
                        $('#modal-form').modal('hide');
                        table.ajax.reload();
                    })
                    .fail((errors) => {
                        alert('Tidak dapat menyimpan data');
                        return;
                    });
            }
        });
    });

    function addForm(url) {
        $('#modal-form').modal('show');
        $('#modal-form .modal-title').text('Tambah Wilayah');

        $('#modal-form form')[0].reset();
        $('#modal-form form').attr('action', url);
        $('#modal-form [name=_method]').val('post');
        $('#modal-form [name=nomor_plat]').focus();
    }
    
    function deleteData(url) {
        if (confirm('Yakin ingin menghapus data terpilih?')) {
            $.post(url, {
                    '_token': $('[name=csrf-token]').attr('content'),
                    '_method': 'delete'
                })
                .done((response) => {
                    table.ajax.reload();
                })
                .fail((errors) => {
                    alert('Tidak dapat menghapus data');
                    return;
                });
        }
    }
</script>
@endpush