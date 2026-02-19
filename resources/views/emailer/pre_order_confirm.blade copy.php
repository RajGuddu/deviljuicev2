<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Pre-Order Confirmation</title>
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
                Pre-Order Submitted Successfully – Devil's Juice
              </h2>

              <p style="color: #555555; font-size: 15px;">
                Hi {{ $client_name }},
              </p>

              <p style="color: #555555; font-size: 15px;">
                Thank you for placing a <strong>pre-order</strong> with Devil's Juice.  
                We have successfully received your pre-order.
              </p>

              <!-- Order Details -->
              <table cellpadding="6" cellspacing="0" width="100%" style="border-collapse: collapse; margin-top: 15px;">
                <tr>
                  <td style="border: 1px solid #ddd;">Pre-Order ID</td>
                  <td style="border: 1px solid #ddd;">{{ $order_id }}</td>
                </tr>
              </table>

              <p style="color: #555555; font-size: 15px; margin-top: 20px;">
                Your order will be shipped within <strong>90 days</strong>.  
                Once your order is ready for shipment, you will receive a separate email from us.
              </p>

              <p style="color: #555555; font-size: 15px;">
                That email will contain a <strong>payment link</strong>.  
                Your order will be delivered only after the payment is successfully completed.
              </p>

              <p style="color: #555555; font-size: 15px;">
                <strong>Note:</strong> You may cancel your pre-order at any time before completing the payment.
              </p>

              <p style="color: #555555; font-size: 15px;">
                If you have any questions or need assistance, feel free to contact us.
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
