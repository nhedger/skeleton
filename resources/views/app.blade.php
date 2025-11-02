<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<title inertia>{{ config('app.name', 'Skeleton') }}</title>

	<link rel="icon" href="/favicon.ico" sizes="any">
	<link rel="icon" href="/favicon.svg" type="image/svg+xml">
	<link rel="apple-touch-icon" href="/apple-touch-icon.png">

	@vite(['frontend/app.ts', "frontend/pages/{$page['component']}/_page.vue"])
</head>

<body class="font-sans antialiased">
	@inertia
</body>

</html>