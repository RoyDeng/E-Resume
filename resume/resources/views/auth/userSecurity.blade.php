<!-- 指定繼承 layout.master 母模板 -->
@extends('layout.master')

<!-- 傳送資料到母模板，並指定變數為 title -->
@section('title', $title)

<!-- 傳送資料到母模板，並指定變數為 content -->
@section('content')
    <div class="col g-ml-45 g-ml-0--lg g-pb-65--md">
        <div class="g-pa-20">
            <div class="row">
                <div class="col-md-3 g-mb-30 g-mb-0--md">
                    <div class="h-100 g-brd-around g-brd-gray-light-v7 g-rounded-4 g-pa-15 g-pa-20--md">
                    <section class="text-center g-mb-30 g-mb-50--md">
                        <div class="d-inline-block g-pos-rel g-mb-20">
                            <img class="img-fluid rounded-circle" src="{{ url('/' . $user->photo) }}">
                        </div>
                        <h3 class="g-font-weight-300 g-font-size-20 g-color-black mb-0">{{ $user->lastname }}{{ $user->firstname }}</h3>
                    </section>
                    <section>
                        <ul class="list-unstyled mb-0">
                            <li class="g-brd-top g-brd-gray-light-v7 mb-0">
                                <a class="d-flex align-items-center u-link-v5 g-parent g-py-15" href="/user/edit">
                                <span class="g-font-size-18 g-color-gray-light-v6 g-color-lightred-v3--parent-hover g-color-lightred-v3--parent-active g-mr-15">
                                <i class="hs-admin-user"></i>
                                </span>
                                <span class="g-color-gray-dark-v6 g-color-lightred-v3--parent-hover g-color-lightred-v3--parent-active">基本資料</span>
                                </a>
                            </li>
                            <li class="g-brd-top g-brd-gray-light-v7 mb-0">
                                <a class="d-flex align-items-center u-link-v5 g-parent g-py-15" href="/user/bio/edit">
                                <span class="g-font-size-18 g-color-gray-light-v6 g-color-lightred-v3--parent-hover g-color-lightred-v3--parent-active g-mr-15">
                                <i class="hs-admin-write"></i>
                                </span>
                                <span class="g-color-gray-dark-v6 g-color-lightred-v3--parent-hover g-color-lightred-v3--parent-active">傳記</span>
                                </a>
                            </li>
                            <li class="g-brd-top g-brd-gray-light-v7 mb-0">
                                <a class="d-flex align-items-center u-link-v5 g-parent g-py-15 active" href="/user/security/edit">
                                <span class="g-font-size-18 g-color-gray-light-v6 g-color-lightred-v3--parent-hover g-color-lightred-v3--parent-active g-mr-15">
                                <i class="hs-admin-lock"></i>
                                </span>
                                <span class="g-color-gray-dark-v6 g-color-lightred-v3--parent-hover g-color-lightred-v3--parent-active">安全性</span>
                                </a>
                            </li>
                        </ul>
                    </section>
                    </div>
                </div>
                <div class="col-md-9">

                    <!-- 錯誤訊息模板元件 -->
                    @include('components.validatorErrorMessage')

                    <div class="h-100 g-brd-around g-brd-gray-light-v7 g-rounded-4 g-pa-15 g-pa-20--md">
                    <form action="/user/security/edit" method="post">
                        <header>
                            <h2 class="text-uppercase g-font-size-12 g-font-size-default--md g-color-black mb-0">變更密碼</h2>
                        </header>
                        <hr class="d-flex g-brd-gray-light-v7 g-my-15 g-my-30--md">
                        <div class="row g-mb-20">
                            <div class="col-md-3 align-self-center g-mb-5 g-mb-0--md">
                                <label class="mb-0" for="password">目前密碼</label>
                            </div>
                            <div class="col-md-9 align-self-center">
                                <div class="form-group g-pos-rel mb-0">
                                <span class="g-pos-abs g-top-0 g-right-0 d-block g-width-40 h-100 opacity-0 g-opacity-1--success">
                                <i class="hs-admin-check g-absolute-centered g-font-size-default g-color-lightblue-v3"></i>
                                </span>
                                <input id="password" name="password" class="form-control form-control-md g-brd-gray-light-v7 g-brd-lightblue-v3--focus g-brd-lightred-v2--error g-rounded-4 g-px-20 g-py-12" type="password">
                                </div>
                            </div>
                        </div>
                        <div class="row g-mb-20">
                            <div class="col-md-3 align-self-center g-mb-5 g-mb-0--md">
                                <label class="mb-0" for="new_password">新密碼</label>
                            </div>
                            <div class="col-md-9 align-self-center">
                                <div class="form-group g-pos-rel mb-0">
                                <span class="g-pos-abs g-top-0 g-right-0 d-block g-width-40 h-100 opacity-0 g-opacity-1--success">
                                <i class="hs-admin-check g-absolute-centered g-font-size-default g-color-lightblue-v3"></i>
                                </span>
                                <input id="new_password" name="new_password" class="form-control form-control-md g-brd-gray-light-v7 g-brd-lightblue-v3--focus g-brd-lightred-v2--error g-rounded-4 g-px-20 g-py-12" type="password">
                                </div>
                            </div>
                        </div>
                        <div class="row g-mb-20">
                            <div class="col-md-3 align-self-center g-mb-5 g-mb-0--md">
                                <label class="mb-0" for="password_confirmation">確認密碼</label>
                            </div>
                            <div class="col-md-9 align-self-center">
                                <div class="form-group g-pos-rel mb-0">
                                <span class="g-pos-abs g-top-0 g-right-0 d-block g-width-40 h-100 opacity-0 g-opacity-1--success">
                                <i class="hs-admin-check g-absolute-centered g-font-size-default g-color-lightblue-v3"></i>
                                </span>
                                <input id="password_confirmation" name="password_confirmation" class="form-control form-control-md g-brd-gray-light-v7 g-brd-lightblue-v3--focus g-brd-lightred-v2--error g-rounded-4 g-px-20 g-py-12" type="password">
                                </div>
                            </div>
                        </div>
                        <hr class="d-flex g-brd-gray-light-v7 g-my-15 g-my-30--md">
                        <div>
                            <button class="btn btn-md btn-xl--md u-btn-lightblue-v3 g-width-160--md g-font-size-12 g-font-size-default--md g-mb-10" type="submit">保存變更</button>
                        </div>

                        <!-- CSRF 欄位 -->
                        {!! csrf_field() !!}

                    </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection