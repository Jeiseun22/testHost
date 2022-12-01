<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Service
 * 
 * @property int $service_id
 * @property string $services
 *
 * @package App\Models
 */
class Service extends Model
{
	protected $table = 'services';
	protected $primaryKey = 'service_id';
	public $timestamps = false;

	protected $fillable = [
		'services'
	];
}
