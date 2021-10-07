<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
</head>
<body>
<div id="app">
    <pdf-viewer pdf-url="{{ $url }}"></pdf-viewer>
</div>
<script src="{{ mix('js/app.js') }}"> </script>
</body>
</html>

