<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Entry;
use App\Models\LexClass;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class EntrySearchController extends Controller {
    function get($entry) {
        $entries = Entry::where('entry', 'LIKE', '%'.$entry.'%')->orderBy('id')->get();
        foreach ($entries as $entry) {
            $entry->lexclassname = LexClass::find($entry->lexclass);
            $entry->sections = $entry->sections->sortBy('position');
            $entry->userAdded = DB::table('user_entries')->where('entry', $entry->id)->where('id', Auth::id())->exists();
            foreach ($entry->sections as $section) {
                $section->lexclassname = LexClass::find($section->lexclass);
                $section->meanings = $section->meanings->sortBy('position');
                foreach($section->meanings as $meaning)
                    $meaning->lexclassname = LexClass::find($meaning->lexclass);
            }
        }

        $suggest_list = DB::table('entries')->pluck('entry')->toJson();

        return view('entry', compact('entries'), compact('suggest_list'));
    }
}
