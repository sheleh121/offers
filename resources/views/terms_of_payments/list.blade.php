@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    Условия оплаты
                    <a class="btn btn-success float-right" href="{{ route('termsOfPayments.create') }}">Добавить +</a>
                </div>
                <div class="card-body">
                    <table class="table table-hover table-responsive-lg">
                        <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Текст русский</th>
                            <th scope="col">Текст английский</th>
                            <th scope="col"></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($termsOfPayments as $termsOfPayment)
                            <tr>
                                <th scope="row">{{ $termsOfPayment->id }}</th>
                                <td>{{ $termsOfPayment->nameRussian }}</td>
                                <td>{{ $termsOfPayment->nameEnglish }}</td>
                                <td>
                                    <form onSubmit='return confirm("Это действие невозможно отменить. Продолжить?");' method="post" action="{{ route('termsOfPayments.destroy', ['termsOfPayment'=> $termsOfPayment->id]) }}">
                                        @method('DELETE')
                                        @csrf
                                        <button type="submit" class="btn btn-light">Удалить</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    @if(isset($termsOfPayments))
                        {{ $termsOfPayments->links() }}
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
