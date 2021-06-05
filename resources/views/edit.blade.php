@extends('layouts.layout')
@section('content')

<div class="fills">
  <form method="post" action="{{ route('edit.qualification', ['id' => $quali->id]) }}">
  @csrf
  <div class="quali_fill">
    <input class="edit_fill" type="text" name="name" value="{{ old('name', $quali->name) }}">
  </div>

  <div class="date_fill">取得月<input type="month" name="get_date" value="{{ old('get_date', $quali->get_date) }}"></div>

  <div class="date_fill">失効月<input type="month" name="lost_date" value="{{ old('lost_date', $quali->lost_date) }}"></div>

  <div class="edit_buttons">
    <a href="{{ route('index') }}">
      <button type="button" class="btn btn-primary">戻る</button>
    </a>
    <button type="submit" class="btn btn-primary">編集</button>
  </div>
  </form>
</div>



@endsection