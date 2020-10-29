<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Comment extends Model
{
    protected $primaryKey = 'id';
    public $timestamps = false;
    public $incrementing = false;
    
    public function getCommentsById($id)
    {
    	return Comment::where("posts_id",$id)->get();
    }
}
