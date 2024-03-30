<?php

namespace Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = [
        'surname',
        'name',
        'middlename',
    ];

    public function getId(): int
    {
        return $this->id;
    }

}
