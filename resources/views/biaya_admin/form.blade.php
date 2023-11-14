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
                        <label for="nama_admin" class="col-lg-2 col-lg-offset-1 control-label">Nama Admin</label>
                        <div class="col-lg-6">
                            <input type="text" name="nama_admin" id="nama_admin" class="form-control" required autofocus>
                            <span class="help-block with-errors"></span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="biaya_presentasi" class="col-lg-2 col-lg-offset-1 control-label">Biaya %</label>
                        <div class="col-lg-6">
                            <input type="text" name="biaya_presentasi" id="biaya_presentasi" class="form-control digits" required>
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