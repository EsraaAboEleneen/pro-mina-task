<?php

namespace App\Traits;

use App\Models\Attachment;

trait HasAttach
{
    public function attachments()
    {
        return $this->morphMany(Attachment::class,'attachable');
    }

    public function getImagePathAttribute()
    {
        return $this->attachments->path;
    }

    public function getImageFileNameAttribute()
    {
        return $this->attachments->file_name;
    }
}
