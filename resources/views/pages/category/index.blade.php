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
								<table class="table table-bordered table-striped">
									<thead>
										<tr>
											<th>Name</th>
											<th>Description</th>
											<th>Item Count</th>
											<th>Status</th>
											<th>Action</th>
										</tr>
									</thead>
									<tbody>
										<tr>
											<td>Lubricants</td>
											<td>Lubricants, Oils</td>
											<td>0</td>
											<td>Active</td>
											<td>
												<a href="" class="btn btn-sm btn-info">
													Deactivate
												</a>
											</td>
										</tr>
									</tbody>
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
				<form action="">
					<div class="modal-header">
						<h5 class="modal-title">Create Category</h5>
						<button class="close" data-dismiss="modal">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						<div class="form-group">
							<label for="categoryName">Category Name</label>
							<input type="text" name="categoryName" id="categoryName" class="form-control" required>
						</div>
						<div class="form-group">
							<label for="for">Description</label>
							<textarea name="for" id="for" class="form-control"></textarea>
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
		});
	</script>
@stop
