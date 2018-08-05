<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Library\ClassFactory as CF;

class InventoryController extends Controller
{
    public function index(Request $request,$type = null) {

        if($type == 'api'){
            $data = [];
            $search = $request->search['value'];
            $start = $request->start;
            $length = $request->length;
            $columns = array(
                        'item_name',
                        'category_name',
                        'description',
                        'size',
                        'price',
                        'spr_price',
                    );

            $products = CF::model('Tbl_items')
                        ->select('Tbl_items.*','Tbl_categories.category_name')
                        ->join('Tbl_categories','Tbl_categories.id','Tbl_items.tbl_category_id')
                        ->where('Tbl_categories.category_name','like','%'.$search.'%')
                        ->orWhere('Tbl_items.item_name','like','%'.$search.'%')
                        ->orWhere('Tbl_items.description','like','%'.$search.'%')
                        ->orWhere('Tbl_items.size','like','%'.$search.'%')
                        ->orWhere('Tbl_items.price','like','%'.$search.'%')
                        ->orWhere('Tbl_items.srp_price','like','%'.$search.'%')
                        ->offset($start)
                        ->limit($length)
                        ->orderBy($columns[$request->order[0]['column']],$request->order[0]['dir'])
                        ->get();

            $productsCount = CF::model('Tbl_items')
                        ->select('Tbl_items.*','Tbl_categories.category_name')
                        ->join('Tbl_categories','Tbl_categories.id','Tbl_items.tbl_category_id')
                        ->where('Tbl_categories.category_name','like','%'.$search.'%')
                        ->orWhere('Tbl_items.item_name','like','%'.$search.'%')
                        ->orWhere('Tbl_items.description','like','%'.$search.'%')
                        ->orWhere('Tbl_items.size','like','%'.$search.'%')
                        ->orWhere('Tbl_items.price','like','%'.$search.'%')
                        ->orWhere('Tbl_items.srp_price','like','%'.$search.'%')
                        ->count();

            foreach($products as $k => $each){
                $data[$k][] = $each['item_name'];
                $data[$k][] = $each['category_name'];
                $data[$k][] = $each['description'];
                $data[$k][] = $each['size'];
                $data[$k][] = $each['qty'];
                $data[$k][] = $each['price'];
                $data[$k][] = $each['srp_price'];
                $data[$k][] = '
                                <button class="btn btn-sm btn-mild" onclick="view('.$each['id'].')">View</button>
                                <button class="btn btn-sm btn-info" onclick="addToCart('.$each['id'].','.$each['qty'].')">Add to Cart <i class="fa fa-arrow-right"></i> </button>         
                            ';
            }

            $json_data = array(
                "draw" => intval($request->input('draw')),
                "recordsTotal" => $productsCount,
                "recordsFiltered" => $productsCount,
                "data" => $data
            );
            echo json_encode($json_data);
            exit;
        }
        return view('pages/inventory/index');
    }
}
