@extends('layouts.app')

@section('content')
<div class="page-content small">
	<div class="container-fluid">
		<div class="row">
			<div class="col-12">
				<div class="page-title-box d-sm-flex align-items-center justify-content-between">
					<h4 class="mb-sm-0">{{ $menu }}</h4>
					<div class="page-title-right">
						<ol class="breadcrumb m-0">
							<li class="breadcrumb-item"><a href="javascript: void(0);">{{ $headerMenu }}</a></li>
							<li class="breadcrumb-item active">{{ $menu }}</li>
						</ol>
					</div>
				</div>
			</div>
		</div>
		<form id="createproduct-form" autocomplete="off" class="needs-validation" novalidate="">
			<div class="row">
				<div class="col-lg-12">
					<div class="card">
						<div class="card-body">
							<div class="row">
								<!--div class="col-md-4">
									<div class="mb-3">
										<label class="form-label" for="product-title-input">Pengirim</label>
										<select name="" class="form-control" id="">
											<option value="">Pilih Pengirim</option>
										</select>
									</div>
								</!--div-->								
								<div class="col-md-4">
									<div class="mb-3">
										<label class="form-label" for="product-title-input">Area Pengawasan</label>
										<select name="" class="form-control" id="">
											<option value=""> --Pilih Kategori-- </option>

										</select>
									</div>
								</div>
								<div class="col-md-4">
									<div class="mb-3">
										<label class="form-label" for="product-title-input">Jenis Pengawasan</label>
										<select name="" class="form-control" id="">
											<option value=""> --Pilih Prioritas-- </option>

										</select>
									</div>
								</div>
								<div class="col-md-4">
									<div class="mb-3">
										<label class="form-label" for="product-title-input">OPD</label>
										<select name="" class="form-control" id="">
											<option value=""> --Pilih Prioritas-- </option>

										</select>
									</div>
								</div>
								<div class="col-md-4">
									<div class="mb-3">
										<label class="form-label" for="product-title-input">Jadwal RMP</label>
										<select name="" class="form-control" id="">
											<option value=""> --Pilih Prioritas-- </option>

										</select>
									</div>
								</div>
								<div class="col-md-4">
									<div class="mb-3">
										<label class="form-label" for="product-title-input">Jadwal RPL</label>
										<select name="" class="form-control" id="">
											<option value=""> --Pilih Prioritas-- </option>

										</select>
									</div>
								</div>
								<div class="col-md-4">
									<div class="mb-3">
										<label class="form-label" for="product-title-input">OPD</label>
										<input type="hidden" class="form-control" id="formAction" name="formAction" value="add">
										<input type="text" class="form-control d-none" id="product-id-input">
										<input type="text" class="form-control" id="product-title-input" value="" placeholder="Enter product title" required="">
										<div class="invalid-feedback">Please Enter a product title.</div>
									</div>
								</div>
								<div class="col-md-12">
									<div class="mb-3">
										<label class="form-label" for="product-title-input">Tujuan/Sasaran</label>
										<textarea class="form-control" name="" id="" cols="30" rows="10"></textarea>
									</div>
								</div>
								<div class="col-md-12">
									<div class="mb-3">
										<label class="form-label" for="product-title-input">Keterangan</label>
										<input type="text" class="form-control" id="product-title-input" value="" placeholder="Enter product title" required="">
										<div class="invalid-feedback">Please Enter a product title.</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-6">
							<div class="card">
								<div class="card-header">
									<h5 class="card-title mb-0">Kebutuhan Hp</h5>
								</div>
								<div class="card-body">
									<div class="input-group has-validation mb-3">
										<input type="text" class="form-control" placeholder="(Auto Generate)" aria-label="Price" aria-describedby="product-price-addon" required="" value="Koorwas">
										<input type="text" id="sum_kemlu" class="form-control input-group-text">
										{{-- <div class="invalid-feedback">Please Enter a product price.</div> --}}
									</div>
									<div class="input-group has-validation mb-3">
										<input type="text" class="form-control" placeholder="(Auto Generate)" aria-label="Price" aria-describedby="product-price-addon" required="" value="PT">
										<input type="text" class="form-control input-group-text" id="sum_perwakilan">
										{{-- <div class="invalid-feedback">Please Enter a product price.</div> --}}
									</div>
									<div class="input-group has-validation mb-3">
										<input type="text" class="form-control" placeholder="(Auto Generate)" aria-label="Price" aria-describedby="product-price-addon" required="" value="KT">
										<input type="text" class="form-control input-group-text" id="sum_kli">
										{{-- <div class="invalid-feedback">Please Enter a product price.</div> --}}
									</div>
									<div class="input-group has-validation mb-3">
										<input type="text" class="form-control" placeholder="(Auto Generate)" aria-label="Price" aria-describedby="product-price-addon" required="" value="AT">
										<input type="text" class="form-control input-group-text" id="sum_lainnya">
										{{-- <div class="invalid-feedback">Please Enter a product price.</div> --}}
									</div>
									<div class="input-group has-validation mb-3">
										<input type="text" class="form-control" placeholder="(Auto Generate)" aria-label="Price" aria-describedby="product-price-addon" required="" value="Jumlah">
										<input type="text" class="form-control input-group-text" id="sum_total">
										{{-- <div class="invalid-feedback">Please Enter a product price.</div> --}}
									</div>
								</div>
								<!-- end card body -->
							</div>
						</div>
						<div class="col-md-6">
							<div class="card">
								<div class="card-header">
									<h5 class="card-title mb-0">Lainnya</h5>
								</div>
								<div class="card-body">
									<div class="col-md-12">
										<div class="mb-3">
											<label class="form-label" for="product-title-input">Jumlah Laporan</label>
											<select name="" class="form-control" id="">
												<option value=""> --Pilih Prioritas-- </option>
	
											</select>
										</div>
									</div>
									<div class="col-md-12">
										<div class="mb-3">
											<label class="form-label" for="product-title-input">Sarana dan Prasarana</label>
											<select name="" class="form-control" id="">
												<option value=""> --Pilih Prioritas-- </option>
	
											</select>
										</div>
									</div>
									<div class="col-md-12">
										<div class="mb-3">
											<label class="form-label" for="product-title-input">Tingkat Resiko</label>
											<input type="hidden" class="form-control" id="formAction" name="formAction" value="add">
											<input type="text" class="form-control d-none" id="product-id-input">
											<input type="text" class="form-control" id="product-title-input" value="" placeholder="Enter product title" required="">
											<div class="invalid-feedback">Please Enter a product title.</div>
										</div>
									</div>
								</div>
							</div>
						</div>

					</div>
					<!-- end card -->
					<!-- end card -->
					<!-- end card -->
					<div class="text-end mb-3">
						{{-- <button type="submit" class="btn btn-primary waves-effect waves-light">Send Mail</button> --}}
						<button type="submit" class="btn btn-secondary waves-effect waves-light">Save</button>
						<button type="submit" class="btn btn-soft-success waves-effect waves-light">Cancel</button>
					</div>
				</div>
				<!-- end col -->
				<!-- end col -->
			</div>
			<!-- end row -->
		</form>
	</div>
	<!-- container-fluid -->
</div>
<div class="modal fade show" id="modal-form" aria-hidden="true" style="display: none;">
	<div class="modal-dialog modal-lg" >
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Add Account</h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body">
				<div id="error-notif"></div>
				<form id="mydata" method="post" enctype="multipart/form-data">
					@csrf
					<div id="tampil-form"></div>
					<div class="row g-3">
						<!--end col-->
						<div class="col-lg-12">
							<div class="hstack gap-2 justify-content-end">
								<button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
								<span id="btn-save" class="btn btn-primary" onclick="simpandata()">Simpan</span>
							</div>
						</div>
						<!--end col-->
					</div>
					<!--end row-->
				</form>
			</div>
		</div>
	</div>
</div> 
@endsection

@push('ajax')
        
        
    <script type="text/javascript">
        
    </script>
@endpush
