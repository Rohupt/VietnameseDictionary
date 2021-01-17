<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Entry extends Model {
    protected $table = "entries";
    protected $primaryKey = "id";
    public $timestamps = false;

    public function lexClass() {
        return $this->belongsTo(LexClass::class, 'lexclass', 'abbr');
    }

    public function sections() {
        return $this->hasMany(Section::class, 'entryID');
    }

    public function meanings() {
        return $this->hasManyThrough(Meaning::class, Section::class, 'entryID', 'sectID', 'id', 'id');
    }

    public function incRedup() {
        return $this->hasOne(Entry::class, 'inc_redup');
    }

    public function notInc() {
        return $this->belongsTo(Entry::class, 'inc_redup');
    }

    public function decRedup() {
        return $this->hasOne(Entry::class, 'dec_redup');
    }

    public function notDec() {
        return $this->belongsTo(Entry::class, 'dec_redup');
    }

    public function orthographyRef() {
        return $this->belongsTo(Entry::class, 'orth_ref');
    }

    public function orthographyVars() {
        return $this->hasMany(Entry::class, 'orth_ref');
    }

    public function semanticRef() {
        return $this->belongsTo(Entry::class, 'sem_ref');
    }

    public function semanticVars() {
        return $this->hasMany(Entry::class, 'sem_ref');
    }

    public function surveys() {
        return $this->hasMany(Survey::class, 'option1')->orWhere('option2', $this->id)->orWhere('option3', $this->id)->orWhere('option4', $this->id);
    }

    // vuaphapthuat410 add this function
    public function userEntries() {
        return $this->belongsTo(UserEntries::class, 'entry');
    }
    //
}