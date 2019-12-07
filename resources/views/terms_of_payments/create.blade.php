@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    Добавить условие оплаты
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('termsOfPayments.store') }}">
                        @csrf
                        <input type="hidden" name="_method" value="POST">

                        <div class="form-group row">
                            <label for="nameRussian" class="col-md-3 col-form-label ">Описание на русском</label>
                            <div class="col-md-9">
                                <textarea id="nameRussian" class="form-control @error('nameRussian') is-invalid @enderror" name="nameRussian" required>
                                </textarea>
                                @error('nameRussian')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="nameEnglish" class="col-md-3 col-form-label ">Описание на английском</label>
                            <div class="col-md-9">
                                <textarea id="nameEnglish" class="form-control @error('nameEnglish') is-invalid @enderror" name="nameEnglish" required>
                                </textarea>
                                @error('nameEnglish')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
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
