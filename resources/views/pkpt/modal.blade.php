<input type="hidden" name="id" value="{{ $id }}">

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title mb-0">Silahkan Upload File</h4>
            </div><!-- end card header -->

            <div class="card-body">
                <p class="text-muted">Upload hanya bisa untuk file berformat excell.</p>
                <input name="file" class="form-control" type="file" multiple="multiple">
                <!-- end dropzon-preview -->
            </div>
            <!-- end card body -->
        </div>
    </div>
</div>
<script>
    $('#nm_jabatan').keypress(function(e) {
        var txt = String.fromCharCode(e.which);
        if (!txt.match(/[A-Za-z0-9&. ]/)) {
            return false;
        }
    });
</script>
