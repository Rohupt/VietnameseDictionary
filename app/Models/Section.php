<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Section extends Model {
    protected $table = "sections";
    protected $primaryKey = "id";
    public $timestamps = false;

    public function meanings() {
        return $this->hasMany(Meaning::class, 'sectID');
    }

    public function entry() {
        return $this->belongsTo(Entry::class, 'entryID');
    }

    public function lexClass() {
        return $this->belongTo(LexClass::class, 'lexclass', 'abbr');
    }
}