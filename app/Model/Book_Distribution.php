<?php

namespace Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book_Distribution extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = [
        'number_card',
        'date_issue',
        'return_period',
        'id_user',
        'id_copy',
    ];

    public function getId(): int
    {
        return $this->id;
    }

}
