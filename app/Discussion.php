<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Discussion extends Model
{
    //
    protected $fillable = ['title','body','user_id','last_user_id'];

    public function user()
    {
//        第二个参数表示对应的外键，此处外键正好是user_id，因此可以省略
//        return $this->belongsTo(User::class, 'user_id');
        return $this->belongsTo(User::class);
    }
}
