@extends('layouts.pages')

@section('left-col')
    @foreach ($entries as $entry)
        @for ($i = 0; $i < 10; $i++)
        <div class="card my-3">
            <div class="card-header">
                <h3 class="entry-name my-auto">{{ $entry->entry }}<small class="font-italic font-weight-light text-black-50 font-smaller ml-3">{{ $entry->lexclassname->name1 }}</small></h3>
            </div>
            <div class="card-body">

            </div>
        </div>
        @endfor
    @endforeach
@endsection