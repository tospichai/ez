<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TypeModel extends Model
{
    protected $table = 'tb_type';
    protected $guarded = [];

    public function getIsSelectedAttribute()
    {
        $user = User::find(Auth()->id());
        if(is_array(json_decode($user->type))){
            if (in_array($this->attributes['id'], json_decode($user->type))){
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
