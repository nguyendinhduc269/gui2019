@extends('admaster')

@section('main')
<div class="row">
 <div class="col-sm-8 offset-sm-2">
  <h1 class="display-3">アカウント追加</h1>
  <div>
    @if ($errors->any())
    <div class="alert alert-danger">
      <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
      </ul>
    </div><br />
    @endif
    <form method="post" action="{{ route('student.store')}}">
      @csrf
     <div class="form-row">
      <div class="form-group col-md-6">
        <label for="name">名前:</label>
        <input type="text" class="form-control" name="name">
      </div>
    </div>
    <div class="form-row">
      <div class="form-group col-md-6">
        <label for="student_code">学生番号:</label>
        <input type="text" class="form-control" name="student_code">
      </div>
    </div>
    <div class="form-row">
      <div class="form-group col-md-6">
        <label for="password">パスワード:</label>
        <input type="password" class="form-control" name="password">
      </div>
    </div>
    <div class="form-row">
      <div class="form-group col-md-6">
        <label for="email">メール:</label>
        <input type="email" class="form-control" name="email">
      </div>
    </div>
    <div class="form-row">
      <div class="form-group col-md-6">
        <label for="seminar_room">研究室:</label>
        <select class="form-control input-sm m-bot15" name="seminar_room">
          <option>有り</option>
          <option>無し</option>
          <option>不明</option>
        </select> 
      </div>
    </div>
    <div class="form-row">
      <div class="form-group col-md-6">
        <label for="grade">年生:</label>
        <select class="form-control input-sm m-bot15" name="grade">
          <option>1年</option>
          <option>２年</option>
          <option>３年</option>
          <option>４年</option>
        </select> 
      </div>
    </div>
    <div class="form-row">
      <div class="form-group col-md-6">
        <label for="isAdmin">レベル:</label>
          <input type="radio" name="isAdmin" value="">一般 
          <input type="radio" name="isAdmin" value=1>　管理者
        </div>
      </div>
      <div class="text-center">
        <button type="submit" class="btn btn-primary">追加</button>
        <a style="margin: 19px;" href="{!! url('admin/student') !!}" class="btn btn-danger">キャンセル</a>
      </div>
    </form>
  </div>
</div>
</div>
@endsection