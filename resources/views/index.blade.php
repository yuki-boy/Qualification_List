@extends('layouts.layout')
@section('content')

<main>
  <div class="contents_wrapper">

<h2>{{ Auth::user()->name }}の資格リスト</h2>

<div id="open">
<button type="button" class="btn btn-primary">追加</button>
</div>


@foreach ($qualis as $quali)
 <p>
  {{ $quali->name }}
 <a href="{{ route('delete.qualification', ['id' => $quali->id]) }}">削除</a>
 </p>
@endforeach

  </div>
</main>



<section id="modal" class="hidden">
<form method="post" action="{{ route('save.qualification') }}">
@csrf
  <input type="text" name="name" placeholder="資格名を入力して下さい">

  <input type="submit" name="create" value="追加">
</form>
<div id="close"><button type="button" class="btn btn-primary">閉じる</button></div>
</section>

<div id="covor" class="hidden"></div>
@endsection