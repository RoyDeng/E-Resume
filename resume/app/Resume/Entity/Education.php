<?php

namespace App\Resume\Entity;

use Illuminate\Database\Eloquent\Model;

class Education extends Model
{
    // 資料庫名稱
    protected $table = 'education';

    // 主鍵名稱
    protected $primaryKey = 'id';

    // 指定異動的欄位
    protected $fillable = [
        'user_id',
        'from',
        'to',
        'school',
        'department',
        'description',
    ];

    public function user()
    {
        return $this->belongsTo('App\Resume\Entity\User');
    }
}
