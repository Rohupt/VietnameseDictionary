@extends('layouts.app')

@section('navbars')
<nav class="navbar sticky-top bg-light" id="searchbar">
    <div class="container">
        <form class="navbar-form w-100" method="POST" action="entry" role="search">
            @csrf
            <div class="input-group">
                <input type="text" class="form-control col-10 border-dark" placeholder="Tìm từ" name="entry">
                <div class="input-group-btn input-group-append col-2 px-0">
                    <button class="btn btn-dark w-100" type="submit">Tìm</button>
                </div>
            </div>
        </form>
    </div>
</nav>
@endsection