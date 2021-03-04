<?php

namespace App\Http\Controllers;
use App\Micropost; 
use Auth;
use App\Http\Requests\MicropostRequest;
use Illuminate\Http\Request;

class MicropostController extends Controller
{
    /**
     * 投稿一覧表示アクション
     */
     public function index(Request $request)
    {
        if ($request->filled('keyword')) {
            $keyword = $request->input('keyword');
            $content = '検索キーワード: '.$keyword;
            $microposts = Micropost::where('content', 'like', '%'.$keyword.'%')->get();
        }else{
            $content = "検索キーワードを入力してください。";
            $microposts = Micropost::all();
        }
        return view('micropost.index', ['content' => $content, 'microposts' => $microposts]);
     }

        //  $microposts = Post::orderBy('created_at', 'asc')->where(function ($query) {
        //      // 検索機能
        //      if ($search = request('search')) {
        //         $query->where('content', 'LIKE', "%{$search}%")->orWhere('name','LIKE',"%{$search}%")
        //         ;
        //      }
        // });
     

     /**
      * 投稿フォーム表示アクション
      */
      public function input()
      {
          return view('micropost.input');
      }

      /**
       * 投稿処理アクション
       */
      public function post(MicropostRequest $request)
      {
          $content      =  $request->input('content');
          $micropost    =  new Micropost;
          $params = [
              'user_id' =>  Auth::id(),
              'content' =>  $content,
          ];
          if(!$micropost->micropostSave($params)) {
              // 登録失敗
              return redirect()->route('micropost.input')->with('error_message', 'Regist micropost failed');
          }
          return redirect()->route('micropost.index')->with('flash_message', 'Regist success!!');
      }
}