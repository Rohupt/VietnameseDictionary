@extends('layouts.app')

@section('content')


<div class="container">
    <div class="row justify-content-center">
    <div class="card" >
        
            <div class="card-body">
                
                <div class="form-group row"> <label class="col col-form-label text-md-left">Tên:</label><label class="col col-form-label text-md-left">{{ Auth::user()->name }}</label></div>
                <div class="form-group row"><label class="col col-form-label text-md-left">Tên đầy đủ:</label><label class="col col-form-label text-md-left">{{ Auth::user()->fullname }}</label></div>
                <div class="form-group row"><label class="col col-form-label text-md-left">Email:</label><label class="col col-form-label text-md-left">{{ Auth::user()->email }}</label></div>
                <div class="form-group row"><label class="col col-form-label text-md-left">Giới tính:</label><label class="col col-form-label text-md-left">{{ Auth::user()->gender }}</label></div>
                <div class="form-group row"><label class="col col-form-label text-md-left">Ngày sinh:</label><label class="col col-form-label text-md-left">{{ Auth::user()->date_of_birth }}</label></div>
                <a class="btn btn-info" href="{{ route('user.edit', ['user' => Auth::user()]) }}">Chỉnh sửa thông tin</a>
            </div>
        
    </div>
    </div>
</div>

@endsection