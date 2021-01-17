@extends('layouts.app-searchbar')

@section('content')
<div class="row justify-content-center">
    <div class="col-lg-6 col-md-9" id="left-col">
        @yield('left-col')
    </div>
    <div class="col-lg-4" id="right-col">

    </div>
</div>
@endsection

@section('scripts')
    <script src="{{ asset('js/rightcol.js') }}" defer></script>
@endsection