@extends('layouts.app')

@section('content')

<div class="container">
 <div class="row justify-content-center">
   <div class="col-md-8">
   <form class="form-inline my-2 my-lg-0 ml-2">
      <div class="form-group">
        <input type="search" class="form-control mr-sm-2" name="search"  value="{{request('search')}}" placeholder="キーワードを入力" aria-label="検索...">
      </div>
      <input type="submit" value="検索" class="btn btn-info">
   </form>
     <div class="card">
       <div class="card-header">{{ __('投稿一覧') }}</div>
       <div class="card-body">
         @if (count($errors) > 0)
         <div class="errors">
           <ul>
             @foreach ($errors->all() as $error)
               <li>{{$error}}</li>
             @endforeach
           </ul>
         </div>
         @endif
         <table class="table">
          <thead>
            <tr>
              <th>ユーザー名</th>
              <th>内容</th>
              <th>投稿日時</th>
            </tr>
          </thead>
        <tbody>
         @foreach ($microposts as $micropost)
          <tr>
            <td>{{$micropost->user->name}}</td>
            <td>{!! nl2br(e($micropost->content)) !!}</td>
            <td>{{$micropost->created_at}}</td>
          </tr>
         @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>
</div>
</div>
@endsection