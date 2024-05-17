<?php

namespace App\Helpers;

use Illuminate\Support\Facades\Storage;

class Attachment
{
    public static function upload(string $dir, $image = null, $requestName = null,$model = null)
    {

        if ($image != null) {
            $imageName = \Carbon\Carbon::now()->toDateString() . "-" . uniqid() . "." . $image->getClientOriginalExtension();
            if (!Storage::disk('public')->exists($dir)) {
                Storage::disk('public')->makeDirectory($dir);
            }
            $path = Storage::disk('public')->putFileAs($dir, $image, $imageName);
            self::store($image,$path,$requestName,$model);
        }
        return $imageName;
    }

    public static function store($image = null, $path = null,$requestName = null,$model = null)
    {
       $attach = \App\Models\Attachment::create([
           'attachable_id' => $model->id,
           'attachable_type' => get_class($model),
           'path' => $path,
           'name' => $image->getClientOriginalName(),
           'file_name' => is_null($requestName) ? $image->getClientOriginalName() : $requestName,
           'mime_type' => $image->getMimeType(),
           'extension' => $image->clientExtension(),
           'size' => $image->getSize(),
           'size_unit' => 'B'
       ]);
       return $attach;
    }
}
