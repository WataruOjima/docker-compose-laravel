<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * ユーザの投稿データを取得
     */
    public function microposts()
    {
        return $this->hasMany('App\Micropost');
    }

    /**
     * The attributes that are mass assignable.
     * 
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'admin_flg', 
    ];
    /**
     * ユーザ登録/更新
     */
    public function userSave($params)
        $isResist = $this ->fill($params)->save()
        return $isResist;
    }
}
