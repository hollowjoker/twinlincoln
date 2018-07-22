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
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td>
                                        <a href="" class="btn btn-sm btn-info">View</a>
                                        <a href="" class="btn btn-sm btn-info">Add to Cart</a>
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

@stop