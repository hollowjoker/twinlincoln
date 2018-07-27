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
                                    <td></td>
                                    <td>Category</td>
                                    <td>Item Name</td>
                                    <td>Description</td>
                                    <td>Qty</td>
                                    <td>Size</td>
                                    <td>Price</td>
                                    <td>Srp_Price</td>
                                    <td>Amount</td>
                                    <td></td>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        <button class="btn btn-danger btn-sm"><i class="fa fa-minus" aria-hidden="true"></i></button>
                                    </td>
                                    <td>
                                        <div class="form-group">
                                            <select class="form-control form-control-sm">
                                            <option>text</option>
                                            <option>text</option>
                                            <option>text</option>
                                            <option>text</option>
                                            <option>text</option>
                                            </select>
                                        </div>
                                    </td>
                                    <td>
                                        <input class="form-control form-control-sm" type="text" name="item_name" placeholder="Item Name" >
                                    </td>
                                    <td>
                                        <textarea class="form-control form-control-sm" type="text" name="description" placeholder="Description"></textarea>
                                    </td>
                                    <td>
                                        <input class="form-control form-control-sm" type="text" name="qty" placeholder="Qty">
                                    </td>
                                    <td>
                                        <input class="form-control form-control-sm" type="text" name="size" placeholder="Size">
                                    </td>
                                    <td>
                                        <input class="form-control form-control-sm" type="text" name="price" placeholder="Price">
                                    </td>
                                    <td>
                                        <input class="form-control form-control-sm" type="text" name="srp_price" placeholder="Srp">
                                    </td>
                                    <td>
                                        <input class="form-control form-control-sm" type="text" name="amount" placeholder="Amount">
                                    </td>
                                    <td>
                                        <button class="btn btn-info btn-sm"><i class="fa fa-plus" aria-hidden="true"></i></button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <button type="submit" Placeholder="Submit" class="btn btn-info mt-3">Submit</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

@stop