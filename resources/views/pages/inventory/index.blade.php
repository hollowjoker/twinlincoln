@extends('layout.master')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <h3>Inventory</h3>
                            <span class="text-muted">This list is showing all of your Items</span>
                        <hr>

                        <table class="table table-bordered table-striped table-heading">
                            <thead>
                                <tr>
                                    <th>Item Name</th>
                                    <th>Description</th>
                                    <th>Qty</th>
                                    <th>Size</th>
                                    <th>Srp_Price</th>
                                    <th>Price</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Sampe 1</td>
                                    <td>Sampe 2</td>
                                    <td>Sampe 3</td>
                                    <td>Sampe 4</td>
                                    <td>Sampe 5</td>
                                    <td>Sampe 6</td>
                                    <td>
                                        <a href="" class="btn btn-sm btn-info">View</a>
                                        <a href="" class="btn btn-sm btn-info" data-toggle="modal" data-target="#addcartModal">Add to Cart</a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h3>Cart</h3>
                            <span class="text-muted">This is your Customer Cart</span>
                        <hr>

                        <table class="table table-bordered table-striped table-heading">
                            <thead>
                                <tr>
                                    <th>Item Name</th>
                                    <th>Qty</th>
                                    <th>Price</th>
                                    <th>Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                            </tbody>
                        </table>
                        <h4>Total:</h4>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="addcartModal" tabindex="-1" role="dialog">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<form action="" method="post" class="needs-validation" novalidate>
					{{ csrf_field() }}
					<div class="modal-header">
						<h5 class="modal-title">Add to Cart</h5>
						<button class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						<div class="form-group has-danger">
							<label for="category_name">Quantity</label>
							<input type="text" name="cart_qty" id="cart_qty" class="form-control" required >
							<input type="hidden" name="id" class="form-control" >
						</div>
					</div>
					<div class="modal-footer text-right">
						<button class="btn btn-info" type="submit">
							Submit
						</button>
					</div>
				</form>
			</div>
		</div>
	</div>

@stop