<?php

namespace App;

use App\Code;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableInterface;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordInterface;

class User extends Model implements AuthenticatableInterface, CanResetPasswordInterface
{
	protected $guarded = [];
    public function codes()
	{
		return $this->hasMany('App\Code');
	}
	
	/**
 * Get the unique identifier for the user.
 *
 * @return mixed
 */
public function getAuthIdentifier()
{
    return $this->getKey();
}

/**
 * Get the password for the user.
 *
 * @return string
 */
public function getAuthPassword()
{
    return $this->password;
}

/**
 * Get the e-mail address where password reminders are sent.
 *
 * @return string
 */
public function getReminderEmail()
{}

// Add your other methods here
public function getRememberToken()
{}

public function setRememberToken($value)
{}

public function getRememberTokenName()
{}

public function getEmailForPasswordReset()
{}
}
?>