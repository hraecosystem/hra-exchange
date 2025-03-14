<!doctype html>
<html lang="en-US">

<head>
    <meta content="text/html; charset=utf-8" http-equiv="Content-Type"/>
    <title>{{ $title }}</title>
    <meta name="description" content="{{settings('company_name')}} Email">
    <style type="text/css">
        a {
            color: #455056
        }

        a:hover {
            text-decoration: underline !important;
        }
    </style>
</head>

<body marginheight="0" topmargin="0" marginwidth="0" style="margin: 0px; background-color: #f2f3f8;" leftmargin="0">
<!-- 100% body table -->
<table cellspacing="0" border="0" cellpadding="0" width="100%" bgcolor="#f2f3f8"
       style="@import url(https://fonts.googleapis.com/css?family=Rubik:300,400,500,700|Open+Sans:300,400,600,700); font-family: 'Rubik', sans-serif;">
    <tr>
        <td>
            <table style="background-color: #f2f3f8; max-width:670px; margin:0 auto;" width="100%" border="0"
                   align="center" cellpadding="0" cellspacing="0">
                <tr>
                    <td style="height:80px;">&nbsp;</td>
                </tr>
                <tr>
                    <td style="text-align:center;">
                        <a href="{{ env('APP_URL') }}" title="logo" target="_blank">
                            <img style="max-width: 200px;max-height: 80px"
                                 src="{{ settings()->getFileUrl('logo', asset(env('LOGO'))) }}" title="logo" alt="logo">
                        </a>
                    </td>
                </tr>
                <tr>
                    <td style="height:20px;">&nbsp;</td>
                </tr>
                <tr>
                    <td>
                        <table width="95%" border="0" cellpadding="0" cellspacing="0"
                               style="max-width:670px; background:#fff; border-radius:3px;-webkit-box-shadow:0 6px 18px 0 rgba(0,0,0,.06);-moz-box-shadow:0 6px 18px 0 rgba(0,0,0,.06);box-shadow:0 6px 18px 0 rgba(0,0,0,.06);">
                            <tr>
                                <td style="height:40px;">&nbsp;</td>
                            </tr>
                            <tr>
                                <td style="padding:0 35px;">
                                    <h1 style="color:#1e1e2d; font-weight:600; margin:0;font-size:24px;font-family:'Rubik',sans-serif;">
                                        Dear {!! ucfirst($user['name']) !!},
                                    </h1>
                                    <p style="font-size:15px; color:#455056; margin:8px 0 0; line-height:24px;">
                                        {!! $body !!}
                                    </p>
                                    @if($extra)
                                        <p
                                            style="width:207px;background-color:#f0f0f0;padding: 10px;
                                            font-weight:700;font-size:26px;color:#303030;margin: 30px auto;text-align: center;">
                                            {{ $extra }}
                                        </p>
                                        <p style='color:#455056; font-size:13px;line-height:20px; margin:0; font-weight: 500;margin-bottom: 15px;'>
                                            If you did not initiate this request, please disregard
                                            this message and contact our support team immediately.
                                        </p>
                                    @endif
                                    <p style="font-size:15px; color:#455056; margin:20px 0 0; line-height:24px;">
                                        Regards,
                                        <br>{{settings('company_name')}} Team
                                    </p>
                                </td>
                            </tr>
                            <tr>
                                <td style="height:40px;">&nbsp;</td>
                            </tr>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td style="height:20px;">&nbsp;</td>
                </tr>
                <tr>
                    <td style="text-align:center;">
                        <p style="font-size:14px; color:rgba(69, 80, 86, 0.7411764705882353); line-height:18px; margin:0 0 0;">
                            &copy; <strong>{{ env('APP_URL') }}</strong></p>
                    </td>
                </tr>
                <tr>
                    <td style="height:80px;">&nbsp;</td>
                </tr>
            </table>
        </td>
    </tr>
</table>
<!--/100% body table-->
</body>

</html>
