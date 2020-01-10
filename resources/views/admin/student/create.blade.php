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
        <label for="name" class="col-md-4 col-form-label text-md-right">名前:</label>
        <input type="text" class="form-control" name="name" required>
        @error('name')
          <span class="alert-danger" role="alert">
              <strong>{{ $message }}</strong>
          </span>
          @enderror
      </div>
    </div>
    <div class="form-row">
      <div class="form-group col-md-6">
        <label for="student_code" class="col-md-4 col-form-label text-md-right">学生番号:</label>
        <input type="text" class="form-control" name="student_code" required>
        @error('student_code')
          <span class="alert-danger" role="alert">
              <strong>{{ $message }}</strong>
          </span>
          @enderror
      </div>
    </div>
    <div class="form-row">
      <div class="form-group col-md-6">
        <label for="password" class="col-md-4 col-form-label text-md-right">パスワード:</label>
        <input id="password" type="password" class="form-control" name="password" required>
        @error('password')
          <span class="alert-danger" role="alert">
              <strong>{{ $message }}</strong>
          </span>
          @enderror
      </div>
    </div>
    <div class="form-row">
      <label for="password-confirm" class="col-md-4 col-form-label text-md-right">パスワード確認</label>
      <div class="col-md-6">
          <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
          @error('password_confirmation')
          <span class="alert-danger" role="alert">
              <strong>{{ $message }}</strong>
          </span>
          @enderror
      </div>
  </div>
    <div class="form-row">
      <div class="form-group col-md-6">
        <label for="email" class="col-md-4 col-form-label text-md-right">メール:</label>
        <input id="email" type="email" class="form-control" name="email">
        @error('email')
          <span class="alert-danger" role="alert">
              <strong>{{ $message }}</strong>
          </span>
          @enderror
      </div>
    </div>
    <div class="form-row">
      <div class="form-group col-md-6">
        <label for="seminar_room" class="col-md-4 col-form-label text-md-right">研究室:</label>
        <select class="form-control" name="seminar_room">
          <option>研究室選択</option>
          @foreach ($sermina as $select)
          <option value="{{ $select->serminaName }}"> {{ $select->serminaName }}</option>
          @endforeach    
      </select>
      </div>
    </div>
    <div class="form-row">
      <div class="form-group col-md-6">
        <label for="grade" class="col-md-4 col-form-label text-md-right">年生:</label>
        <select class="form-control input-sm m-bot15" name="grade">
          <option value="1">1年</option>
          <option value="2">２年</option>
          <option value="3">３年</option>
          <option value="4">４年</option>
        </select> 
      </div>
    </div>
    <div class="form-row">
      <div class="form-group col-md-6 form-inline">
        <label for="isAdmin" class="col-md-4 col-form-label text-md-right">レベル:</label>
          <input type="radio" name="isAdmin" value="" checked>一般 
          <input type="radio" name="isAdmin" value=1>　管理者
        </div>
      </div>
      <div class="form-row text-center">
        <button type="submit" class="btn btn-primary">追加</button>
        <a style="margin: 19px;" href="{!! url('admin/student') !!}" class="btn btn-danger">キャンセル</a>
      </div>
    </form>
  </div>
</div>
</div>
@endsection