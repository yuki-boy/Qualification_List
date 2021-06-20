<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>@yield('title')</title>

  <!-- Scripts -->
  <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
  <script src="https://code.jquery.com/ui/1.12.0/jquery-ui.js"></script>
  <script src="{{ asset('js/index.js') }}" defer></script>

  <!-- Fonts -->
  <link rel="dns-prefetch" href="//fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

  <!-- Styles -->
  <link href="{{ asset('css/app.css') }}" rel="stylesheet">
  <link href="{{ asset('css/index.css') }}" rel="stylesheet">
  <link href="https://use.fontawesome.com/releases/v5.15.1/css/all.css" rel="stylesheet">
</head>
<body>
  <div id="app">


<nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
    <div class="container">
        <a class="navbar-brand" href="{{ route('index') }}">
            資格管理
        </a>
        

        <form action="{{ route('logout') }}" method="post" name="form_1" id="form_1" onclick='return confirm("ログアウトしますか？");'>
        @csrf
        <!-- <button>ログアウト</button> -->
<<<<<<< HEAD
        <a class="header_a" href="javascript:form_1.submit()">ログアウト</a>
        </form>
=======
        <span style="cursor: pointer;">ログアウト</span>
        </form> 
>>>>>>> new-dev
    </div>
</nav>

    <main class="py-4">
        @yield('content')
    </main>
  </div>
</body>
</html>
