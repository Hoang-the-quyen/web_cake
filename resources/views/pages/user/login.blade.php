@extends('index')
@section('main')
    <!-- Class Section Begin -->
    <section style="margin-top: 50px" class="class spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="class__form">
                        <div class="section-title">
                            <h2>Login</h2>
                        </div>
                        <form action="{{route('login')}}" method="post">
                            @csrf
                            <input type="email" name="email" placeholder="Email">
                            <input type="password" name="password" placeholder="Password">
                            <button type="submit" class="site-btn">Login</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="class__video set-bg" data-setbg="{{asset('frontend/img/class-video.jpg')}}">
                <a href="https://www.youtube.com/watch?v=7BH3AOCe_EA"
                class="play-btn video-popup"><i class="fa fa-play"></i></a>
            </div>
        </div>
    </section>
    <!-- Class Section End -->
@endsection