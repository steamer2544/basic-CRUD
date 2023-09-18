<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Typepet extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [   //ป้องกันข้อมูล
        'name',
        'user_id',
    ];

    function user() {
        return $this->hasOne(User::class,'id','user_id');
    }
}
