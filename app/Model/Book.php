<?php

namespace Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = [
        'id_author',
        'title_book',
        'year_publication',
        'price',
        'new_not_edition',
        'brief_summary',
    ];

    public function getId(): int
    {
        return $this->id_book;
    }

}
