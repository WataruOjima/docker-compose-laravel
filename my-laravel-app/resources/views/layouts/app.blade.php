<!DOCTYPE html>
<html lang="ja">
<head>
 <meta charset="utf-8">
 <meta name="viewport" content="width=device-width, initial-scale=1">

 <!-- CSRF Token -->
 <meta name="csrf-token" content="{{ csrf_token() }}">

 <title>{{ config('app.name', 'Laravel') }}</title>

 <!-- Scripts -->
 <script src="{{ asset('js/app.js') }}" defer></script>
 <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
 <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>

 <!-- Fonts -->
 <link rel="dns-prefetch" href="//fonts.gstatic.com">
 <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

 <!-- Styles -->
 <link rel="stylesheet" type="text/css" href="/css/bootstrap.css">
 <link href="{{ asset('css/custom.css') }}" rel="stylesheet">
</head>
<body>
 <div id="app">
   <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
     <div class="container">
       <a class="navbar-brand" href="{{ url('/') }}">
           {{ config('app.name', 'Laravel') }}
       </a>
       <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
           <span class="navbar-toggler-icon"></span>
       </button>

       <div class="collapse navbar-collapse" id="navbarSupportedContent">
         <!-- Left Side Of Navbar -->
         <ul class="navbar-nav mr-auto">
         </ul>

         <!-- Right Side Of Navbar -->
         <ul class="navbar-nav ml-auto">
           <!-- Authentication Links -->
           @guest
             <li class="nav-item">
                 <a class="nav-link" href="{{route('user.signin')}}">{{ __('ログイン') }}</a>
             </li>
             <li class="nav-item">
                 <a class="nav-link" href="{{route('user.create')}}">{{ __('新規登録') }}</a>
             </li>
           @else
             <li class="nav-item">
                 <a class="nav-link" href="{{route('micropost.index')}}">{{ __('ホーム') }}</a>
             </li>
             <li class="nav-item">
               <a class="nav-link" href="{{route('user.index')}}">{{ __('ユーザ一覧') }}</a>
             </li>
             <li class="nav-item">
               <a class="nav-link" href="{{route('micropost.input')}}">{{ __('投稿') }}</a>
             </li>
             <li class="nav-item dropdown">
               <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                 アカウント <span class="caret"></span>
               </a>

               <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
               <a class="dropdown-item" href="{{route('user.edit', ['user' => Auth::user()->id])}}">アカウント変更</a>
                 <a class="dropdown-item" href=""
                   onclick="event.preventDefault();
                                 document.getElementById('logout-form').submit();">
                   {{ __('ログアウト') }}
                 </a>
                 <form id="logout-form" action="{{route('user.logout')}}" method="POST" style="display: none;">
                   @csrf
                 </form>
               </div>
             </li>
           @endguest
         </ul>
       </div>
     </div>
   </nav>

   <!-- フラッシュメッセージ -->
   @if (Session::has('flash_message'))
     <p class="bg-success">{!! Session::get('flash_message') !!}</p>
   @endif

   @if (Session::has('error_message'))
     <p class="bg-danger">{!! Session::get('error_message') !!}</p>
   @endif

   <main class="py-4">
     @yield('content')
   </main>
 </div>
</body>
</html>