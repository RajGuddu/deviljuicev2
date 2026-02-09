<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Reset Your Password</title>
</head>

<body style="font-family: Arial, sans-serif; background-color: #f9f9f9; margin: 0; padding: 0;">
    <table width="100%" cellpadding="0" cellspacing="0" style="background-color: #f9f9f9; padding: 30px 0;">
        <tr>
            <td align="center">
                <table width="600" cellpadding="0" cellspacing="0"
                    style="background-color: #ffffff; border-radius: 8px; overflow: hidden; border: 1px solid #e0e0e0;">

                    <!-- Logo -->
                    <tr>
                        <td style="background-color: #fff; padding: 20px; text-align: center;">
                            <img src="{{ url('assets/frontend/images/devil-logo-black.png') }}" alt="Devil's Juice"
                                width="160">
                        </td>
                    </tr>

                    <!-- Content -->
                    <tr>
                        <td style="padding: 30px;">
                            <h2 style="color: #333333; margin-top: 0;">
                                Reset Your Password
                            </h2>

                            <p style="color: #555555; font-size: 15px;">
                                Hello {{ $user_name ?? 'User' }},
                            </p>

                            <p style="color: #555555; font-size: 15px;">
                                We received a request to reset your password for your <strong>Devil’s Circle</strong>
                                account.
                            </p>

                            <p style="color: #555555; font-size: 15px;">
                                Click the button below to reset your password:
                            </p>

                            <!-- Button -->
                            <table width="100%" cellpadding="0" cellspacing="0" style="margin: 25px 0; text-align: center;">
                                <tr>
                                    <td align="center">
                                        <a href="{{ $reset_link }}"
                                        style="background-color: #000; color: #ffffff; padding: 12px 24px; text-decoration: none; border-radius: 4px; font-size: 14px; display: inline-block;">
                                            Reset Password
                                        </a>
                                    </td>
                                </tr>
                            </table>

                            <p style="color: #555555; font-size: 14px;">
                                If you did not request a password reset, please ignore this email. Your account will
                                remain secure.
                            </p>

                            <p style="color: #555555; font-size: 14px; margin-top: 20px;">
                                Thanks,<br>
                                <strong>Devil's Juice Team</strong>
                            </p>
                        </td>
                    </tr>

                    <!-- Footer -->
                    <tr>
                        <td
                            style="background-color: #f1f1f1; padding: 15px; text-align: center; font-size: 12px; color: #777;">
                            Devil's Juice Website Notification
                        </td>
                    </tr>

                </table>
            </td>
        </tr>
    </table>
</body>

</html>