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
                        <table class="table table-bordered table-striped" id="expenseTable">
                            <thead>
                                <tr>
                                    <td>Date</td>
                                    <td>Description</td>
                                    <td>Amount</td>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="expenseModal" tabindex="-1" role="dialog">
		<div class="modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content">
				<form action="{{ route('expense.store') }}" method="post" class="needs-validation" novalidate>
					{{ csrf_field() }}
					<div class="modal-header">
						<h5 class="modal-title">Add Expense</h5>
						<button class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						<div class="form-group has-danger">
							<label for="date_from">Date</label>
							<input type="text" name="date_from" id="date_from" class="form-control date" required value=" {{ date('Y-m-d') }} " >
						</div>
						<div class="form-group">
							<label for="amount">Amount</label>
							<input type="number" name="amount" id="amount" class="form-control" required >
						</div>
						<div class="form-group">
							<label for="description">Description</label>
							<textarea name="description" id="description" class="form-control"></textarea>
						</div>
					</div>
					<div class="modal-footer text-right">
						<button class="btn btn-light border" type="button" data-dismiss="modal">
							Close
						</button>
						<button class="btn btn-info" type="submit">
							Submit Expense
						</button>
					</div>
				</form>
			</div>
		</div>
	</div>
@stop

@section('pageJs')
<script>
	var userId = 0;
	$(function(){

		$('.modal').on('hide.bs.modal', function () {
			// $('form')[0].reset();
			// $('[name="id"]').val('');
			// $('#categoryTable').DataTable().destroy();
			// getData();
		});

		getData();
		$('form').submit(function(){
			var thisForm = $(this);
			var formData = thisForm.serialize();
			var thisUrl = thisForm.attr('action');
			$('#expenseModal').modal('hide');

			swal("Please type your password:", {
				content: "input",
			})
			.then((value) => {
				$.ajax({
					url : '/expense/store/api',
					data : formData+'&user_password='+value,
					method : 'post'
				}).done(function(returnData){
					if(returnData['type'] == 'success'){
						userId = returnData['message'];

						$.ajax({
							url : thisUrl,
							data : formData+'&user_id='+userId,
							type : 'post'
						}).done(function(result){
							if(result['type'] == 'error'){
								applyValidation(thisForm,result['message']);
								$('#expenseModal').modal('show');
							}
							else{
								removeValidation(thisForm);
								swal('Good Job!',result['message'],result['type'],{
									button: "Aww yiss!",
								});
							}
						});
					}
					else{
						swal('Oh Noez!','Your password is Invalid',returnData['type'],{
							button : "Ok"
						})
						.then((value) => {
							$('#expenseModal').modal('show');
						});
					}
				});

			});
			return false;
		});
	});

	function getData(){
		$('#expenseTable').DataTable({
			processing : true,
			serverSide : true,
			responsive : true,
			searching : true,
			autoWidth : false,
			ajax : {
				url : '/expense/api',
				success : function(returnData){
					console.log(returnData);
				}
			}
		});
	}
</script>
@stop