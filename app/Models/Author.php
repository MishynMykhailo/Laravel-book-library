<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    use HasFactory;
    protected $table = 'authors';
    protected $fillable = ['first_name', 'last_name', 'middle_name'];
    public function book(){
        return $this->belongsToMany(Book::class, 'book_authors', 'book_id', 'author_id');
    }
}
