<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Entry;

class EntrySearchController extends Controller {
    function get($entry) {
        $entries = Entry::where('entry', $entry)->orderBy('id')->get();
        foreach ($entries as $entry) {
            $entry['sections'] = $entry->sections->sortBy('position');
            foreach ($entry['sections'] as $section)
                $section['meanings'] = $section->meanings->sortBy('position');
        }
        return $entries;
    }
}
