<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use softDeletes;
    protected $dates = ['deleted_at'];  // remember to put s at the end
    protected $table = 'posts';
    protected $primaryKey ='id'; // if not id then need to tell laraval
    protected  $fillable = ['title','body','user_id','file'];
    public function user()
    {
        return $this->belongsTo('App\User'); //
    }

}
