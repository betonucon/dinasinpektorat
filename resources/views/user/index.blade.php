@extends('layouts.app')

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
                        <span onclick="tambah(0)" class="btn btn-sm btn-success waves-effect waves-light "><i class="mdi mdi-plus-circle-outline"></i> Tambah</span>
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
									<table id="data-table-fixed-header" class="table table-bordered dt-responsive nowrap table-striped align-middle dataTable no-footer dtr-inline collapsed" style="width: 100%;" >
                                        <thead>
                                            <tr>
                                                <th width="1%" scope="col">NO</th>
                                                <th >Name</th>
                                                <th >Email</th>
                                                <th >Username</th>
                                                <th >Role</th>
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
						<h5 class="modal-title" id="exampleModalLabelDefault">Add Data</h5>
						<button type="button" class="btn-close" data-bs-dismiss="modal"
								aria-label="Close">
						</button>
					</div>
					<div class="modal-body">
						{{-- <div id="error-notif"></div> --}}
						<form action="{{url('master-data/user/store')}}" id="data-user" method="post" enctype="multipart/form-data">
							@csrf
							<div id="tampil-form"></div>
						</form>
					</div>
					<div class="modal-footer">
						<button  class="btn btn-white" onclick="hide()">Tutup</button>
						<button id="btn-save"  class="btn btn-success" >Simpan</button>
					</div>
				</div>
			</div>
		</div>	
	</div>
</div>
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
                    ajax:"{{ url('master-data/user/get-data')}}",
					columns: [
                        { data: 'id', render: function (data, type, row, meta) 
							{
								return meta.row + meta.settings._iDisplayStart + 1;
							} 
						},
						{ data: 'name' },
						{ data: 'email' },
						{ data: 'username' },
						{ data: 'role_id' },
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
		function tambah(id){
			$('#btn-save').removeAttr('disabled','false');
			$.ajax({
				type: 'GET',
				url: "{{url('master-data/user/modal')}}",
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
		
		$('#btn-save').on('click', () => {
            Swal.fire({
				title:"Yakin untuk proses data?",
				text:"Data akan disimpan kedalam database?",
				icon:"question",
				
				buttonsStyling: true,
				showCancelButton: true,
				customClass: {
					confirmButtonClass:"btn btn-primary btn-sm w-xs mt-2",
					
				},
				closeOnConfirm: true
			}).then(function(t) {
				// alert(t.isConfirmed==true)
				if (t.isConfirmed==true) {
					var form=document.getElementById('data-user');
						$.ajax({
							type: 'POST',
							url: "{{ url('master-data/user/store') }}",
							data: new FormData(form),
							contentType: false,
							cache: false,
							processData:false,
							beforeSend: function() {
								document.getElementById("loadnya").style.width = "100%";
							},
							success: function(msg){
								var bat=msg.split('@');
								if(bat[1]=='ok'){
									document.getElementById("loadnya").style.width = "0px";
									Swal.fire("Success! Your data has been save!", {
											icon: "success",
									}).then(function(){ 
											$('#data-table-fixed-header').DataTable().ajax.reload();
											
										}
									);  
										
								}else{
									document.getElementById("loadnya").style.width = "0px";
									Swal.fire({
										title:"Notifikasi",
										html:'<div style="background:#f2f2f5;padding:1%;text-align:left;font-size:13px">'+msg+'</div>',
										icon:"error",
										confirmButtonText: 'Close',
										confirmButtonClass:"btn btn-danger w-xs mt-2",
										buttonsStyling:!1,
										showCloseButton:!0
									});
								}
								
								
							}
						});
				} else {
					
				}
			});
        });


		function hide(){
			$('#modalAdd').modal('hide');
		}


	</script>
@endpush
