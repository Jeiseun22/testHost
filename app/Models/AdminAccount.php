<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class AdminAccount
 * 
 * @property int $admin_id
 * @property string $first_name
 * @property string $last_name
 * @property Carbon $birthdate
 * @property string $gender
 * @property string $email
 * @property string $password
 *
 * @package App\Models
 */
class AdminAccount extends Model
{
	protected $table = 'admin_accounts';
	protected $primaryKey = 'admin_id';
	public $timestamps = false;

	protected $dates = [
		'birthdate'
	];

	protected $hidden = [
		'password'
	];

	protected $fillable = [
		'first_name',
		'last_name',
		'birthdate',
		'gender',
		'email',
		'password'
	];
}
