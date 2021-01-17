@extends('layouts.app')

@section('content')
     <div class="container"
                <div class="row md-1">
                    <div class="col-md-12"><label class="labels">Tên:{{ Auth::user()->name }}</label></div>
                    <div class="col-md-12"><label class="labels">Tên đầy đủ:{{ Auth::user()->fullname }}</div>
                    <div class="col-md-12"><label class="labels">Email:{{ Auth::user()->email }}</div>
                    <div class="col-md-12"><label class="labels">Giới tính:{{ Auth::user()->gender }}</div>
                    <div class="col-md-12"><label class="labels">Ngày sinh:{{ Auth::user()->date_of_birth }}</div>
                </div>
</div>
@endsection