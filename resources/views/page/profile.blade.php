 @extends('pagemaster')

 @section('main')
 <div>
    <ol class="breadcrumb">
        <li><a href="{{route('home')}}">ホームページ</a></li>
    </ol>
</div>


<div class="row">
   <div class="col-lg-4 col-xlg-3 col-md-5">
    <div class="card">
        <div class="card-block">
            <center class="m-t-30"> <img src="{{asset(Auth::user()->picture)}}" class="img-circle" width="150" />
                <h4 class="card-title m-t-10"><i class="icon_profile"></i>名前：{{Auth::user()->name}}</h4>
                <h6 class="card-subtitle"><i class="icon_contacts"></i>学生番号：{{Auth::user()->student_code}}</h6>
            </center>
        </div>
    </div>
</div>
<!-- Column -->
<!-- Column -->
<div class="col-lg-8 col-xlg-9 col-md-7">
    <div class="card">
        <div card-block>
            <h4>説明会申し込み一覧<h4>
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>会社名</th>
                            <th>説明会場所</th>
                            <th>開催日</th>
                            <th>アクション</th>
                        </tr>
                    </thead>
                    <tbody>
                     @foreach ($infors as $infor)
                     <tr>
                        <td>{{$loop->index + 1}}</td>
                        <td> {{ $infor->company_name }}</td>
                        <td> {{ $infor->locationInfo }}</td>
                        <td> {{ $infor->date }}</td>
                        <td>
                            <form onsubmit="return confirm('本当に削除しますか?')" action="{{route('cancel')}}" method="POST">
                                @csrf
                                <input type="hidden" name="infor_id" value="{{$infor->id}}">
                                <input type="hidden" name="student_id" value="{{Auth::user()->id}}">
                                <button type="submit" class="btn btn-danger">キャンセル</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <div class="card">
        <div class="card-block">
            <form class="form-horizontal form-material" action="{{route('profile.update')}}" method="POST" enctype="multipart/form-data">
                @csrf
                @foreach ($errors->all() as $error)
                        <p class="text-danger">{{ $error }}</p>
                     @endforeach
                <div class="form-group">
                    <label class="col-md-12">名前</label>
                    <div class="col-md-12">
                        <input type="text" placeholder="{{Auth::user()->name}}" class="form-control form-control-line" name="name" value="{{ old('name', auth()->user()->name) }}">
                    </div>
                </div>
                <div class="form-group">
                    <label for="example-email" class="col-md-12">Eメール</label>
                    <div class="col-md-12">
                        <input type="email" placeholder="{{Auth::user()->email}}" class="form-control form-control-line" name="email" id="example-email" value="{{ old('email', auth()->user()->email) }}">
                    </div>
                </div>



                    <div class="form-group row">
                        <label for="password" class="col-md-4 col-form-label text-md-right">現在のパスワード</label>

                        <div class="col-md-6">
                            <input id="password" type="password" class="form-control" name="current_password" autocomplete="current-password">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="password" class="col-md-4 col-form-label text-md-right">新しいパスワード</label>

                        <div class="col-md-6">
                            <input id="new_password" type="password" class="form-control" name="new_password" autocomplete="current-password">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="password" class="col-md-4 col-form-label text-md-right">新しいパスワード確認</label>

                        <div class="col-md-6">
                            <input id="new_confirm_password" type="password" class="form-control" name="new_confirm_password" autocomplete="current-password">
                        </div>
                    </div>

                <div class="form-group">
                    <label for="example-email" class="col-md-12">学生番号</label>
                    <div class="col-md-12">
                        <input type="email" placeholder="{{Auth::user()->student_code}}" class="form-control form-control-line" name="student_code"value="{{ old('email', auth()->user()->student_code) }}" disabled>
                    </div>
                </div>

                <div class="form-group">
                    <label for="picture" class="col-md-12 col-form-label text-md-right">Profile Image</label>
                    <div class="col-md-12">
                     <input id="picture" type="file" class="form-control" name="picture">
                 </div>
             </div>

            <div class="form-group">
                <div class="col-sm-12">
                    <button class="btn btn-success">Update Profile</button>
                </div>
            </div>
        </form>
    </div>
</div>
<!-- Column -->
@endsection
