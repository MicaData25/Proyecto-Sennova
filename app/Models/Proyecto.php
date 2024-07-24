<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proyecto extends Model
{
    use HasFactory;
    protected $fillable = ['nombre','ano','lider','programaFormacion','valorFinanciero',
        'productos','ponencias','edt','libro','articulo','tipo'];
}
