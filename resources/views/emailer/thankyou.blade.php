<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Thank You for Contacting Us</title>
</head>
<body style="font-family: Arial, sans-serif; background-color: #f9f9f9; margin: 0; padding: 0;">
  <table width="100%" cellpadding="0" cellspacing="0" style="background-color: #f9f9f9; padding: 30px 0;">
    <tr>
      <td align="center">
        <table width="600" cellpadding="0" cellspacing="0" style="background-color: #ffffff; border-radius: 8px; overflow: hidden; border: 1px solid #e0e0e0;">
          
          <!-- Logo -->
          <tr>
            <td style="background-color: #fff; padding: 20px; text-align: center;">
              <img src="{{ url('assets/frontend/images/devil-logo-black.png') }}" alt="Devil's Juice" width="160">
            </td>
          </tr>

          <!-- Content -->
          <tr>
            <td style="padding: 30px;">
              <h2 style="color: #333333; margin-top: 0;">Thank You for Choosing Us</h2>

              <p style="color: #555555; font-size: 15px;">
                Dear {{ $name ?? '' }},
              </p>

              <p style="color: #555555; font-size: 15px;">
                Thank you for contacting us. We have received your details and will get back to you shortly.
              </p>

              <p style="color: #555555; font-size: 15px;">
                <strong>Your Submitted Details:</strong>
              </p>

              <table cellpadding="6" cellspacing="0" width="100%" style="border-collapse: collapse; margin-top: 15px;">
                <tr>
                  <td style="border: 1px solid #ddd;">Name</td>
                  <td style="border: 1px solid #ddd;">{{ $name ?? '' }}</td>
                </tr>

                <tr>
                  <td style="border: 1px solid #ddd;">Email</td>
                  <td style="border: 1px solid #ddd;">{{ $email ?? '' }}</td>
                </tr>

                @if(isset($subject))
                <tr>
                  <td style="border: 1px solid #ddd;">Subject</td>
                  <td style="border: 1px solid #ddd;">{{ $subject }}</td>
                </tr>
                @endif

                @if(isset($msg))
                <tr>
                  <td style="border: 1px solid #ddd;">Message</td>
                  <td style="border: 1px solid #ddd;">{{ $msg }}</td>
                </tr>
                @endif
              </table>

              <p style="color: #555555; font-size: 14px; margin-top: 20px;">
                Our team will contact you as soon as possible.
              </p>

              <p style="color: #555555; font-size: 14px;">
                Thanks & Regards,<br>
                <strong>Devil's Juice Team</strong>
              </p>
            </td>
          </tr>

          <!-- Footer -->
          <tr>
            <td style="background-color: #f1f1f1; padding: 15px; text-align: center; font-size: 12px; color: #777;">
              <strong>Reach us at:</strong><br>
              info@deviljuice.com<br><br>
              Devil's Juice Website Notification
            </td>
          </tr>

        </table>
      </td>
    </tr>
  </table>
</body>
</html>
