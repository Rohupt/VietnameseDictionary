<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Entry;
use App\Models\LexClass;

class EntrySearchController extends Controller {
    function get($entry) {
        $entries = Entry::where('entry', 'LIKE', '%'.$entry.'%')->orderBy('id')->get();
        foreach ($entries as $entry) {
            $entry->lexclassname = LexClass::find($entry->lexclass);
            $entry->sections = $entry->sections->sortBy('position');
            foreach ($entry->sections as $section) {
                $section->lexclassname = LexClass::find($section->lexclass);
                $section->meanings = $section->meanings->sortBy('position');
                foreach($section->meanings as $meaning)
                    $meaning->lexclassname = LexClass::find($meaning->lexclass);
            }
        }
        return view('entry', compact('entries'));
    }
}
