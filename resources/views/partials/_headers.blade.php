<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="{{ config('app.name') }} | {{ $page_title ?? 'Let\'s Help Each Other - Every review is a business building block. ReviewFeed is a review platform open to everyone in Australia where you can share your experiences to create these building blocks and help others make more informed decisions.' }}">
    <title>{{ config('app.name') }} | {{ $page_title ?? 'Every Review is a building block! | Australian Company Reviews' }}</title>

    <meta property="og:url"           content="{{ Request::url() }}" />
    <meta property="og:type"          content="website" />
    <meta property="og:title"         content="{{ config('app.name') }} | {{ $page_title ?? 'Every Review is a building block! | Australian Company Reviews' }}" />
    <meta property="og:description"   content="{{ config('app.name') }} | {{ $page_description ?? 'Let\'s Help Each Other - Every review is a business building block. ReviewFeed is a review platform open to everyone in Australia where you can share your experiences to create these building blocks and help others make more informed decisions.' }}" />
    <meta property="og:image"         content="{{ asset('img/home_section_1.jpg') }}" />

    <!-- Favicons-->
    <link rel="shortcut icon" href="{{ asset('img/favicon.png') }}" type="image/x-icon">
    <link rel="apple-touch-icon" type="image/x-icon" href="{{ asset('img/favicon.png') }}">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="72x72" href="{{ asset('img/favicon.png') }}">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="114x114" href="{{ asset('img/favicon.png') }}">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="144x144" href="{{ asset('img/favicon.png') }}">

    <!-- GOOGLE WEB FONT -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">

    <!-- BASE CSS -->
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
	<link href="{{ asset('css/vendors.css') }}" rel="stylesheet">

    <!-- CUSTOM CSS -->
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet">
    <link href="{{ asset('css/typeahead.css') }}" rel="stylesheet">

    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-1TW4LTYJ5E"></script>
    <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', 'G-1TW4LTYJ5E');
    </script>

    <script data-ad-client="ca-pub-7363259872058268" async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
</head>
