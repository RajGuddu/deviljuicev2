<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Pre-Order Cancelled Confirmation</title>
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
              <h2 style="color: #c62828; margin-top: 0;">
                Your Pre-Order Has Been Cancelled
              </h2>

              <p style="color: #555555; font-size: 15px;">
                Hi {{ $client_name }},
              </p>

              <p style="color: #555555; font-size: 15px;">
                This email confirms that <strong>you have successfully cancelled</strong> your pre-order with Devil's Juice.
              </p>

              <!-- Order Details -->
              <table cellpadding="8" cellspacing="0" width="100%" style="border-collapse: collapse; margin-top: 20px;">
                <tr>
                  <td style="border: 1px solid #ddd;">Pre-Order ID</td>
                  <td style="border: 1px solid #ddd;">{{ $order_id }}</td>
                </tr>
                <tr>
                  <td style="border: 1px solid #ddd;">Cancellation Date</td>
                  <td style="border: 1px solid #ddd;">{{ date('d M, Y') }}</td>
                </tr>
                <tr>
                  <td style="border: 1px solid #ddd;">Cancellation Reason</td>
                  <td style="border: 1px solid #ddd;">{{ $cancel_reason }}</td>
                </tr>
              </table>

              <p style="color: #555555; font-size: 15px; margin-top: 20px;">
                Since this was a pre-order and payment was not completed, 
                <strong>no charges have been applied.</strong>
              </p>

              <p style="color: #555555; font-size: 15px;">
                If this cancellation was made by mistake and you would like to place a new order, 
                you can visit our website anytime.
              </p>

              <p style="color: #555555; font-size: 15px;">
                We hope to serve you again soon!
              </p>

              <p style="color: #555555; font-size: 15px;">
                Thank you for choosing Devil's Juice.
              </p>
            </td>
          </tr>

          <!-- Footer -->
          <tr>
            <td style="background-color: #f1f1f1; padding: 20px; text-align: center; font-size: 12px; color: #777;">
              
              <p style="margin: 5px 0;">
                <a href="{{ url('/') }}" style="color: #000; text-decoration: none; font-weight: bold;">
                  Visit Website
                </a>
              </p>

              <p style="margin: 5px 0;">
                <a href="{{ url('/terms-condition') }}" style="color: #555; text-decoration: none;">
                  Terms & Conditions
                </a> |
                <a href="{{ url('/privacy-policy') }}" style="color: #555; text-decoration: none;">
                  Privacy Policy
                </a>
              </p>

              <p style="margin-top: 10px;">
                © {{ date('Y') }} Devil's Juice. All rights reserved.
              </p>

            </td>
          </tr>

        </table>
      </td>
    </tr>
  </table>
</body>
</html>
