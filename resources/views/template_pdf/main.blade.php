<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<style type="text/css">
    *{ font-family: DejaVu Sans, sans-serif; }
    TABLE {
        border-collapse: collapse;
        font-size: 10pt;
    }
    TD, TH {
        padding: 3px;
        border: 1px solid black;
    }
</style>
</head>
<body>

<img src="../storage/app/header.png" style="width: 100%">

<table >
    <tr style="border: none">
        <td style="width: 260pt;  text-align: center; border: none">
            <b>{{trans('pdf.address1_1')}}</b> <br/>
            {{trans('pdf.address1_2')}} <br/>
            {{trans('pdf.address1_3')}}
        </td >
        <td style="width: 260pt;  text-align: center; border: none">
            <b>{{trans('pdf.address2_1')}}</b> <br/>
            {{trans('pdf.address2_2')}} <br/>
            {{trans('pdf.address2_3')}}
        </td >
    </tr>
    <tr style="border: none">
        <td colspan="2" style="width: 520pt ; border: none; text-align: center">{!! trans('pdf.address3') !!}</td >
    </tr>
</table>
<table >
    <tr style="border: none">
        <td style="width: 520pt ; border: none; text-align: center">{{trans('pdf.site')}}</td >
    </tr>
</table>

<h2 style="text-align: center">{{ trans('pdf.offer') . ' № ' . $offer->number . (app()->getLocale() == 'ru' ? date(' d/m/Y') : date(' Y-m-d'))  }}</h2>
<h5>{{ trans('pdf.priceHeader') }}</h5>
<table >
    <thead>
    <tr>
        <th style="width: 280pt">{{ trans('pdf.priceName') }}</th>
        <th style="width: 70pt">{{ trans('pdf.pricePrice') }}</th>
        <th style="width: 70pt">{{ trans('pdf.priceCount') }}</th>
        <th style="width: 70pt">{{ trans('pdf.priceAmount') }}</th>
    </tr>
    </thead>
    <tbody>
    @foreach($offer->products as $product)
        <tr>
            <td style="width: 280pt">
                {{ $product['description'] }} <br />
                @if(isset($product['image']))
                    <img src="{{ '../storage/app/temp/' . $product['image'] }}" style="max-width: 270pt; max-height: 240pt; margin: 5pt"  >
                @endisset
            </td >
            <td style="width: 70pt">{{ $product['price']  }}</td>
            <td style="width: 70pt">{{ $product['quantity'] . ' '
                    . (app()->getLocale() == 'ru' ? \App\Product::MEASURE_TEXT_RUS[$product['measure']] : \App\Product::MEASURE_TEXT_EN[$product['measure']]) }}</td>
            <td style="width: 70pt">{{ $product['quantity'] * $product['price'] }}</td>
        </tr>
    @endforeach
    <tr>
        <td colspan="4">
            {{ trans('pdf.productionTime', ['DAYS' => $offer->productionTime]) }}
        </td>
    </tr>
    @if(isset($offer->sale) && $offer->sale != 0)
    <tr>
        <td colspan="3">
            {{ trans('pdf.sale') }}
        </td>
        <td >
            {{ $offer->sale . '%' }}
        </td>
    </tr>
    @endif
    <tr>
        <td colspan="3">
            {{ trans('pdf.theTotalCost') }}
        </td>
        <td >
            {{ $totalCost }}
        </td>
    </tr>
    </tbody>
</table>
<p style="font-size: 8pt">
    {!! trans('pdf.*') !!} <br />
    {{trans('pdf.termsOfPayment') . $offer->term->nameRussian}}
</p>
<table >
    <tr style="border: none">
        <td style="width: 60pt; border: none;  ">
            @if (isset($employee->image))
                <img src="{{ '../storage/app/' . $employee->image }}" style="max-width: 60pt">
            @endif
        </td >
        <td style="border: none; vertical-align: top;">
            {{ trans('pdf.signature') }} <br/>
            {{ app()->getLocale() == 'ru' ? $employee->name : $employee->nameEn }} <br/>
            {{ app()->getLocale() == 'ru' ? $employee->phone : $employee->phoneEn }} <br/>
            {{ app()->getLocale() == 'ru' ? $employee->email : $employee->emailEn }}
        </td >

    </tr>
</table>
