
<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title></title>
    <style>
        * { font-family: DejaVu Sans, sans-serif; }
    </style>
</head>
<body>
<div class="parent" style="position:relative;">
    <img width="550px" height="300px" style="position: absolute" src="{{ asset('/images/card.png') }}" />
    <strong style="position:relative;float:right;margin-right:50%;margin-top:115px ">خالد سامي محمد سامي محمد </strong>
    {{--<strong style="position:relative;float:right;margin-right:50%;margin-top:135px ">خالد سامي محمد سامي محمد </strong>--}}
    {{--<strong style="position:relative;float:left;margin-left:1%;margin-top:135px">20024545414120</strong>--}}
    {{--<strong style="position:absolute;float:left;margin-left:5%;margin-top:130px ">QRtrtr46456546201S</strong>--}}
    {{--<strong style="position:absolute;float:left;margin-left:5%;margin-top:140px ">الصناعة</strong>--}}
    {{--<strong style="position:absolute;float:left;margin-left:5%;margin-top:150px ">SEN</strong>--}}
    {{--<strong style="position:absolute;left:10.5%;top:113px;float: left!important;">خالد سامي محمد صباح</strong>--}}
    {{--<strong style="position:absolute;left:80.5%;top:138px;">20014165756765720</strong>--}}
    {{--<strong style="position:absolute;left:80.5%;top:163px;float: left!important;">QR201S</strong>--}}
    {{--<strong style="position:absolute;left:80.5%;top:188px;float: left!important;">الصناعة</strong>--}}
    {{--<strong style="position:absolute;left:80.5%;top:211px;float: left!important;">SEN</strong>--}}
    {{--<img style="position: absolute;left:63.5%;top:110px;float: left" src="data:image/png;base64, {!! base64_encode(QrCode::format('png')->backgroundColor(222, 222, 246)->size(100)->generate('Make me into an QrCode!')) !!} ">--}}
</div>
</body>
</html>

