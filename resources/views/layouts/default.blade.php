<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js" lang="">
<!--<![endif]-->

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>ShaynaAdmin - HTML5 Admin Template</title>
    <meta name="description" content="ShaynaAdmin - HTML5 Admin Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    {{-- style.blade --}}
    @stack('before-style')
    @include('includes.styles')
    @stack('after-style')
</head>

<body>
    <!-- Left Panel -->
    <aside id="left-panel" class="left-panel">
        {{-- navbar.blade --}}
        @include('includes.navbar')
    </aside>
    <!-- end of left-panel -->

    <!-- Right Panel -->
    <div id="right-panel" class="right-panel">

        {{-- header.blade --}}
        @include('includes.header')

        {{-- Content --}}
        <div class="content">
            @yield('content')
        </div>

        <div class="clearfix"></div>
    </div>
    <!-- end of right-panel -->

    {{-- scripts.blade --}}
    @stack('before-script')
    @include('includes.scripts')
    @stack('after-script')
    
</body>

</html>
