<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
      "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
<head>

    @include('template/meta')

    @include('template/seo')

    <title>Oper Workshop - @yield('title')</title>

    @yield('css_before')

    @include('template/link')

    @yield('css_after')

    @yield('js_before')

    @include('template/script')

    @yield('js_after')

</head>
<body>
    @yield('content')
</body>
</html>