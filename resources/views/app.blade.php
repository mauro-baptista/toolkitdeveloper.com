<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
    @vite(['resources/js/app.ts'])
    @routes
    @inertiaHead

    @if (config('services.fathom.domain') && config('services.fathom.site'))
        <script src="https://{{ config('services.fathom.domain') }}/script.js" data-spa="auto" data-site="{{ config('services.fathom.site') }}" defer=""></script>
    @endif
</head>
<body>
@inertia
</body>
</html>
