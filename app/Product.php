<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Product
 *
 * @property int $id
 * @property string|null $descriptionEnglish
 * @property string|null $descriptionRussian
 * @property int|null $price
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Product newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Product newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Product query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Product whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Product whereDescriptionEnglish($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Product whereDescriptionRussian($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Product whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Product wherePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Product whereUpdatedAt($value)
 * @mixin \Eloquent
 * @property int|null $priceRub
 * @property int|null $priceUsd
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Product wherePriceRub($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Product wherePriceUsd($value)
 * @property string|null $name
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Product whereName($value)
 */
class Product extends Model
{
    CONST MEASURE_TEXT_RUS = [
        0 => 'ШТ'
        ,1 => 'М2'
        ,2 => 'МП'
    ];

    CONST MEASURE_TEXT_EN = [
        0 => 'pc'
        ,1 => 'M2'
        ,2 => 'LM'
    ];
}
