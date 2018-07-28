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
                            <a href="#" class="btn btn-success">Add Expense</a>
                        <hr>
                        <h3>List of Expense</h3>
                        <table class="table table-bordered table-striped table-heading">
                            <thead>
                                <tr>
                                    <td>Description</td>
                                    <td>Purposes</td>
                                    <td>Amount</td>
                                    <td>Date</td>
                                    <td></td>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td></td>
                                    <td></td>
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

@stop