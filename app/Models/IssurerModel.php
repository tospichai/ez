<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class IssurerModel extends Model
{
    protected $table = 'tb_issurer';
    protected $guarded = [];

    public function getIsSelectedAttribute()
    {
        $user = User::find(Auth()->id());
        if(is_array(json_decode($user->issurer))){
            if (in_array($this->attributes['id'], json_decode($user->issurer))){
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
