@extends('layouts.layout')
@section('content')

{{ Auth::user()->name }}の資格リスト


<div id="open">
<button type="button" class="btn btn-primary">追加</button>
</div>




<section id="modal" class="hidden">
<form method="post" action="{{ route('save.qualification') }}">
@csrf
  <input type="text" name="qualifications">

  
  <input type="submit" name="create" value="追加">
</form>
<div id="close"><button type="button" class="btn btn-primary">閉じる</button></div>
</section>

<div id="covor" class="hidden"></div>
@endsection