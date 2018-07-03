<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Traits\HasRoles;

/**
 * Class User
 * @package App
 * @property integer $id
 * @property string $name
 * @property string $content
 * @property int $createdBy
 * @property int $editedBy
 * @property $timestamps
 */

class User extends Authenticatable
{
    use Notifiable, HasRoles;

    protected $guard_name = 'web'; // or whatever guard you want to use

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * @param string $name
     * @return $this
     */
    public static function findByName(string $name) {
        return self::where('name', '=', $name);
    }
}
