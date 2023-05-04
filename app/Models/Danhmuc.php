<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Danhmuc
 * 
 * @property int $id
 * @property string $tendanhmuc
 * @property string|null $slug
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
}
