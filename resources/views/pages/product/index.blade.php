@extends('layout.master')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <h3>Products</h3>
                        <span class="text-muted">Add of your Products</span>
                        <hr>

                        <table class="table table-bordered table-striped table-heading">
                            <thead>
                                <tr>
                                    <td>Category</td>
                                    <td>Item Name</td>
                                    <td>Description</td>
                                    <td>Qty</td>
                                    <td>Size</td>
                                    <td>Price</td>
                                    <td>Srp_Price</td>
                                    <td>Amount</td>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        <div class="form-group">
                                            <select class="form-control">
                                            <option>1</option>
                                            <option>2</option>
                                            <option>3</option>
                                            <option>4</option>
                                            <option>5</option>
                                            </select>
                                        </div>
                                    </td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
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