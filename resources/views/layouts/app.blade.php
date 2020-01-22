<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        {{-- CSRF Token --}}
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>@if (trim($__env->yieldContent('template_title')))@yield('template_title') | @endif {{ config('app.name', Lang::get('titles.app')) }}</title>
        <meta name="description" content="Ventes éphémères de petites et grandes plantes d'intérieur partout en France">
        <meta name="author" content="Plantes Addict">
        <link rel="shortcut icon" href="{{url("storage/favicon.ico")}}">

        {{-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries --}}
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
            <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->

        {{-- Fonts --}}
        @yield('template_linked_fonts')

        {{-- Styles --}}
        <link href="{{ mix('/css/app.css') }}" rel="stylesheet">

        @yield('template_linked_css')

        <style type="text/css">
            @yield('template_fastload_css')

            @if (Auth::User() && (Auth::User()->profile) && (Auth::User()->profile->avatar_status == 0))
                .user-avatar-nav {
                    background: url({{ Gravatar::get(Auth::user()->email) }}) 50% 50% no-repeat;
                    background-size: auto 100%;
                }
            @endif

        </style>

        <style >

        :root {
        --blue: #5e72e4;
        --indigo: #5603ad;
        --purple: #8965e0;
        --pink: #f3a4b5;
        --red: #f5365c;
        --orange: #fb6340;
        --yellow: #ffd600;
        --green: #2dce89;
        --teal: #11cdef;
        --cyan: #2bffc6;
        --white: #fff;
        --gray: #8898aa;
        --gray-dark: #32325d;
        --light: #ced4da;
        --lighter: #e9ecef;
        --primary: #5e72e4;
        --secondary: #f7fafc;
        --success: #2dce89;
        --info: #11cdef;
        --warning: #fb6340;
        --danger: #f5365c;
        --light: #adb5bd;
        --dark: #212529;
        --default: #172b4d;
        --white: #fff;
        --neutral: #fff;
        --darker: black;
        --breakpoint-xs: 0;
        --breakpoint-sm: 576px;
        --breakpoint-md: 768px;
        --breakpoint-lg: 992px;
        --breakpoint-xl: 1200px;
        --font-family-sans-serif: Open Sans, sans-serif;
        --font-family-monospace: SFMono-Regular, Menlo, Monaco, Consolas, 'Liberation Mono', 'Courier New', monospace;
        }




        .input-group-prepend {
        margin-right: -1px;
        }

        .input-group-text {
        font-size: 1rem;
        font-weight: 400;
        line-height: 1.5;
        display: flex;
        margin-bottom: 0;
        padding: .625rem .75rem;
        text-align: center;
        white-space: nowrap;
        color: #adb5bd;
        border: 1px solid #cad1d7;
        border-radius: .375rem;
        background-color: #fff;
        align-items: center;
        }

        .input-group-text input[type='radio'],
        .input-group-text input[type='checkbox'] {
        margin-top: 0;
        }

        .input-group>.input-group-prepend>.btn,
        .input-group>.input-group-prepend>.input-group-text {
        border-top-right-radius: 0;
        border-bottom-right-radius: 0;
        }

        .input-group>.input-group-prepend:not(:first-child)>.btn,
        .input-group>.input-group-prepend:not(:first-child)>.input-group-text,
        .input-group>.input-group-prepend:first-child>.btn:not(:first-child),
        .input-group>.input-group-prepend:first-child>.input-group-text:not(:first-child) {
        border-top-left-radius: 0;
        border-bottom-left-radius: 0;
        }

        .nav {
        display: flex;
        margin-bottom: 0;
        padding-left: 0;
        list-style: none;
        flex-wrap: wrap;
        }

        .nav-link {
        display: block;
        padding: .25rem .75rem;
        }

        .nav-link:hover,
        .nav-link:focus {
        text-decoration: none;
        }

        .navbar {
        position: relative;
        display: flex;
        padding: 1rem 1rem;
        flex-wrap: wrap;
        align-items: center;
        justify-content: space-between;
            z-index: 40;
        }

        .navbar>.container,
        .navbar>.container-fluid {
        display: flex;
        flex-wrap: wrap;
        align-items: center;
        justify-content: space-between;
        }

        .navbar-nav {
        display: flex;
        flex-direction: column;
        margin-bottom: 0;
        padding-left: 0;
        list-style: none;

        }

        .navbar-nav .nav-link {
        padding-right: 0;
        padding-left: 0;
        }

        .navbar-nav .dropdown-menu {
        position: static;
        float: none;
        }

        @media (max-width: 767.98px) {
        .navbar-expand-md>.container,
        .navbar-expand-md>.container-fluid {
        padding-right: 0;
        padding-left: 0;
        }
        }

        @media (min-width: 768px) {
        .navbar-expand-md {
        flex-flow: row nowrap;
        justify-content: flex-start;
        }

        .navbar-expand-md .navbar-nav {
        flex-direction: row;
        }

        .navbar-expand-md .navbar-nav .dropdown-menu {
        position: absolute;
        }

        .navbar-expand-md .navbar-nav .nav-link {
        padding-right: 1rem;
        padding-left: 1rem;
        }

        .navbar-expand-md>.container,
        .navbar-expand-md>.container-fluid {
        flex-wrap: nowrap;
        }
        }

        .navbar-dark .navbar-nav .nav-link {
        color: rgba(255, 255, 255, .95);
        }

        .navbar-dark .navbar-nav .nav-link:hover,
        .navbar-dark .navbar-nav .nav-link:focus {
        color: rgba(255, 255, 255, .65);
        }

        .card {
        position: relative;
        display: flex;
        flex-direction: column;
        min-width: 0;
        word-wrap: break-word;
        border: 1px solid rgba(0, 0, 0, .05);
        border-radius: .375rem;
        background-color: #fff;
        background-clip: border-box;
        }

        .card>hr {
        margin-right: 0;
        margin-left: 0;
        }

        .card-body {
        padding: 1.5rem;
        flex: 1 1 auto;
        }

        .card-header {
        margin-bottom: 0;
        padding: 1.25rem 1.5rem;
        border-bottom: 1px solid rgba(0, 0, 0, .05);
        background-color: #fff;
        }

        .card-header:first-child {
        border-radius: calc(.375rem - 1px) calc(.375rem - 1px) 0 0;
        }

        @keyframes progress-bar-stripes {
        from {
        background-position: 1rem 0;
        }

        to {
        background-position: 0 0;
        }
        }

        .progress {
        font-size: .75rem;
        display: flex;
        overflow: hidden;
        height: 1rem;
        border-radius: .375rem;
        background-color: #e9ecef;
        box-shadow: inset 0 .1rem .1rem rgba(0, 0, 0, .1);
        }

        .media {
        display: flex;
        align-items: flex-start;
        }

        .media-body {
        flex: 1 1;
        }

        .bg-secondary {
        background-color: #f7fafc !important;
        }

        a.bg-secondary:hover,
        a.bg-secondary:focus,
        button.bg-secondary:hover,
        button.bg-secondary:focus {
        background-color: #d2e3ee !important;
        }

        .bg-default {
        background-color: #172b4d !important;
        }

        a.bg-default:hover,
        a.bg-default:focus,
        button.bg-default:hover,
        button.bg-default:focus {
        background-color: #0b1526 !important;
        }

        .bg-white {
        background-color: #fff !important;
        }

        a.bg-white:hover,
        a.bg-white:focus,
        button.bg-white:hover,
        button.bg-white:focus {
        background-color: #e6e6e6 !important;
        }

        .bg-white {
        background-color: #fff !important;
        }

        .border-0 {
        border: 0 !important;
        }

        .rounded-circle {
        border-radius: 50% !important;
        }

        .d-none {
        display: none !important;
        }

        .d-flex {
        display: flex !important;
        }

        @media (min-width: 768px) {

        .d-md-flex {
        display: flex !important;
        }
        }

        @media (min-width: 992px) {

        .d-lg-inline-block {
        display: inline-block !important;
        }

        .d-lg-block {
        display: block !important;
        }
        }

        .justify-content-center {
        justify-content: center !important;
        }

        .justify-content-between {
        justify-content: space-between !important;
        }

        .align-items-center {
        align-items: center !important;
        }

        @media (min-width: 1200px) {

        .justify-content-xl-between {
        justify-content: space-between !important;
        }
        }

        .float-right {
        float: right !important;
        }

        .shadow,
        .card-profile-image img {
        box-shadow: 0 0 2rem 0 rgba(136, 152, 170, .15) !important;
        }

        .m-0 {
        margin: 0 !important;
        }

        .mt-0 {
        margin-top: 0 !important;
        }

        .mb-0 {
        margin-bottom: 0 !important;
        }

        .mr-2 {
        margin-right: .5rem !important;
        }

        .ml-2 {
        margin-left: .5rem !important;
        }

        .mr-3 {
        margin-right: 1rem !important;
        }

        .mt-4,
        .my-4 {
        margin-top: 1.5rem !important;
        }

        .mr-4 {
        margin-right: 1.5rem !important;
        }

        .mb-4,
        .my-4 {
        margin-bottom: 1.5rem !important;
        }

        .mb-5 {
        margin-bottom: 3rem !important;
        }

        .mt--7 {
        margin-top: -2rem !important;
        }

        .pt-0 {
        padding-top: 0 !important;
        }

        .pr-0 {
        padding-right: 0 !important;
        }

        .pb-0 {
        padding-bottom: 0 !important;
        }

        .pt-5 {
        padding-top: 3rem !important;
        }

        .pt-8 {
        padding-top: 8rem !important;
        }

        .pb-8 {
        padding-bottom: 8rem !important;
        }

        .m-auto {
        margin: auto !important;
        }

        @media (min-width: 768px) {

        .mt-md-5 {
        margin-top: 3rem !important;
        }

        .pt-md-4 {
        padding-top: 1.5rem !important;
        }

        .pb-md-4 {
        padding-bottom: 1.5rem !important;
        }
        }

        @media (min-width: 992px) {

        .pl-lg-4 {
        padding-left: 1.5rem !important;
        }

        .pt-lg-8 {
        padding-top: 8rem !important;
        }

        .ml-lg-auto {
        margin-left: auto !important;
        }
        }

        @media (min-width: 1200px) {

        .mb-xl-0 {
        margin-bottom: 0 !important;
        }
        }

        .text-right {
        text-align: right !important;
        }

        .text-center {
        text-align: center !important;
        }

        .text-uppercase {
        text-transform: uppercase !important;
        }

        .font-weight-light {
        font-weight: 300 !important;
        }

        .font-weight-bold {
        font-weight: 600 !important;
        }

        .text-white {
        color: #fff !important;
        }

        .text-white {
        color: #fff !important;
        }

        a.text-white:hover,
        a.text-white:focus {
        color: #e6e6e6 !important;
        }

        .text-muted {
        color: #8898aa !important;
        }

        @media print {
        *,
        *::before,
        *::after {
        box-shadow: none !important;
        text-shadow: none !important;
        }

        a:not(.btn) {
        text-decoration: underline;
        }

        img {
        page-break-inside: avoid;
        }

        p,
        h3 {
        orphans: 3;
        widows: 3;
        }

        h3 {
        page-break-after: avoid;
        }

        @ page {
        size: a3;
        }

        body {
        min-width: 992px !important;
        }

        .container {
        min-width: 992px !important;
        }

        .navbar {
        display: none;
        }
        }

        figcaption,
        main {
        display: block;
        }

        main {
        overflow: hidden;
        }

        .bg-white {
        background-color: #fff !important;
        }

        a.bg-white:hover,
        a.bg-white:focus,
        button.bg-white:hover,
        button.bg-white:focus {
        background-color: #e6e6e6 !important;
        }

        .bg-gradient-default {
        background: linear-gradient(87deg, #d93337 30%, #f75456 100%) !important;
        }



        @keyframes floating-lg {
        0% {
        transform: translateY(0px);
        }

        50% {
        transform: translateY(15px);
        }

        100% {
        transform: translateY(0px);
        }
        }

        @keyframes floating {
        0% {
        transform: translateY(0px);
        }

        50% {
        transform: translateY(10px);
        }

        100% {
        transform: translateY(0px);
        }
        }

        @keyframes floating-sm {
        0% {
        transform: translateY(0px);
        }

        50% {
        transform: translateY(5px);
        }

        100% {
        transform: translateY(0px);
        }
        }

        .opacity-8 {
        opacity: .8 !important;
        }
        .opacity-6 {
        opacity: .6 !important;
        }

        .opacity-8 {
        opacity: .9 !important;
        }

        .center {
        left: 50%;
        transform: translateX(-50%);
        }

        [class*='shadow'] {
        transition: all .15s ease;
        }

        .font-weight-300 {
        font-weight: 300 !important;
        }

        .text-sm {
        font-size: .875rem !important;
        }

        .text-white {
        color: #fff !important;
        }

        a.text-white:hover,
        a.text-white:focus {
        color: #e6e6e6 !important;
        }

        .avatar {
        font-size: 1rem;
        display: inline-flex;
        width: 48px;
        height: 48px;
        color: #fff;
        border-radius: 50%;
        background-color: #adb5bd;
        align-items: center;
        justify-content: center;
        }

        .avatar img {
        width: 100%;
        border-radius: 50%;
        }

        .avatar-sm {
        font-size: .875rem;
        width: 36px;
        height: 36px;
        }

        .btn {
        font-size: .875rem;
        position: relative;
        transition: all .15s ease;
        letter-spacing: .025em;
        text-transform: none;
        will-change: transform;
        }

        .btn:hover {
        transform: translateY(-1px);
        box-shadow: 0 7px 14px rgba(50, 50, 93, .1), 0 3px 6px rgba(0, 0, 0, .08);
        }

        .btn:not(:last-child) {
        margin-right: .5rem;
        }

        .btn i:not(:first-child) {
        margin-left: .5rem;
        }

        .btn i:not(:last-child) {
        margin-right: .5rem;
        }

        .input-group .btn {
        margin-right: 0;
        transform: translateY(0);
        }

        .btn-sm {
        font-size: .75rem;
        }

        [class*='btn-outline-'] {
        border-width: 1px;
        }

        .card-profile-image {
        position: relative;
        }

        .card-profile-image img {
        position: absolute;
        left: 50%;
        max-width: 180px;
        transition: all .15s ease;
        transform: translate(-50%, -30%);
        border-radius: .375rem;
        }

        .card-profile-image img:hover {
        transform: translate(-50%, -33%);
        }

        .card-profile-stats {
        padding: 1rem 0;
        }

        .card-profile-stats>div {
        margin-right: 1rem;
        padding: .875rem;
        text-align: center;
        }

        .card-profile-stats>div:last-child {
        margin-right: 0;
        }

        .card-profile-stats>div .heading {
        font-size: 1.1rem;
        font-weight: bold;
        display: block;
        }

        .card-profile-stats>div .description {
        font-size: .875rem;
        color: #adb5bd;
        }

        .main-content {
        position: relative;
        }

        .main-content .navbar-top {
        position: absolute;

        top: 0;
        left: 0;
        width: 100%;
        padding-right: 0 !important;
        padding-left: 0 !important;
        background-color: transparent;
        }

        @media (min-width: 768px) {
        .main-content .container-fluid {
        padding-right: 39px !important;
        padding-left: 39px !important;
        }
        }

        @media (max-width: 768px) {
        .mt--7 {
        margin-top: 40px !important;
        }
        }



        .footer {
        padding: 2.5rem 0;
        background: #f7fafc;
        }

        .footer .nav .nav-item .nav-link {
        color: #8898aa !important;
        }

        .footer .nav .nav-item .nav-link:hover {
        color: #525f7f !important;
        }

        .footer .copyright {
        font-size: .875rem;
        }

        .form-control-label {
        font-size: .875rem;
        font-weight: 600;
        color: #525f7f;
        }

        .form-control {
        font-size: .875rem;
        }

        .form-control:focus:-ms-input-placeholder {
        color: #adb5bd;
        }

        .form-control:focus::-ms-input-placeholder {
        color: #adb5bd;
        }

        .form-control:focus::placeholder {
        color: #adb5bd;
        }

        textarea[resize='none'] {
        resize: none !important;
        }

        textarea[resize='both'] {
        resize: both !important;
        }

        textarea[resize='vertical'] {
        resize: vertical !important;
        }

        textarea[resize='horizontal'] {
        resize: horizontal !important;
        }

        .form-control-alternative {
        transition: box-shadow .15s ease;
        border: 0;
        box-shadow: 0 1px 3px rgba(50, 50, 93, .15), 0 1px 0 rgba(0, 0, 0, .02);
        }

        .form-control-alternative:focus {
        box-shadow: 0 4px 6px rgba(50, 50, 93, .11), 0 1px 3px rgba(0, 0, 0, .08);
        }

        .input-group {
        transition: all .15s ease;
        border-radius: .375rem;
        box-shadow: none;
        }

        .input-group .form-control {
        box-shadow: none;
        }

        .input-group .form-control:not(:first-child) {
        padding-left: 0;
        border-left: 0;
        }

        .input-group .form-control:not(:last-child) {
        padding-right: 0;
        border-right: 0;
        }

        .input-group .form-control:focus {
        box-shadow: none;
        }

        .input-group-text {
        transition: all .2s cubic-bezier(.68, -.55, .265, 1.55);
        }

        .input-group-alternative {
        transition: box-shadow .15s ease;
        border: 0;
        box-shadow: 0 1px 3px rgba(50, 50, 93, .15), 0 1px 0 rgba(0, 0, 0, .02);
        }

        .input-group-alternative .form-control,
        .input-group-alternative .input-group-text {
        border: 0;
        box-shadow: none;
        }

        .focused .input-group-alternative {
        box-shadow: 0 4px 6px rgba(50, 50, 93, .11), 0 1px 3px rgba(0, 0, 0, .08) !important;
        }

        .focused .input-group {
        box-shadow: none;
        }

        .focused .input-group-text {
        color: #8898aa;
        border-color: rgba(50, 151, 211, .25);
        background-color: #fff;
        }

        .focused .form-control {
        border-color: rgba(50, 151, 211, .25);
        }

        .header {
        position: relative;
        }

        .input-group {
        transition: all .15s ease;
        border-radius: .375rem;
        box-shadow: none;
        }

        .input-group .form-control {
        box-shadow: none;
        }

        .input-group .form-control:not(:first-child) {
        padding-left: 0;
        border-left: 0;
        }

        .input-group .form-control:not(:last-child) {
        padding-right: 0;
        border-right: 0;
        }

        .input-group .form-control:focus {
        box-shadow: none;
        }

        .input-group-text {
        transition: all .2s cubic-bezier(.68, -.55, .265, 1.55);
        }

        .input-group-alternative {
        transition: box-shadow .15s ease;
        border: 0;
        box-shadow: 0 1px 3px rgba(50, 50, 93, .15), 0 1px 0 rgba(0, 0, 0, .02);
        }

        .input-group-alternative .form-control,
        .input-group-alternative .input-group-text {
        border: 0;
        box-shadow: none;
        }

        .focused .input-group-alternative {
        box-shadow: 0 4px 6px rgba(50, 50, 93, .11), 0 1px 3px rgba(0, 0, 0, .08) !important;
        }

        .focused .input-group {
        box-shadow: none;
        }

        .focused .input-group-text {
        color: #8898aa;
        border-color: rgba(50, 151, 211, .25);
        background-color: #fff;
        }

        .focused .form-control {
        border-color: rgba(50, 151, 211, .25);
        }

        .mask {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;

        transition: all .15s ease;
        }

        @media screen and (prefers-reduced-motion: reduce) {
        .mask {
        transition: none;
        }
        }

        .nav-link {
        color: #525f7f;
        }

        .nav-link:hover {
        color: #5e72e4;
        }

        .nav-link i.ni {
        position: relative;
        top: 2px;
        }

        .navbar-search .input-group {
        border: 2px solid;
        border-radius: 2rem;
        background-color: transparent;
        }

        .navbar-search .input-group .input-group-text {
        padding-left: 1rem;
        background-color: transparent;
        }

        .navbar-search .form-control {
        width: 270px;
        background-color: transparent;
        }

        .navbar-search-dark .input-group {
        border-color: rgba(255, 255, 255, .6);
        }

        .navbar-search-dark .input-group-text {
        color: rgba(255, 255, 255, .6);
        }

        .navbar-search-dark .form-control {
        color: rgba(255, 255, 255, .9);
        }

        .navbar-search-dark .form-control:-ms-input-placeholder {
        color: rgba(255, 255, 255, .6);
        }

        .navbar-search-dark .form-control::-ms-input-placeholder {
        color: rgba(255, 255, 255, .6);
        }

        .navbar-search-dark .form-control::placeholder {
        color: rgba(255, 255, 255, .6);
        }

        .navbar-search-dark .focused .input-group {
        border-color: rgba(255, 255, 255, .9);
        }


        @media (max-width: 767.98px) {
        .navbar-nav .nav-link {
        padding: .625rem 0;
        color: #172b4d !important;
        }

        .navbar-nav .dropdown-menu {
        min-width: auto;
        box-shadow: none;

        }
        }

        @keyframes show-navbar-collapse {
        0% {
        transform: scale(.95);
        transform-origin: 100% 0;
        opacity: 0;
        }

        100% {
        transform: scale(1);
        opacity: 1;
        }
        }

        @keyframes hide-navbar-collapse {
        from {
        transform: scale(1);
        transform-origin: 100% 0;
        opacity: 1;
        }

        to {
        transform: scale(.95);
        opacity: 0;
        }
        }

        .progress {
        overflow: hidden;
        height: 8px;
        margin-bottom: 1rem;
        border-radius: .25rem;
        background-color: #e9ecef;
        box-shadow: inset 0 1px 2px rgba(0, 0, 0, .1);
        }

        p {
        font-size: 1rem;
        font-weight: 300;
        line-height: 1.7;
        }

        .description {
        font-size: .875rem;
        }

        .heading {
        font-size: .95rem;
        font-weight: 600;
        letter-spacing: .025em;
        text-transform: uppercase;
        }

        .heading-small {
        font-size: .75rem;
        padding-top: .25rem;
        padding-bottom: .25rem;
        letter-spacing: .04em;
        text-transform: uppercase;
        }

        .display-2 span {
        font-weight: 300;
        display: block;
        }

        @media (max-width: 768px) {
        .btn {
        margin-bottom: 10px;
        }
        }

        #navbar .navbar {
        margin-bottom: 20px;
        }

        </style>

        {{-- Scripts --}}
        <script>
            window.Laravel = {!! json_encode([
                'csrfToken' => csrf_token(),
            ]) !!};
        </script>
        @yield('head')

    </head>
    <body>
        <div id="app">

            @include('partials.nav')

            <main class="py-2">

                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            @include('partials.form-status')
                        </div>
                    </div>
                </div>

                @yield('content')

            </main>

        </div>

        {{-- Scripts --}}
        <script src="{{ mix('/js/app.js') }}"></script>

        @if(config('settings.googleMapsAPIStatus'))
            {!! HTML::script('//maps.googleapis.com/maps/api/js?key='.config("settings.googleMapsAPIKey").'&libraries=places&dummy=.js', array('type' => 'text/javascript')) !!}
        @endif

        @yield('footer_scripts')

    </body>
</html>

