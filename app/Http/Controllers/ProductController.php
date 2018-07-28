<?php

namespace App\Http\Controllers;

use App\Library\ClassFactory as CF;
use Illuminate\Http\Request;
use App\Models\Tbl_items;
use Validator;

class ProductController extends Controller
{
    public function index($type = null) {

        $category = CF::model('Tbl_category')->select('id','category_name')->get();

        if($type == 'add'){
            $options = '';
            foreach($category as $each){
                $options .= '<option value="'.$each['id'].'">'.$each['category_name'].'</option>';
            }

            $forAppend = '
                <tr>
                    <td> <button type="button" class="btn btn-danger btn-sm delLine"><i class="fa fa-minus" aria-hidden="true"></i></button> </td>
                    <td>
                        <div class="form-group">
                            <select class="form-control form-control-sm" name="category_id[]" required>
                                <option selected disabled value="">&dash;</option>
                                '.$options.'
                            </select>
                        </div>
                    </td>
                    <td> <input class="form-control form-control-sm" type="text" name="item_name[]" placeholder="Item Name" required> </td>
                    <td> <textarea class="form-control form-control-sm" type="text" name="description[]" placeholder="Description"></textarea> </td>
                    <td> <input class="form-control form-control-sm" type="text" name="size[]" placeholder="Size"> </td>
                    <td> <input class="form-control form-control-sm compute" type="text" name="qty[]" placeholder="Qty" required> </td>
                    <td> <input class="form-control form-control-sm compute" type="text" name="price[]" placeholder="Price" required> </td>
                    <td> <input class="form-control form-control-sm" type="text" name="srp_price[]" placeholder="Srp" required> </td>
                    <td> <input class="form-control form-control-sm compute" type="text" name="amount[]" readonly placeholder="Amount"> </td>
                    <td> <button type="button" class="btn btn-info btn-sm addLine"><i class="fa fa-plus" aria-hidden="true"></i></button> </td>
                </tr>
            ';
            echo $forAppend;
            exit;
        }
        return view('pages/product/index', compact('category'));
    }

    public function store(Request $request){

        $data = [];
        $validator = Validator::make($request->all(),[
            // 'category_id' => 'required',
            'item_name' => 'required',
            'qty' => 'required',
            'srp_price' => 'required',
            'amount' => 'required',
        ]);

        return $validator->errors();
        if($validator->fails()){
            $data['type'] = 'failed';
            $data['message'] = $validator->errors();

            return $data;
        }
        // foreach(){

        // }
        // Tbl_category::create([
        //     'category_name' => $request->category_name,
        //     'description' => $request->description,
        //     'type' => $request->type,
        // ]);
        // $data['message'] = 'Creation of category successful!';

        return $data;
    }
}
