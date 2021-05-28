@extends('layouts.layout')
@section('content')

{{ Auth::user()->name }}の資格リスト


<div id="open">
<button type="button" class="btn btn-primary">追加</button>
</div>




<section id="modal" class="hidden">
<p>こんにちは。こんにちは。こんにちは。こんにちは。こんにちは。こんにちは。こんにちは。こんにちは。こんにちは。こんにちは。</p>
<div id="close"><button type="button" class="btn btn-primary">閉じる</button></div>
</section>

<div id="covor" class="hidden"></div>
@endsection