<?php

namespace App\Http\Controllers;
use App\Micropost; 

use Illuminate\Http\Request;

class MicropostController extends Controller
{
    /**
     * 投稿一覧表示アクション
     */
     public function index()
     {
         $microposts = Micropost::getAll();
         $viewParams = [
             'microposts' => $microposts,
         ];
         return view('micropost.index', $viewParams);
     }

     /**
      * 投稿フォーム表示アクション
      */
      public function input()
      {
          return view('micropost.input');
      }
}