<?php

namespace App\Traits;

trait HasUuid
{
    public static function bootHasUuid()
    {
        static::creating(function ($model) {
            $model->uuid = \Ramsey\Uuid\Uuid::uuid4()->toString();
        });
    }
}
