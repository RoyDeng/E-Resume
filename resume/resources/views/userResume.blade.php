<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>{{ $user->lastname }}{{ $user->firstname }} - 電子名片</title>
        <link rel="stylesheet" href="//fonts.googleapis.com/css?family=Open+Sans%3A400%2C300%2C500%2C600%2C700%7CPlayfair+Display%7CRoboto%7CRaleway%7CSpectral%7CRubik">
        <link rel="stylesheet" href="/assets/vendor/bootstrap/bootstrap.min.css">
        <link rel="stylesheet" href="/assets/vendor/icon-awesome/css/font-awesome.min.css">
        <link rel="stylesheet" href="/assets/css/unify-admin.css">
    </head>
    <body>
        <main class="container-fluid px-0">
            <div class="row no-gutters g-pos-rel g-overflow-x-hidden">
                <div class="col">
                    <div class="g-pa-20">
                        <div class="row">
                            <div class="col-xl-12">
                                <div class="card g-brd-gray-light-v7 text-center g-pt-40 g-pt-60--md g-mb-30">
                                <header class="g-mb-30">
                                        <img class="img-fluid rounded-circle g-width-125 g-height-125 g-mb-14" src="{{ url('/' . $user->photo) }}">
                                        <h3 class="g-font-weight-300 g-font-size-22 g-color-black g-mb-2">{{ $user->lastname }}{{ $user->firstname }}</h3>
                                        <em class="g-font-style-normal g-font-weight-300 g-color-gray-dark-v6">{{ $user->sex == 0 ? '男性' : '女性' }}</em>
                                        <section class="g-mb-20">
                                            <p class="g-font-weight-300 g-color-gray-dark-v6 mb-0">{{ $user->bio }}</p>
                                        </section>
                                        <h3 class="text-uppercase g-font-size-12 g-font-size-default--md g-color-black g-mb-20">技能</h3>
                                        <ul class="u-list-inline mb-0">
                                            @if(!is_null($user->skills))
                                                @foreach(explode(',', $user->skills) as $skill)
                                                    <li class="list-inline-item g-mb-6 g-mr-2">
                                                        <a class="u-tags-v1 g-bg-lightblue-v3--hover g-color-gray-dark-v6 g-color-white--hover g-brd-around g-brd-gray-light-v4 g-brd-lightblue-v3--hover g-rounded-50 g-px-10 g-px-20--md g-py-2">{{ $skill }}</a>
                                                    </li>
                                                @endforeach
                                            @endif
                                        </ul>
                                </header>
                                <section class="row no-gutters g-brd-top g-brd-gray-light-v4">
                                    <div class="col-6 g-py-10 g-py-25--md">
                                        <ul class="list-inline">
                                            <li class="list-inline-item"><i class="fa fa-envelope"></i> <a href="mailto:{{ $user->email }}">{{ $user->email }}</a></li>
                                            <li class="list-inline-item"><i class="fa fa-phone"></i> <a href="tel:{{ $user->phone }}">{{ $user->phone }}</a></li>
                                            <li class="list-inline-item"><i class="fa fa-map-marker"></i> {{ $user->location }}</li>
                                        </ul>
                                    </div>
                                    <div class="col-6 g-brd-left--md g-brd-gray-light-v4 g-py-10 g-py-25--md">
                                        <ul class="list-inline">
                                            <li class="list-inline-item"><i class="fa fa-birthday-cake"></i> {{ $user->birthday }}</li>
                                            <li class="list-inline-item">
                                            <i class="fa fa-comment"></i> 
                                            @if($user->lang == 0)
                                            English
                                            @elseif($user->lang == 1)
                                            繁體中文
                                            @else
                                            日本語
                                            @endif
                                            </li>
                                        </ul>
                                    </div>
                                </section>
                                <section class="row no-gutters g-brd-top g-brd-gray-light-v4">
                                    <div class="col-12 g-py-10 g-py-25--md">

                                        <!-- QR Code -->
                                        {!! QrCode::size(200)->generate(url('/resume/' . $user->id)); !!}
                                        
                                    </div>
                                </section>
                                </div>
                            </div>
                            <div class="col-xl-12">
                                <div class="card g-brd-gray-light-v7 g-pa-15 g-pa-25-30--md g-mb-30">
                                <section class="g-mb-20">
                                    <h3 class="text-uppercase g-font-size-12 g-font-size-default--md g-color-black g-mb-20">工作經歷</h3>
                                    @foreach($user->experience as $exp)
                                    <div class="g-mb-30">
                                        <header class="row">
                                            <div class="col-md order-md-2 ml-md-auto text-md-right g-font-weight-300 g-color-gray-dark-v11 g-mb-10">
                                            <div class="media align-items-start">
                                                <div class="media-body">{{ $exp->from }} 到 {{ $exp->to }}</div>
                                            </div>
                                            </div>
                                            <div class="col-md order-md-1 g-mr-20 g-mb-10">
                                            <h3 class="g-font-weight-400 g-font-size-16 g-color-black mb-0">{{ $exp->company }}</h3>
                                            <em class="d-block g-font-style-normal g-color-gray-dark-v12">{{ $exp->position }}</em>
                                            </div>
                                        </header>
                                        <p class="g-color-black mb-0">{{ $exp->description }}</p>
                                    </div>
                                    @endforeach
                                </section>
                                </div>
                            </div>
                            <div class="col-xl-12">
                                <div class="card g-brd-gray-light-v7 g-pa-15 g-pa-25-30--md g-mb-30">
                                <section class="g-mb-20">
                                    <h3 class="text-uppercase g-font-size-12 g-font-size-default--md g-color-black g-mb-20">教育背景</h3>
                                    @foreach($user->education as $edu)
                                    <div class="g-mb-30">
                                        <header class="row">
                                            <div class="col-md order-md-2 ml-md-auto text-md-right g-font-weight-300 g-color-gray-dark-v11 g-mb-10">
                                            <div class="media align-items-start">
                                                <div class="media-body">{{ $edu->from }} 到 {{ $edu->to }}</div>
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
                                </section>
                                </div>
                            </div>
                            <div class="col-xl-12">
                                <div class="text-center">
                                    <button class="btn btn-md btn-xl--md u-btn-lightblue-v3 g-width-160--md g-font-size-12 g-font-size-default--md g-mb-10" type="button" onclick="window.location.href='/{{ $user->id }}/resume_pdf'">產生 PDF 檔案</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </body>
</html>