<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Schedule
 * 
 * @property int $sched_id
 * @property string $days
 * @property string $start_time
 * @property string $end_time
 *
 * @package App\Models
 */
class Schedule extends Model
{
	protected $table = 'schedules';
	protected $primaryKey = 'sched_id';
	public $timestamps = false;

	protected $fillable = [
		'days',
		'start_time',
		'end_time'
	];
}
