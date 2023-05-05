<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Danhmuc
 * 
 * @property int $id
 * @property string $tendanhmuc
 * @property string|null $slug
 * 
 * @property Collection|Baiviet[] $baiviets
 *
 * @package App\Models
 */
class Danhmuc extends Model
{
	protected $table = 'danhmuc';
	public $timestamps = false;

	protected $fillable = [
		'tendanhmuc',
		'slug'
	];

	public function baiviets()
	{
		return $this->hasMany(Baiviet::class, 'danhmuc');
	}
}
