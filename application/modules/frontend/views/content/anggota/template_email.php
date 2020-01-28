<!DOCTYPE html>
            <html>

            <head>

                <meta charset="utf-8">
                <meta http-equiv="x-ua-compatible" content="ie=edge">
                <title>Password Reset</title>
                <meta name="viewport" content="width=device-width, initial-scale=1">
                <style type="text/css">
                    /**
               * Google webfonts. Recommended to include the .woff version for cross-client compatibility.
               */
                    @media screen {
                        @font-face {
                            font-family: "Source Sans Pro";
                            font-style: normal;
                            font-weight: 400;
                            src: local("Source Sans Pro Regular"), local("SourceSansPro-Regular"), url(https://fonts.gstatic.com/s/sourcesanspro/v10/ODelI1aHBYDBqgeIAH2zlBM0YzuT7MdOe03otPbuUS0.woff) format("woff");
                        }

                        @font-face {
                            font-family: "Source Sans Pro";
                            font-style: normal;
                            font-weight: 700;
                            src: local("Source Sans Pro Bold"), local("Source Sans Pro Bold"), url(https://fonts.gstatic.com/s/sourcesanspro/v10/toadOcfmlt9b38dHJxOBGFkQc6VGVFSmCnC_l7QZG60.woff) format("woff");
                        }
                    }

                    /**
               * Avoid browser level font resizing.
               * 1. Windows Mobile
               * 2. iOS / OSX
               */
                    body,
                    table,
                    td,
                    a {
                        -ms-text-size-adjust: 100%;
                        /* 1 */
                        -webkit-text-size-adjust: 100%;
                        /* 2 */
                    }

                    /**
               * Remove extra space added to tables and cells in Outlook.
               */
                    table,
                    td {
                        mso-table-rspace: 0pt;
                        mso-table-lspace: 0pt;
                    }

                    /**
               * Better fluid images in Internet Explorer.
               */
                    img {
                        -ms-interpolation-mode: bicubic;
                    }

                    /**
               * Remove blue links for iOS devices.
               */
                    a[x-apple-data-detectors] {
                        font-family: inherit !important;
                        font-size: inherit !important;
                        font-weight: inherit !important;
                        line-height: inherit !important;
                        color: inherit !important;
                        text-decoration: none !important;
                    }

                    /**
               * Fix centering issues in Android 4.4.
               */
                    div[style*="margin: 16px 0;"] {
                        margin: 0 !important;
                    }

                    body {
                        width: 100% !important;
                        height: 100% !important;
                        padding: 0 !important;
                        margin: 0 !important;
                    }

                    /**
               * Collapse table borders to avoid space between cells.
               */
                    table {
                        border-collapse: collapse !important;
                    }

                    a {
                        color: #1a82e2;
                    }

                    img {
                        height: auto;
                        line-height: 100%;
                        text-decoration: none;
                        border: 0;
                        outline: none;
                    }
                </style>

            </head>

            <body style="background-color: #fff2cb;">

                <div class="preheader" style="display: none; max-width: 0; max-height: 0; overflow: hidden; font-size: 1px; line-height: 1px; color: #fff; opacity: 0;">
                    Registrasi akun Lentera Digital Indonesia berhasil.
                </div>
                <table border="0" cellpadding="0" cellspacing="0" width="100%">
                    <tr>
                        <td align="center" bgcolor="#fff2cb">
                            <table border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width: 600px;">
                                <tr>
                                    <td align="left" bgcolor="#ffffff" style="padding: 36px 24px 0; font-family: "Source Sans Pro", Helvetica, Arial, sans-serif; border-top: 3px solid #ffc107;">
                                        <h1 style="margin: 0; font-size: 32px; font-weight: 700; letter-spacing: -1px; line-height: 48px;">Registrasi Sukses</h1>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td align="center" bgcolor="#fff2cb">
                            <table border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width: 600px;">

                                <tr>
                                    <td align="left" bgcolor="#ffffff" style="padding: 24px; font-family: "Source Sans Pro", Helvetica, Arial, sans-serif; font-size: 16px; line-height: 24px;">
                                        <p style="margin: 0;"><?=$nama; ?>, selamat bergabung di <?=setting_system('WEBNAME')?>! Terima kasih telah melakukan registrasi.</p>
                                    </td>
                                </tr>
                                <tr>
                                    <td align="left" bgcolor="#ffffff" style="padding: 24px; font-family: "Source Sans Pro", Helvetica, Arial, sans-serif; font-size: 16px; line-height: 24px;">
                                        <p style="margin: 0;">Berikut data login Anda:</p>
                                        <p style="margin: 0;"><strong>
                                        Username: <?=$username; ?><br>
                                        Password: <?=$password; ?><br>
                                        Password Transaksi: <?=$pass_tr; ?><strong><br><br>
                                        Anda dapat mengubah password dan password transaksi akun anda.
                                        </p>

                                    </td>
                                </tr>
                                <tr>
                                    <td align="left" bgcolor="#ffffff" style="padding: 24px; font-family: "Source Sans Pro", Helvetica, Arial, sans-serif; font-size: 16px; line-height: 24px; border-bottom: 3px solid #ffc107">
                                        <p style="margin: 0;">Salam,<br> Team <?=setting_system('WEBNAME')?></p>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td align="center" bgcolor="#fff2cb" style="padding: 24px;">
                            <table border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width: 600px;">
                                <tr>
                                    <td align="center" bgcolor="#fff2cb" style="padding: 12px 24px; font-family: "Source Sans Pro", Helvetica, Arial, sans-serif; font-size: 14px; line-height: 20px; color: #666;">
                                        <p style="margin: 0;">Hubungi kami:
                                            <br><?=setting_system('NOTLP')?> | <a href="mailto:<?=setting_system('cs')?>" style="text-decoration: none; color: #fff"><?=setting_system('cs')?></a>
                                            <br><a href="<?=setting_system('WEBSITE')?>" style="text-decoration: none; color: #fff"><?=setting_system('WEBSITE')?></a></p>
                                    </td>
                                </tr>

                            </table>
                        </td>
                    </tr>

                </table>

            </body>

            </html>
