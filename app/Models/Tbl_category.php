<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tbl_category extends Model
{
    protected $fillable = [
        'category_name',
        'description',
        'type'
    ];
}
