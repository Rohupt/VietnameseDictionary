<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Meaning extends Model {
    protected $table = "meanings";
    protected $primaryKey = "id";
    public $timestamps = false;
    
    public function section() {
        return $this->belongsTo(Section::class, 'sectID');
    }

    public function entry() {
        return $this->section->entry();
    }
}