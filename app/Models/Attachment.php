<?php

namespace App\Models;

use App\Traits\HasUuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attachment extends Model
{
    use HasFactory, HasUuid;
    protected $fillable = ['attachable_id','attachable_type','file_name','name','path','size','size_unit','mime_type','extension'];

}
