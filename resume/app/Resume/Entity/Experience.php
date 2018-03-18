<?php

namespace App\Resume\Entity;

use Illuminate\Database\Eloquent\Model;

class Experience extends Model
{
    // 資料庫名稱
    protected $table = 'experience';

    // 主鍵名稱
    protected $primaryKey = 'id';

    // 指定異動的欄位
    protected $fillable = [
        'user_id',
        'from',
        'to',
        'company',
        'position',
        'description',
    ];

    public function user()
    {
        return $this->belongsTo('App\Resume\Entity\User');
    }
}
