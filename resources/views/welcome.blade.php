@extends('layouts.app')

@section('content')

<div class="page-content">
	<div class="container-fluid">
		<!-- start page title -->
		<div class="row">
			<div class="col-12">
				<div class="page-title-box d-sm-flex align-items-center justify-content-between">
					<h4 class="mb-sm-0">Datatables</h4>
					<div class="page-title-right">
						<ol class="breadcrumb m-0">
							<li class="breadcrumb-item">
								<a href="javascript: void(0);">Tables</a>
							</li>
							<li class="breadcrumb-item active">Datatables</li>
						</ol>
					</div>
				</div>
			</div>
		</div>
		<!-- end page title -->
		
		<div class="row">
			<div class="col-lg-12">
                <div class="row">
                    <div class="col-sm-12 col-md-6">
                        <span onclick="location.assign()" class="btn btn-success waves-effect waves-light "><i class="mdi mdi-plus-circle-outline"></i> Tambah</span>
                        <span class="btn btn-success waves-effect waves-light "><i class="mdi mdi-plus-circle-outline"></i> Tambah</span>
                    </div>
                    <div class="col-sm-12 col-md-6">
                        
                    </div>
                </div>
				<div class="card">
					<!-- <div class="card-header">
                        
					</div> -->
					<div class="card-body">
						<div id="example_wrapper" class="dataTables_wrapper dt-bootstrap5 no-footer">
							
							<div class="row">
								<div class="col-sm-12">
									<table id="data-table-fixed-header" class="table table-bordered dt-responsive nowrap table-striped align-middle dataTable no-footer dtr-inline collapsed" style="width: 100%;" >
                                        <thead>
                                            <tr>
                                                <th scope="col">NO</th>
                                                <th >SR No.</th>
                                                <th >SR No.</th>
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
		
		
		
	</div>
	<!-- container-fluid --></div>
@endsection

@push('ajax')
        <script src="{{url_plug()}}/js/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

        <!--datatable js-->
        <script src="{{url_plug()}}/js/jquery.dataTables.min.js"></script>
        <script src="{{url_plug()}}/js/dataTables.bootstrap5.min.js"></script>
        <script src="{{url_plug()}}/js/dataTables.responsive.min.js"></script>
        <script src="{{url_plug()}}/js/dataTables.buttons.min.js"></script>
        
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
                    ajax:"{{ url('get_data')}}",
					columns: [
                        { data: 'id', render: function (data, type, row, meta) 
							{
								return meta.row + meta.settings._iDisplayStart + 1;
							} 
						},
						{ data: 'name' },
						{ data: 'username' },
						
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
@endpush
