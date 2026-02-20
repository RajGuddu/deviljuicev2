<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Order Delivered – Admin Notification</title>
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
                Order Successfully Delivered – Devil's Juice
              </h2>

              <p style="color: #555555; font-size: 15px;">
                Hi Admin,
              </p>

              <p style="color: #555555; font-size: 15px;">
                This is to inform you that the following order has been successfully delivered to the customer.
              </p>

              <!-- Order Details -->
              <table cellpadding="6" cellspacing="0" width="100%" style="border-collapse: collapse; margin-top: 15px;">
                <tr>
                  <td style="border: 1px solid #ddd;">Order ID</td>
                  <td style="border: 1px solid #ddd;">{{ $order_id }}</td>
                </tr>
                <tr>
                  <td style="border: 1px solid #ddd;">Customer Name</td>
                  <td style="border: 1px solid #ddd;">{{ $client_name }}</td>
                </tr>
                <tr>
                  <td style="border: 1px solid #ddd;">Customer Email</td>
                  <td style="border: 1px solid #ddd;">{{ $client_email }}</td>
                </tr>
                <tr>
                  <td style="border: 1px solid #ddd;">Order Amount</td>
                  <td style="border: 1px solid #ddd;">${{ $amount }}</td>
                </tr>
                <tr>
                  <td style="border: 1px solid #ddd;">Delivery Date</td>
                  <td style="border: 1px solid #ddd;">{{ date('d M, Y h:i A') }}</td>
                </tr>
              </table>

              <p style="color: #555555; font-size: 15px; margin-top: 20px;">
                Please update your records and proceed with any necessary post-delivery processes.
              </p>
            </td>
          </tr>
          
          @include('emailer/footer')

        </table>
      </td>
    </tr>
  </table>
</body>
</html>