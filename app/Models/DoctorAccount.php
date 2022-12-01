<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class DoctorAccount
 * 
 * @property int $doctor_id
 * @property string $first_name
 * @property string $last_name
 * @property Carbon $birthdate
 * @property string $gender
 * @property string $department
 * @property string $status
 * @property string|null $prc_identification
 * @property string $email
 * @property string $pass
 * @property int $sched_id
 *
 * @package App\Models
 */
class DoctorAccount extends Model
{
	protected $table = 'doctor_accounts';
	protected $primaryKey = 'doctor_id';
	public $timestamps = false;

	protected $casts = [
		'sched_id' => 'int'
	];

	protected $dates = [
		'birthdate'
	];

	protected $fillable = [
		'first_name',
		'last_name',
		'birthdate',
		'gender',
		'department',
		'status',
		'prc_identification',
		'email',
		'pass',
		'sched_id'
	];
}
