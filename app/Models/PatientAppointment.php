<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class PatientAppointment
 * 
 * @property int $appointment_id
 * @property string $first_name
 * @property string $last_name
 * @property Carbon $birthdate
 * @property string $gender
 * @property string $complaint
 * @property string $allergies
 * @property string $department
 * @property Carbon $appointment_date
 * @property int $service_id
 * @property string|null $doctors_note
 * @property int $doctor_id
 * @property int $patient_id
 *
 * @package App\Models
 */
class PatientAppointment extends Model
{
	protected $table = 'patient_appointments';
	protected $primaryKey = 'appointment_id';
	public $timestamps = false;

	protected $casts = [
		'service_id' => 'int',
		'doctor_id' => 'int',
		'patient_id' => 'int'
	];

	protected $dates = [
		'birthdate',
		'appointment_date'
	];

	protected $fillable = [
		'first_name',
		'last_name',
		'birthdate',
		'gender',
		'complaint',
		'allergies',
		'department',
		'appointment_date',
		'service_id',
		'doctors_note',
		'doctor_id',
		'patient_id'
	];
}
