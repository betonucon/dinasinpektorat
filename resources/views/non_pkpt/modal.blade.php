<input type="hidden" name="id" value="{{ $id }}">

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title mb-0">Dropzone</h4>
            </div><!-- end card header -->

            <div class="card-body">
                <p class="text-muted">DropzoneJS is an open source library that provides drag’n’drop file uploads with image previews.</p>

                <div class="dropzone">
                    <div class="fallback">
                        <input name="file" type="file" multiple="multiple">
                    </div>
                    <div class="dz-message needsclick">
                        <div class="mb-3">
                            <i class="display-4 text-muted ri-upload-cloud-2-fill"></i>
                        </div>

                        <h4>Drop files here or click to upload.</h4>
                    </div>
                </div>
                <!-- end dropzon-preview -->
            </div>
            <!-- end card body -->
        </div>
    </div>
</div>
<script>
$('#nm_jabatan').keypress(function (e) {
    var txt = String.fromCharCode(e.which);
    if (!txt.match(/[A-Za-z0-9&. ]/)) {
        return false;
    }
});
</script>