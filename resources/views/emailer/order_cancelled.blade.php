<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Order Cancelled</title>
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
                Your Order Has Been Cancelled – Devil's Juice
              </h2>

              <p style="color: #555555; font-size: 15px;">
                Hi {{ $client_name }},
              </p>

              <p style="color: #555555; font-size: 15px;">
                We would like to inform you that your order has been cancelled.
              </p>

              <!-- Order Details -->
              <table cellpadding="6" cellspacing="0" width="100%" style="border-collapse: collapse; margin-top: 15px;">
                <tr>
                  <td style="border: 1px solid #ddd;">Order ID</td>
                  <td style="border: 1px solid #ddd;">{{ $order_id }}</td>
                </tr>
                <tr>
                  <td style="border: 1px solid #ddd;">Cancellation Date</td>
                  <td style="border: 1px solid #ddd;">{{ $cancel_date }}</td>
                </tr>
              </table>

              <p style="color: #555555; font-size: 15px;">
                If this cancellation was not requested by you or if you have any concerns, please contact us immediately.
              </p>

              <p style="color: #555555; font-size: 15px;">
                We hope to serve you again in the future.
              </p>

              <p style="color: #555555; font-size: 15px;">
                Thank you for choosing Devil's Juice.
              </p>
            </td>
          </tr>

          <!-- Footer -->
          @include('emailer/footer')
        </table>
      </td>
    </tr>
  </table>
</body>
</html>
