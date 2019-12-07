@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    Коммерческие предложения
                    <a class="btn btn-success float-right" href="{{ route('offers.create') }}">Добавить +</a>
                </div>
                <div class="card-body">
                    <table class="table table-hover table-responsive-lg">
                        <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Название</th>
                            <th scope="col">Дата</th>
                            <th scope="col">Аннулировано</th>
                            <th scope="col"></th>
                            <th scope="col"></th>
                            <th scope="col"></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($offers as $offer)
                            <tr>
                                <th scope="row">{{ $offer->id }}</th>
                                <td>{{ $offer->name }}</td>
                                <td>{{ $offer->created_at }}</td>
                                <td>
                                    @if(isset($offer->employeeCanceledR))
                                        {{ $offer->employeeCanceledR->name }}
                                    @endif
                                </td>
                                <td>
                                    <a class="btn btn-light" target="_blank" href="{{ route('offers.show', ['offer' => $offer->id]) }} ">Просмотр</a>
                                </td>
                                @if(Auth::user()->isAdmin)
                                <td>
                                    <a class="btn btn-light" href="{{ route('offers.edit', ['offer' => $offer->id]) }} ">Редактировать</a>
                                </td>
                                <td>
                                    <form
                                        onSubmit='return confirm("Это действие невозможно отменить. Продолжить?");'
                                        method="post"
                                        action="{{ route('offers.destroy', ['offer'=> $offer->id]) }}"
                                    >
                                        @method('DELETE')
                                        @csrf
                                        <button type="submit" class="btn btn-light">Удалить</button>
                                    </form>
                                </td>
                                @else
                                    <td colspan="2">
                                    @if($offer->employeeCanceled == null)
                                        <form
                                            onSubmit='return confirm("Это действие невозможно отменить. Продолжить?");'
                                            method="post"
                                            action="{{ route('offers.canceled', ['offer'=> $offer->id]) }}"
                                        >
                                            @method('PUT')
                                            @csrf
                                            <div class="input-group">
                                                <select class="form-control" id="employeeCanceled" name="employeeCanceled" >
                                                    @foreach($employees as $employee)
                                                        <option value="{{ $employee->id }}" {{ $employee->user->id == \Illuminate\Support\Facades\Auth::id() ? 'selected' : '' }}>
                                                            {{$employee->name}}
                                                        </option>
                                                    @endforeach
                                                </select>
                                                <button type="submit" class="btn btn-light form-control">Аннулировать</button>
                                            </div>
                                        </form>
                                    @endif
                                @endif
                                    </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    @if(isset($offers))
                        {{ $offers->links() }}
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
