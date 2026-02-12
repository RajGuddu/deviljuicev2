<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Payment Link Sent – Devil's Juice</title>
</head>
<body style="font-family: Arial, sans-serif; background-color: #f8f8f8; margin: 0; padding: 0;">
  <table width="100%" cellpadding="0" cellspacing="0" style="background-color: #f8f8f8; padding: 30px 0;">
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
              <h2 style="color: #333333; margin-top: 0;">
                Payment Link Sent to Client
              </h2>

              <p style="color: #555555; font-size: 15px;">
                Hello Admin,
              </p>

              <p style="color: #555555; font-size: 15px;">
                A payment link has been successfully generated and sent to the client for the following pre-order:
              </p>

              <!-- Order Details -->
              <table cellpadding="6" cellspacing="0" width="100%" style="border-collapse: collapse; margin-top: 15px;">
                <tr>
                  <td style="border: 1px solid #ddd;"><strong>Client Name</strong></td>
                  <td style="border: 1px solid #ddd;">{{ $client_name }}</td>
                </tr>
                <tr>
                  <td style="border: 1px solid #ddd;"><strong>Client Email</strong></td>
                  <td style="border: 1px solid #ddd;">{{ $client_email }}</td>
                </tr>
                <tr>
                  <td style="border: 1px solid #ddd;"><strong>Pre-Order ID</strong></td>
                  <td style="border: 1px solid #ddd;">{{ $order_id }}</td>
                </tr>
                <tr>
                  <td style="border: 1px solid #ddd;"><strong>Total Amount</strong></td>
                  <td style="border: 1px solid #ddd;">{{ $amount }}</td>
                </tr>
                <tr>
                  <td style="border: 1px solid #ddd;"><strong>Payment Link</strong></td>
                  <td style="border: 1px solid #ddd;">
                    <a href="{{ $payment_link }}">{{ $payment_link }}</a>
                  </td>
                </tr>
                <tr>
                  <td style="border: 1px solid #ddd;"><strong>Sent At</strong></td>
                  <td style="border: 1px solid #ddd;">{{ $sent_at }}</td>
                </tr>
              </table>

              <p style="color: #555555; font-size: 15px; margin-top: 20px;">
                Please monitor the payment status. The order will be processed once payment is successfully completed.
              </p>

              <p style="color: #555555; font-size: 15px;">
                This is an automated notification.
              </p>
            </td>
          </tr>

          <!-- Footer -->
          <tr>
            <td style="background-color: #f1f1f1; padding: 15px; text-align: center; font-size: 12px; color: #777;">
              Devil's Juice Admin Notification System
            </td>
          </tr>

        </table>
      </td>
    </tr>
  </table>
</body>
</html>
