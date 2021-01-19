@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Chỉnh sửa thông tin</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('user.update', ['user' => Auth::user()]) }}">
                        @method('PATCH')
                        @csrf
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Username') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ Auth::user()->name }}" required autocomplete="name" autofocus>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Fullname') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="fullname" value="{{ Auth::user()->fullname }}">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ Auth::user()->email }}" required autocomplete="email">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="gender" class="col-md-4 col-form-label text-md-right">Giới tính</label>

                            <div class="col-md-6">
                                <select id="gender" class="form-control" name="gender">
                                    <option value="true" {{ Auth::user()->gender ? 'selected' : '' }}>Nam</option>
                                    <option value="false" {{ (Auth::user()->gender != null && !Auth::user()->gender) ? 'selected' : '' }}>Nữ</option>
                                    <option value="null" {{ Auth::user()->gender == null ? 'selected' : '' }}>Khác</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="date-of-birth" class="col-md-4 col-form-label text-md-right">Ngày sinh</label>

                            <div class="col-md-6">
                                <input id="date-of-birth" type="date" class="form-control" name="date_of_birth" {{ Auth::user()->date_of_birth ? 'value='.Auth::user()->date_of_birth : '' }}>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button class="btn btn-primary" type="submit">Lưu</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
    <script src="{{ asset('js/auth/register.js') }}"></script>
@endsection
