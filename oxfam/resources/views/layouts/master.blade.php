<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <title>Water Voucher System Update</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1" name="viewport" />
    <meta content="Preview page of Oxfam for dashboard & statistics" name="description" />
    <meta content="" name="author" />

    <link href="{{ asset('/assets/global/plugins/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('/assets/layouts/layout3/css/layout.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('/assets/layouts/layout3/css/themes/default.min.css') }}" rel="stylesheet" type="text/css" id="style_color" />


    <link href="{{ asset('/datatables/css/jquery.dataTables.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('/css/bootstrap-datepicker.min.css') }}" rel="stylesheet" type="text/css" />

    <link rel="stylesheet" type="text/css" href="{{ asset('/css/jquery.dataTables.min.css') }}">

    <link rel="stylesheet" type="text/css" href="{{ asset('/css/buttons.dataTables.css') }}">
    <link rel="stylesheet" href="{{ asset('/assets/multiselect.css') }}">
    <link rel="stylesheet" href="{{ asset('/assets/sweetalert.css') }}">

    <style>
        a.address:hover, a.address:visited {
            background-color: rgba(255, 255, 255, 0.5);
            color: white;
            padding: 6px 18px;
            /*text-align: center;*/
            text-decoration: none;
            display: inline-block;
        }
        input[type='checkbox'] {
            /* Hide the checkbox input ui */
            opacity: 0;
        }

        /* Apply custom images - size your images according to text and stuff */
        /* Take any custom image you want and encode it with http://websemantics.co.uk/online_tools/image_to_data_uri_convertor/ or alike */
        input[type='checkbox'] + span{
            background: url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAAABHNCSVQICAgIfAhkiAAAAAlwSFlzAAAEbgAABG4B0KOyaAAAABl0RVh0U29mdHdhcmUAd3d3Lmlua3NjYXBlLm9yZ5vuPBoAAACLSURBVDiN7Y4hDoNAAAR3rxeCxyBaX15ADsG3SPhAU9tP3RP4AgZbQbLZKlQNtJbxM7t0398kjQYqA2/sowz2cpEeUdIo6VXkPO2UAQBrSg1iHIKB6qgMAEXOk8k6HLj9hW2FX+WNM3AGtkD5h88Q7GVNqTlqrl13JznTbXtVjIPJ2rb2LpOco/38ABW9OK5LzYh0AAAAAElFTkSuQmCC) no-repeat center left;
            padding-left: 18px;
            margin-left: -18px;
        }
        input[type='checkbox']:checked + span{
            background: url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAAABHNCSVQICAgIfAhkiAAAAAlwSFlzAAAEbgAABG4B0KOyaAAAABl0RVh0U29mdHdhcmUAd3d3Lmlua3NjYXBlLm9yZ5vuPBoAAAFiSURBVDiNlZAxSyNRFIW/+3wTBBvRxsK12kLBWsmMSbkLu62dYB2xsBQE0UIQO5HdztY/4A/YJiEZxHpdsFOLNO52C0nmzbGKmMTI5JTn3e++c4+pWv0UQjgQzAv+U0zTTnqeCuHUhxAOQggXpVbrriAMQLdcXsH7fSeYnxQGKLVadzJbcBPEHpGk4ApPm7ksSc47cfz5re2L8iFJfgI1B3PAdt8fTbC6Whq2skrlWFAD0qjTqb19G1iQVatJb3b2vhfHa32vlyQ7SEfAb5/n37m9Hehs4ASTtoAlnPuVVSqbluczZvZD8Bhl2VfS9O9wuoEEU43GLmYXwAzStcyugH/K8y+k6dNoM8MdSPL1+h5mh0AEZMrzb6Vm88978MgJr2a9ftLb2Gib9BA1mzfj4LELAKJG4/IjsC8HTBcZHCNzTnrulssrk5LdOF42s7ZpfX0xeL8vswVJoejPZtb20tkLKyaJLiCC000AAAAASUVORK5CYII=) no-repeat center left;
        }

    </style>

</head>


<body class="page-container-bg-solid">

<div>
    @yield('content')
</div>




<script src="{{ asset('/assets/global/plugins/jquery.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('/assets/global/plugins/bootstrap/js/bootstrap.min.js') }}" type="text/javascript"></script>
{{--<script src="https://code.jquery.com/jquery-1.12.4.js"></script>--}}
{{--<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>--}}
<script src="{{ asset('/datatables/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('/js/bootstrap-datepicker.js') }}"></script>

<script src="{{ asset('/assets/validate.js') }}"></script>

<script src="{{ asset('/js/dataTables.buttons.js') }}" type="text/javascript"></script>

<script src="{{ asset('/js/input.js') }}" type="text/javascript"></script>


<script src="{{ asset('/js/jszip.js') }}"></script>
<script src="{{ asset('/js/pdfmake.min.js') }}"></script>
<script src="{{ asset('/js/vfs_fonts.js') }}"></script>

<script src="{{ asset('/js/buttons.html5.min.js') }}"></script>
<script src="{{ asset('/assets/multiselect.js') }}"></script>
<script src="{{ asset('/assets/sweetalert.js') }}"></script>










@yield('extra-js')
</body>
</html>