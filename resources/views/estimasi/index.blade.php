@extends('layouts.master')

@section('title')
    Daftar Estimasi
@endsection

@section('breadcrumb')
    @parent
    <li class="active">Daftar Estimasi</li>
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
                <table class="tableOne table-stiped table-bordered">
                    <thead>
                        <th width="5%">No</th>
                        <th>ID Pelanggan</th>
                        <th>ID Wilayah</th>
                        <th>Tanggal DIbuat</th>
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
                {data: 'id_pelanggan'},
                {data: 'id_wilayah'},
                {
                data: 'created_at',
                render: function (data) {
                    const date = new Date(data);
                    const options = { day: 'numeric', month: 'long', year: 'numeric' };
                    return date.toLocaleDateString('id-ID', options);
                    }
                },
                {data: 'aksi', searchable: false, sortable: false},
            ]
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

    function editForm(url) {
        $('#modal-form').modal('show');
        $('#modal-form .modal-title').text('Edit Estimasi');

        $('#modal-form form')[0].reset();
        $('#modal-form form').attr('action', url);
        $('#modal-form [name=_method]').val('put');
        $('#modal-form [name=nomor_plat]').focus();

        $.get(url)
            .done((response) => {
                $('#modal-form [name=nomor_plat]').val(response.nomor_plat);
            })
            .fail((errors) => {
                alert('Tidak dapat menampilkan data');
                return;
            });
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