<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>New Pre-Order Received</title>
</head>
<body style="font-family: Arial, sans-serif; background-color: #f4f4f4; margin: 0; padding: 0;">
  <table width="100%" cellpadding="0" cellspacing="0" style="padding: 30px 0;">
    <tr>
      <td align="center">
        <table width="600" cellpadding="0" cellspacing="0" style="background-color: #ffffff; border: 1px solid #ddd; border-radius: 6px;">
          
            <!-- Logo -->
            <tr>
                <td style="background-color: #fff; padding: 20px; text-align: center;">
                <img src="{{ url('assets/frontend/images/devil-logo-black.png') }}" alt="Devil's Juice" width="160">
                </td>
            </tr>

            <!-- Content -->

          
          <tr>
            <td style="padding: 25px;">
                <h2 style="color: #333333; margin-top: 0;">
                    New Pre-Order Received
                </h2>
              <p style="font-size: 14px; color: #333;">
                Hello Admin,
              </p>

              <p style="font-size: 14px; color: #333;">
                A new <strong>pre-order</strong> has been submitted by a customer.  
                Please find the order details below:
              </p>

              <!-- Order Details -->
              <table width="100%" cellpadding="6" cellspacing="0" style="border-collapse: collapse; margin-top: 15px;">
                <tr>
                  <td style="border: 1px solid #ddd;">Pre-Order ID</td>
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
                  <td style="border: 1px solid #ddd;">Pre-Order Date</td>
                  <td style="border: 1px solid #ddd;">{{ $order_date }}</td>
                </tr>
              </table>

              <p style="font-size: 14px; color: #333; margin-top: 20px;">
                This pre-order does not include any payment at this stage.
                Once the order is ready for shipping (within 90 days), you can send the customer a payment request email containing the payment link.
              </p>

              <p style="font-size: 14px; color: #333;">
                The customer is allowed to cancel this pre-order anytime before payment is completed.
              </p>

              <p style="font-size: 14px; color: #333;">
                Please review the order from the admin panel for further action.
              </p>

              <p style="font-size: 14px; color: #333;">
                — System Notification
              </p>
            </td>
          </tr>

          <!-- Footer -->
          <tr>
            <td style="padding: 12px; text-align: center; background-color: #f1f1f1; font-size: 12px; color: #777;">
              Devil's Juice Admin Panel
            </td>
          </tr>

        </table>
      </td>
    </tr>
  </table>
</body>
</html>
