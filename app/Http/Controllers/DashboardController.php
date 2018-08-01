<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Library\ClassFactory as CF;

class DashboardController extends Controller
{
    
    public function index($type = null){
        
        if($type == 'api'){
            $data = [];
            $monthToday = date('Y-m');
            $expenseSum = CF::model('Tbl_expense')
                            ->where('date_from','like','%'.$monthToday.'%')
                            ->sum('amount');
            $data['expenseSum'] = $expenseSum;
            echo json_encode($data);
            exit;
        }
        return view('pages/dashboard/index');
    }

    public function timeinSave(){
        
    }
}
