@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    {{ $product->name }}
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route('products.update', ['product' => $product->id]) }}">
                        @csrf
                        <input type="hidden" name="_method" value="PUT">

                        <div class="form-group row">
                            <label for="name" class="col-md-3 col-form-label ">Название (не выводится в КП)</label>
                            <div class="col-md-9">
                                <input id="name" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $product->name }}">
                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="descriptionRussian" class="col-md-3 col-form-label ">Описание на русском</label>
                            <div class="col-md-9">
                                <textarea id="descriptionRussian" class="form-control @error('descriptionRussian') is-invalid @enderror" name="descriptionRussian" >{{ $product->descriptionRussian }}</textarea>
                                @error('descriptionRussian')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="priceRub" class="col-md-3 col-form-label ">Цена в рублях</label>
                            <div class="col-md-9">
                                <input id="priceRub" class="form-control @error('priceRub') is-invalid @enderror" name="priceRub" value="{{ $product->priceRub }}"  >
                                @error('priceRub')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="descriptionEnglish" class="col-md-3 col-form-label ">Описание на английском</label>
                            <div class="col-md-9">
                                <textarea id="descriptionEnglish" class="form-control @error('descriptionEnglish') is-invalid @enderror" name="descriptionEnglish" >{{ $product->descriptionEnglish }}</textarea>
                                @error('descriptionEnglish')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="priceUsd" class="col-md-3 col-form-label ">Цена в долларах</label>
                            <div class="col-md-9">
                                <input id="priceUsd" class="form-control @error('priceUsd') is-invalid @enderror" name="priceUsd" value="{{ $product->priceUsd }}" >
                                @error('priceUsd')
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
