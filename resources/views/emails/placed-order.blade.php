<!DOCTYPE html>
<html lang="es" xmlns="http://www.w3.org/1999/xhtml" xmlns:o="urn:schemas-microsoft-com:office:office">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <meta name="x-apple-disable-message-reformatting">
    <title></title>
    <style>
        table,
        td,
        div,
        h1,
        p {
            font-family: Arial, sans-serif;
        }

        @media screen and (max-width: 530px) {
            .unsub {
                display: block;
                padding: 8px;
                margin-top: 14px;
                border-radius: 6px;
                background-color: #555555;
                text-decoration: none !important;
                font-weight: bold;
            }

            .col-lge {
                max-width: 100% !important;
            }
        }

        @media screen and (min-width: 531px) {
            .col-sml {
                max-width: 27% !important;
            }

            .col-lge {
                max-width: 73% !important;
            }
        }
    </style>
</head>

<body style="margin:0;padding:0;word-spacing:normal;background-color:#939297;">
    <div role="article" aria-roledescription="email" lang="en"
        style="text-size-adjust:100%;-webkit-text-size-adjust:100%;-ms-text-size-adjust:100%;background-color:#939297;">
        <table role="presentation" style="width:100%;border:none;border-spacing:0;">
            <tr>
                <td align="center" style="padding:0;">                    
                    <table role="presentation"
                        style="width:94%;max-width:600px;border:none;border-spacing:0;text-align:left;font-family:Arial,sans-serif;font-size:16px;line-height:22px;color:#363636;">
                        <tr>
                            <td style="background-color:#ffffff;padding:40px 30px 30px 30px;text-align:center;font-size:24px;font-weight:bold;">
                                <a href="https://lesedistribuciones.com/" style="text-decoration:none;"><img
                                        src="https://i.ibb.co/xJ71T3G/logo-lese.png" width="200" alt="lese"
                                        style="width:165px;max-width:80%;height:auto;border:none;text-decoration:none;color:#ffffff;"></a>
                            </td>
                        </tr>
                        <tr>
                            <td style="padding:30px;background-color:#ffffff;">
                                <h1
                                    style="margin-top:0;margin-bottom:16px;font-size:26px;line-height:32px;font-weight:bold;letter-spacing:-0.02em;">
                                    Nuevo pedido!😎</h1>
                                <p style="margin:0;">{{ $orden->user->name }}, ha relalizado un pedido
                                    {{ $orden->code_id }}, contactalo y confirma la orden.<a href="{{route('orders.resumen', $orden)}}"
                                        style="color:#f0e117;text-decoration:underline;">Ver orden: 
                                        {{ $orden->code_id }}</a></p>
                            </td>
                        </tr>
                        <tr>
                            <td style="background-color:#ffffff;padding:0;font-size:24px;line-height:28px;font-weight:bold;">
                                <a href="https://lesedistribuciones.com/" style="text-decoration:none;"><img
                                        src="https://i.ibb.co/FzvhcPn/Online-message.png" width="600" alt=""
                                        style="width:100%;height:auto;display:block;border:none;text-decoration:none;color:#363636;"></a>
                            </td>
                        </tr>
                        <tr>
                            <td
                                style="padding:30px;text-align:center;font-size:11px;background-color:#404040;color:#ddd903;">
                                <p style="margin:0;">© {{date("Y")}} Lese Distribuciones. Todos los derechos reservados.</p>
                                <p style="margin:0;font-size:9px;line-height:20px;">&reg;Powered by <a href="https://arling.pro"></a>arling.pro</p>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>
    </div>
</body>

</html>
