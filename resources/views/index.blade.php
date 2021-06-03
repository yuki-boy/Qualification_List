@extends('layouts.layout')
@section('content')

@if(session('success'))
  <div class="alert alert-success alert-dismissible fade show" role="alert" id="timeout">
  {{ session('success') }}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
@endif

<div class="title_wrapper">
  <h1>{{ Auth::user()->name }}の資格リスト</h1>
  <div id="open"><button type="button" class="btn btn-primary">追加</button></div>
</div>

<main>
  <div class="contents_wrapper">
  <table>
    <thead>
      <tr>
        <td style="width: 30%;">資格名</td>
        <td style="width: 30%;">取得した年月</td>
        <td style="width: 20%;" colspan="2">操作</td>
      </tr>
    </thead>


    <tbody>
      @foreach ($qualis as $quali)
        <tr>
          <td>{{ $quali->name }}</td>
          @if(is_null($quali->get_date))
          <td>未記入</td>
          @else
          <td>{{ $quali->get_date }}</td>
          @endif
          <td><a href="{{ route('edit.page', ['id' => $quali->id]) }}"><button type="button" class="btn btn-primary">編集</button></a></td>
          <td><a href="{{ route('delete.qualification', ['id' => $quali->id]) }}"><button type="button" class="btn btn-primary">削除</button></a></td>
        </tr>
      @endforeach
    </tbody>
  </table>
  </div>
</main>


<!-- モーダルウィンドウ -->
<section id="modal" class="hidden">
<form method="post" action="{{ route('save.qualification') }}">
@csrf
  <input type="text" name="name" placeholder="資格名を入力して下さい"><br>

  <input type="month" name="get_date" placeholder="取得した年月">

  <input type="submit" name="create" value="追加">
</form>
<div id="close"><button type="button" class="btn btn-primary">閉じる</button></div>
</section>

<div id="covor" class="hidden"></div>
@endsection