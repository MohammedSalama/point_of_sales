<?php

namespace App\Models;


use Spatie\Translatable\HasTranslations;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    use HasTranslations;

    protected $guarded=[];

    public $translatable = ['name'];
}