
@extends('layout.master')

@section('content')
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-12">
				<div class="card">
					<div class="card-body">
						<div class="row">
							<div class="col-sm-8">
								<h3>Transactions</h3>
								<span class="text-muted">Here are your list of transaction</span>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="card my-2">
			<div class="card-body">
				<h3>List of Transactions</h3>
				<table class="table table-bordered table-striped" id="expenseTable">
					<thead>
						<tr>
							<td>Date</td>
							<td>Amount</td>
							<td>Description</td>
							<td>Transacted By</td>
							<td>Action</td>
						</tr>
					</thead>
				</table>
			</div>
		</div>
	</div>
@stop

@section('pageJs')
	<script>
		$(function(){
			alert();
		});
	</script>
@stop