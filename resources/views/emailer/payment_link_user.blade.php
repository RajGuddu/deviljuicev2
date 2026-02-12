<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Payment Link – Devil's Juice</title>
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
                Your Order is Ready – Complete Your Payment
              </h2>

              <p style="color: #555555; font-size: 15px;">
                Hi {{ $client_name }},
              </p>

              <p style="color: #555555; font-size: 15px;">
                Great news! Your pre-order with <strong>Devil's Juice</strong> is now ready for shipment.
              </p>

              <!-- Order Details -->
              <table cellpadding="6" cellspacing="0" width="100%" style="border-collapse: collapse; margin-top: 15px;">
                <tr>
                  <td style="border: 1px solid #ddd;">Pre-Order ID</td>
                  <td style="border: 1px solid #ddd;">{{ $order_id }}</td>
                </tr>
                <tr>
                  <td style="border: 1px solid #ddd;">Total Amount</td>
                  <td style="border: 1px solid #ddd;">{{ $amount }}</td>
                </tr>
              </table>

              <p style="color: #555555; font-size: 15px; margin-top: 20px;">
                To proceed with delivery, please complete your payment using the secure link below:
              </p>

              <!-- Payment Button -->
              <table width="100%" cellpadding="0" cellspacing="0" style="margin: 20px 0; text-align: center;">
                <tr>
                  <td>
                    <a href="{{ $payment_link }}" 
                       style="background-color: #000000; color: #ffffff; padding: 12px 25px; 
                              text-decoration: none; border-radius: 5px; font-size: 16px; 
                              display: inline-block;">
                      Complete Payment
                    </a>
                  </td>
                </tr>
              </table>

              <p style="color: #555555; font-size: 15px;">
                Once your payment is successfully completed, your order will be processed for shipping.
              </p>

              <p style="color: #555555; font-size: 15px;">
                <strong>Important:</strong> This payment link may expire after a certain period.  
                Please complete your payment at the earliest to avoid cancellation.
              </p>

              <p style="color: #555555; font-size: 15px;">
                If you face any issues while making the payment, feel free to contact our support team.
              </p>

              <p style="color: #555555; font-size: 15px;">
                Thank you for choosing Devil's Juice!
              </p>
            </td>
          </tr>

          <!-- Footer -->
          <tr>
            <td style="background-color: #f1f1f1; padding: 15px; text-align: center; font-size: 12px; color: #777;">
              Team Devil's Juice
            </td>
          </tr>

        </table>
      </td>
    </tr>
  </table>
</body>
</html>
