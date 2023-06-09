<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="viewport" content="width=device-width"/>
</head>
<body>
<table class="body-wrap">
    <tr>
        <td class="container">
            <table>
                <tr>
                    <td align="center" class="masthead">
                        <h1><a href="http://scout-portfolio.ru">scout-portfolio.ru</a></h1>
                    </td>
                </tr>
                <tr>
                    <td class="content">
                        <h2>@lang('mail.welcome')</h2>
                        <p>
                            <b>@lang('mail.messageforu')</b>
                        </p>
                        <p>
                            {{ $body }}
                        </p>
                        <br>
                        <br>
                        <table>
                            <tr>
                                <td align="center">
                                    <p>
                                        <a href="http://scout-portfolio.ru" class="button">@lang('mail.sitebtn')
                                        </a>
                                    </p>
                                </td>
                            </tr>
                        </table>
                        <br>
                        <hr>

                        <p>
                            <em>@lang('mail.ty')</em>
                        </p>

                        <p>
                            <em>@lang('mail.respectfully')</em>
                        </p>

                        <p>
                            <img src="https://c.radikal.ru/c03/2009/61/dac514df9609.png" alt="Лого"/>
                        </p>
                    </td>
                </tr>
            </table>
        </td>
    </tr>

    <tr>
        <td class="container">
            <table>
                <tr>
                    <td class="content footer" align="center">
                        <p>@lang('mail.feedback')</p>
                        <p>
                            <a href="mailto:">
                                kemiiep.omck@mail.ru
                            </a>
                            |
                            <a href="mailto:">
                                newmanforlife@list.ru
                            </a>
                        </p>
                    </td>
                </tr>
            </table>
        </td>
    </tr>
</table>

</body>
</html>

<style>
    * {
        margin: 0;
        padding: 0;
        font-size: 100%;
        font-family: 'Avenir Next', "Helvetica Neue", "Helvetica", Helvetica, Arial, sans-serif;
        line-height: 1.65;
    }

    img {
        max-width: 100%;
        margin: 0 auto;
        display: block;
    }

    body, .body-wrap {
        width: 100% !important;
        height: 100%;
        background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='400' height='400' viewBox='0 0 800 800'%3E%3Cg fill='none' stroke='%232f374a' stroke-width='1'%3E%3Cpath d='M769 229L1037 260.9M927 880L731 737 520 660 309 538 40 599 295 764 126.5 879.5 40 599-197 493 102 382-31 229 126.5 79.5-69-63'/%3E%3Cpath d='M-31 229L237 261 390 382 603 493 308.5 537.5 101.5 381.5M370 905L295 764'/%3E%3Cpath d='M520 660L578 842 731 737 840 599 603 493 520 660 295 764 309 538 390 382 539 269 769 229 577.5 41.5 370 105 295 -36 126.5 79.5 237 261 102 382 40 599 -69 737 127 880'/%3E%3Cpath d='M520-140L578.5 42.5 731-63M603 493L539 269 237 261 370 105M902 382L539 269M390 382L102 382'/%3E%3Cpath d='M-222 42L126.5 79.5 370 105 539 269 577.5 41.5 927 80 769 229 902 382 603 493 731 737M295-36L577.5 41.5M578 842L295 764M40-201L127 80M102 382L-261 269'/%3E%3C/g%3E%3Cg fill='%2336394c'%3E%3Ccircle cx='769' cy='229' r='5'/%3E%3Ccircle cx='539' cy='269' r='5'/%3E%3Ccircle cx='603' cy='493' r='5'/%3E%3Ccircle cx='731' cy='737' r='5'/%3E%3Ccircle cx='520' cy='660' r='5'/%3E%3Ccircle cx='309' cy='538' r='5'/%3E%3Ccircle cx='295' cy='764' r='5'/%3E%3Ccircle cx='40' cy='599' r='5'/%3E%3Ccircle cx='102' cy='382' r='5'/%3E%3Ccircle cx='127' cy='80' r='5'/%3E%3Ccircle cx='370' cy='105' r='5'/%3E%3Ccircle cx='578' cy='42' r='5'/%3E%3Ccircle cx='237' cy='261' r='5'/%3E%3Ccircle cx='390' cy='382' r='5'/%3E%3C/g%3E%3C/svg%3E");
        background-color: #222736;
    }

    .body-wrap {
        padding-top: 3rem
    }

    a {
        color: #ffffff;
        text-decoration: none;
    }

    a:hover {
        text-decoration: underline;
    }

    .text-center {
        text-align: center;
    }

    .text-right {
        text-align: right;
    }

    .text-left {
        text-align: left;
    }

    .button {
        display: inline-block;
        color: white;
        background: #36394c;
        border: solid #2f374a;
        border-width: 10px 20px 10px;
        font-weight: bold;
        border-radius: 4px;
    }

    .button:hover {
        text-decoration: none;
    }

    h1, h2, h3, h4, h5, h6 {
        margin-bottom: 20px;
        line-height: 1.25;
    }

    h1 {
        font-size: 32px;
    }

    h2 {
        font-size: 28px;
    }

    h3 {
        font-size: 24px;
    }

    h4 {
        font-size: 20px;
    }

    h5 {
        font-size: 16px;
    }

    p, ul, ol {
        font-size: 16px;
        font-weight: normal;
        margin-top: 8px;
    }

    .container {
        display: block !important;
        clear: both !important;
        margin: 0 auto !important;
        max-width: 580px !important;
    }

    .container table {
        width: 100% !important;
        border-collapse: collapse;
    }

    .container .masthead {
        padding: 80px 0;
        background: #2f374a;
        color: white;
    }

    .container .masthead h1 {
        margin: 0 auto !important;
        max-width: 90%;
        text-transform: uppercase;
    }

    .container .content {
        background: white;
        padding: 30px 35px;
    }

    .container .content.footer {
        background: none;
    }

    .container .content.footer p {
        margin-bottom: 0;
        color: #888;
        text-align: center;
        font-size: 14px;
    }

    .container .content.footer a {
        color: #888;
        text-decoration: none;
        font-weight: bold;
    }

    .container .content.footer a:hover {
        text-decoration: underline;
    }

</style>


<!--
Палитра
$success: #02a499;
$danger: #ec4561;
$info: #38a4f8;
$warning: #f8b425;


$darkest: #222736;
$dark: #2a3142;
$light: #2f374a;
$lightest: #36394c;

$white: #fff;
$black: #000;
-->
