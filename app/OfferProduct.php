<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\OfferProduct
 *
 * @property int $id
 * @property int $number
 * @property string|null $name
 * @property string|null $description
 * @property int|null $price
 * @property string|null $image
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\OfferProduct newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\OfferProduct newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\OfferProduct query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\OfferProduct whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\OfferProduct whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\OfferProduct whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\OfferProduct whereImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\OfferProduct whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\OfferProduct whereNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\OfferProduct wherePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\OfferProduct whereUpdatedAt($value)
 * @mixin \Eloquent
 * @property int $offerId
 * @method static \Illuminate\Database\Eloquent\Builder|\App\OfferProduct whereOfferId($value)
 * @property int $quantity
 * @method static \Illuminate\Database\Eloquent\Builder|\App\OfferProduct whereQuantity($value)
 * @property string $measure
 * @method static \Illuminate\Database\Eloquent\Builder|\App\OfferProduct whereMeasure($value)
 * @property int $delete
 * @method static \Illuminate\Database\Eloquent\Builder|\App\OfferProduct whereDelete($value)
 */
class OfferProduct extends Model
{
    //
}
