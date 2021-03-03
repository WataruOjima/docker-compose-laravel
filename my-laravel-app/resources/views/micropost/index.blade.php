@extends('layouts.app')

@section('content')
<form action="{{ route('users.search') }}" method="post">
    @csrf
    <div class='row'>
        <div class='col-md-6'>
            <div class='form-group'>
                <input name="name" />
            </div>
        </div>
        <div class='col-md-6'>
            <div class='form-group'>
                <input name="address" />
            </div>
        </div>
    </div>
    <div style="text-align: center;">
        <button class='btn-default'>検索</button>
    </div>
</form>

<div class="container">
 <div class="row justify-content-center">
   <div class="col-md-8">
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