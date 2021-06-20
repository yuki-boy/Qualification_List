@extends('layouts.layout')
@section('title', '資格管理')
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
</section>
<!-- モーダルウィンドウ -->

<div class="title_wrapper">
  <h1>{{ Auth::user()->name }}の資格リスト</h1>
  <div id="open"><button type="button" class="btn btn-primary">追加</button></div>
</div>

<div class="count_wrapper">
<h4>{{ $qualis->count() }}個の資格を所有</h4>
</div>

<div class="contents_wrapper">
  <div class="column_wrapper">
    <div style="width: 45%;">資格名</div>
    <div style="width: 20%;">取得月</div>
    <div style="width: 20%;">失効月</div>
    <div style="width: 15%;" colspan="2">操作</div>
  </div>

  <div class="quali_wrapper">
  <form method="post" action="{{ route('update.qualification') }}">
    @csrf
    <ul class="sortable">
      <?php foreach($qualis as $quali) { ?>
      <li id="<?php echo $quali['id']; ?>">
      <div class="each_quali">
      
        <div style="width: 45%;">
          <?php echo $quali->name ?>
        </div>

        <div style="width: 20%;">
        <?php
          if(is_null($quali->get_date)):
            echo "未記入";
          else:
            echo $quali->get_date;
          endif;
        ?>
        </div>

        <div style="width: 20%; opacity: 0.4;">
        <?php 
          if(is_null($quali->lost_date)):
            echo "未記入";
          else:
            echo $quali->lost_date;
          endif;
        ?>
        </div>

        <div class="quali_wrapper_button" style="width: 15%; display: flex;">
          <a href="{{ route('edit.page', ['id' => $quali->id]) }}"><i class="fas fa-edit"></i></a>
          <a href="{{ route('delete.qualification', ['id' => $quali->id]) }}" onclick='return confirm("削除しますか？");'><i class="fas fa-trash-alt"></i></a>
        </div>

      </div>
      </li>
      <?php } ?>
    </ul>

    @if($qualis->count() >= 2)
    <input type="hidden" id="list_ids" name="list_ids" />
    <button id="submit" class="btn btn-primary">並び替え</button>
    @endif
  </form>

    @if($qualis->count() >= 2)
    <input type="hidden" id="list_ids" name="list_ids"/>
    <button id="submit" class="btn btn-primary" style="float: right;">並び替え</button>
    @endif
  </form>
  </div>
</div>


<div id="covor" class="hidden"></div>
@endsection