<!-- 指定繼承 layout.auth 母模板 -->
@extends('layout.auth')

<!-- 傳送資料到母模板，並指定變數為 title -->
@section('title', $title)

<!-- 傳送資料到母模板，並指定變數為 content -->
@section('content')
    <section class="container g-py-100">
        <div class="row justify-content-center">
            <div class="col-sm-10 col-md-9 col-lg-6">
                <div class="g-brd-around g-brd-gray-light-v4 rounded g-py-40 g-px-30">
                    <header class="text-center mb-4">
                        <h2 class="h2 g-color-black g-font-weight-600">電子名片</h2>
                    </header>

                    <!-- 錯誤訊息模板元件 -->
                    @include('components.validatorErrorMessage')

                    <form class="g-py-15" action="/sign-up" method="post">
                        <div class="row">
                            <div class="col-xs-12 col-sm-6 mb-4">
                                <input class="form-control g-color-black g-bg-white g-bg-white--focus g-brd-gray-light-v4 g-brd-blue--hover rounded g-py-15 g-px-15" type="text" name="lastname" placeholder="姓氏">
                            </div>
                            <div class="col-xs-12 col-sm-6 mb-4">
                                <input class="form-control g-color-black g-bg-white g-bg-white--focus g-brd-gray-light-v4 g-brd-blue--hover rounded g-py-15 g-px-15" type="text" name="firstname" placeholder="姓名">
                            </div>
                        </div>
                        <div class="mb-4">
                            <input class="form-control g-color-black g-bg-white g-bg-white--focus g-brd-gray-light-v4 g-brd-blue--hover rounded g-py-15 g-px-15" type="email" name="email" placeholder="Email">
                        </div>
                        <div class="row">
                            <div class="col-xs-12 col-sm-6 mb-4">
                                <input class="form-control g-color-black g-bg-white g-bg-white--focus g-brd-gray-light-v4 g-brd-blue--hover rounded g-py-15 g-px-15" type="password" name="password" placeholder="密碼">
                            </div>
                            <div class="col-xs-12 col-sm-6 mb-4">
                                <input class="form-control g-color-black g-bg-white g-bg-white--focus g-brd-gray-light-v4 g-brd-blue--hover rounded g-py-15 g-px-15" type="password" name="password_confirmation" placeholder="確認密碼">
                            </div>
                        </div>
                        <button class="btn btn-md btn-block u-btn-blue g-rounded-50 g-py-13 mb-4" type="submit">註冊</button>

                        <!-- CSRF 欄位 -->
                        {!! csrf_field() !!}
                        
                    </form>
                    <footer class="text-center">
                        <p class="g-color-gray-dark-v5 g-font-size-13 mb-0">已經有帳號了？ <a class="g-font-weight-600 g-color-blue" href="/sign-in">登入</a></p>
                    </footer>
                </div>
            </div>
        </div>
    </section>
@endsection