<?php

namespace App\Resume\Entity;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    // 資料庫名稱
    protected $table = 'users';

    // 主鍵名稱
    protected $primaryKey = 'id';

    // 指定異動的欄位
    protected $fillable = [
        'photo',
        'lastname',
        'firstname',
        'email',
        'password',
        'sex',
        'birthday',
        'location',
        'phone',
        'lang',
        'bio',
        'skills',
    ];

    public function experience()
    {
        return $this->hasMany('App\Resume\Entity\Experience');
    }

    public function education()
    {
        return $this->hasMany('App\Resume\Entity\Education');
    }
}
