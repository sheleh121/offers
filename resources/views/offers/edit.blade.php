@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    Редактировать КП
                </div>
                <offer-products-component
                    :products="{{ $products }}"
                    :terms_of_payments="{{ $termsOfPayments }} "
                    :employees="{{ $employees }}"
                    :offer_prop="{{ $offer }}"
                />
            </div>
        </div>
    </div>
@endsection
