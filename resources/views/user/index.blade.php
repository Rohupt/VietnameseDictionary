@extends('layouts.app')

@section('content')
< HEAD

<div class="container">
    <div class="row justify-content-center">
    <div class="card" >
        
            <div class="card-body">
                
                <div class="form-group row"> <label class="col col-form-label text-md-left">Tên:{{ Auth::user()->name }}</label></div>
                <div class="form-group row"><label class="col col-form-label text-md-left">Tên đầy đủ:{{ Auth::user()->fullname }}</label></div>
                <div class="form-group row"><label class="col col-form-label text-md-left">Email:{{ Auth::user()->email }}</label></div>
                <div class="form-group row"><label class="col col-form-label text-md-left">Giới tính:{{ Auth::user()->gender }}</label></div>
                <div class="form-group row"><label class="col col-form-label text-md-left">Ngày sinh:{{ Auth::user()->date_of_birth }}</label></div>
                <a class="btn btn-info" href="{{ route('user.edit', ['user' => Auth::user()]) }}">Chỉnh sửa thông tin</a>
            </div>
        
    </div>
    </div>
</div>

@endsection