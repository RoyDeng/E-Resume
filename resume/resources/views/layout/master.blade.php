<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>@yield('title') - 電子名片</title>
        <link rel="stylesheet" href="//fonts.googleapis.com/css?family=Open+Sans%3A400%2C300%2C500%2C600%2C700%7CPlayfair+Display%7CRoboto%7CRaleway%7CSpectral%7CRubik">
        <link rel="stylesheet" href="/assets/vendor/bootstrap/bootstrap.min.css">
        <link rel="stylesheet" href="/assets/vendor/icon-awesome/css/font-awesome.min.css">
        <link rel="stylesheet" href="/assets/vendor/icon-line/css/simple-line-icons.css">
        <link rel="stylesheet" href="/assets/vendor/icon-etlinefont/style.css">
        <link rel="stylesheet" href="/assets/vendor/icon-line-pro/style.css">
        <link rel="stylesheet" href="/assets/vendor/icon-hs/style.css">
        <link rel="stylesheet" href="/assets/vendor/hs-admin-icons/hs-admin-icons.css">
        <link rel="stylesheet" href="/assets/vendor/animate.css">
        <link rel="stylesheet" href="/assets/vendor/malihu-scrollbar/jquery.mCustomScrollbar.min.css">
        <link rel="stylesheet" href="/assets/vendor/flatpickr/dist/css/flatpickr.min.css">
        <link rel="stylesheet" href="/assets/vendor/bootstrap-select/css/bootstrap-select.min.css">
        <link rel="stylesheet" href="/assets/vendor/bootstrap-tagsinput/css/bootstrap-tagsinput.css">
        <link rel="stylesheet" href="/assets/vendor/chartist-js-tooltip/chartist-plugin-tooltip.css">
        <link rel="stylesheet" href="/assets/vendor/fancybox/jquery.fancybox.min.css">
        <link rel="stylesheet" href="/assets/vendor/hamburgers/hamburgers.min.css">
        <link rel="stylesheet" href="/assets/css/unify-admin.css">
    </head>
    <body>
        <header id="js-header" class="u-header u-header--sticky-top">
            <div class="u-header__section u-header__section--admin-dark g-min-height-65">
                <nav class="navbar no-gutters g-pa-0">
                    <a class="d-block text-uppercase u-header-icon-v1 g-pos-rel g-width-40 g-height-40 rounded-circle g-font-size-20" href="/">
                        <i class="hs-admin-home g-absolute-centered"></i>
                    </a>
                    <form id="searchMenu" class="u-header--search col-sm g-py-12 g-ml-15--sm g-ml-20--md g-mr-10--sm" aria-labelledby="searchInvoker" action="/search">
                        <div class="input-group g-max-width-450">
                            <input name="keyword" class="form-control form-control-md g-rounded-4" type="text" placeholder="搜尋" value="{{ app('request')->input('keyword') }}">
                            <button type="submit" class="btn u-btn-outline-primary g-brd-none g-bg-transparent--hover g-pos-abs g-top-0 g-right-0 d-flex g-width-40 h-100 align-items-center justify-content-center g-font-size-18 g-z-index-2"><i class="hs-admin-search"></i></button>
                        </div>
                    </form>
                    <div class="col-auto d-flex g-py-12 g-pl-40--lg ml-auto">
                        <a id="searchInvoker" class="g-hidden-sm-up text-uppercase u-header-icon-v1 g-pos-rel g-width-40 g-height-40 rounded-circle g-font-size-20" href="#!" aria-controls="searchMenu" aria-haspopup="true" aria-expanded="false" data-is-mobile-only="true" data-dropdown-event="click"
                            data-dropdown-target="#searchMenu" data-dropdown-type="css-animation" data-dropdown-duration="300" data-dropdown-animation-in="fadeIn" data-dropdown-animation-out="fadeOut">
                            <i class="hs-admin-search g-absolute-centered"></i>
                        </a>
                        <div class="col-auto d-flex g-pt-5 g-pt-0--sm g-pl-10 g-pl-20--sm">
                            <div class="g-pos-rel g-px-10--lg">
                                <a id="profileMenuInvoker" class="d-block" href="#!" aria-controls="profileMenu" aria-haspopup="true" aria-expanded="false" data-dropdown-event="click" data-dropdown-target="#profileMenu" data-dropdown-type="css-animation" data-dropdown-duration="300"
                                    data-dropdown-animation-in="fadeIn" data-dropdown-animation-out="fadeOut">
                                    <span class="g-pos-rel">
                                        <span class="u-badge-v2--xs u-badge--top-right g-hidden-sm-up g-bg-lightblue-v5 g-mr-5"></span>
                                        <img class="g-width-30 g-width-40--md g-height-30 g-height-40--md rounded-circle g-mr-10--sm" src="{{ url('/' . $user->photo) }}">
                                    </span>
                                    <span class="g-pos-rel g-top-2">
                                        <span class="g-hidden-sm-down">{{ $user->lastname }}{{ $user->firstname }}</span>
                                        <i class="hs-admin-angle-down g-pos-rel g-top-2 g-ml-10"></i>
                                    </span>
                                </a>
                                <ul id="profileMenu" class="g-pos-abs g-left-0 g-width-100x--lg g-nowrap g-font-size-14 g-py-20 g-mt-17 rounded" aria-labelledby="profileMenuInvoker">
                                    <li class="g-mb-10">
                                        <a class="media g-color-blue--hover g-py-5 g-px-20" href="/user/edit">
                                            <span class="d-flex align-self-center g-mr-12">
                                                <i class="hs-admin-user"></i>
                                            </span>
                                            <span class="media-body align-self-center">查看檔案</span>
                                        </a>
                                    </li>
                                    <li class="mb-0">
                                        <a class="media g-color-blue--hover g-py-5 g-px-20" href="/sign-out">
                                            <span class="d-flex align-self-center g-mr-12">
                                                <i class="hs-admin-shift-right"></i>
                                            </span>
                                            <span class="media-body align-self-center">登出</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </nav>
            </div>
        </header>
        <main class="container-fluid px-0 g-pt-65">
            <div class="row no-gutters g-pos-rel g-overflow-x-hidden">
                <div class="col">

                    @yield('content')
                
                    <footer id="footer" class="u-footer--bottom-sticky g-bg-white g-color-gray-dark-v6 g-brd-top g-brd-gray-light-v7 g-pa-20">
                        <div class="row align-items-center">
                            <div class="col-md-4 g-mb-10 g-mb-0--md">
                                <ul class="list-inline g-font-size-16 text-center mb-0">
                                    <li class="list-inline-item g-mx-10">
                                        <a href="https://www.facebook.com/profile.php?id=100000220488515" class="g-color-facebook g-color-lightblue-v3--hover">
                                            <i class="fa fa-facebook-square"></i>
                                        </a>
                                    </li>
                                    <li class="list-inline-item g-mx-10">
                                        <a href="https://www.instagram.com/yuteng0428" class="g-color-pink g-color-lightblue-v3--hover">
                                            <i class="fa fa-instagram"></i>
                                        </a>
                                    </li>
                                    <li class="list-inline-item g-mx-10">
                                        <a href="https://github.com/RoyDeng" class="g-color-black g-color-lightblue-v3--hover">
                                            <i class="fa fa-github"></i>
                                        </a>
                                    </li>
                                    <li class="list-inline-item g-mx-10">
                                        <a href="https://linkedin.com/in/roy-deng-0428" class="g-color-linkedin g-color-lightblue-v3--hover">
                                            <i class="fa fa-linkedin"></i>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <div class="col-md-4 text-center text-md-right">
                                <small class="d-block g-font-size-default">&copy; {{ date("Y") }} Roy Deng All Rights Reserved.</small>
                            </div>
                        </div>
                    </footer>
                </div>
            </div>
        </main>

        <script src="/assets/vendor/jquery/jquery.min.js"></script>
        <script src="/assets/vendor/jquery-migrate/jquery-migrate.min.js"></script>
        <script src="/assets/vendor/popper.min.js"></script>
        <script src="/assets/vendor/bootstrap/bootstrap.min.js"></script>
        <script src="/assets/vendor/cookiejs/jquery.cookie.js"></script>
        <script src="/assets/vendor/jquery-ui/ui/widget.js"></script>
        <script src="/assets/vendor/jquery-ui/ui/version.js"></script>
        <script src="/assets/vendor/jquery-ui/ui/keycode.js"></script>
        <script src="/assets/vendor/jquery-ui/ui/position.js"></script>
        <script src="/assets/vendor/jquery-ui/ui/unique-id.js"></script>
        <script src="/assets/vendor/jquery-ui/ui/safe-active-element.js"></script>
        <script src="/assets/vendor/jquery-ui/ui/widgets/menu.js"></script>
        <script src="/assets/vendor/jquery-ui/ui/widgets/mouse.js"></script>
        <script src="/assets/vendor/jquery-ui/ui/widgets/datepicker.js"></script>
        <script src="/assets/vendor/appear.js"></script>
        <script src="/assets/vendor/bootstrap-select/js/bootstrap-select.min.js"></script>
        <script src="/assets/vendor/bootstrap-tagsinput/js/bootstrap-tagsinput.min.js"></script>
        <script src="/assets/vendor/flatpickr/dist/js/flatpickr.min.js"></script>
        <script src="/assets/vendor/malihu-scrollbar/jquery.mCustomScrollbar.concat.min.js"></script>
        <script src="/assets/vendor/fancybox/jquery.fancybox.min.js"></script>
        <script src="/assets/js/hs.core.js"></script>
        <script src="/assets/js/components/hs.side-nav.js"></script>
        <script src="/assets/js/helpers/hs.hamburgers.js"></script>
        <script src="/assets/js/components/hs.range-datepicker.js"></script>
        <script src="/assets/js/components/hs.datepicker.js"></script>
        <script src="/assets/js/components/hs.dropdown.js"></script>
        <script src="/assets/js/components/hs.scrollbar.js"></script>
        <script src="/assets/js/helpers/hs.focus-state.js"></script>
        <script src="/assets/js/components/hs.popup.js"></script>
        <script src="/assets/js/helpers/hs.file-attachments.js"></script>
        <script src="/assets/js/components/hs.file-attachement.js"></script>
        <script>
            $(document).on('ready', function () {
                $.HSCore.components.HSDropdown.init($('[data-dropdown-target]'), {dropdownHideOnScroll: false});
                $('.js-select').selectpicker();
                $.HSCore.helpers.HSFileAttachments.init();
                $.HSCore.components.HSFileAttachment.init('.js-file-attachment');
                $.HSCore.components.HSRangeDatepicker.init('.js-range-datepicker');
            });
        </script>
    </body>
</html>