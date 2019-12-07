<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\TermsOfPayment
 *
 * @method static \Illuminate\Database\Eloquent\Builder|\App\TermsOfPayment newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\TermsOfPayment newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\TermsOfPayment query()
 * @mixin \Eloquent
 * @property int $id
 * @property string $nameRussian
 * @property string $nameEnglish
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\TermsOfPayment whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\TermsOfPayment whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\TermsOfPayment whereNameEnglish($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\TermsOfPayment whereNameRussian($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\TermsOfPayment whereUpdatedAt($value)
 */
class TermsOfPayment extends Model
{
    protected $table = 'termsOfPayments';
}
