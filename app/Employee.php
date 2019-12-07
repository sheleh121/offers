<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Employee
 *
 * @property int $id
 * @property string $phone
 * @property string|null $email
 * @property string $image
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Employee newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Employee newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Employee query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Employee whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Employee whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Employee whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Employee whereImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Employee wherePhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Employee whereUpdatedAt($value)
 * @mixin \Eloquent
 * @property string $name
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Employee whereName($value)
 * @property string $nameEn
 * @property string $phoneEn
 * @property string|null $emailEn
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Employee whereEmailEn($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Employee whereNameEn($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Employee wherePhoneEn($value)
 * @property int $userId
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Employee whereUserId($value)
 * @property-read \App\User $user
 */
class Employee extends Model
{
    public function user()
    {
        return $this->belongsTo('App\User', 'userId', 'id');
    }
}
