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
  <table>
    <thead>
      <tr>
        <td style="width: 30%;">資格名</td>
        <td style="width: 20%;">取得月</td>
        <td style="width: 20%;">失効月</td>
        <td style="width: 10%;" colspan="2">操作</td>
      </tr>
    </thead>

    <tbody>
      <div id="each_tr">
      @foreach ($qualis as $quali)
      <tr>
        <td>{{ $quali->name }}</td>

        @if(is_null($quali->get_date))
        <td>未記入</td>
        @else
        <td>{{ $quali->get_date }}</td>
        @endif

        @if(is_null($quali->lost_date))
        <td style="opacity: 0.4;">未記入</td>
        @else
        <td style="opacity: 0.4;">{{ $quali->lost_date }}</td>
        @endif

        <td><a href="{{ route('edit.page', ['id' => $quali->id]) }}"><button type="button" class="btn btn-primary">編集</button></a></td>
        <td><a href="{{ route('delete.qualification', ['id' => $quali->id]) }}"><button type="button" class="btn btn-primary" style="margin-left: 5px">削除</button></a></td>
      </tr>
      @endforeach
      </div>
    </tbody>
  </table>
</div>


<div id="covor" class="hidden"></div>
@endsection