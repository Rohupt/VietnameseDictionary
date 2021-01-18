@extends('layouts.app')

@section('links')
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/smoothness/jquery-ui.css">
@endsection

@section('navbars')
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/smoothness/jquery-ui.css">
<script src="//code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

<nav class="navbar sticky-top bg-light" id="searchbar">
    <div class="container">
        <form class="navbar-form w-100" method="POST" action="{{ route('entry.post') }}" role="search">
            @csrf
            <div class="input-group">
                <input type="text" class="form-control col-10 border-dark" placeholder="Tìm từ" name="q" id="suggesstion-box">

                <script>
                    $( "#suggesstion-box" ).autocomplete({
                        source: {!! $suggest_list !!}
                    });
                </script>

                <div class="input-group-btn input-group-append col-2 px-0">
                    <button class="btn btn-dark w-100" type="submit">Tìm</button>
                </div>
                
            </div>
        </form>
    </div>
</nav>
@endsection

@section('scripts')
@parent
<script src="//code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
@endsection