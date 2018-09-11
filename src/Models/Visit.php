<?php

namespace ArtinCMS\LVS\Models;

use ArtinCMS\LMM\Models\Morph;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Visit extends Model
{
    use SoftDeletes ;
    protected $table = 'lvs_visitable';
    protected $appends = ['target_type_name','target_value_name'];

    public function morphs()
    {
        return $this->hasMany('ArtinCMS\LMM\Models\Morph');
    }
    public function user()
    {
        return $this->belongsTo(config('laravel_visitable.userModel'), 'user_id');
    }

    public function getTargetTypeNameAttribute()
    {
        $target = Morph::where('model_name',$this->target_type)->first();
        if($target)
        {
            return $target->name ;
        }
        else
        {
            return '' ;
        }
    }
    public function getTargetValueNameAttribute()
    {
        $target = Morph::where('model_name',$this->target_type)->first();
        if($target)
        {
            $column_name = $target->target_column_name ;
            $model = $this->target_type::where('id',$this->target_id)->first();
            if($model)
            {
                return $model->$column_name;
            }
            else
            {
                return 'آیتم حذف شده است' ;
            }
        }
        else
        {
            return '' ;
        }
    }

}
