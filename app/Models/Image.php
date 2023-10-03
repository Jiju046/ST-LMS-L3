<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'path'];

    // accessor to get the full URL of the image
    public function getFullUrlAttribute()
    {
        return asset('storage/' . $this->path);
    }
}
