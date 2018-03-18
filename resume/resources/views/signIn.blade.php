<!-- 指定繼承 layout.auth 母模板 -->
@extends('layout.auth')

<!-- 傳送資料到母模板，並指定變數為 title -->
@section('title', $title)

<!-- 傳送資料到母模板，並指定變數為 content -->
@section('content')
    <section class="container g-py-100">
        <div class="row justify-content-center">
            <div class="col-sm-8 col-lg-5">
                <div class="g-brd-around g-brd-gray-light-v4 rounded g-py-40 g-px-30">
                    <header class="text-center mb-4">
                        <h2 class="h2 g-color-black g-font-weight-600">電子名片</h2>
                    </header>

                    <!-- 錯誤訊息模板元件 -->
                    @include('components.validatorErrorMessage')

                    <form class="g-py-15" action="/sign-in" method="post">
                        <div class="mb-4">
                            <input class="form-control g-color-black g-bg-white g-bg-white--focus g-brd-gray-light-v4 g-brd-blue--hover rounded g-py-15 g-px-15" type="email" name="email" placeholder="Email" value="{{ old('email') }}">
                        </div>
                        <div class="g-mb-35">
                            <input class="form-control g-color-black g-bg-white g-bg-white--focus g-brd-gray-light-v4 g-brd-blue--hover rounded g-py-15 g-px-15 mb-3" type="password" name="password" placeholder="密碼" value="{{ old('password') }}">
                        </div>
                        <div class="mb-4">
                            <button class="btn btn-md btn-block u-btn-blue g-rounded-50 g-py-13" type="submit">登入</button>
                        </div>

                        <!-- CSRF 欄位 -->
                        {!! csrf_field() !!}
                        
                    </form>
                    <footer class="text-center">
                        <p class="g-color-gray-dark-v5 g-font-size-13 mb-0">還沒有帳號嗎？ <a class="g-font-weight-600 g-color-blue" href="/sign-up">註冊</a></p>
                    </footer>
                </div>
            </div>
        </div>
    </section>
@endsection