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
                                <a class="d-flex align-items-center u-link-v5 g-parent g-py-15 active" href="/user/bio/edit">
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
                    <div class="h-100 g-brd-around g-brd-gray-light-v7 g-rounded-4 g-pa-15 g-pa-30--md">
                    <header>
                        <h2 class="text-uppercase g-font-size-12 g-font-size-default--md g-color-black mb-0">傳記</h2>
                    </header>
                    <hr class="d-flex g-brd-gray-light-v7 g-my-15 g-my-25--md">
                    <form action="/user/bio/edit" method="post">
                        <div class="g-mb-20">
                            <label class="g-mb-10" for="bio">自傳</label>
                            <div class="form-group mb-0">
                                <textarea id="bio" name="bio" class="form-control form-control-md g-brd-gray-light-v7 g-brd-lightblue-v3--focus g-rounded-4 g-px-20 g-py-12" rows="5">{{ $user->bio }}</textarea>
                            </div>
                        </div>
                        <div class="g-mb-60">
                            <label class="g-mb-10" for="skills">技能</label>
                            <div class="u-tagsinput--v2--blue g-brd-around g-brd-gray-light-v7 g-brd-lightblue-v3--focus g-rounded-4 g-px-6 g-py-5">
                                <input type="text" name="skills" value="{{ $user->skills }}" data-role="tagsinput">
                            </div>
                        </div>
                        <div>
                            <button class="btn btn-md btn-xl--md u-btn-lightblue-v3 g-width-160--md g-font-size-12 g-font-size-default--md g-mr-10 g-mb-10" type="submit">保存變更</button>
                        </div>

                        <!-- CSRF 欄位 -->
                        {!! csrf_field() !!}

                    </form>
                    <hr class="d-flex g-brd-gray-light-v7 g-my-15 g-my-30--md">
                    <header>
                        <h2 class="text-uppercase g-font-size-12 g-font-size-default--md g-color-black mb-0">工作經歷</h2>
                        <sapn class="float-right">
                            <a class="u-link-v5 d-flex align-items-center g-color-lightblue-v3 g-ml-30" data-toggle="modal" data-target="#createExpModal">
                                <span class="u-badge-v2--xl g-pos-rel g-transform-origin--top-left g-bg-lightblue-v3 g-font-size-10 g-color-white">
                                    <i class="hs-admin-plus g-absolute-centered"></i>
                                </span>
                                新增工作履歷
                            </a>
                        </sapn>
                    </header>
                    <hr class="d-flex g-brd-gray-light-v7 g-my-15 g-my-25--md">
                    @foreach($user->experience as $exp)
                    <div class="g-mb-30">
                        <header class="row">
                            <div class="col-md order-md-2 ml-md-auto text-md-right g-font-weight-300 g-color-gray-dark-v11 g-mb-10">
                                <div class="media align-items-start">
                                <div class="media-body">{{ $exp->from }} 到 {{ $exp->to }}</div>
                                <a class="u-link-v5 d-flex g-font-size-16 g-color-gray-light-v6 g-color-lightblue-v3--hover g-ml-30" data-toggle="modal" data-target="#editExpModal" onclick="getExp('{{ $exp->id }}')">
                                <i class="hs-admin-pencil"></i>
                                </a>
                                <a class="u-link-v5 d-flex g-font-size-16 g-color-gray-light-v6 g-color-lightblue-v3--hover g-ml-15" data-toggle="modal" data-target="#deleteExpModal" onclick="getExp('{{ $exp->id }}')">
                                <i class="hs-admin-trash"></i>
                                </a>
                                </div>
                            </div>
                            <div class="col-md order-md-1 g-mr-20 g-mb-10">
                                <h3 class="g-font-weight-400 g-font-size-16 g-color-black mb-0">{{ $exp->position }}</h3>
                                <em class="d-block g-font-style-normal g-color-gray-dark-v12">{{ $exp->company }}</em>
                            </div>
                        </header>
                        <p class="g-color-black mb-0">{{ $exp->description }}</p>
                    </div>
                    @endforeach
                    <header>
                        <h2 class="text-uppercase g-font-size-12 g-font-size-default--md g-color-black mb-0">教育背景</h2>
                        <sapn class="float-right">
                            <a class="u-link-v5 d-flex align-items-center g-color-lightblue-v3 g-ml-30" data-toggle="modal" data-target="#createEduModal">
                                <span class="u-badge-v2--xl g-pos-rel g-transform-origin--top-left g-bg-lightblue-v3 g-font-size-10 g-color-white">
                                    <i class="hs-admin-plus g-absolute-centered"></i>
                                </span>
                                新增教育背景
                            </a>
                        </sapn>
                    </header>
                    <hr class="d-flex g-brd-gray-light-v7 g-my-15 g-my-25--md">
                    @foreach($user->education as $edu)
                    <div class="g-mb-30">
                        <header class="row">
                            <div class="col-md order-md-2 ml-md-auto text-md-right g-font-weight-300 g-color-gray-dark-v11 g-mb-10">
                                <div class="media align-items-start">
                                <div class="media-body">{{ $edu->from }} 到 {{ $edu->to }}</div>
                                <a class="u-link-v5 d-flex g-font-size-16 g-color-gray-light-v6 g-color-lightblue-v3--hover g-ml-30" data-toggle="modal" data-target="#editEduModal" onclick="getEdu('{{ $edu->id }}')">
                                <i class="hs-admin-pencil"></i>
                                </a>
                                <a class="u-link-v5 d-flex g-font-size-16 g-color-gray-light-v6 g-color-lightblue-v3--hover g-ml-15" data-toggle="modal" data-target="#deleteEduModal" onclick="getEdu('{{ $edu->id }}')">
                                <i class="hs-admin-trash"></i>
                                </a>
                                </div>
                            </div>
                            <div class="col-md order-md-1 g-mr-20 g-mb-10">
                                <h3 class="g-font-weight-400 g-font-size-16 g-color-black mb-0">{{ $edu->school }}</h3>
                                <em class="d-block g-font-style-normal g-color-gray-dark-v12">{{ $edu->department }}</em>
                            </div>
                        </header>
                        <p class="g-color-black mb-0">{{ $edu->description }}</p>
                    </div>
                    @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- 新增工作經歷 -->
    <div class="modal fade" id="createExpModal" tabindex="-1" role="dialog" aria-labelledby="createExpModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <form action="/user/experience/create" method="post">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="createExpModalLabel">新增工作履歷</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <label class="g-mb-10">工作期間</label>
                        <div class="row g-mb-30">
                            <div class="col-md-6 g-mb-20 g-mb-0--md">
                                <div class="form-group g-pos-rel mb-0">
                                    <input name="from" class="form-control form-control-md g-brd-gray-light-v7 g-brd-lightblue-v3--focus g-brd-lightred-v2--error g-rounded-4 g-px-20 g-py-12" type="text" placeholder="開始年份">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group g-pos-rel mb-0">
                                    <input name="to" class="form-control form-control-md g-brd-gray-light-v7 g-brd-lightblue-v3--focus g-brd-lightred-v2--error g-rounded-4 g-px-20 g-py-12" type="text" placeholder="結束年份">
                                </div>
                            </div>
                        </div>
                        <label class="g-mb-10" for="company">公司名稱</label>
                        <div class="row g-mb-30">
                            <div class="col-md-12">
                                <div class="form-group g-pos-rel mb-0">
                                    <input id="company" name="company" class="form-control form-control-md g-brd-gray-light-v7 g-brd-lightblue-v3--focus g-brd-lightred-v2--error g-rounded-4 g-px-20 g-py-12" type="text">
                                </div>
                            </div>
                        </div>
                        <label class="g-mb-10" for="position">頭銜</label>
                        <div class="row g-mb-30">
                            <div class="col-md-12">
                                <div class="form-group g-pos-rel mb-0">
                                    <input id="position" name="position" class="form-control form-control-md g-brd-gray-light-v7 g-brd-lightblue-v3--focus g-brd-lightred-v2--error g-rounded-4 g-px-20 g-py-12" type="text">
                                </div>
                            </div>
                        </div>
                        <label class="g-mb-10" for="description">工作內容</label>
                        <div class="row g-mb-30">
                            <div class="col-md-12">
                                <div class="form-group g-pos-rel mb-0">
                                <textarea id="description" name="description" class="form-control form-control-md g-resize-none g-brd-gray-light-v7 g-brd-gray-light-v3--focus g-rounded-4" rows="3"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-md btn-xl--md u-btn-outline-gray-dark-v6 g-font-size-12 g-font-size-default--md g-mb-10" data-dismiss="modal">取消</button>
                        <button type="submit" class="btn btn-md btn-xl--md u-btn-lightblue-v3 g-width-160--md g-font-size-12 g-font-size-default--md g-mr-10 g-mb-10">保存變更</button>
                    </div>
                </div>

                <!-- CSRF 欄位 -->
                {!! csrf_field() !!}

            </form>
        </div>
    </div>

    <!-- 修改工作經歷 -->
    <div class="modal fade" id="editExpModal" tabindex="-1" role="dialog" aria-labelledby="editExpModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <form action="/user/experience/edit" method="post">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editExpModalLabel">修改工作履歷</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <label class="g-mb-10">工作期間</label>
                        <div class="row g-mb-30">
                            <div class="col-md-6 g-mb-20 g-mb-0--md">
                                <div class="form-group g-pos-rel mb-0">
                                    <input id="edit_exp_from" name="from" class="form-control form-control-md g-brd-gray-light-v7 g-brd-lightblue-v3--focus g-brd-lightred-v2--error g-rounded-4 g-px-20 g-py-12" type="text" placeholder="開始年份">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group g-pos-rel mb-0">
                                    <input id="edit_exp_to" name="to" class="form-control form-control-md g-brd-gray-light-v7 g-brd-lightblue-v3--focus g-brd-lightred-v2--error g-rounded-4 g-px-20 g-py-12" type="text" placeholder="結束年份">
                                </div>
                            </div>
                        </div>
                        <label class="g-mb-10" for="edit_exp_company">公司名稱</label>
                        <div class="row g-mb-30">
                            <div class="col-md-12">
                                <div class="form-group g-pos-rel mb-0">
                                    <input id="edit_exp_company" name="company" class="form-control form-control-md g-brd-gray-light-v7 g-brd-lightblue-v3--focus g-brd-lightred-v2--error g-rounded-4 g-px-20 g-py-12" type="text">
                                </div>
                            </div>
                        </div>
                        <label class="g-mb-10" for="edit_exp_position">頭銜</label>
                        <div class="row g-mb-30">
                            <div class="col-md-12">
                                <div class="form-group g-pos-rel mb-0">
                                    <input id="edit_exp_position" name="position" class="form-control form-control-md g-brd-gray-light-v7 g-brd-lightblue-v3--focus g-brd-lightred-v2--error g-rounded-4 g-px-20 g-py-12" type="text">
                                </div>
                            </div>
                        </div>
                        <label class="g-mb-10" for="edit_exp_description">工作內容</label>
                        <div class="row g-mb-30">
                            <div class="col-md-12">
                                <div class="form-group g-pos-rel mb-0">
                                <textarea id="edit_exp_description" name="description" class="form-control form-control-md g-resize-none g-brd-gray-light-v7 g-brd-gray-light-v3--focus g-rounded-4" rows="3"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-md btn-xl--md u-btn-outline-gray-dark-v6 g-font-size-12 g-font-size-default--md g-mb-10" data-dismiss="modal">取消</button>
                        <button type="submit" class="btn btn-md btn-xl--md u-btn-lightblue-v3 g-width-160--md g-font-size-12 g-font-size-default--md g-mr-10 g-mb-10">保存變更</button>
                    </div>
                </div>

                <input type="hidden" id="edit_exp_id" name="id">

                <!-- CSRF 欄位 -->
                {!! csrf_field() !!}

            </form>
        </div>
    </div>

    <!-- 刪除工作經歷 -->
    <div class="modal fade" id="deleteExpModal" tabindex="-1" role="dialog" aria-labelledby="deleteExpModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <form action="/user/experience/delete" method="post">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="deleteExpModalLabel">刪除工作履歷</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        確定刪除此工作經歷？
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-md btn-xl--md u-btn-outline-gray-dark-v6 g-font-size-12 g-font-size-default--md g-mb-10" data-dismiss="modal">取消</button>
                        <button type="submit" class="btn btn-md btn-xl--md u-btn-lightblue-v3 g-width-160--md g-font-size-12 g-font-size-default--md g-mr-10 g-mb-10">確定</button>
                    </div>
                </div>

                <input type="hidden" id="delete_exp_id" name="id">

                <!-- CSRF 欄位 -->
                {!! csrf_field() !!}

            </form>
        </div>
    </div>

    <!-- 新增教育背景 -->
    <div class="modal fade" id="createEduModal" tabindex="-1" role="dialog" aria-labelledby="createEduModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <form action="/user/education/create" method="post">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="createEduModalLabel">新增教育背景</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <label class="g-mb-10">就讀期間</label>
                        <div class="row g-mb-30">
                            <div class="col-md-6 g-mb-20 g-mb-0--md">
                                <div class="form-group g-pos-rel mb-0">
                                    <input name="from" class="form-control form-control-md g-brd-gray-light-v7 g-brd-lightblue-v3--focus g-brd-lightred-v2--error g-rounded-4 g-px-20 g-py-12" type="text" placeholder="開始年份">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group g-pos-rel mb-0">
                                    <input name="to" class="form-control form-control-md g-brd-gray-light-v7 g-brd-lightblue-v3--focus g-brd-lightred-v2--error g-rounded-4 g-px-20 g-py-12" type="text" placeholder="結束年份">
                                </div>
                            </div>
                        </div>
                        <label class="g-mb-10" for="school">學校</label>
                        <div class="row g-mb-30">
                            <div class="col-md-12">
                                <div class="form-group g-pos-rel mb-0">
                                    <input id="school" name="school" class="form-control form-control-md g-brd-gray-light-v7 g-brd-lightblue-v3--focus g-brd-lightred-v2--error g-rounded-4 g-px-20 g-py-12" type="text">
                                </div>
                            </div>
                        </div>
                        <label class="g-mb-10" for="department">科系</label>
                        <div class="row g-mb-30">
                            <div class="col-md-12">
                                <div class="form-group g-pos-rel mb-0">
                                    <input id="department" name="department" class="form-control form-control-md g-brd-gray-light-v7 g-brd-lightblue-v3--focus g-brd-lightred-v2--error g-rounded-4 g-px-20 g-py-12" type="text">
                                </div>
                            </div>
                        </div>
                        <label class="g-mb-10" for="description">說明</label>
                        <div class="row g-mb-30">
                            <div class="col-md-12">
                                <div class="form-group g-pos-rel mb-0">
                                <textarea id="description" name="description" class="form-control form-control-md g-resize-none g-brd-gray-light-v7 g-brd-gray-light-v3--focus g-rounded-4" rows="3"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-md btn-xl--md u-btn-outline-gray-dark-v6 g-font-size-12 g-font-size-default--md g-mb-10" data-dismiss="modal">取消</button>
                        <button type="submit" class="btn btn-md btn-xl--md u-btn-lightblue-v3 g-width-160--md g-font-size-12 g-font-size-default--md g-mr-10 g-mb-10">保存變更</button>
                    </div>
                </div>

                <!-- CSRF 欄位 -->
                {!! csrf_field() !!}
                
            </form>
        </div>
    </div>

    <!-- 修改教育背景 -->
    <div class="modal fade" id="editEduModal" tabindex="-1" role="dialog" aria-labelledby="editEduModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <form action="/user/education/edit" method="post">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editEduModalLabel">修改教育背景</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <label class="g-mb-10">就讀期間</label>
                        <div class="row g-mb-30">
                            <div class="col-md-6 g-mb-20 g-mb-0--md">
                                <div class="form-group g-pos-rel mb-0">
                                    <input id="edit_edu_from" name="from" class="form-control form-control-md g-brd-gray-light-v7 g-brd-lightblue-v3--focus g-brd-lightred-v2--error g-rounded-4 g-px-20 g-py-12" type="text" placeholder="開始年份">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group g-pos-rel mb-0">
                                    <input id="edit_edu_to" name="to" class="form-control form-control-md g-brd-gray-light-v7 g-brd-lightblue-v3--focus g-brd-lightred-v2--error g-rounded-4 g-px-20 g-py-12" type="text" placeholder="結束年份">
                                </div>
                            </div>
                        </div>
                        <label class="g-mb-10" for="edit_edu_school">學校</label>
                        <div class="row g-mb-30">
                            <div class="col-md-12">
                                <div class="form-group g-pos-rel mb-0">
                                    <input id="edit_edu_school" name="school" class="form-control form-control-md g-brd-gray-light-v7 g-brd-lightblue-v3--focus g-brd-lightred-v2--error g-rounded-4 g-px-20 g-py-12" type="text">
                                </div>
                            </div>
                        </div>
                        <label class="g-mb-10" for="edit_edu_department">科系</label>
                        <div class="row g-mb-30">
                            <div class="col-md-12">
                                <div class="form-group g-pos-rel mb-0">
                                    <input id="edit_edu_department" name="department" class="form-control form-control-md g-brd-gray-light-v7 g-brd-lightblue-v3--focus g-brd-lightred-v2--error g-rounded-4 g-px-20 g-py-12" type="text">
                                </div>
                            </div>
                        </div>
                        <label class="g-mb-10" for="edit_edu_description">說明</label>
                        <div class="row g-mb-30">
                            <div class="col-md-12">
                                <div class="form-group g-pos-rel mb-0">
                                <textarea id="edit_edu_description" name="description" class="form-control form-control-md g-resize-none g-brd-gray-light-v7 g-brd-gray-light-v3--focus g-rounded-4" rows="3"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-md btn-xl--md u-btn-outline-gray-dark-v6 g-font-size-12 g-font-size-default--md g-mb-10" data-dismiss="modal">取消</button>
                        <button type="submit" class="btn btn-md btn-xl--md u-btn-lightblue-v3 g-width-160--md g-font-size-12 g-font-size-default--md g-mr-10 g-mb-10">保存變更</button>
                    </div>
                </div>

                <input type="hidden" id="edit_edu_id" name="id">

                <!-- CSRF 欄位 -->
                {!! csrf_field() !!}

            </form>
        </div>
    </div>

    <!-- 刪除教育背景 -->
    <div class="modal fade" id="deleteEduModal" tabindex="-1" role="dialog" aria-labelledby="deleteEduModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <form action="/user/education/delete" method="post">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="deleteEduModalLabel">刪除教育背景</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        確定刪除此教育背景？
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-md btn-xl--md u-btn-outline-gray-dark-v6 g-font-size-12 g-font-size-default--md g-mb-10" data-dismiss="modal">取消</button>
                        <button type="submit" class="btn btn-md btn-xl--md u-btn-lightblue-v3 g-width-160--md g-font-size-12 g-font-size-default--md g-mr-10 g-mb-10">確定</button>
                    </div>
                </div>

                <input type="hidden" id="delete_edu_id" name="id">

                <!-- CSRF 欄位 -->
                {!! csrf_field() !!}

            </form>
        </div>
    </div>

    <script type="text/javascript">
        function getExp(id){
            $.ajax({
                url: "/user/experience/get_exp",
                type:"GET",
                data: { "id": id },
                success: function(result){
                    $("#edit_exp_id").val(result.id);
                    $("#edit_exp_from").val(result.from);
                    $("#edit_exp_to").val(result.to);
                    $("#edit_exp_company").val(result.company);
                    $("#edit_exp_position").val(result.position);
                    $("#edit_exp_description").val(result.description);
                    $("#delete_exp_id").val(result.id);
                }
            });
        }

        function getEdu(id){
            $.ajax({
                url: "/user/education/get_edu",
                type:"GET",
                data: { "id": id },
                success: function(result){
                    $("#edit_edu_id").val(result.id);
                    $("#edit_edu_from").val(result.from);
                    $("#edit_edu_to").val(result.to);
                    $("#edit_edu_school").val(result.school);
                    $("#edit_edu_department").val(result.department);
                    $("#edit_edu_description").val(result.description);
                    $("#delete_edu_id").val(result.id);
                }
            });
        }
    </script>
@endsection