<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WorkModel extends Model
{
    protected $table = 'tb_work';
    protected $guarded = [];

    public function getIsSelectedAttribute()
    {
        $user = User::find(Auth()->id());
        if(is_array(json_decode($user->work))){
            if (in_array($this->attributes['id'], json_decode($user->work))){
                return true;
            }else{
                return false;
            }
        }else{
            return false;
        }
    }

    protected $appends = ['is_selected'];
}
