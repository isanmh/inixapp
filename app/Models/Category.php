<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    // colomn yang boleh diisi
    protected $fillable = ['name'];

    // colomn yang tidak boleh diisi
    // protected $guarded = ['id'];

    // relasi one to many
    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
