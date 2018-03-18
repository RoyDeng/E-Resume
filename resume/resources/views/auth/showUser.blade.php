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
                                <a class="d-flex align-items-center u-link-v5 g-parent g-py-15 active" href="/user/edit">
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
                                <a class="d-flex align-items-center u-link-v5 g-parent g-py-15" href="/user/security/edit">
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
                    <form action="/user/edit" method="post" enctype="multipart/form-data">
                        <header>
                            <h2 class="text-uppercase g-font-size-12 g-font-size-default--md g-color-black mb-0">一般資料</h2>
                        </header>
                        <hr class="d-flex g-brd-gray-light-v7 g-my-15 g-my-30--md">
                        <div class="row g-mb-20">
                            <div class="col-md-3 align-self-center g-mb-5 g-mb-0--md">
                                <label class="mb-0" for="firstName">大頭貼</label>
                            </div>
                            <div class="col-md-9 align-self-center">
                                <div class="input-group u-file-attach-v1 g-brd-gray-light-v2">
                                    <input class="form-control form-control-md rounded-0" readonly="" type="text">
                                    <div class="input-group-btn">
                                        <button class="btn btn-md h-100 u-btn-blue rounded-0" type="submit">選擇</button>
                                        <input type="file" name="photo">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row g-mb-20">
                            <div class="col-md-3 align-self-center g-mb-5 g-mb-0--md">
                                <label class="mb-0" for="lastname">姓氏</label>
                            </div>
                            <div class="col-md-9 align-self-center">
                                <div class="form-group g-pos-rel mb-0">
                                    <input id="lastname" name="lastname" class="form-control form-control-md g-brd-gray-light-v7 g-brd-lightblue-v3--focus g-brd-lightred-v2--error g-rounded-4 g-px-20 g-py-12" type="text" value="{{ $user->lastname }}">
                                </div>
                            </div>
                        </div>
                        <div class="row g-mb-20">
                            <div class="col-md-3 align-self-center g-mb-5 g-mb-0--md">
                                <label class="mb-0" for="firstname">姓名</label>
                            </div>
                            <div class="col-md-9 align-self-center">
                                <div class="form-group g-pos-rel mb-0">
                                    <input id="firstname" name="firstname" class="form-control form-control-md g-brd-gray-light-v7 g-brd-lightblue-v3--focus g-brd-lightred-v2--error g-rounded-4 g-px-20 g-py-12" type="text" value="{{ $user->firstname }}">
                                </div>
                            </div>
                        </div>
                        <div class="row g-mb-20">
                            <div class="col-md-3 align-self-center g-mb-5 g-mb-0--md">
                                <label class="mb-0">性別</label>
                            </div>
                            <div class="col-md-9 align-self-center">
                                <div class="row g-mx-minus-10">
                                <div class="col-md-auto align-self-center g-width-180--md g-px-10">
                                    <div class="form-group u-select--v2 g-pos-rel g-brd-gray-light-v7 g-rounded-4 mb-0">
                                        <span class="g-pos-abs g-top-0 g-right-0 d-block g-width-40 h-100 opacity-0 g-opacity-1--success">
                                        <i class="hs-admin-check g-absolute-centered g-font-size-default g-color-lightblue-v3"></i>
                                        </span>
                                        <select class="js-select u-select--v2-select w-100" required="required" style="display: none;" name="sex">
                                            <option value="0" {{ $user->sex == 0 ? 'selected="selected"' : '' }}>男性</option>
                                            <option value="1" {{ $user->sex == 1 ? 'selected="selected"' : '' }}>女性</option>
                                        </select>
                                        <i class="hs-admin-angle-down g-absolute-centered--y g-right-0 g-color-gray-light-v6 ml-auto g-mr-15"></i>
                                    </div>
                                </div>
                                </div>
                            </div>
                        </div>
                        <div class="row g-mb-20">
                            <div class="col-md-3 align-self-center g-mb-5 g-mb-0--md">
                                <label class="mb-0" for="birthday">生日</label>
                            </div>
                            <div class="col-md-9 align-self-center">
                                <div id="datepickerWrapper" class="u-datepicker-right u-datepicker--v3 g-pos-rel w-100 g-cursor-pointer g-brd-around g-brd-gray-light-v7 g-rounded-4">
                                    <input id="birthday" name="birthday" class="js-range-datepicker g-bg-transparent g-font-size-12 g-font-size-default--md g-color-gray-dark-v6 g-pr-80 g-pl-15 g-py-9" type="text" value="{{ $user->birthday }}" data-rp-wrapper="#datepickerWrapper" data-rp-date-format="Y-m-d">
                                    <div class="d-flex align-items-center g-absolute-centered--y g-right-0 g-color-gray-light-v6 g-color-lightblue-v9--sibling-opened g-mr-15">
                                        <i class="hs-admin-calendar g-font-size-18 g-mr-10"></i>
                                        <i class="hs-admin-angle-down"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row g-mb-20">
                            <div class="col-md-3 align-self-center g-mb-5 g-mb-0--md">
                                <label class="mb-0">Email</label>
                            </div>
                            <div class="col-md-9 align-self-center">
                                <div class="form-group g-pos-rel mb-0">
                                {{ $user->email }}
                                </div>
                            </div>
                        </div>
                        <div class="row g-mb-20">
                            <div class="col-md-3 align-self-center g-mb-5 g-mb-0--md">
                                <label class="mb-0" for="location">地方</label>
                            </div>
                            <div class="col-md-9 align-self-center">
                                <div class="form-group g-pos-rel mb-0">
                                    <input id="location" name="location" class="form-control form-control-md g-brd-gray-light-v7 g-brd-lightblue-v3--focus g-brd-lightred-v2--error g-rounded-4 g-px-20 g-py-12" type="text" value="{{ $user->location }}">
                                </div>
                            </div>
                        </div>
                        <div class="row g-mb-20">
                            <div class="col-md-3 align-self-center g-mb-5 g-mb-0--md">
                                <label class="mb-0" for="phone">連絡電話</label>
                            </div>
                            <div class="col-md-9 align-self-center">
                                <div class="row g-mx-minus-10">
                                <div class="col-auto align-self-center g-width-270 g-px-10">
                                    <div class="form-group g-pos-rel mb-0">
                                        <input id="phone" name="phone" class="form-control form-control-md g-brd-gray-light-v7 g-brd-lightblue-v3--focus g-brd-lightred-v2--error g-rounded-4 g-px-20 g-py-12" type="tel" value="{{ $user->phone }}">
                                    </div>
                                </div>
                                </div>
                            </div>
                        </div>
                        <div class="row g-mb-20">
                            <div class="col-md-3 align-self-center g-mb-5 g-mb-0--md">
                                <label class="mb-0" for="lang">語言</label>
                            </div>
                            <div class="col-md-9 align-self-center">
                                <div class="row g-mx-minus-10">
                                <div class="col-auto align-self-center g-width-270 g-px-10">
                                    <div class="form-group u-select--v2 g-pos-rel g-brd-gray-light-v7 g-rounded-4 mb-0">
                                        <span class="g-pos-abs g-top-0 g-right-0 d-block g-width-40 h-100 opacity-0 g-opacity-1--success">
                                        <i class="hs-admin-check g-absolute-centered g-font-size-default g-color-lightblue-v3"></i>
                                        </span>
                                        <select id="lang" name="lang" class="js-select u-select--v2-select w-100" required="required" style="display: none;">
                                            <option value="0" {{ $user->lang == 0 ? 'selected="selected"' : '' }}>English</option>
                                            <option value="1" {{ $user->lang == 1 ? 'selected="selected"' : '' }}>繁體中文</option>
                                            <option value="2" {{ $user->lang == 2 ? 'selected="selected"' : '' }}>日本語</option>
                                        </select>
                                        <i class="hs-admin-angle-down g-absolute-centered--y g-right-0 g-color-gray-light-v6 ml-auto g-mr-15"></i>
                                    </div>
                                </div>
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