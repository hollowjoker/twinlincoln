@extends('layout.master')
@section('content')

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <h2>List of Products</h2>
                        <span class="text-muted">text here....</span>
                        <hr>
                            <a href="{{ route('product.create') }}" class="btn btn-info">Add Product</a>
                        <hr>

                        <table class="table table-bordered table-striped table-heading" id="productTable">
                            <thead>
                                <tr>
                                    <td>Category</td>
                                    <td>Item Name</td>
                                    <td>Description</td>
                                    <td>Size</td>
                                    <td>Qty</td>
                                    <td>Price</td>
                                    <td>Srp_Price</td>
                                    <td></td>
                                </tr>
                            </thead>
                            <!-- <tbody>
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td>
                                        <button class="btn-sm btn-info" data-toggle="modal" data-target="#importModal">Import</button>
                                        <a href="{{ route('product.edit') }}">
                                            <button class="btn-sm btn-mild">
                                                Edit
                                            </button>
                                        </a>
                                    </td>
                                </tr>
                            </tbody> -->
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="importModal" tabindex="-1" role="dialog">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<form action="{{ route('category.store') }}" method="post" class="needs-validation" novalidate>
					{{ csrf_field() }}
					<div class="modal-header">
						<h5 class="modal-title">Import</h5>
						<button class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						<div class="form-group has-danger">
							<label for="category_name">Qty</label>
							<input type="text" name="import_qty" id="import_qty" class="form-control" required >
							<input type="hidden" name="id" class="form-control" >
						</div>
						<div class="form-group">
							<label for="type">Price</label>
							<input name="import_price" id="import_price" class="form-control">
						</div>
						<div class="form-group">
							<label for="description">Srp Price</label>
							<input type="text" name="import_srp_price" id="import_srp_price" class="form-control"></input>
                        </div>
                        <div class="form-group">
							<label for="description">Amount</label>
							<input type="text" name="import_amount" id="import_amount" class="form-control"></input>
						</div>
					</div>
					<div class="modal-footer text-right">
						<button class="btn btn-info" type="submit">
							Submit Import
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
            $('#productTable').DataTable({
                processing : true,
                serverSide : true,
                responsive : true,
                searching : true,
                autoWidth : false,
                ajax : {
                    url : '/product/api'
                }
            });
        });
    </script>
@stop