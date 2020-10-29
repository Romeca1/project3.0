<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User_post extends Model
{
    protected $table = 'users_posts';
    protected $primaryKey = 'id';
    public $timestamps = false;
    public $incrementing = false;
    protected $fillable = ['head'];
    
}
