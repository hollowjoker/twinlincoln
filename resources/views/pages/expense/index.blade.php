@extends('layout.master')
@section('content')
    
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <h3>Expense</h3>
                        <span class="text-muted">Put your expense here</span>
                        <hr>
                            <button class="btn btn-info" data-toggle="modal" data-target="#expenseModal">Add Expense</button>
                        <hr>
                        <h3>List of Expense</h3>
                        <table class="table table-bordered table-striped table-heading">
                            <thead>
                                <tr>
                                    <td>Date</td>
                                    <td>Description</td>
                                    <td>Amount</td>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="expenseModal" tabindex="-1" role="dialog">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<form action="{{ route('category.store') }}" method="post" class="needs-validation" novalidate>
					{{ csrf_field() }}
					<div class="modal-header">
						<h5 class="modal-title">Add Expense</h5>
						<button class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						<div class="form-group has-danger">
							<label for="category_name">Date</label>
							<input type="date" name="expense_date" id="expense_date" class="form-control" required >
							<input type="hidden" name="id" class="form-control" >
						</div>
						<div class="form-group">
							<label for="type">Description</label>
							<textarea name="expense_des" id="expense_des" class="form-control"></textarea>
						</div>
						<div class="form-group">
							<label for="description">Amount</label>
							<input type="text" name="expense_amount" id="expense_amount" class="form-control"></input>
						</div>
					</div>
					<div class="modal-footer text-right">
						<button class="btn btn-info" type="submit">
							Submit Expense
						</button>
					</div>
				</form>
			</div>
		</div>
	</div>
@stop