@extends('admaster')

@section('main')
<div class="lates">
  <div class="container">
    <div class="text-center">
    </div>
    @foreach($infor as $show)
    <div class="col-md-4 wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="300ms">
      <img src="/Template/Gui2019/img/4.jpg" class="img-responsive" />
      <h3>{{$show->company_name}}</h3>
      <p>{{$show->info}}
      </p>
    </div>
    @endforeach
  </div>
</div>
@endsection 