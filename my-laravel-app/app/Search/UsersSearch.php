<?php
namespace App\Search;

use Search\Searchable;

class UsersSearch extends Searchable
{
    public function __construct()
    {
        $this->params = [
            // ここに検索条件を記載します
            // サンプルでは名前 と 住所を検索できるようにします
            'name' => [
                'type' => 'value'
            ],
            'address' => [
                'type' => 'like'
            ],
        ];
    }
}