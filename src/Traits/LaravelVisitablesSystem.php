<?php
namespace App\Traits ;

trait LaravelVisitablesSystem {

    public function visits()
    {
        return $this->morphMany('ArtinCMS\LVS\Models\Visit','visitable','target_type','target_id') ;
    }


}
