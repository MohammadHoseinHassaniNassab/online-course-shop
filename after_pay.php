<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        #container{
            display: flex;
        }
        #prent{
            background-color: lightskyblue;
            padding: 20px;
            border-radius: 0;
            transition: all 0.5s;
        }
        #rotetion{
            background-color: #4596e5;
            padding: 20px;
            border-radius: 0;
            transition: all 0.5s;
            border: dashed 3px #006bcb;
        }
        #img{

        }

        @-webkit-keyframes rotating {
            from{
                -webkit-transform: rotate(0deg);
            }
            to{
                -webkit-transform: rotate(360deg);
            }
        }
        @-webkit-keyframes rerotating {
            from{
                -webkit-transform: rotate(0deg);
            }
            to{
                -webkit-transform: rotate(-360deg);
            }
        }
        #prent:hover {
            border-radius: 50%;
        }
        #prent:hover #rotetion {
            border-radius: 50%;
            -webkit-animation: rotating 5s linear infinite;
        }
        #prent:hover #img {
            -webkit-animation: rerotating 5s linear infinite;
        }
    </style>
</head>
<body>
<div id="container"><div id="prent"><div id="rotetion"><div id="img"><img src="img/icecd-logo-org.png"></div></div></div></div>
</body>
</html>