@extends('layouts.app-searchbar')

@section('content')
<div class="row justify-content-center">
    <div class="col-lg-6 col-md-9" id="left-col">
        @yield('left-col')
    </div>
    <div class="col-lg-4 col-md-9" id="right-col">
        @yield('right-col')
    </div>
</div>
@endsection

@section('scripts')
@parent
<script src="{{ asset('js/rightcol.js') }}" defer></script>
@endsection