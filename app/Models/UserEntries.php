<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserEntries extends Model
{
   protected $table = 'user_entries';
   public $timestamps = false;

   public function user() {
   		return $this->belongsTo(User::class, 'id');
   }

   public function entries() {
   		return $this->hasMany(Entry::class, 'entry');
   }
}

// vuaphapthuat410 did this