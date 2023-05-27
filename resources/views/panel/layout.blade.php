<!DOCTYPE html>
<html lang="tr">
@php
    $site = \App\Models\Ayarlar::first();
@endphp

<head>
    <meta charset="utf-8">
    <title>
        E-very
    </title>
    <meta name="description" content="Page Title">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no, user-scalable=no, minimal-ui">
    <!-- Call App Mode on ios devices -->
    <meta name="apple-mobile-web-app-capable" content="yes" />
    <!-- Remove Tap Highlight on Windows Phone IE -->
    <meta name="msapplication-tap-highlight" content="no">
    <!-- base css -->
    @include('panel.include.style')
    @vite('resources/css/app.css')
    @yield('css')
    <!-- You can add your own stylesheet here to override any styles that comes before it
  <link rel="stylesheet" media="screen, print" href="css/your_styles.css">-->

    <style>
        i {
            color: #fff !important;
        }
    </style>

</head>

<body class="mod-bg-1 nav-function-fixed">
    <!-- DOC: script to save and load page settings -->
    <script>
        /**
         *	This script should be placed right after the body tag for fast execution 
         *	Note: the script is written in pure javascript and does not depend on thirdparty library
         **/
        'use strict';

        var classHolder = document.getElementsByTagName("BODY")[0],
            /** 
             * Load from localstorage
             **/
            themeSettings = (localStorage.getItem('themeSettings')) ? JSON.parse(localStorage.getItem('themeSettings')) :
            {},
            themeURL = themeSettings.themeURL || '',
            themeOptions = themeSettings.themeOptions || '';
        /** 
         * Load theme options
         **/
        if (themeSettings.themeOptions) {
            classHolder.className = themeSettings.themeOptions;
            console.log("%c✔ Theme settings loaded", "color: #148f32");
        } else {
            console.log("%c✔ Heads up! Theme settings is empty or does not exist, loading default settings...",
                "color: #ed1c24");
        }
        if (themeSettings.themeURL && !document.getElementById('mytheme')) {
            var cssfile = document.createElement('link');
            cssfile.id = 'mytheme';
            cssfile.rel = 'stylesheet';
            cssfile.href = themeURL;
            document.getElementsByTagName('head')[0].appendChild(cssfile);

        } else if (themeSettings.themeURL && document.getElementById('mytheme')) {
            document.getElementById('mytheme').href = themeSettings.themeURL;
        }
        /** 
         * Save to localstorage 
         **/
        var saveSettings = function() {
            themeSettings.themeOptions = String(classHolder.className).split(/[^\w-]+/).filter(function(item) {
                return /^(nav|header|footer|mod|display)-/i.test(item);
            }).join(' ');
            if (document.getElementById('mytheme')) {
                themeSettings.themeURL = document.getElementById('mytheme').getAttribute("href");
            };
            localStorage.setItem('themeSettings', JSON.stringify(themeSettings));
        }
        /** 
         * Reset settings
         **/
        var resetSettings = function() {
            localStorage.setItem("themeSettings", "");
        }
    </script>
    <!-- BEGIN Page Wrapper -->
    <div class="page-wrapper">
        <div class="page-inner">
            <!-- BEGIN Left Aside -->
            <aside class="page-sidebar bg-every">
                <div class="page-logo bg-every">
                    <a href="{{ __('dashboard') }}"
                        class="page-logo-link press-scale-down d-flex align-items-center position-relative">
                        <img src="{{ asset($site['siteLogo']) }}" alt="E-very" aria-roledescription="logo">
                        <span class="page-logo-text text-white font-bold mr-1">Firma Adı Gelecek</span>
                        <span class="position-absolute text-white opacity-50 small pos-top pos-right mr-2 mt-n2"></span>
                        <i class="fal fa-angle-down d-inline-block ml-1 fs-lg color-primary-300"></i>
                    </a>
                </div>
                <!-- BEGIN PRIMARY NAVIGATION -->
                <nav id="js-primary-nav" class="primary-nav" role="navigation">
                    <ul id="js-nav-menu" class="nav-menu">
                        
                            <li>
                                <a href="{{ __('dashboard') }}" class="text-white" title="Category"
                                    data-filter-tags="category">
                                    <i class="fal fa-file"></i>
                                    <span class="nav-link-text" data-i18n="nav.category">Anasayfa</span>
                                </a>
                            </li>
                        
                        
                            <li>
                                <a href="#" class="text-white font-bold" title="Category"
                                    data-filter-tags="category">
                                    <i class="fal fa-file"></i>
                                    <span class="nav-link-text" data-i18n="nav.category">Bloglar</span>
                                </a>
                                <ul>
                                    <li>
                                        <a href="#" class="text-white font-bold"
                                            title="Bloglar" data-filter-tags="utilities menu child">
                                            <span class="nav-link-text" data-i18n="nav.utilities_menu_child">Bloglar</span>
                                        </a>
                                        <a href="#"class="text-white font-bold"
                                            title="Blog Ekle" data-filter-tags="utilities menu child">
                                            <span class="nav-link-text" data-i18n="nav.utilities_menu_child">Blog Ekle</span>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        
                        
                            <li>
                                <a href="#" class="text-white font-bold"
                                    title="Alan Adlarım">
                                    <i class="fal fa-globe"></i>
                                    <span class="nav-link-text" data-i18n="nav.blankpage">Alan Adlarım</span>
                                </a>
                            </li>
                        
                        
                            <li>
                                <a href="#" title="Category" class="text-white font-bold"
                                    data-filter-tags="category">
                                    <i class="fal fa-file"></i>
                                    <span class="nav-link-text" data-i18n="nav.category">Ürün Kategorileri</span>
                                </a>
                                <ul>
                                    <li>
                                        <a href="#" class="text-white font-bold"
                                            title="Kategori Ekle" data-filter-tags="utilities menu child">
                                            <span class="nav-link-text" data-i18n="nav.utilities_menu_child">
                                                Kategori Ekle
                                            </span>
                                        </a>
                                        <a href="#" class="text-white font-bold"
                                            title="Kategorilerim" data-filter-tags="utilities menu child">
                                            <span class="nav-link-text" data-i18n="nav.utilities_menu_child">
                                                Kategoriler
                                            </span>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            
                            <li>
                                <a href="#" title="Category" class="text-white font-bold"
                                    data-filter-tags="category">
                                    <i class="fal fa-file"></i>
                                    <span class="nav-link-text" data-i18n="nav.category">Ürünler</span>
                                </a>
                                <ul>
                                    <li>
                                        <a href="#" class="text-white font-bold"
                                            title="Kategori Ekle" data-filter-tags="utilities menu child">
                                            <span class="nav-link-text" data-i18n="nav.utilities_menu_child">
                                                Ürün Ekle
                                            </span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" class="text-white font-bold"
                                            title="Kategori Ekle" data-filter-tags="utilities menu child">
                                            <span class="nav-link-text" data-i18n="nav.utilities_menu_child">
                                                Ürün Listesi
                                            </span>
                                        </a>
                                    </li>
                                </ul>
                            </li>

                            <li>
                                <a href="#" title="Category" class="text-white font-bold"
                                    data-filter-tags="category">
                                    <i class="fal fa-file"></i>
                                    <span class="nav-link-text" data-i18n="nav.category">Referanslar</span>
                                </a>
                                <ul>
                                    <li>
                                        <a href="#" class="text-white font-bold"
                                            title="Kategori Ekle" data-filter-tags="utilities menu child">
                                            <span class="nav-link-text" data-i18n="nav.utilities_menu_child">
                                                Referans Ekle
                                            </span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" class="text-white font-bold"
                                            title="Kategori Ekle" data-filter-tags="utilities menu child">
                                            <span class="nav-link-text" data-i18n="nav.utilities_menu_child">
                                                Referans Listesi
                                            </span>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a href="#" title="Category" class="text-white font-bold"
                                    data-filter-tags="category">
                                    <i class="fal fa-file"></i>
                                    <span class="nav-link-text" data-i18n="nav.category">Hizmetler</span>
                                </a>
                                <ul>
                                    <li>
                                        <a href="#" class="text-white font-bold"
                                            title="Kategori Ekle" data-filter-tags="utilities menu child">
                                            <span class="nav-link-text" data-i18n="nav.utilities_menu_child">
                                                Hizmet Ekle
                                            </span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" class="text-white font-bold"
                                            title="Kategori Ekle" data-filter-tags="utilities menu child">
                                            <span class="nav-link-text" data-i18n="nav.utilities_menu_child">
                                                Hizmet Listesi
                                            </span>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        <li>
                            <a href="#" title="Category" class="text-white font-bold"
                                data-filter-tags="category">
                                <i class="fal fa-file"></i>
                                <span class="nav-link-text" data-i18n="nav.category">Hesap Bilgilerim</span>
                            </a>
                            <ul>
                                <li>
                                    <a href="{{ __('profile') }}" class="text-white font-bold" title="Menu child"
                                        data-filter-tags="utilities menu child">
                                        <span class="nav-link-text" data-i18n="nav.utilities_menu_child">Genel
                                            Bilgiler</span>
                                    </a>
                                    <a href="{{ __('password') }}" class="text-white font-bold" title="Menu child"
                                        data-filter-tags="utilities menu child">
                                        <span class="nav-link-text" data-i18n="nav.utilities_menu_child">Şifre
                                            Değiştir</span>
                                    </a>
                                    <a href="javascript:void(0);" class="text-white font-bold" title="Menu child"
                                        data-filter-tags="utilities menu child">
                                        <span class="nav-link-text"
                                            data-i18n="nav.utilities_menu_child">Site Ayarları</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        
                            <li>
                                <a href="#" title="Category" class="text-white font-bold"
                                    data-filter-tags="category">
                                    <i class="fal fa-file"></i>
                                    <span class="nav-link-text" data-i18n="nav.category">Aboneler</span>
                                </a>
                                <ul>
                                    <li>
                                        <a href="#" class="text-white font-bold"
                                            title="Menu child" data-filter-tags="utilities menu child">
                                            <span class="nav-link-text" data-i18n="nav.utilities_menu_child">Abone
                                                Listesi</span>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        
                        
                            <li>
                                <a href="#" class="text-white font-bold"
                                    title="Alan Adlarım">
                                    <i class="fal fa-globe"></i>
                                    <span class="nav-link-text">İletişim</span>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="text-white font-bold" title="Kod Ekle">
                                    <i class="fal fa-globe"></i>
                                    <span class="nav-link-text">Kod Ekle</span>
                                </a>
                            </li>
                        

                    </ul>
                    <div class="filter-message js-filter-message bg-success-600"></div>
                </nav>
                <!-- END PRIMARY NAVIGATION -->
                <!-- NAV FOOTER -->
                <div class="nav-footer shadow-top bg-every">
                    <a href="#" onclick="return false;" data-action="toggle" data-class="nav-function-minify"
                        class="hidden-md-down">
                        <i class="ni ni-chevron-right"></i>
                        <i class="ni ni-chevron-right"></i>
                    </a>
                    <ul class="list-table m-auto nav-footer-buttons">
                        <li>
                            <a href="javascript:void(0);" data-toggle="tooltip" data-placement="top"
                                title="Chat logs">
                                <i class="fal fa-comments"></i>
                            </a>
                        </li>
                        <li>
                            <a href="javascript:void(0);" data-toggle="tooltip" data-placement="top"
                                title="Support Chat">
                                <i class="fal fa-life-ring"></i>
                            </a>
                        </li>
                        <li>
                            <a href="javascript:void(0);" data-toggle="tooltip" data-placement="top"
                                title="Make a call">
                                <i class="fal fa-phone"></i>
                            </a>
                        </li>
                    </ul>
                </div> <!-- END NAV FOOTER -->
            </aside>
            <!-- END Left Aside -->
            <div class="page-content-wrapper">
                <!-- BEGIN Page Header -->
                <header class="page-header bg-every" role="banner">
                    <!-- we need this logo when user switches to nav-function-top -->
                    <div class="page-logo bg-transparent text-white">
                        <a href="{{ __('panel') }}"
                            class="page-logo-link text-white press-scale-down d-flex align-items-center position-relative">
                            <img src="{{ $site['siteLogo'] }}" alt="E-very" aria-roledescription="logo">
                            <span class="page-logo-text text-white mr-1">E-very</span>
                            <span
                                class="position-absolute text-white opacity-50 small pos-top pos-right mr-2 mt-n2"></span>
                        </a>
                    </div>
                    <!-- DOC: nav menu layout change shortcut -->
                    <div class="hidden-md-down text-white font-bold dropdown-icon-menu position-relative">
                        <a href="#" class="header-btn text-white bg-every btn js-waves-off"
                            data-action="toggle" data-class="nav-function-hidden" title="Hide Navigation">
                            <i class="ni ni-menu"></i>
                        </a>
                        Hoşgeldiniz Sayın {{ Auth::user()->name }}
                        <a>
                        </a>
                        <ul>
                            <li>
                                <a href="#" class="btn text-white js-waves-off bg-every" data-action="toggle"
                                    data-class="nav-function-minify" title="Menüyü daralt">
                                    <i class="ni ni-minify-nav"></i>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="btn text-white js-waves-off bg-every" data-action="toggle"
                                    data-class="nav-function-fixed" title="Menüyü Kilitle">
                                    <i class="ni ni-lock-nav"></i>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <!-- DOC: mobile button appears during mobile width -->
                    <div class="hidden-lg-up">
                        <a href="#" class="header-btn text-white bg-every btn press-scale-down"
                            data-action="toggle" data-class="mobile-nav-on">
                            <i class="ni ni-menu"></i>
                        </a>
                    </div>
                    <div class="ml-auto d-flex">
                        <!-- activate app search icon (mobile) -->
                        <div class="hidden-sm-up">
                            <a href="#" class="header-icon" data-action="toggle" data-class="mobile-search-on"
                                data-focus="search-field" title="Search">
                                <i class="fal fa-search"></i>
                            </a>
                        </div>
                        <!-- app settings -->
                        <div class="hidden-md-down mt-3">
                            <a href="#" class="header-icon" data-toggle="modal"
                                data-target=".js-modal-settings">
                                <i class="fal fa-cog"></i>
                            </a>
                        </div>
                        <!-- app user menu -->
                        <div>
                            <a href="#" data-toggle="dropdown" class="header-icon text-white font-bold mt-3">
                                {{ Auth::user()->name }}
                            </a>
                            <div class="dropdown-menu bg-every dropdown-menu-animated dropdown-lg">
                                <div class="dropdown-header text-white d-flex flex-row py-4 rounded-top">
                                    <div class="d-flex flex-row align-items-center mt-1 mb-1 color-white">
                                        <div class="info-card-text">
                                            <div class="fs-lg text-truncate text-truncate-lg">{{ Auth::user()->name }}
                                            </div>
                                            <span
                                                class="text-truncate text-truncate-md opacity-80">{{ Auth::user()->email }}</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="dropdown-divider m-0"></div>
                                <a href="#" class="dropdown-item text-white hover:bg-blue-400 hover:text-black"
                                    data-action="app-reset">
                                    <span data-i18n="drpdwn.reset_layout">Ayarları Sıfırla</span>
                                </a>
                                <a href="#" class="dropdown-item text-white hover:bg-blue-400 hover:text-black"
                                    data-toggle="modal" data-target=".js-modal-settings">
                                    <span data-i18n="drpdwn.settings">Ayarlar</span>
                                </a>
                                <div class="dropdown-divider m-0"></div>
                                <a href="#" class="dropdown-item text-white hover:bg-blue-400 hover:text-black"
                                    data-action="app-fullscreen">
                                    <span data-i18n="drpdwn.fullscreen">Tam Ekran</span>
                                    <i class="float-right text-muted fw-n">F11</i>
                                </a>
                                <div class="dropdown-divider m-0"></div>
                                <a href="{{ route('profile.edit') }}"
                                    class="dropdown-item text-white hover:bg-blue-400 hover:text-black">
                                    <span data-i18n="drpdwn.fullscreen">Profilim</span>
                                </a>
                                <a href="{{ route('logout') }}"
                                    class="dropdown-item text-white font-bold hover:bg-blue-400 hover:text-black">
                                    <span data-i18n="drpdwn.fullscreen">Çıkış Yap</span>
                                </a>

                            </div>
                        </div>
                    </div>
                </header>
                <!-- END Page Header -->
                <!-- BEGIN Page Content -->
                <!-- the #js-page-content id is needed for some plugins to initialize -->
                <main id="js-page-content" role="main" class="page-content bg-sky">

                    @yield('content')

                </main>
                <!-- this overlay is activated only when mobile menu is triggered -->
                <div class="page-content-overlay" data-action="toggle" data-class="mobile-nav-on"></div>
                <!-- END Page Content -->
                <!-- BEGIN Page Footer -->
                <footer class="page-footer bg-sky" role="contentinfo">
                    <div class="d-flex align-items-center flex-1 text-muted">
                        <span class="hidden-md-down fw-700">{{ date('Y') }} © Vendetta Yazılım by&nbsp;</span>
                    </div>
                </footer>
                <!-- END Page Footer -->
                <!-- BEGIN Shortcuts -->

                <!-- END Shortcuts -->
                <!-- BEGIN Color profile -->
                <!-- this area is hidden and will not be seen on screens or screen readers -->
                <!-- we use this only for CSS color refernce for JS stuff -->
                <p id="js-color-profile" class="d-none">
                    <span class="color-primary-50"></span>
                    <span class="color-primary-100"></span>
                    <span class="color-primary-200"></span>
                    <span class="color-primary-300"></span>
                    <span class="color-primary-400"></span>
                    <span class="color-primary-500"></span>
                    <span class="color-primary-600"></span>
                    <span class="color-primary-700"></span>
                    <span class="color-primary-800"></span>
                    <span class="color-primary-900"></span>
                    <span class="color-info-50"></span>
                    <span class="color-info-100"></span>
                    <span class="color-info-200"></span>
                    <span class="color-info-300"></span>
                    <span class="color-info-400"></span>
                    <span class="color-info-500"></span>
                    <span class="color-info-600"></span>
                    <span class="color-info-700"></span>
                    <span class="color-info-800"></span>
                    <span class="color-info-900"></span>
                    <span class="color-danger-50"></span>
                    <span class="color-danger-100"></span>
                    <span class="color-danger-200"></span>
                    <span class="color-danger-300"></span>
                    <span class="color-danger-400"></span>
                    <span class="color-danger-500"></span>
                    <span class="color-danger-600"></span>
                    <span class="color-danger-700"></span>
                    <span class="color-danger-800"></span>
                    <span class="color-danger-900"></span>
                    <span class="color-warning-50"></span>
                    <span class="color-warning-100"></span>
                    <span class="color-warning-200"></span>
                    <span class="color-warning-300"></span>
                    <span class="color-warning-400"></span>
                    <span class="color-warning-500"></span>
                    <span class="color-warning-600"></span>
                    <span class="color-warning-700"></span>
                    <span class="color-warning-800"></span>
                    <span class="color-warning-900"></span>
                    <span class="color-success-50"></span>
                    <span class="color-success-100"></span>
                    <span class="color-success-200"></span>
                    <span class="color-success-300"></span>
                    <span class="color-success-400"></span>
                    <span class="color-success-500"></span>
                    <span class="color-success-600"></span>
                    <span class="color-success-700"></span>
                    <span class="color-success-800"></span>
                    <span class="color-success-900"></span>
                    <span class="color-fusion-50"></span>
                    <span class="color-fusion-100"></span>
                    <span class="color-fusion-200"></span>
                    <span class="color-fusion-300"></span>
                    <span class="color-fusion-400"></span>
                    <span class="color-fusion-500"></span>
                    <span class="color-fusion-600"></span>
                    <span class="color-fusion-700"></span>
                    <span class="color-fusion-800"></span>
                    <span class="color-fusion-900"></span>
                </p>
                <!-- END Color profile -->
            </div>
        </div>
    </div>
    <!-- END Page Wrapper -->
    <!-- BEGIN Page Settings -->
    <div class="modal fade js-modal-settings modal-backdrop-transparent" tabindex="-1" role="dialog"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-right modal-md">
            <div class="modal-content">
                <div class="dropdown-header bg-trans-gradient d-flex justify-content-center align-items-center w-100">
                    <h4 class="m-0 text-center color-white">
                        Kişiselleştir
                    </h4>
                    <button type="button" class="close text-white position-absolute pos-top pos-right p-2 m-1 mr-2"
                        data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"><i class="fal fa-times"></i></span>
                    </button>
                </div>
                <div class="modal-body p-0">
                    <div class="settings-panel">
                        <style>
                            @media only screen and (max-width: 992px) {
                                #mobileGizle {
                                    display: none;
                                }
                            }
                        </style>
                        <div class="div" id="mobileGizle">
                            <div class="mt-4 d-table w-100 px-5">
                                <div class="d-table-cell align-middle">
                                    <h5 class="p-0">
                                        Uygulama Düzeni
                                    </h5>
                                </div>
                            </div>
                            <div class="list" id="nfm">
                                <a href="#" onclick="return false;" class="btn btn-switch"
                                    data-action="toggle" data-class="nav-function-minify"></a>
                                <span class="onoffswitch-title">Sol Menüyü Daralt</span>
                            </div>
                            <div class="list" id="nft">
                                <a href="#" onclick="return false;" class="btn btn-switch"
                                    data-action="toggle" data-class="nav-function-top"></a>
                                <span class="onoffswitch-title">Sol Menüyü Üste Al</span>
                            </div>
                        </div>
                        <!-- <div class="list" id="nfh">
                            <a href="#" onclick="return false;" class="btn btn-switch" data-action="toggle" data-class="nav-function-hidden"></a>
                            <span class="onoffswitch-title">Hide Navigation</span>
                            <span class="onoffswitch-title-desc">roll mouse on edge to reveal</span>
                        </div> -->
                        <!-- <div class="list" id="fff">
                            <a href="#" onclick="return false;" class="btn btn-switch" data-action="toggle" data-class="footer-function-fixed"></a>
                            <span class="onoffswitch-title">Fixed Footer</span>
                            <span class="onoffswitch-title-desc">page footer is fixed</span>
                        </div> -->
                        <!-- <div class="list" id="mmb">
                            <a href="#" onclick="return false;" class="btn btn-switch" data-action="toggle" data-class="mod-main-boxed"></a>
                            <span class="onoffswitch-title">Boxed Layout</span>
                            <span class="onoffswitch-title-desc">Encapsulates to a container</span>
                        </div> -->
                        <!-- <div class="expanded">
                            <ul class="mb-3 mt-1">
                                <li>
                                    <div class="bg-fusion-50" data-action="toggle" data-class="mod-bg-1"></div>
                                </li>
                                <li>
                                    <div class="bg-warning-200" data-action="toggle" data-class="mod-bg-2"></div>
                                </li>
                                <li>
                                    <div class="bg-primary-200" data-action="toggle" data-class="mod-bg-3"></div>
                                </li>
                                <li>
                                    <div class="bg-success-300" data-action="toggle" data-class="mod-bg-4"></div>
                                </li>
                                <li>
                                    <div class="bg-white border" data-action="toggle" data-class="mod-bg-none"></div>
                                </li>
                            </ul>
                            <div class="list" id="mbgf">
                                <a href="#" onclick="return false;" class="btn btn-switch" data-action="toggle" data-class="mod-fixed-bg"></a>
                                <span class="onoffswitch-title">Fixed Background</span>
                            </div>
                        </div> -->
                        <!-- <div class="mt-4 d-table w-100 px-5">
                            <div class="d-table-cell align-middle">
                                <h5 class="p-0">
                                    Mobil Menu
                                </h5>
                            </div>
                        </div>
                        <div class="list" id="nmp">
                            <a href="#" onclick="return false;" class="btn btn-switch" data-action="toggle" data-class="nav-mobile-push"></a>
                            <span class="onoffswitch-title">Push Content</span>
                            <span class="onoffswitch-title-desc">Content pushed on menu reveal</span>
                        </div>
                        <div class="list" id="nmno">
                            <a href="#" onclick="return false;" class="btn btn-switch" data-action="toggle" data-class="nav-mobile-no-overlay"></a>
                            <span class="onoffswitch-title">No Overlay</span>
                            <span class="onoffswitch-title-desc">Removes mesh on menu reveal</span>
                        </div>
                        <div class="list" id="sldo">
                            <a href="#" onclick="return false;" class="btn btn-switch" data-action="toggle" data-class="nav-mobile-slide-out"></a>
                            <span class="onoffswitch-title">Off-Canvas <sup>(beta)</sup></span>
                            <span class="onoffswitch-title-desc">Content overlaps menu</span>
                        </div> -->
                        <div class="mt-4 d-table w-100 px-5">
                            <div class="d-table-cell align-middle">
                                <h5 class="p-0">
                                    Ulaşılabilirlik
                                </h5>
                            </div>
                        </div>
                        <div class="list" id="mbf">
                            <a href="#" onclick="return false;" class="btn btn-switch" data-action="toggle"
                                data-class="mod-bigger-font"></a>
                            <span class="onoffswitch-title">Daha Büyük Font Büyüklüğü</span>
                        </div>
                        <div class="list" id="mhc">
                            <a href="#" onclick="return false;" class="btn btn-switch" data-action="toggle"
                                data-class="mod-high-contrast"></a>
                            <span class="onoffswitch-title">Yüksek Kontrastlı Metin</span>
                        </div>
                        <!-- <div class="list" id="mpc">
                            <a href="#" onclick="return false;" class="btn btn-switch" data-action="toggle" data-class="mod-pace-custom"></a>
                            <span class="onoffswitch-title">Preloader Inside</span>
                            <span class="onoffswitch-title-desc">preloader will be inside content</span>
                        </div> -->
                        <div class="mt-4 d-table w-100 px-5">
                            <div class="d-table-cell align-middle">
                                <h5 class="p-0">
                                    Global Ayarlar
                                </h5>
                            </div>
                        </div>
                        <!-- <div class="list" id="mcbg">
                            <a href="#" onclick="return false;" class="btn btn-switch" data-action="toggle" data-class="mod-clean-page-bg"></a>
                            <span class="onoffswitch-title">Clean Page Background</span>
                            <span class="onoffswitch-title-desc">adds more whitespace</span>
                        </div> -->
                        <div class="list" id="mhni">
                            <a href="#" onclick="return false;" class="btn btn-switch" data-action="toggle"
                                data-class="mod-hide-nav-icons"></a>
                            <span class="onoffswitch-title">Sol Menü İkonlarını Gizle</span>
                        </div>
                        <div class="list" id="mdn">
                            <a href="#" onclick="return false;" class="btn btn-switch" data-action="toggle"
                                data-class="mod-nav-dark"></a>
                            <span class="onoffswitch-title">Koyu Navigasyon</span>
                        </div>
                        <hr class="mb-0 mt-4">
                        <div class="mt-4 d-table w-100 pl-5 pr-3">
                            <div class="d-table-cell align-middle">
                                <h5 class="p-0">
                                    Yazı Büyüklüğü
                                </h5>
                            </div>
                        </div>
                        <div class="list mt-1">
                            <div class="btn-group btn-group-sm btn-group-toggle my-2" data-toggle="buttons">
                                <label class="btn btn-default btn-sm" data-action="toggle-swap"
                                    data-class="root-text-sm" data-target="html">
                                    <input type="radio" name="changeFrontSize"> SM
                                </label>
                                <label class="btn btn-default btn-sm" data-action="toggle-swap"
                                    data-class="root-text" data-target="html">
                                    <input type="radio" name="changeFrontSize" checked=""> MD
                                </label>
                                <label class="btn btn-default btn-sm" data-action="toggle-swap"
                                    data-class="root-text-lg" data-target="html">
                                    <input type="radio" name="changeFrontSize"> LG
                                </label>
                                <label class="btn btn-default btn-sm" data-action="toggle-swap"
                                    data-class="root-text-xl" data-target="html">
                                    <input type="radio" name="changeFrontSize"> XL
                                </label>
                            </div>
                        </div>
                        <hr class="mb-0 mt-4">
                        <!-- <div class="mt-4 d-table w-100 pl-5 pr-3">
                            <div class="d-table-cell align-middle">
                                <h5 class="p-0 pr-2 d-flex">
                                    Tema Modları
                                    <a href="#" class="ml-auto fw-400 fs-xs" data-toggle="popover" data-trigger="focus" data-placement="top" title="" data-html="true" data-content="This is a brand new technique we are introducing which uses CSS variables to infiltrate color options. While this has been working nicely on modern browsers without much issues, some users <strong>may still face issues on Internet Explorer </strong>. Until these issues are resolved or Internet Explorer improves, this feature will remain in Beta" data-original-title="<span class='text-primary'><i class='fal fa-question-circle mr-1'></i> Why beta?</span>" data-template="<div class=&quot;popover bg-white border-white&quot; role=&quot;tooltip&quot;><div class=&quot;arrow&quot;></div><h3 class=&quot;popover-header bg-transparent&quot;></h3><div class=&quot;popover-body fs-xs&quot;></div></div>"><i class="fal fa-question-circle mr-1"></i> why beta?</a>
                                </h5>
                            </div>
                        </div> -->
                        <div class="pl-5 pr-3 py-3">
                            <div class="ie-only alert alert-warning d-none">
                                <h6>Internet Explorer Issue</h6>
                                This particular component may not work as expected in Internet Explorer. Please use with
                                caution.
                            </div>
                            <div class="row no-gutters">
                                <div class="col-4 pr-2 text-center">
                                    <div id="skin-default" data-action="toggle-replace"
                                        data-replaceclass="mod-skin-light mod-skin-dark" data-class=""
                                        data-toggle="tooltip" data-placement="top" title=""
                                        class="d-flex bg-white border border-primary rounded overflow-hidden text-success js-waves-on"
                                        data-original-title="Varsayılan Mod" style="height: 80px">
                                        <div
                                            class="bg-primary-600 bg-primary-gradient px-2 pt-0 border-right border-primary">
                                        </div>
                                        <div class="d-flex flex-column flex-1">
                                            <div class="bg-white border-bottom border-primary py-1"></div>
                                            <div class="bg-faded flex-1 pt-3 pb-3 px-2">
                                                <div class="py-3"
                                                    style="background:url('img/demo/s-1.png') top left no-repeat;background-size: 100%;">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    Varsayılan
                                </div>
                                <div class="col-4 px-1 text-center">
                                    <div id="skin-light" data-action="toggle-replace"
                                        data-replaceclass="mod-skin-dark" data-class="mod-skin-light"
                                        data-toggle="tooltip" data-placement="top" title=""
                                        class="d-flex bg-white border border-secondary rounded overflow-hidden text-success js-waves-on"
                                        data-original-title="Açık Mod" style="height: 80px">
                                        <div class="bg-white px-2 pt-0 border-right border-"></div>
                                        <div class="d-flex flex-column flex-1">
                                            <div class="bg-white border-bottom border- py-1"></div>
                                            <div class="bg-white flex-1 pt-3 pb-3 px-2">
                                                <div class="py-3"
                                                    style="background:url('img/demo/s-1.png') top left no-repeat;background-size: 100%;">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    Açık
                                </div>
                                <div class="col-4 pl-2 text-center">
                                    <div id="skin-dark" data-action="toggle-replace"
                                        data-replaceclass="mod-skin-light" data-class="mod-skin-dark"
                                        data-toggle="tooltip" data-placement="top" title=""
                                        class="d-flex bg-white border border-dark rounded overflow-hidden text-success js-waves-on"
                                        data-original-title="Koyu Mod" style="height: 80px">
                                        <div class="bg-fusion-500 px-2 pt-0 border-right"></div>
                                        <div class="d-flex flex-column flex-1">
                                            <div class="bg-fusion-600 border-bottom py-1"></div>
                                            <div class="bg-fusion-300 flex-1 pt-3 pb-3 px-2">
                                                <div class="py-3 opacity-30"
                                                    style="background:url('img/demo/s-1.png') top left no-repeat;background-size: 100%;">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    Koyu
                                </div>
                            </div>
                        </div>
                        <hr class="mb-0 mt-4">
                        <div class="pl-5 pr-3 py-3 bg-faded">
                            <div class="row no-gutters">
                                <div class="col-12 pl-1">
                                    <a href="#" class="btn btn-danger fw-500 btn-block"
                                        data-action="factory-reset">Ayarları Sıfırla</a>
                                </div>
                            </div>
                        </div>
                    </div> <span id="saving"></span>
                </div>
            </div>
        </div>
    </div>
    <!-- END Page Settings -->
    <!-- base vendor bundle:
   DOC: if you remove pace.js from core please note on Internet Explorer some CSS animations may execute before a page is fully loaded, resulting 'jump' animations
      + pace.js (recommended)
      + jquery.js (core)
      + jquery-ui-cust.js (core)
      + popper.js (core)
      + bootstrap.js (core)
      + slimscroll.js (extension)
      + app.navigation.js (core)
      + ba-throttle-debounce.js (core)
      + waves.js (extension)
      + smartpanels.js (extension)
      + src/../jquery-snippets.js (core) -->

    @include('panel.include.script')
    <!--This page contains the basic JS and CSS files to get started on your project. If you need aditional addon's or plugins please see scripts located at the bottom of each page in order to find out which JS/CSS files to add.-->
</body>
<!-- END Body -->

</html>
