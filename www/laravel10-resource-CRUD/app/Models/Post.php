<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $table = 'posts1';  // Добавьте это свойство т.к. поменяли название таблицы posts на posts1 в SQL

    protected $guarded = [];
}
