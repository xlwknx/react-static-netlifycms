<!DOCTYPE html>
<html lang="en-US">
    <head>
        <meta charset="utf-8">
    </head>
    <body style="background-color: #f2f2f2; padding: 30px;">

        <table align="center" cellspacing="0" cellpadding="0" width="460">
            <tr>
                <td style="padding: 0px; margin: 0px;" width="100%">
                    <table align="center" width="100%"cellspacing="0" cellpadding="0">
                        <tr>
                            <td style="padding: 0px; margin: 0px; background-color: #be1d1d; border-top-left-radius: 6px; border-top-right-radius: 6px; text-align: center;" width="100%" height="140">
                                <img src="https://api-stg.virgilsecurity.com/img/logo_mail.png?<?=time()?>" alt="Virgil Security, Inc" title="Virgil Security, Inc" />
                            </td>
                        </tr>
                        <tr>
                            <td style="padding: 0px; margin: 0px; padding: 40px 50px 20px 50px; background-color: #ffffff; border-bottom-left-radius: 6px; border-bottom-right-radius: 6px; font-family: 'Arial'; color: #1e2834;" width="100%">
                                <h1 style="padding: 0px; margin: 0px; font-size: 24px; color: #1e2834;">Welcome</h1>
                                <h2 style="padding: 0px; margin: 0px; font-weight: normal; font-size: 18px; padding-top: 15px; color: #1e2834;">
                                    Please visit reset password <a href="<?=Config::get('app.url')?>/update-password/<?=$resetToken?>">link</a>
                                </h2>
                                <h3 style="padding: 0px; margin: 0px; color: #999999; padding-top: 70px; font-size: 14px; font-weight: normal;">
                                    &copy; <?php echo date('Y'); ?> Virgil Security, Inc
                                </h3>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>

    </body>
</html>