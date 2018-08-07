@extends('layout.master')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8 col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <h3>Inventory</h3>
                            <span class="text-muted">This list is showing all of your Items</span>
                    </div>
                </div>
                <div class="card my-2">
                    <div class="card-body">
                        <table class="table table-borderless table-hover table-striped" id="inventoryTable">
                            <thead>
                                <tr>
                                    <th>Item Name</th>
                                    <th>Category</th>
                                    <th>Description</th>
                                    <th>Size</th>
                                    <th>Qty</th>
                                    <th>Price</th>
                                    <th>Srp_Price</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <!-- <tbody>
                                <tr>
                                    <td>Sampe 1</td>
                                    <td>Sampe 2</td>
                                    <td>Sampe 3</td>
                                    <td>Sampe 4</td>
                                    <td>Sampe 5</td>
                                    <td>Sampe 6</td>
                                    <td>
                                        <button href="" class="btn btn-sm btn-info">View</button>
                                        <button href="" class="btn btn-sm btn-info" data-toggle="modal" data-target="#addcartModal">Add to Cart</button>
                                    </td>
                                </tr>
                            </tbody> -->
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <h3>Cart</h3>
                            <span class="text-muted">This is your Customer Cart</span>
                    </div>
                </div>
                <div class="card my-2">
                    <div class="card-body">
                        <table id="customerCartTable" class="table table-bordered table-striped table-heading">
                            <thead>
                                <tr>
                                    <th>Item Name</th>
                                    <th>Qty</th>
                                    <th>Price</th>
                                    <th>Total</th>
                                </tr>
                            </thead>
                            <tbody>
                            
                            </tbody>
                        </table>
                        <h4>Total:</h4>
                        <a href="{{ route('inventory.receipt') }}" class="btn btn-info">Print Receipt</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="addcartModal" tabindex="-1" role="dialog">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<form action="" id="addCartForm" method="post" class="needs-validation" novalidate>
					{{ csrf_field() }}
					<div class="modal-header">
						<h5 class="modal-title">Add to Cart</h5>
						<button class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						<div class="form-group">
							<label for="qty">Quantity</label>
							<input type="text" name="qty" id="qty" class="form-control" required placeholder="0">
                            <input type="hidden" name="id" class="form-control" >
                            <div class="invalid-feedback-custom"></div>
						</div>
					</div>
					<div class="modal-footer text-right">
						<button class="btn btn-info" type="submit">
							Send to Cart
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

            $('#categoryModal').on('hide.bs.modal', function () {
				$('#addCartForm')[0].reset();
				$('#addCartForm [name="id"]').val('');
				getData();
            });
            
            $('#sidenavToggler').click();
            getData();
            
            $('#addCartForm').unbind('submit');
            $('#addCartForm').bind('submit', function(){
                var customerTable = $('#customerCartTable');
                var customerToAppend = 
                                        '<tr>'+
                                            '<td>'+1+'</td>'+
                                            '<td>'+2+'</td>'+
                                            '<td>'+3+'</td>'+
                                            '<td>'+4+'</td>'+
                                        '</tr>';
                
                customerTable.find('tbody').append(customerToAppend);
                
                return false;
            });
        });
        
        function getData() {
            $('#inventoryTable').DataTable({
                processing : true,
                destroy : true,
                serverSide : true,
                responsive : true,
                searching : true,
                autoWidth : false,
                ajax : {
                    url : '/inventory/api'
                }
            });
        }

        function addToCart(id,qty) {
            var thisForm = $('#addCartForm');
            $('#addcartModal').modal();
            thisForm.find('[name="id"]').val(id);
            thisForm.find('[name="qty"]').attr('max-qty',qty);
            putQty();
        }

        function putQty() {
            var thisForm = $('#addCartForm');

            $(thisForm).find('[name="qty"]').unbind('keyup');
            $(thisForm).find('[name="qty"]').bind('keyup',function(){
                var maxQty = $(this).attr('max-qty');
                if(parseInt($(this).val()) <= parseInt(maxQty)){
                    thisForm.find('.invalid-feedback-custom').closest('.form-group').removeClass('has-danger-custom');
                }
                else{
                    thisForm.find('.invalid-feedback-custom').closest('.form-group').addClass('has-danger-custom');
                    thisForm.find('.invalid-feedback-custom').text('Your item has only '+maxQty+' in your Inventory. Please put lower than your inventory');
                }
            });
        }
    </script>
@stop