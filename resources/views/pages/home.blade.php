<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    @include('pages.partials.head')
</head>
<body class="bg-white text-slate-800 font-sans antialiased">

    @include('pages.partials.navbar')

    <main>
        @include('pages.partials.hero')
        @include('pages.partials.about')
        @include('pages.partials.programs')
        @include('pages.partials.pricing')
        @include('pages.partials.register')
    </main>

    @include('pages.partials.footer')

    @include('pages.partials.scripts')
</body>
</html>