@extends('layout.master')
@section('content')

<div class="container-fluid">
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <div class="card">
                <div class="card-body">
                    <h2>Edit Product</h2>
                    <hr class="mb-5">

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <!-- <label for="edit_category">Category</label> -->
                                <input type="text" Placeholder="Category" class="form-control">
                            </div>
                            <div class="form-group">
                                <!-- <label for="edit_item_name">Item Name</label> -->
                                <input type="text" Placeholder="Item Name" class="form-control">
                            </div>
                            <div class="form-group">
                                <!-- <label for="edit_description">Description</label> -->
                                <input type="text" Placeholder="Description" class="form-control">
                            </div>
                            <div class="form-group">
                                <!-- <label for="edit_size">Size</label> -->
                                <input type="text" Placeholder="Size" class="form-control">
                            </div>
                            <div class="form-group">
                                <!-- <label for="edit_price">Price</label> -->
                                <input type="text" Placeholder="Price" class="form-control">
                            </div>
                            <div class="form-group">
                                <!-- <label for="edit_srp_price">Srp Price</label> -->
                                <input type="text" Placeholder="Srp Price" class="form-control">
                            </div>
                            <div class="form-group">
                                <!-- <label for="edit_amount">Amount</label> -->
                                <input type="text" Placeholder="Amount" class="form-control">
                            </div>
                            <button type="submit" Placeholder="Submit" class="btn btn-info mt-3">Submit</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@stop