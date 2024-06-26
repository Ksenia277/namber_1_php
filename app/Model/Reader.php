<?php

namespace Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reader extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = [
        'surname',
        'name',
        'middlename',
        'address',
        'phone',
        'image'
    ];

    public function getId(): int
    {
        return $this->id;
    }

}
