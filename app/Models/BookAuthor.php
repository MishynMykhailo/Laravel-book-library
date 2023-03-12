<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookAuthor extends Model
{
    use HasFactory;
    protected $table = 'book_authors';

    protected $fillable = [
        'book_id',
        'author_id',
    ];

    // Если у вас есть дополнительные поля в таблице связей, вы можете указать их здесь, например:
    // protected $fillable = [
    //     'book_id',
    //     'author_id',
    //     'role',
    // ];

    public function book()
    {
        return $this->belongsTo(Book::class);
    }

    public function author()
    {
        return $this->belongsTo(Author::class);
    }
}
