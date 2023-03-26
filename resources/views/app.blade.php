<!doctype html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}" />
        <!-- Bootstrap CSS -->
        <link rel="icon" type="image/png" href="https://openaiapi-site.azureedge.net/public-assets/d/77509de55a/favicon.png">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js" integrity="sha512-STof4xm1wgkfm7heWqFJVn58Hm3EtS31XFaagaa8VMReCXAkQnJZ+jEy8PCC/iT18dFy95WcExNHFTqLyp72eQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script type="text/javascript">
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
        </script>
        <title>OpenAI Laravel Playground</title>
        <link rel="preconnect" href="https://fonts.googleapis.com"><link rel="preconnect" href="https://fonts.gstatic.com" crossorigin><link href="https://fonts.googleapis.com/css2?family=Noto+Sans:wght@200&display=swap" rel="stylesheet">
        <style>
            #img {
              height: 300px;
              position: relative;
            }
            #img {
              margin: 0;
              position: absolute;
              top: 40%;
              left: 45%;
              -ms-transform: translate(-50%, -50%);
              transform: translate(-50%, -50%);
            }
            .container #button {
                position: absolute;
                top: 65%;
                left: 50%;
                transform: translate(-50%, -50%);
                -ms-transform: translate(-50%, -50%);
                background-color: gray;
                color: white;
                font-size: 16px;
                padding: 16px 30px;
                border: none;
                cursor: pointer;
                border-radius: 5px;
                text-align: center;
            }
            .container #button:hover {
                background-color: black;
                color: white;
            }
            .text{
                font-weight: 700;
                font-size: 50px;
                font-family: 'Noto Sans';
                margin-left: 50px;
            }
            /* .vertical {
                border-left: 1px solid black;
                height: 225px;
                position:absolute;
                left: 30%;
            }
            .vertical1 {
                border-left: 1px solid black;
                height: 225px;
                position:absolute;
                left: 35%;
            } */
            #tab{
                /* border: 2px solid black;  */
                width: 110%;
                margin-left: -5%;
                font-weight: 700;
                font-size: 40px;
                font-family: 'Noto Sans';
            }
            .result{
                font-size: 20px;
            }
            #label{
                line-height: 300%;
            }
            @import url('https://fonts.googleapis.com/css2?family=Noto+Sans:wght@200&display=swap');
        </style>
    </head>
    <body>
        @yield('content')
        @yield('footer-script')
    </body>
</html>
