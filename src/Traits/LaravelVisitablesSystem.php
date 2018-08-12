<?php
namespace App\Traits ;


use ArtinCMS\LCS\Model\Comment;

trait LaravelVisitablesSystem {

    function setDataTableColumn($data)
    {
        $model = $data->target_type ;
        $res = $model::find($data->target_id);
        //name of column you want show in admin
        $result['text'] = $res->title;

        //your path comment
        $result['url'] = route('vue');
        return $result ;
    }

    public function likes()
    {
        return $this->morphMany('ArtinCMS\LLS\Models\Like','likeable','target_type','target_id') ;
    }

    public function disLikes()
    {
        return $this->morphMany('ArtinCMS\LLS\Models\Like','likeable','target_type','target_id') ;
    }


}
