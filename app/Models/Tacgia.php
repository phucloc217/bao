<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Tacgium
 * 
 * @property int $id
 * @property string $tentacgia
 * @property string $email
 * @property string $matkhau
 * 
 * @property Collection|Baiviet[] $baiviets
 *
 * @package App\Models
 */
class Tacgia extends Model
{
	protected $table = 'tacgia';
	public $timestamps = false;

	protected $fillable = [
		'tentacgia',
		'email',
		'matkhau'
	];

	public function baiviets()
	{
		return $this->hasMany(Baiviet::class, 'tacgia');
	}
}
