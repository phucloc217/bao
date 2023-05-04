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
 * @property string $noidung
 * @property string $anh
 * @property bool $trangthai
 * @property int $danhmuc
 * @property Carbon $created_at
 * @property Carbon|null $updated_at
 *
 * @package App\Models
 */
class Baiviet extends Model
{
	protected $table = 'baiviet';

	protected $casts = [
		'trangthai' => 'bool',
		'danhmuc' => 'int'
	];

	protected $fillable = [
		'tieude',
		'noidung',
		'anh',
		'trangthai',
		'danhmuc'
	];
}
