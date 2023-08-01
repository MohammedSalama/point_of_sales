<?php

namespace Pos\Category\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Category extends Model
{
    use HasFactory;

    use HasTranslations;

    protected $guarded=[];

    public $translatable = ['name'];
}
