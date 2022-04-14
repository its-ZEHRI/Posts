<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
// use Models;

class Post extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'title',
        'body' ,
        'authName'
    ];
    public function user(){
        return $this->belongsTo('App\Models\User');
    }
}
