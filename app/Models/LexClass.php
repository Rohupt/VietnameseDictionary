<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class LexClass extends Model {
    protected $table = "lexclass";
    protected $primaryKey = "abbr";
    public $timestamps = false;
    protected $keyType = 'string';
}