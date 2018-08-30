<?php

namespace App\Models;

trait TestUUIDPermaLinkSlug {

    public static function boot()
    {
        parent::boot();
        self::creating(function ($model)
        {
            $rec = \DB::selectOne('SELECT uuid() as UUID');
            $model->uuid = $rec->UUID;
        });
    }

    public function scopeLocateId($query,  $id)
    {
        $testUUIDRegex = '/^[0-9a-z]{8}-[0-9a-z]{4}-[0-9a-z]{4}-[0-9a-z]{4}-[0-9a-z]{12}$/i';
        if(preg_match($testUUIDRegex, $id))
        {
            return $query->where('uuid', '=', $id);
        }

        $isInt = (int)$id > 0;
        if($isInt)
        {
            return $query->where('id', '=', $id);
        }

        return $query->where('permalink_slug', '=', $id);
    }
}