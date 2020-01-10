 @extends('pagemaster')

 @section('main')
    <div>
        <ol class="breadcrumb">
            <li><a href="{{route('home')}}">ホームページ</a></li>
        </ol>
    </div>
    <div>
        <form method="POST" action="{{ route('register') }}">
            @csrf
            <div class="text-center">
                <div class="form-group row">
                    <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('名前') }}</label>

                    <div class="col-md-6">
                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                        @error('name')
                        <span class="alert-danger" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Eメールアドレス') }}</label>

                    <div class="col-md-6">
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                        @error('email')
                        <span class="alert-danger" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="student_code" class="col-md-4 col-form-label text-md-right">{{ __('学生番号') }}</label>

                    <div class="col-md-6">
                        <input id="student_code" class="form-control type="text" onkeyup="this.value = this.value.toUpperCase();">
                        <input  type="text" class="form-control @error('student_code') is-invalid @enderror" name="student_code" value="{{ old('student_code') }}" required autocomplete="student_code" autofocus>

                        @error('student_code')
                        <span class="alert-danger" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="seminar_room" class="col-md-4 col-form-label text-md-right">{{ __('研究室') }}</label>
                    <div class="col-md-6">
                        <select class="form-control" name="seminar_room">
                            <option>研究室選択</option>
                            @foreach ($sermina as $select)
                            <option value="{{ $select->serminaName }}"> {{ $select->serminaName }}</option>
                            @endforeach    
                        </select>
                        @error('seminar_room')
                        <span class="alert-danger" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div> 
                </div>
                <div class="form-group row">
                    <label for="grade" class="col-md-4 col-form-label text-md-right">{{ __('年生') }}</label>

                    <div class="col-md-6">
                        <select class="form-control" name="grade"> 

                            <option value="1" selected>1 年生</option>
                            <option value="2">2 年生</option>
                            <option value="3">3 年生</option>
                            <option value="4">4 年生</option>

                        </select>

                        @error('grade')
                        <span class="alert-danger" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('パスワード') }}</label>

                    <div class="col-md-6">
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                        @error('password')
                        <span class="alert-danger" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('もう一度パスワードを入力してください') }}</label>

                    <div class="col-md-6">
                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                         @error('password_confirmation')
                        <span class="alert-danger" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row mb-0">
                    <div class="text-center">
                        <div class="col-md-6 offset-md-4">
                            <button type="submit" class="btn btn-primary">
                                {{ __('アカウントを作成') }}
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </form>                    
</div>
 


@endsection
