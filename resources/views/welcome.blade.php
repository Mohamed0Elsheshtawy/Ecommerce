<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Kufam&display=swap" rel="stylesheet">
	{{--<title>hhhhhh</title>--}}

	@vite('resources/css/app.css')
	@php
        $locale = app()->currentLocale();
        $direction = $locale === 'ar' ? 'rtl' : 'ltr';
        $identifier = isset(request()->segments()[1]) ? request()->segments()[1] : 'none';
        @endphp
        <script>
            window.page = {
                id: '{{ $identifier }}',
                direction: '{{ $direction }}',
                lang: '{{ $locale }}',
            }
        </script>
</head>

<body>

	<div id="app">
     
    </div>

	@vite('resources/js/app.js')
</body>

</html>