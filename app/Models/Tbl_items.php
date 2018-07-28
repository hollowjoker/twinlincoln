<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Tbl_items extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'category_id',
        'item_name',
        'qty',
        'srp_prics',
        'price',
    ];

    protected $dates = ['delete_at'];
}
