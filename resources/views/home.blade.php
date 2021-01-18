@extends('layouts.app')

@section('links')
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/smoothness/jquery-ui.css">
@endsection

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <img src="images/logo.png" class='logo' alt="" />
    </div>
    <div class="row justify-content-center">
        <form class="form-inline input-group col-md-8" method="POST" action="{{ route('entry.post') }}">
            @csrf
            <input class="form-control form-control-lg border-dark bg-light rounded-left col-10" type="text" name="q" placeholder="Tìm từ" aria-label="Search" id="suggesstion-box">
            
            <script>
                $( "#suggesstion-box" ).autocomplete({
                    source: {!! echo $entries !!}
                });
            </script>

            <div class="input-group-btn input-group-append col-2 px-0">
                <button class="btn btn-lg btn-dark w-100 rounded-right" type="submit">Tìm</button>
            </div>
        </form>
    </div>
</div>
@endsection

@section('scripts')
<script src="//code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
@endsection