<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Department
 * 
 * @property int $department_id
 * @property string $department
 * @property int $doctor_id
 *
 * @package App\Models
 */
class Department extends Model
{
	protected $table = 'department';
	protected $primaryKey = 'department_id';
	public $timestamps = false;

	protected $casts = [
		'doctor_id' => 'int'
	];

	protected $fillable = [
		'department',
		'doctor_id'
	];
}
