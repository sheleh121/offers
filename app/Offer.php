<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Offer
 *
 * @property int $id
 * @property string|null $name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Product[] $products
 * @property-read int|null $products_count
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Offer newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Offer newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Offer query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Offer whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Offer whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Offer whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Offer whereUpdatedAt($value)
 * @mixin \Eloquent
 * @property string $pdfFilePath
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Offer wherePdfFilePath($value)
 * @property string|null $number
 * @property int|null $productionTime
 * @property int|null $language
 * @property int $sale
 * @property int|null $termsOfPayment
 * @property int|null $employee
 * @property int|null $totalCost
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Offer whereEmployee($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Offer whereLanguage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Offer whereNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Offer whereProductionTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Offer whereSale($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Offer whereTermsOfPayment($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Offer whereTotalCost($value)
 * @property int|null $employeeCanceled
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Offer whereEmployeeCanceled($value)
 */
class Offer extends Model
{
    public function products()
    {
        return $this->hasMany('App\OfferProduct', 'offerId', 'id');
    }

    public function employeeCanceledR()
    {
        return $this->belongsTo('App\Employee', 'employeeCanceled', 'id');
    }

    public function term()
    {
        return $this->belongsTo('App\TermsOfPayment', 'termsOfPayment', 'id');
    }
}
