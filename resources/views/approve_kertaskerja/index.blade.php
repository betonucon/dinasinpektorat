@extends('layouts.app')

@section('layout')
	<link rel="stylesheet" href="{{url_plug()}}/assets/libs/dropzone/dropzone.css" type="text/css" />
	<style>
		.modal,
		.modal-backdrop {
			display: none;
		}
	</style>
@endsection

@section('content')

<div class="page-content">
	<div class="container-fluid">
		<!-- start page title -->
		<div class="row">
			<div class="col-12">
				<div class="page-title-box d-sm-flex align-items-center justify-content-between">
					<h4 class="mb-sm-0">{{ $menu }}</h4>
					<div class="page-title-right">
						<ol class="breadcrumb m-0">
							<li class="breadcrumb-item">
								<a href="javascript: void(0);">{{ $headermenu }}</a>
							</li>
							<li class="breadcrumb-item active">{{ $menu }}</li>
						</ol>
					</div>
				</div>
			</div>
		</div>
		<!-- end page title -->
		
		<div class="row">
			<div class="col-lg-12">
                <div class="row pb-3">
                    <div class="col-sm-12 col-md-6">
                        {{-- <span class="js-upload-file-btn btn btn-sm btn-primary waves-effect waves-light "><i class="mdi mdi-plus-circle-outline"></i> Tambah</span> --}}
                        <button onclick="created()" class="btn btn-sm btn-success waves-effect waves-light "><i class="mdi mdi-plus-circle-outline"></i> Tambah</button>
                        {{-- <span class="btn btn-sm btn-success waves-effect waves-light "><i class="mdi mdi-plus-circle-outline"></i> Tambah</span> --}}
                    </div>
                    <div class="col-sm-12 col-md-6">
                        
                    </div>
                </div>
				<div class="card">
					<!-- <div class="card-header">
					</div> -->
					<div class="card-body small">
						<div id="example_wrapper" class="dataTables_wrapper dt-bootstrap5 no-footer">
							<div class="row">
								<div class="col-sm-12">
									<table id="data-table-fixed-header" class="table table-bordered table-responsive dt-responsive nowrap table-striped align-middle dataTable no-footer dtr-inline collapsed" style="width: 100%;" >
                                        <thead>
                                            <tr>
                                                <th width="1%" scope="col">NO</th>
                                                <th >Area Pengawasan</th>
                                                <th >Jenis Pengawasan</th>
                                                <th >Tujuan</th>
                                                <th >OPD</th>
                                                <th >RMP</th>
                                                <th >RPL</th>
                                                <th >Jumlah Laporan</th>
                                                <th >Sarana dan Prasarana</th>
                                                <th >Tingkat Resiko</th>
                                                <th >Ket</th>
                                                <th width="5%" >Action</th>
                                            </tr>
                                        </thead>
									</table>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="modal fade" id="modalAdd" role="dialog" aria-labelledby="exampleModalLabelDefault" aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalLabelDefault">Add Data {{ $menu }}</h5>
						<button type="button" class="btn-close" data-bs-dismiss="modal"
								aria-label="Close">
						</button>
					</div>
					<div class="modal-body">
						{{-- <div id="error-notif"></div> --}}
						<form action="{{url('perencanaan/pkpt/store')}}" id="data-user" method="post" enctype="multipart/form-data">
							@csrf
							<div id="tampil-form"></div>
						</form>
					</div>
					<div class="modal-footer">
						<button  class="btn btn-white" onclick="hide()">Tutup</button>
						<button id="btn-save"  class="btn btn-success" onclick="simpan_data()">Simpan</button>
					</div>
				</div>
			</div>
		</div>	
	</div>
</div>
@endsection
@section('script')
	    <!-- dropzone min -->
		<script src="{{url_plug()}}/assets/libs/dropzone/dropzone-min.js"></script>
		<!-- filepond js -->
		<script src="{{url_plug()}}/assets/libs/filepond/filepond.min.js"></script>
		<script src="{{url_plug()}}/assets/libs/filepond-plugin-image-preview/filepond-plugin-image-preview.min.js"></script>
		<script src="{{url_plug()}}/assets/libs/filepond-plugin-file-validate-size/filepond-plugin-file-validate-size.min.js"></script>
		<script src="{{url_plug()}}/assets/libs/filepond-plugin-image-exif-orientation/filepond-plugin-image-exif-orientation.min.js"></script>
		<script src="{{url_plug()}}/assets/libs/filepond-plugin-file-encode/filepond-plugin-file-encode.min.js"></script>	
		<script src="{{url_plug()}}/assets/js/pages/form-file-upload.init.js"></script>
		<script>
			$('.js-upload-file-btn').on('click',function () {
				$(".js-upload-file, .modal-backdrop").addClass("open");
			});
	
			// close all modal
			$(document).on('click','.modal .close',function () {
				$(".modal, .modal-backdrop").removeClass("open");
		 
			});
	
			Dropzone.autoDiscover = false;
					try {
						var myDropzone = new Dropzone("#dropzone" , {
							paramName: "file", // The name that will be used to transfer the file
							maxFilesize: .5, // MB
	
							addRemoveLinks : true,
							dictDefaultMessage :
								'<span class="bigger-150 bolder"><i class=" fa fa-caret-right red"></i> Drop files</span> to upload \
								<span class="smaller-80 grey">(or click)</span> <br /> \
								<i class="upload-icon fa fa-cloud-upload blue fa-3x"></i>'
							,
							dictResponseError: 'Error while uploading file!',
	
							//change the previewTemplate to use Bootstrap progress bars
	
						});
					} catch(e) {
					//  alert('Dropzone.js does not support older browsers!');
					}
		</script>
@endsection
@push('ajax')       
    <script type="text/javascript">
        /*
        Template Name: Color Admin - Responsive Admin Dashboard Template build with Twitter Bootstrap 4
        Version: 4.6.0
        Author: Sean Ngu
        Website: http://www.seantheme.com/color-admin/admin/
        */
        
        var handleDataTableFixedHeader = function() {
            "use strict";
            
            if ($('#data-table-fixed-header').length !== 0) {
                var table=$('#data-table-fixed-header').DataTable({
                    lengthMenu: [20, 40, 60],
                    fixedHeader: {
                        header: true,
                        headerOffset: $('#header').height()
                    },
                    responsive: true,
                    ajax:"{{ url('perencanaan/pkpt/get-data')}}",
					columns: [
                        { data: 'id_pkpt', render: function (data, type, row, meta) 
							{
								return meta.row + meta.settings._iDisplayStart + 1;
							} 
						},
						{ data: 'area_pengawasan' },
						{ data: 'jenis_pengawasan' },
						{ data: 'tujuan' },
						{ data: 'opd' },
						{ data: 'rmp' },
						{ data: 'rpl' },
						{ data: 'jml_laporan' },
						{ data: 'sarana_prasarana' },
						{ data: 'tingkat_resiko' },
						{ data: 'ket' },
						{ data: 'action' },
						
					],
					language: {
						paginate: {
							// remove previous & next text from pagination
							previous: '<< previous',
							next: 'Next>>'
						}
					}
                });
            }
        };

        var TableManageFixedHeader = function () {
            "use strict";
            return {
                //main function
                init: function () {
                    handleDataTableFixedHeader();
                }
            };
        }();

        $(document).ready(function() {
			TableManageFixedHeader.init();

		});

        
    </script>
	<script>

		function created(){
			alert('hhh')
			location.assign("{{ url('perencanaan/non-pkpt/create?id_pkpt=0') }}");
		}

		function tambah(id){
			$('#btn-save').removeAttr('disabled','false');
			$.ajax({
				type: 'GET',
				url: "{{url('perencanaan/pkpt/modal')}}",
				data: "id="+id,
				success: function(msg){
					$('#tampil-form').html(msg);
					$('#modalAdd').modal('show');
				}
			});
		}

		function hapus(id){
			Swal.fire({
				title: 'Are you sure?',
				text: "You won't be able to revert this!",
				icon: 'warning',
				showCancelButton: true,
				confirmButtonColor: '#3085d6',
				cancelButtonColor: '#d33',
				confirmButtonText: 'Yes, Delete This!'
			}).then((result) => {
			if (result.isConfirmed) {
				$.ajax({
					type: 'GET',
					url: "{{url('Employees/Overtime/hapus')}}",
					data: "id="+id,
					success: function(msg){
						location.reload();
					}
				});
			}
			});

		}


		function simpan_data(){
			$('#btn-save').attr('disabled', 'disabled');
			var form=document.getElementById('data-user');
				$.ajax({
					type: 'POST',
					url: "{{url('perencanaan/pkpt/store')}}",
					data: new FormData(form),
					contentType: false,
					cache: false,
					processData:false,
					success: function(msg){
						if(msg=='ok'){
							$('#modalAdd').modal('hide');
							Swal.fire(
							'Successful!',
							'Data Berhasil Disimpan',
							'success'
							)
							$('#data-table-fixed-header').DataTable().ajax.reload();
						}else{
							Swal.fire({
								icon: 'error',
								title: 'Oops Error !',
								html: msg,
								footer: ''
							})
						}
					}
				});

		}

		function hide(){
			$('#modalAdd').modal('hide');
		}


	</script>
@endpush
