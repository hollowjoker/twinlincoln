@extends('layout.master')

@section('content')
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-12">
				<div class="card">
					<div class="card-body">
						<h3>Category List</h3>
						<span class="text-muted">This list is showing all Category of your Items</span>
						<hr>
						<div class="row">
							<div class="col-md-12 mb-3">
								<button class="btn btn-info" data-toggle="modal" data-target="#categoryModal" >
									Add Category
								</button>
							</div>
							<div class="col-md-12">
								<table class="table table-bordered table-striped" id="categoryTable">
									<thead>
										<tr>
											<th>Name</th>
											<th>Description</th>
											<th>Item Count</th>
											<th>Status</th>
											<th>Action</th>
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

	<div class="modal fade" id="categoryModal" tabindex="-1" role="dialog">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<form action="{{ route('category.store') }}" method="post" class="needs-validation" novalidate>
					{{ csrf_field() }}
					<div class="modal-header">
						<h5 class="modal-title">Create Category</h5>
						<button class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						<div class="form-group has-danger">
							<label for="category_name">Category Name</label>
							<input type="text" name="category_name" id="category_name" class="form-control" required >
						</div>
						<div class="form-group">
							<label for="type">Type</label>
							<select name="type" id="type" class="form-control"  required >
								<option selected disabled value=""> -- Select Type --</option>
								<option value="bike">Bike</option>
								<option value="motor">Motor</option>
							</select>
						</div>
						<div class="form-group">
							<label for="description">Description</label>
							<textarea name="description" id="description" class="form-control"></textarea>
						</div>
					</div>
					<div class="modal-footer text-right">
						<button class="btn btn-info" type="submit">
							Submit Category
						</button>
					</div>
				</form>
			</div>
		</div>
	</div>
@stop

@section('pageJs')
	<script>
		$(function(){
			$('#categoryModal').on('shown.bs.modal', function () {
				$('#categoryName').trigger('focus');
			});
			$('#categoryModal').on('hide.bs.modal', function () {
				$('form')[0].reset();
				$('#categoryTable').DataTable().destroy();
				getData();
			});

			getData();

			$('form').submit(function(){
				var thisForm = $(this);
				var formData = $(this).serialize();
				$.ajax({
					type	: 'post',
					url		: $(this).attr('action'),
					data	: formData
				}).done(function(returnData){
					if(returnData['type'] == 'success'){
						removeValidation(thisForm);
						swal('Good Job!',returnData['message'],returnData['type'],{
							button: "Aww yiss!",
						}).then((value) => {
							$('#categoryModal').modal('hide');
						});
					}
					else if(returnData['type'] == 'failed') {
						var errors = returnData['message'];
						applyValidation(thisForm,errors);
					}
				});
				return false;
			});
		});

		function getData(){
			$('#categoryTable').DataTable({
				processing : true,
				serverSide : true,
				responsive : true,
                searching : true,
				autoWidth : false,
				ajax : {
					url : 'category/api',
				}
				
			});

		}
	</script>
@stop
