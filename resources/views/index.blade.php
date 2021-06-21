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

index


<div id="covor" class="hidden"></div>
@endsection