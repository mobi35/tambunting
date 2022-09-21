<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
           <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />

        <title inertia>{{ config('app.name', 'Laravel') }}</title>

        @routes
        @vite('resources/js/app.js')
        @inertiaHead

        <!-- Google tag (gtag.js) -->

<script async src="https://www.googletagmanager.com/gtag/js?id=G-L913NS2HT0"></script>

<script> window.dataLayer = window.dataLayer || []; function gtag(){dataLayer.push(arguments);} gtag('js', new Date()); gtag('config', 'G-L913NS2HT0'); </script>

    </head>
    <body class="font-sans antialiased">

    <div id="fb-root"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v15.0&appId=671463846988197&autoLogAppEvents=1" nonce="5ZNysrfX"></script>


        @inertia
      <script src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
    <script async defer src="https://www.instagram.com/embed.js"></script>




    </body>

</html>
