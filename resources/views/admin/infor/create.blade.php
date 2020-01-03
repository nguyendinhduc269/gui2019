@extends('admaster')

@section('style')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
  <link rel="stylesheet" href="https://npmcdn.com/flatpickr/dist/themes/material_blue.css">
@endsection

@section('main')
<div class="row">
 <div class="col-sm-8 offset-sm-2">
  <h1 class="display-3">会社追加</h1>
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
    <form method="post" action="{{ route('infor.store')}}">
      @csrf
      <div class="form-row">
        <div class="form-group col-md-6">
          <label for="company_name">会社名:</label>
          <input type="text" class="form-control" name="company_name">
        </div>
      </div>
      <div class="form-row">
        <div class="form-group col-md-6">
          <label for="locationInfo">説明会場所:</label>
          <input type="text" class="form-control" name="locationInfo">
        </div>
      </div>
      <div class="form-row">
        <div class="form-group col-md-6">
          <label for="locationInfo">会社ホームページ:</label>
          <input type="text" class="form-control" name="url">
        </div>
      </div>
      <div class="form-row">
        <div class="form-group col-md-6">
          <label for="date">開催日:</label>
          <input type="text" class="form-control" id="date" name="date">
        </div>
      </div>
      <div class="form-row">
        <div class="form-group col-md-6">
          <label for="recruited_occupation">企業業種:</label>
          <input type="text" class="form-control" name="recruited_occupation">
        </div>
      </div>
      <div class="form-row">
        <div class="form-group col-md-6">
          <label for="written_test">筆記試験:</label>
          <select class="form-control input-sm m-bot15" name="written_test">
            <option>有り</option>
            <option>無し</option>
            <option>不明</option>
          </select> 
        </div>
      </div>
      <div class="form-row">
        <div class="form-group col-md-6">
          <label for="written_test_content">筆記試験内容:</label>
          <select class="form-control input-sm m-bot15" name="written_test_content">
            <option>有り</option>
            <option>無し</option>
            <option >不明</option>
            <option >SPI検査</option>
          </select> 
        </div>
      </div>
      <div class="form-row">
        <div class="form-group col-md-6">
          <label for="interview">面接:</label>
          <input type="text" class="form-control" name="interview">
        </div>
      </div>
      <div class="form-row">
        <div class="form-group col-md-6">
          <label for="industry">採用職種:</label>
          <input type="text" class="form-control" name="industry">
        </div>
      </div>
      <div class="form-row">
        <div class="form-group col-md-6">
          <label for="qualification">求める資格:</label>
          <input type="text" class="form-control" name="qualification">
        </div>
      </div>
      <div class="form-row">
        <div class="form-group col-md-6">
          <label for="country">歓迎する国籍:</label>
          <input type="text" class="form-control" name="country">
        </div>
      </div>
      <div class="form-row">
        <div class="form-group col-md-6">
          <label for="age_limit">年齢制限:</label>
          <input type="text" class="form-control" name="age_limit">
        </div>
      </div>
      <div class="form-row">
        <div class="form-group col-md-6">
          <label for="grade">対象学年:</label>
          <select class="form-control input-sm m-bot15" name="grade">
            <option>4年生</option>
            <option>３年生も可</option>
          </select>
        </div>
      </div>
      <div class="form-row">
        <div class="form-group col-md-6">
          <label for="graduate">既卒者受け入れ:</label>
          <select class="form-control input-sm m-bot15" name="graduate">
            <option>有り</option>
            <option>無し</option>
          </select>
        </div>
      </div>
      <div class="form-row">
        <div class="form-group col-md-6">
          <label for="part_time_job">アルバイト受け入れ:</label>
          <select class="form-control input-sm m-bot15" name="part_time_job">
            <option>有り</option>
            <option>無し</option>
          </select>
        </div>
      </div>
      <div class="form-row">
        <div class="form-group col-md-6">
          <label for="intership">インターシップ:</label>
          <select class="form-control input-sm m-bot15" name="intership">
            <option>有り</option>
            <option>無し</option>
          </select>
        </div>
      </div>
      <div class="form-row">
        <div class="form-group col-md-6">
          <label for="condidate">卒業内定者:</label>
          <select class="form-control input-sm m-bot15" name="condidate">
            <option>有り</option>
            <option>無し</option>
          </select>
        </div>
      </div>

      <div class="text-center">
                <button type="submit" class="btn btn-primary">追加</button>
                <a style="margin: 19px;" href="{!! url('admin/infor') !!}" class="btn btn-danger">キャンセル</a>
            </div>
    </form>
  </div>
</div>
</div>
@endsection

@section('scripts')
  <script src="https://npmcdn.com/flatpickr/dist/flatpickr.min.js"></script>
  <script src="https://npmcdn.com/flatpickr/dist/l10n/ja.js"></script>
  <script>
    flatpickr(document.getElementById('date'), {
      locale: 'ja',
      dateFormat: "Y-m-d",
      minDate: new Date()
    });
  </script>
  @endsection