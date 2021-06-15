@extends('layouts.layout')
@section('content')

<!-- 追加・削除・編集時のアラート表示 -->
@if(session('success'))
  <div class="alert alert-success alert-dismissible fade show" role="alert" id="timeout">
  {{ session('success') }}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
@endif
<!-- 追加・削除・編集時のアラート表示 -->

<!-- モーダルウィンドウ -->
<section id="modal" class="hidden">
<form method="post" action="{{ route('save.qualification') }}">
  @csrf
  <div class="fills">
    <div class="quali_fill"><input type="text" name="name" placeholder="資格名を入力して下さい" style="width: 80%;"></div>

    <div class="date_fill">取得月 <input type="month" name="get_date"></div>
    <div class="date_fill">失効月 <input type="month" name="lost_date"></div>    

    <div class="modal_buttons">
      <button type="button" id="close" class="btn btn-primary">閉じる</button>
      <button type="submit" class="btn btn-primary">追加</button>
    </div>
  </div>
</form>
<!-- <div id="close"><button type="button" class="btn btn-primary">閉じる</button></div> -->
</section>
<!-- モーダルウィンドウ -->

<div class="title_wrapper">
  <h1>{{ Auth::user()->name }}の資格リスト</h1>
  <div id="open"><button type="button" class="btn btn-primary">追加</button></div>
</div>

<div class="contents_wrapper">

<div class="contents_wrapper">
  <td style="width: 30%;">資格名</td>
  <td style="width: 20%;">取得月</td>
  <td style="width: 20%;">失効月</td>
  <td style="width: 10%;" colspan="2">操作</td>
</div>


  <form method="post" action="">
    @csrf
    <ul class="sortable">
      <?php foreach($qualis as $quali) { ?>
      <li id="<?php echo $quali['id']; ?>">
      <?php echo $quali->name?>

      <?php
        if(is_null($quali->get_date)):
          echo "未記入";
        else:
          echo $quali->get_date;
        endif;
      ?>

      <?php 
        if(is_null($quali->lost_date)):
          echo "未記入";
        else:
          echo $quali->lost_date;
        endif;
      ?>

      <a href="{{ route('edit.page', ['id' => $quali->id]) }}"><button type="button" class="btn btn-primary">編集</button></a>
      <a href="{{ route('delete.qualification', ['id' => $quali->id]) }}"><button type="button" class="btn btn-primary" style="margin-left: 5px">削除</button></a>

      </li>
      <?php } ?>
    </ul>
    <input type="hidden" id="sort_num" name="sort_num" />
    <button id="submit">更新</button>
  </form>

</div>


<div id="covor" class="hidden"></div>
@endsection