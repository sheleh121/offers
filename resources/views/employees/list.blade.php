@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    Сотрудники
                    <a class="btn btn-success float-right" href="{{ route('employees.create') }}">Добавить +</a>
                </div>
                <div class="card-body">
                    <table class="table table-hover table-responsive-lg">
                        <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">ФИО</th>
                            <th scope="col"></th>
                            <th scope="col"></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($employees as $employee)
                            <tr>
                                <th scope="row">{{ $employee->id }}</th>
                                <td>{{ $employee->name }}</td>
                                <td>
                                    <a class="btn btn-light" href="{{ route('employees.edit', ['employee' => $employee->id]) }}">Редактировать</a>
                                </td>
                                <td>
                                    <form onSubmit='return confirm("Это действие невозможно отменить. Продолжить?");'
                                          method="post"
                                          action="{{ route('employees.destroy', ['employee'=> $employee->id]) }}">
                                        @method('DELETE')
                                        @csrf
                                        <button type="submit" class="btn btn-light">Удалить</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    @if(isset($employess))
                        {{ $employess->links() }}
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
