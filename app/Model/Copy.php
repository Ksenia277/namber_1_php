<?php

namespace Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Copy extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = [
        'id_book',
        'description',
    ];

    public function getId(): int
    {
        return $this->id;
    }

}
