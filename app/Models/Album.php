<?php

namespace App\Models;

use App\Traits\HasAttach;
use App\Traits\HasUuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Album extends Model
{
    use HasFactory, HasUuid, HasAttach;
    protected $fillable = ['title'];

}
