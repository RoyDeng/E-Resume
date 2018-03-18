<!-- 指定繼承 layout.master 母模板 -->
@extends('layout.master')

<!-- 傳送資料到母模板，並指定變數為 title -->
@section('title', $title)

<!-- 傳送資料到母模板，並指定變數為 content -->
@section('content')
    <div class="g-pa-20">
        <h1 class="g-font-weight-300 g-font-size-28 g-color-black g-mb-40">搜尋結果</h1>
        <header>
            <h2 class="text-uppercase g-font-size-12 g-font-size-default--md g-color-black mb-0">共有 {{ $count }} 項結果</h2>
        </header>
        <hr class="d-flex g-brd-gray-light-v7 g-my-15 g-my-30--md">
        <div class="row">
            @foreach($result as $rs)
            <div class="col-md-12">
                <div class="card g-brd-gray-light-v7 g-rounded-3 g-mb-30">
                    <header class="card-header g-bg-transparent g-brd-bottom-none g-pa-15 g-pa-30--sm pb-0">
                    <div class="media">
                        <div class="d-flex align-self-center">
                            <div class="media">
                                <a class="d-flex align-self-center g-mr-20" href="/{{ $rs->id }}/resume">
                                <img class="rounded-circle g-width-45 g-width-55--lg g-height-45 g-height-55--lg" src="{{ url('/' . $rs->photo) }}">
                                </a>
                                <div class="media-body align-self-center">
                                <h3 class="g-font-weight-300 g-font-size-16 g-color-black g-mb-5">{{ $rs->lastname }}{{ $rs->firstname }}</h3>
                                <em class="d-block g-font-style-normal g-font-weight-300 g-color-gray-dark-v6">{{ $rs->location }}</em>
                                </div>
                            </div>
                        </div>
                    </div>
                    </header>
                    <div class="card-block g-pa-15 g-px-30--sm g-py-20--sm">
                        <p class="g-font-weight-300 g-color-gray-dark-v6 mb-0">{{ strlen($rs->bio) > 50 ? substr($rs->bio, 0, 50) . '...' : $rs->bio }}</p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <div class="row">
            <div class="col-md-12">
                {{ $result->appends(request()->query())->links() }}
            </div>
        </div>
    </div>
@endsection