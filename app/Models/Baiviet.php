<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Baiviet
 * 
 * @property int $id
 * @property string $tieude
 * @property string|null $tomtat
 * @property string $noidung
 * @property string|null $slug
 * @property string $anh
 * @property bool $trangthai
 * @property int|null $danhmuc
 * @property int|null $tacgia
 * @property Carbon $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Tacgium|null $tacgium
 *
 * @package App\Models
 */
class Baiviet extends Model
{
	protected $table = 'baiviet';

	protected $casts = [
		'trangthai' => 'bool',
		'danhmuc' => 'int',
		'tacgia' => 'int'
	];

	protected $fillable = [
		'tieude',
		'tomtat',
		'noidung',
		'slug',
		'anh',
		'trangthai',
		'danhmuc',
		'tacgia'
	];

	public function chuyenmuc()
	{
		return $this->belongsTo(Danhmuc::class, 'danhmuc');
	}

	public function tacgia()
	{
		return $this->belongsTo(Tacgia::class, 'tacgia');
	}
}
