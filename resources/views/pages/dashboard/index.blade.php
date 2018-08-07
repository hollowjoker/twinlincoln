@extends('layout.master')
@section('content')
	<div class="container-fluid">
		<div class="row">
			<div class="col-xl-3 col-sm-6 mb-3">
				<div class="card o-hidden h-100">
					<div class="card-body">
						<div class="card-body-icon">
							<i class="fa fa-fw fa-money"></i>
						</div>
						<div class="mr-5">Php. <span class="h1" id="monthlyIncome"></span></div>
					</div>
					<a class="card-footer bg-white text-dark clearfix small z-1" href="#">
						<span class="float-left">Monthly Income for {{ date('F') }}</span>
						<span class="float-right">
							<i class="fa fa-angle-right"></i>
						</span>
					</a>
				</div>
			</div>
			<div class="col-xl-3 col-sm-6 mb-3">
				<div class="card o-hidden h-100">
					<div class="card-body">
						<div class="card-body-icon">
							<i class="fa fa-fw fa-line-chart"></i>
						</div>
						<div class="mr-5">Php. <span class="h2" id="weeklyIncome"></span></div>
					</div>
					<a class="card-footer bg-white text-dark clearfix small z-1" href="#">
						<span class="float-left">Weekly Income for {{ date('M d,',strtotime('Monday this week')) }} - {{ date('d, Y', strtotime(date('Y-m-d',strtotime('Monday this week')).' + 6 day')) }} </span>
						<span class="float-right">
							<i class="fa fa-angle-right"></i>
						</span>
					</a>
				</div>
			</div>
			<div class="col-xl-3 col-sm-6 mb-3">
				<div class="card o-hidden h-100">
					<div class="card-body">
						<div class="card-body-icon">
							<i class="fa fa-fw fa-hand-o-down"></i>
						</div>
						<div class="mr-5">Php. <span class="h2" id="expenseCount"></span></div>
					</div>
					<a class="card-footer bg-white text-dark clearfix small z-1" href="#">
						<span class="float-left">Expense for {{ date('F') }} </span>
						<span class="float-right">
							<i class="fa fa-angle-right"></i>
						</span>
					</a>
				</div>
			</div>
			<div class="col-xl-3 col-sm-6 mb-3">
				<div class="card o-hidden h-100">
					<div class="card-body">
						<div class="card-body-icon">
							<i class="fa fa-fw fa-bicycle"></i>
						</div>
						<div class="mr-5"> <span class="h2" id=""></span></div>
					</div>
					<a class="card-footer bg-white text-dark clearfix small z-1" href="#">
						<span class="float-left">Total Transaction</span>
						<span class="float-right">
							<i class="fa fa-angle-right"></i>
						</span>
					</a>
				</div>
			</div>
		</div>
		<div class="card mb-3 mt-3">
			<div class="card-header bg-white">
				<i class="fa fa-area-chart"></i> Area Chart Example</div>
			<div class="card-body">
				<canvas id="myAreaChart" width="100%" height="30"></canvas>
			</div>
			<div class="card-footer bg-white small text-muted">Updated yesterday at 11:59 PM</div>
		</div>
	</div>
@stop

@section('pageJs')
	<script src="{!! asset('sbadmin/js/sb-admin-charts.js') !!}"></script>
	<script>
		$(function(){
			
			getExpense();
			getMonthly();
			getWeekly();
		});

		function getExpense() {
			$.ajax({
				url : '/dashboard/getExpense',
				type : 'get',
			}).done(function(returnData){
				var parsedData = $.parseJSON(returnData);
				$('#expenseCount').text(parsedData['expenseSum']);
				console.log(returnData);
			});
		}

		function getMonthly() {
			$.ajax({
				url : '/dashboard/getMonthlyIncome',
				type : 'get',
			}).done(function(result){
				var parsedData = $.parseJSON(result);
				$('#monthlyIncome').text(parsedData['monthlyIncomeSum']);
			});
		}

		function getWeekly() {
			$.ajax({
				url : '/dashboard/getWeeklyIncome',
				type : 'get'
			}).done(function(result){
				var parsedData = $.parseJSON(result);
				$('#weeklyIncome').text(parsedData['weeklyIncomeSum']);
			});
		}
	</script>
@stop