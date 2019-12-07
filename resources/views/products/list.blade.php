@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    Позиции
                    <a class="btn btn-success float-right" href="{{ route('products.create') }}">Добавить +</a>
                </div>
                <div class="card-body">
                    <table class="table table-hover table-responsive-lg">
                        <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Название</th>
                            <th scope="col"></th>
                            <th scope="col"></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($products as $product)
                            <tr>
                                <th scope="row">{{ $product->id }}</th>
                                <td>{{ $product->name }}</td>
                                <td>
                                    <a class="btn btn-light" href="{{ route('products.edit', ['product' => $product->id]) }}">Редактировать</a>
                                </td>
                                <td>
                                    <form onSubmit='return confirm("Это действие невозможно отменить. Продолжить?");' method="post" action="{{ route('products.destroy', ['product'=> $product->id]) }}">
                                        @method('DELETE')
                                        @csrf
                                        <button type="submit" class="btn btn-light">Удалить</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    @if(isset($products))
                        {{ $products->links() }}
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
