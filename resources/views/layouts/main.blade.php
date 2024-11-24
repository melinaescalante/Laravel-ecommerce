<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title')</title>
    <link href="{{url('css/app.css')}}" rel="stylesheet">
    <link href="{{url('css/bootstrap.min.css')}}" rel="stylesheet">

</head>

<body>
    <div class="container">

        @if (session()->has('feedback.message'))
        <div class="alert alert-{{ session('feedback.alert') }} d-flex align-items-center">
        {!! session()->get('feedback.message') !!}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif
    </div>
    @yield('content')



<footer class="fixed-bottom b-0 bg-body-secondary" style="height:100px, width:100vw">
    <ul class="d-flex flex-column align-items-center justify-content-center" >
        <li class="list-group-item m-3">Melina Micaela Escalante</li>
        <li class="list-group-item m-3">Portales y comercio electrónico</li>
    </ul>
</footer>
    <script src="{{url('js/bootstrap.bundle.min.js')}}">
    </script>
</body>

</html>
