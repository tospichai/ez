<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProjectModel extends Model
{
    protected $table = 'tb_project';
    protected $guarded = [];

    public function getIsSelectedAttribute()
    {
        $user = User::find(Auth()->id());
        if(is_array(json_decode($user->project))){
            if (in_array($this->attributes['id'], json_decode($user->project))){
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
