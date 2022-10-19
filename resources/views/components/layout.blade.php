<html lang="fa" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0,
           maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <title>کارشور</title>
    <link rel="stylesheet" href="/static/css/style.css">
    <script src="/static/js/jquery.min.js"></script>
</head>
<body>

{{ $slot }}


<footer class="bg-slate-700 text-white">
    <div class="container flex flex-col-reverse justify-between
    space-y-8.md:flex-row md:space-y-0 px-6 py-10 mx-auto">

        {{--        logo and social links container --}}
        <div class="flex flex-col-reverse items-center justify-between
         space-y-12 md:flex-col md:space-y-0 md:items-start">
            {{--        Logo--}}

            {{--            social links container--}}
        </div>
    </div>

</footer>

<script src="/static/js/main-script.js">

</script>

</body>
</html>
