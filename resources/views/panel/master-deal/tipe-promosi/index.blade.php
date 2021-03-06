@extends('master')
@section('content')
<link href="{{ asset('fiture-style/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
<link href="{{ asset('fiture-style/toastr/toastr.min.css') }}" rel="stylesheet">
<link href="{{ asset('fiture-style/datatables/responsive.dataTables.min.css') }}" rel="stylesheet">
<div class="container-fluid">
	<div class="animate fadeIn">
		<div class="row">
			<div class="col-sm-6">
				<p>
				<button type="button" class="btn btn-primary" onclick="refresh()">
					<i class="fa fa-refresh"></i>
				</button>
				<button type="button" class="btn btn-primary" data-toggle="modal"
					 data-target="#primaryModal" data-link="{{ route('tipe-promosi.create') }}" 
					 onclick="funcModal($(this))">
				<i class="fa fa-plus"></i>&nbsp; New Tipe Promosi
				</button>
				</p>
			</div>
		</div>
		
		<div class="row">
			<div class="col-lg-12">
				<div class="card">
					<div class="card-header">
						<i class="fa fa-align-justify"></i> Tipe Promosi Table
					</div>
					<div class="card-body">
						<div class="table-responsive">
                            <table _fordragclass="table-responsive-sm" class="table table-bordered table-striped table-sm display responsive datatable"
                                    cellspacing="0" width="100%">
								<thead>
									<tr>
										<th>Name</th>
										<th>Satuan</th>
										<th>Date registered</th>
										<th></th>
									</tr>
								</thead>
								<tbody>
								</tbody>
							</table>	
						</div>	
					</div>
				</div>
			</div>
		</div>
		
	    <div class="modal fade" id="primaryModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
			<div class="modal-dialog modal-primary" role="document">
				<div class="modal-content">
					<div class="modal-body"><i class="fa fa-gear fa-spin"></i></div>
				</div>
				<!-- /.modal-content -->
			</div>
	      	<!-- /.modal-dialog -->
		</div>
	    <!-- /.modal -->
		
	</div>
</div>
@endsection
<!-- /.container-fluid -->

@section('myscript')
<script src="{{ asset('fiture-style/datatables/dataTables.min.js') }}"></script>
<script src="{{ asset('fiture-style/datatables/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('fiture-style/datatables/dataTables.responsive.min.js') }}"></script>

<script>
	//DATATABLES
		$('.datatable').DataTable({
			processing: true,
	        serverSide: true,
	        responsive: true,
	        autoWidth: false,
	        ajax: '{!! url()->current() !!}/data',
	        columns: [
	            {data: 'name', name: 'name'},
	            {data: 'satuan', name: 'satuan'},
	            {data: 'created_at', name: 'created_at'},
	            {data: 'action', name: 'action', orderable: false, searchable: false, width:'20%'}
	        ],
			columnDefs: [{
                responsivePriority: 1,
                targets: 0,
            },
            {
                targets: 3,
                className: "text-center"
            },
            {
                responsivePriority: 3,
                targets: 3,
                className: "text-center"
            }
        ],
			"order":[[2, 'desc']]
		});
		$('.datatable').attr('style','border-collapse: collapse !important');
		
</script>
@endsection