<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Tbl_category;

use Validator;

class CategoryController extends Controller
{
    public function index(Request $request, $type = null) {
        if($type == 'api'){
            $data = [];
            $search = $request->search['value'];
            $start = $request->start;
            $length = $request->length;

            $category = Tbl_category::where('category_name','like','%'.$search.'%')
                                    ->orWhere('description','like','%'.$search.'%')
                                    ->orWhere('status','like','%'.$search.'%')
                                    ->offset($start)
                                    ->limit($length)
                                    ->get();

            $categoryCount = Tbl_category::where('category_name','like','%'.$search.'%')
                                    ->get();

            foreach($category as $k => $each){
                $data[$k][] = $each['category_name'];
                $data[$k][] = $each['description'];
                $data[$k][] = 0;
                $data[$k][] = $each['status'];
                $data[$k][] = '
                                <button type="button" class="btn btn-primary btn-sm editCategory" onclick="editCategory('.$each['id'].')">
                                    Edit
                                </button>
                                <button type="button" class="btn btn-danger btn-sm deleteCategory" onclick="deleteCategory('.$each['id'].')" >
                                    Delete
                                </button>
                                ';
            }
            $json_data = array(
                "draw" => intval($request->input('draw')),
                "recordsTotal" => count($categoryCount),
                "recordsFiltered" => count($categoryCount),
                "data" => $data
            );
            echo json_encode($json_data);
            exit;
        }
        return view('pages/category/index');
    }


    public function store(Request $request) {
        $data = [];
        $validator = Validator::make($request->all(),[
            'category_name' => 'required',
            'type' => 'required',
        ]);
        
        if($validator->fails()){
            $data['type'] = 'failed';
            $data['message'] = $validator->errors();

            return $data;
        }
        
        if($request->id == ''){
            Tbl_category::create([
                'category_name' => $request->category_name,
                'description' => $request->description,
                'type' => $request->type,
            ]);
            $data['message'] = 'Creation of category successful!';
        }
        else{
            $update = Tbl_category::find($request->id);
            $update->update($request->all());
            $data['message'] = 'Updating of category successful!';
        }
        $data['type'] = 'success';

        return $data;
    }

    public function show($id,$type = null){
        if($type == 'api'){
            $data = Tbl_category::find($id);
            echo json_encode($data);
            exit;
        }
    }
}
