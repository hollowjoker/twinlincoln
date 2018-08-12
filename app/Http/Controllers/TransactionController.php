<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Library\ClassFactory as CF;

class TransactionController extends Controller
{
    public function index() {
        
        return view('pages/transaction/index');
    }
}
