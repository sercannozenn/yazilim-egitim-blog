<!DOCTYPE html>
<html lang="en" xmlns:o="urn:schemas-microsoft-com:office:office" xmlns:v="urn:schemas-microsoft-com:vml">
<head>
    <title></title>
    <meta content="text/html; charset=utf-8" http-equiv="Content-Type"/>
    <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
    <!--[if mso]>
    <xml>
        <o:OfficeDocumentSettings>
            <o:PixelsPerInch>96</o:PixelsPerInch>
            <o:AllowPNG/>
        </o:OfficeDocumentSettings>
    </xml><![endif]-->
    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            padding: 0;
        }

        a[x-apple-data-detectors] {
            color: inherit !important;
            text-decoration: inherit !important;
        }

        #MessageViewBody a {
            color: inherit;
            text-decoration: none;
        }

        p {
            line-height: inherit
        }

        .desktop_hide,
        .desktop_hide table {
            mso-hide: all;
            display: none;
            max-height: 0px;
            overflow: hidden;
        }

        .image_block img + div {
            display: none;
        }

        .menu_block.desktop_hide .menu-links span {
            mso-hide: all;
        }

        @media (max-width: 700px) {

            .desktop_hide table.icons-inner,
            .social_block.desktop_hide .social-table {
                display: inline-block !important;
            }

            .icons-inner {
                text-align: center;
            }

            .icons-inner td {
                margin: 0 auto;
            }

            .fullMobileWidth,
            .image_block img.big,
            .row-content {
                width: 100% !important;
            }

            .menu-checkbox[type=checkbox] ~ .menu-links {
                display: none !important;
                padding: 5px 0;
            }

            .menu-checkbox[type=checkbox]:checked ~ .menu-trigger .menu-open {
                display: none !important;
            }

            .menu-checkbox[type=checkbox]:checked ~ .menu-links,
            .menu-checkbox[type=checkbox] ~ .menu-trigger {
                display: block !important;
                max-width: none !important;
                max-height: none !important;
                font-size: inherit !important;
            }

            .menu-checkbox[type=checkbox] ~ .menu-links > a,
            .menu-checkbox[type=checkbox] ~ .menu-links > span.label {
                display: block !important;
                text-align: center;
            }

            .menu-checkbox[type=checkbox]:checked ~ .menu-trigger .menu-close {
                display: block !important;
            }

            .mobile_hide {
                display: none;
            }

            .stack .column {
                width: 100%;
                display: block;
            }

            .mobile_hide {
                min-height: 0;
                max-height: 0;
                max-width: 0;
                overflow: hidden;
                font-size: 0px;
            }

            .desktop_hide,
            .desktop_hide table {
                display: table !important;
                max-height: none !important;
            }
        }

        #memu-r7c0m2:checked ~ .menu-links {
            background-color: #000000 !important;
        }

        #memu-r7c0m2:checked ~ .menu-links a,
        #memu-r7c0m2:checked ~ .menu-links span {
            color: #ffffff !important;
        }
    </style>
</head>
@php
    if (isset($theme))
        {
            $title = $theme->title;

            $logo = $theme->logo;
            $logoAlt = $theme->logo_alt;
            $logoTitle = $theme->logo_title;

            $buttonText = $theme->button_text;
            $description = $theme->description;

            $resetPasswordImage = $theme->reset_password_image;
            $resetPasswordImageAlt = $theme->reset_password_image_alt;
            $resetPasswordImageTitle = $theme->reset_password_image_title;
        }
    else
        {
            $title = "Parola Sıfırlama Maili";
            $logo = asset($settings->logo);
            $logoAlt = "Parola Sıfırlama";
            $logoTitle = "Parola Sıfırlama";

            $buttonText = "Parolamı Sıfırla";
            $description = "Aşağıdaki linke tıklayarak parolanızı sıfırlayabilisiniz.";

            $resetPasswordImage = asset($settings->reset_password_image);
            $resetPasswordImageAlt = "Parola Sıfırla";
            $resetPasswordImageTitle = "Parola Sıfırla";

        }
@endphp
<body style="background-color: #fff0e3; margin: 0; padding: 0; -webkit-text-size-adjust: none; text-size-adjust: none;">
<table border="0" cellpadding="0" cellspacing="0" class="nl-container" role="presentation"
       style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; background-color: #fff0e3;" width="100%">
    <tbody>
    <tr>
        <td>
            <table align="center" border="0" cellpadding="0" cellspacing="0" class="row row-1" role="presentation"
                   style="mso-table-lspace: 0pt; mso-table-rspace: 0pt;" width="100%">
                <tbody>
                <tr>
                    <td>
                        <table align="center" border="0" cellpadding="0" cellspacing="0" class="row-content stack"
                               role="presentation"
                               style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; color: #000000; width: 680px;"
                               width="680">
                            <tbody>
                            <tr>
                                <td class="column column-1"
                                    style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; font-weight: 400; text-align: left; padding-bottom: 5px; padding-top: 5px; vertical-align: top; border-top: 0px; border-right: 0px; border-bottom: 0px; border-left: 0px;"
                                    width="100%">
                                    <div class="spacer_block block-1"
                                         style="height:30px;line-height:30px;font-size:1px;"> 
                                    </div>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </td>
                </tr>
                </tbody>
            </table>
            <table align="center" border="0" cellpadding="0" cellspacing="0" class="row row-2" role="presentation"
                   style="mso-table-lspace: 0pt; mso-table-rspace: 0pt;" width="100%">
                <tbody>
                <tr>
                    <td>
                        <table align="center" border="0" cellpadding="0" cellspacing="0" class="row-content stack"
                               role="presentation"
                               style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; color: #000000; width: 680px;"
                               width="680">
                            <tbody>
                            <tr>
                                <td class="column column-1"
                                    style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; font-weight: 400; text-align: left; padding-bottom: 5px; padding-top: 5px; vertical-align: top; border-top: 0px; border-right: 0px; border-bottom: 0px; border-left: 0px;"
                                    width="33.333333333333336%">
                                    <div class="spacer_block block-1" style="height:0px;line-height:0px;font-size:1px;">
                                         
                                    </div>
                                </td>
                                <td class="column column-2"
                                    style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; font-weight: 400; text-align: left; padding-bottom: 5px; padding-top: 5px; vertical-align: top; border-top: 0px; border-right: 0px; border-bottom: 0px; border-left: 0px;"
                                    width="33.333333333333336%">
                                    <table border="0" cellpadding="0" cellspacing="0" class="image_block block-1"
                                           role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt;"
                                           width="100%">
                                        <tr>
                                            <td class="pad" style="width:100%;padding-right:0px;padding-left:0px;">
                                                <div align="center" class="alignment" style="line-height:10px"><img
                                                        alt="{{ $logoAlt }}" src="{{ $logo }}"
                                                        style="display: block; height: auto; border: 0; width: 147px; max-width: 100%;"
                                                        title="{{ $logoTitle }}" width="147"/></div>
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                                <td class="column column-3"
                                    style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; font-weight: 400; text-align: left; padding-bottom: 5px; padding-top: 5px; vertical-align: top; border-top: 0px; border-right: 0px; border-bottom: 0px; border-left: 0px;"
                                    width="33.333333333333336%">
                                    <div class="spacer_block block-1" style="height:0px;line-height:0px;font-size:1px;">
                                         
                                    </div>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </td>
                </tr>
                </tbody>
            </table>
            <table align="center" border="0" cellpadding="0" cellspacing="0" class="row row-3" role="presentation"
                   style="mso-table-lspace: 0pt; mso-table-rspace: 0pt;" width="100%">
                <tbody>
                <tr>
                    <td>
                        <table align="center" border="0" cellpadding="0" cellspacing="0" class="row-content stack"
                               role="presentation"
                               style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; color: #000000; width: 680px;"
                               width="680">
                            <tbody>
                            <tr>
                                <td class="column column-1"
                                    style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; font-weight: 400; text-align: left; padding-bottom: 5px; padding-top: 5px; vertical-align: top; border-top: 0px; border-right: 0px; border-bottom: 0px; border-left: 0px;"
                                    width="100%">
                                    <div class="spacer_block block-1"
                                         style="height:10px;line-height:10px;font-size:1px;"> 
                                    </div>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </td>
                </tr>
                </tbody>
            </table>
            <table align="center" border="0" cellpadding="0" cellspacing="0" class="row row-5" role="presentation"
                   style="mso-table-lspace: 0pt; mso-table-rspace: 0pt;" width="100%">
                <tbody>
                <tr>
                    <td>
                        <table align="center" border="0" cellpadding="0" cellspacing="0" class="row-content stack"
                               role="presentation"
                               style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; background-color: #ffffff; color: #000000; width: 680px;"
                               width="680">
                            <tbody>
                            <tr>
                                <td class="column column-1"
                                    style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; font-weight: 400; text-align: left; padding-bottom: 5px; padding-top: 5px; vertical-align: top; border-top: 0px; border-right: 0px; border-bottom: 0px; border-left: 0px;"
                                    width="100%">
                                    <table border="0" cellpadding="15" cellspacing="0" class="image_block block-1"
                                           role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt;"
                                           width="100%">
                                        <tr>
                                            <td class="pad">
                                                <div align="center" class="alignment" style="line-height:10px"><img
                                                        alt="{{ $resetPasswordImageAlt }}" class="fullMobileWidth"
                                                        src="{{ $resetPasswordImage }}"
                                                        style="display: block; height: auto; border: 0; width: 374px; max-width: 100%;"
                                                        title="{{ $resetPasswordImageTitle }}" width="374"/></div>
                                            </td>
                                        </tr>
                                    </table>
                                    <div class="spacer_block block-2"
                                         style="height:35px;line-height:35px;font-size:1px;"> 
                                    </div>
                                    <table border="0" cellpadding="0" cellspacing="0" class="heading_block block-3"
                                           role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt;"
                                           width="100%">
                                        <tr>
                                            <td class="pad" style="text-align:center;width:100%;">
                                                <h1 style="margin: 0; color: #101010; direction: ltr; font-family: Arial, Helvetica Neue, Helvetica, sans-serif; font-size: 27px; font-weight: normal; letter-spacing: normal; line-height: 120%; text-align: center; margin-top: 0; margin-bottom: 0;">
                                                    <strong>{{ $title }}</strong></h1>
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </td>
                </tr>
                </tbody>
            </table>
            <table align="center" border="0" cellpadding="0" cellspacing="0" class="row row-6" role="presentation"
                   style="mso-table-lspace: 0pt; mso-table-rspace: 0pt;" width="100%">
                <tbody>
                <tr>
                    <td>
                        <table align="center" border="0" cellpadding="0" cellspacing="0" class="row-content stack"
                               role="presentation"
                               style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; background-color: #ffffff; color: #000000; width: 680px;"
                               width="680">
                            <tbody>
                            <tr>
                                <td class="column column-1"
                                    style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; font-weight: 400; text-align: left; padding-bottom: 5px; padding-top: 5px; vertical-align: top; border-top: 0px; border-right: 0px; border-bottom: 0px; border-left: 0px;"
                                    width="16.666666666666668%">
                                    <div class="spacer_block block-1" style="height:0px;line-height:0px;font-size:1px;">
                                         
                                    </div>
                                </td>
                                <td class="column column-2"
                                    style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; font-weight: 400; text-align: left; padding-bottom: 5px; padding-top: 5px; vertical-align: top; border-top: 0px; border-right: 0px; border-bottom: 0px; border-left: 0px;"
                                    width="66.66666666666667%">
                                    <table border="0" cellpadding="0" cellspacing="0" class="text_block block-1"
                                           role="presentation"
                                           style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; word-break: break-word;"
                                           width="100%">
                                        <tr>
                                            <td class="pad"
                                                style="padding-bottom:10px;padding-left:20px;padding-right:10px;padding-top:10px;">
                                                <div style="font-family: sans-serif">
                                                    <div class=""
                                                         style="font-size: 12px; font-family: Arial, Helvetica Neue, Helvetica, sans-serif; mso-line-height-alt: 21.6px; color: #848484; line-height: 1.8;">
                                                        <p style="margin: 0; font-size: 14px; text-align: center; mso-line-height-alt: 25.2px;">
                                                            <span style="font-size:14px;">{{ $description  }}</span>
                                                        </p>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    </table>
                                    <div class="spacer_block block-2"
                                         style="height:10px;line-height:10px;font-size:1px;"> 
                                    </div>
                                    <table border="0" cellpadding="10" cellspacing="0" class="button_block block-3"
                                           role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt;"
                                           width="100%">
                                        <tr>
                                            <td class="pad">
                                                <div align="center" class="alignment"><!--[if mso]>
                                                    <v:roundrect xmlns:v="urn:schemas-microsoft-com:vml"
                                                                 xmlns:w="urn:schemas-microsoft-com:office:word"
                                                                 href="{{ route('passwordResetToken', ['token' => $token]) }}"
                                                                 style="height:44px;width:160px;v-text-anchor:middle;"
                                                                 arcsize="10%" strokeweight="0.75pt" strokecolor="#101"
                                                                 fillcolor="#101">
                                                        <w:anchorlock/>
                                                        <v:textbox inset="0px,0px,0px,0px">
                                                            <center
                                                                style="color:#ffffff; font-family:Arial, sans-serif; font-size:16px">
                                                    <![endif]--><a href="{{ route('passwordResetToken', ['token' => $token]) }}"
                                                                   style="text-decoration:none;display:inline-block;color:#ffffff;background-color:#101;border-radius:4px;width:auto;border-top:1px solid #101;font-weight:undefined;border-right:1px solid #101;border-bottom:1px solid #101;border-left:1px solid #101;padding-top:5px;padding-bottom:5px;font-family:Arial, Helvetica Neue, Helvetica, sans-serif;font-size:16px;text-align:center;mso-border-alt:none;word-break:keep-all;"
                                                                   target="_blank"><span
                                                            style="padding-left:20px;padding-right:20px;font-size:16px;display:inline-block;letter-spacing:normal;"><span
                                                                style="word-break: break-word; line-height: 32px;">{{ $buttonText }}</span></span></a>
                                                    <!--[if mso]></center></v:textbox></v:roundrect><![endif]--></div>
                                            </td>
                                        </tr>
                                    </table>
                                    <div class="spacer_block block-4"
                                         style="height:20px;line-height:20px;font-size:1px;"> 
                                    </div>
                                </td>
                                <td class="column column-3"
                                    style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; font-weight: 400; text-align: left; padding-bottom: 5px; padding-top: 5px; vertical-align: top; border-top: 0px; border-right: 0px; border-bottom: 0px; border-left: 0px;"
                                    width="16.666666666666668%">
                                    <div class="spacer_block block-1" style="height:0px;line-height:0px;font-size:1px;">
                                         
                                    </div>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </td>
                </tr>
                </tbody>
            </table>
        </td>
    </tr>
    </tbody>
</table><!-- End -->
</body>
</html>
