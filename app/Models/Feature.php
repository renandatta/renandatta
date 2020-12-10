<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Feature extends Model
{
    protected $fillable = [
        'name',
        'url',
        'icon',
        'kode',
        'parent_kode'
    ];
}