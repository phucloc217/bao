<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Cviebrock\EloquentSluggable\Sluggable;
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
 * @property Tacgia|null $tacgia
 *
 * @package App\Models
 */
class Baiviet extends Model
{
	use Sluggable;
	protected $table = 'baiviet';

	protected $casts = [
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

	public function user()
	{
		return $this->belongsTo(User::class, 'tacgia');
	}
	public function sluggable():array
    {
        return [
            'slug' => [
                'source' => 'tieude'
            ]
        ];
	}
}
