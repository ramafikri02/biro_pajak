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
                    <div class="form-group row">
                        <label for="jenis" class="col-lg-2 col-lg-offset-1 control-label">Jenis Kendaraan</label>
                        <div class="col-lg-6">
                            <input type="text" name="jenis" id="jenis" class="form-control" required autofocus>
                            <span class="help-block with-errors"></span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="admin_stnk" class="col-lg-2 col-lg-offset-1 control-label">Admin STNK</label>
                        <div class="col-lg-6">
                            <input type="text" name="admin_stnk" id="admin_stnk" class="form-control digits" required>
                            <span class="help-block with-errors"></span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="admin_tnkb" class="col-lg-2 col-lg-offset-1 control-label">Admin TNKB</label>
                        <div class="col-lg-6">
                            <input type="text" name="admin_tnkb" id="admin_tnkb" class="form-control digits" required>
                            <span class="help-block with-errors"></span>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-sm btn-flat btn-primary"><i class="fa fa-save"></i> Simpan</button>
                    <button type="button" class="btn btn-sm btn-flat btn-warning" data-dismiss="modal"><i class="fa fa-arrow-circle-left"></i> Batal</button>
                </div>
            </div>
        </form>
    </div>
</div>

@push('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/cleave.js/1.6.0/cleave.min.js"></script>
<script>


    // window.cleave = new Cleave('.digits', {
    //     numeral: true,
    //     numeralThousandsGroupStyle: 'thousand'
    // });
    $('.digits').each(function (index, ele) {
    var cleaveCustom = new Cleave(ele, {
        numeral: true,
        numeralThousandsGroupStyle: 'thousand'
        });
    });
</script>
@endpush
