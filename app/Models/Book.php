<?php

namespace App\Models;

use App\Models\UserBook;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Book extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'available_days'];
    
    public function users()
    {
        return $this->belongsToMany(User::class, 'user_books', 'book_id', 'user_id')
            ->withPivot('date'); 
    }
    public function userBooks()
    {
        return $this->hasMany(UserBook::class);
    }


}
