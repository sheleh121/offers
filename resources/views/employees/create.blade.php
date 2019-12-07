@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    Создать сотрудника
                </div>

                <div class="card-body">
                    <form method="POST" enctype="multipart/form-data" action="{{ route('employees.store') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-3 col-form-label ">ФИО</label>
                            <div class="col-md-9">
                                <input id="name" class="form-control @error('name') is-invalid @enderror" name="name" required>
                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-3 col-form-label ">E-mail</label>
                            <div class="col-md-9">
                                <input id="email" class="form-control @error('email') is-invalid @enderror" name="email" required>
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-3 col-form-label ">Номер телефона</label>
                            <div class="col-md-9">
                                <input id="phone" class="form-control @error('phone') is-invalid @enderror" name="phone" required>
                                @error('phone')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="nameEn" class="col-md-3 col-form-label ">Имя (EN)</label>
                            <div class="col-md-9">
                                <input id="nameEn" class="form-control @error('nameEn') is-invalid @enderror" name="nameEn"  required>
                                @error('nameEn')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="emailEn" class="col-md-3 col-form-label ">E-mail (EN)</label>
                            <div class="col-md-9">
                                <input id="emailEn" class="form-control @error('emailEn') is-invalid @enderror" name="emailEn"  required>
                                @error('emailEn')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="phoneEn" class="col-md-3 col-form-label ">Номер телефона (EN)</label>
                            <div class="col-md-9">
                                <input id="phoneEn" class="form-control @error('phoneEn') is-invalid @enderror" name="phoneEn"  required>
                                @error('phoneEn')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="login" class="col-md-3 col-form-label ">Логин</label>
                            <div class="col-md-9">
                                <input id="login"  class="form-control @error('login') is-invalid @enderror" name="login" value="{{ old('login') }}" required autocomplete="login">
                                @error('login')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-3 col-form-label ">Пароль</label>
                            <div class="col-md-9">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-3 col-form-label ">Подтверждение</label>
                            <div class="col-md-9">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="isAdmin" class="col-md-3 col-form-label ">Роль</label>
                            <div class="col-md-9">
                                <select class="form-control" id="isAdmin" name="isAdmin" >
                                    <option value="0">Сотрудник</option>
                                    <option value="1">Админ</option>
                                </select>
                            </div>
                        </div>

                        <div>
                            <image-component/>
                        </div>
                        <div class="form-group row mb-0">
                            <div class="col">
                                <button type="submit" class="btn btn-primary float-right">
                                    Сохранить
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
