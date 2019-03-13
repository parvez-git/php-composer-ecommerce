<?php 

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User extends Model 
{

	protected $fillable = [
		'name',
		'email',
		'password',
		'active',
		'email_verified_at',
		'email_verification_token'
	];

	public $timestamps = false;

}