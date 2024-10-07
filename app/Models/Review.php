<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;

    // Tentukan nama tabel jika berbeda dengan nama model
    protected $table = 'reviews';

    // Tentukan kolom yang dapat diisi secara massal
    protected $fillable = [
        'book_id',
        'user_id',
        'review',
    ];

    /**
     * Relasi dengan model Book.
     * Setiap review belongs to satu book.
     */
    public function books()
    {
        return $this->belongsTo(Book::class);
    }

    /**
     * Relasi dengan model User.
     * Setiap review belongs to satu user.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function book()
{
    return $this->belongsTo(Book::class);
}

}