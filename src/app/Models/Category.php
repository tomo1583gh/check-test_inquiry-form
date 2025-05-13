<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = ['content'];

    //1つのカテゴリに複数のお問い合わせがある
    public function content()
    {
        return $this->hasMany(Content::class);
    }
}
