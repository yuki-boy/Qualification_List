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
  {{ $quali->get_date }}
 <a href="{{ route('delete.qualification', ['id' => $quali->id]) }}">削除</a>
 </p>
@endforeach

  </div>
</main>



<section id="modal" class="hidden">
<form method="post" action="{{ route('save.qualification') }}">
@csrf
  <input type="text" name="name" placeholder="資格名を入力して下さい"><br>



  <!-- 資格取得の年月を入力 -->
  <!-- <select name="get_date" class="js-changeMonth">
    <option value="2000">2000</option>
    <option value="2001">2001</option>
  </select> 年
  
  <select name="get_date" class="js-changeMonth">
    <option value=""></option>
    <option value="1">1</option>
    <option value="2">2</option>
  </select> 月 -->
  
  <select type="int" name="get_date">
    <option value="">--</option>
    <?php foreach(range(1920,2021) as $year): ?>
    <option value="<?=$year?>"><?=$year?></option>
    <?php endforeach; ?>
  </select>

  <select>
    <option value="int" name="get_date">--</option>
    <?php foreach(range(1,12) as $month): ?>
    <option value="<?=str_pad($month,2,0,STR_PAD_LEFT)?>"><?=$month?></option>
    <?php endforeach; ?>
  </select>



  <input type="submit" name="create" value="追加">
</form>
<div id="close"><button type="button" class="btn btn-primary">閉じる</button></div>
</section>

<div id="covor" class="hidden"></div>
@endsection