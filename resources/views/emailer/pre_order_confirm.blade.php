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
        <table width="650" cellpadding="0" cellspacing="0" style="background-color: #ffffff; border-radius: 8px; overflow: hidden; border: 1px solid #e0e0e0;">
          
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
                Thank you for placing a <strong>pre-order</strong>.  
                We have successfully received your order.
              </p>

              <!-- Order Info -->
              <table cellpadding="8" cellspacing="0" width="100%" style="border-collapse: collapse; margin-top: 20px;">
                <tr style="background-color: #f9f9f9;">
                  <th align="left" style="border: 1px solid #ddd;">Pre-Order ID</th>
                  <td style="border: 1px solid #ddd;">{{ $order_id }}</td>
                </tr>
              </table>

              <!-- Products List -->
              <h3 style="margin-top: 25px; color: #333;">Order Details</h3>

              <table cellpadding="10" cellspacing="0" width="100%" style="border-collapse: collapse;">
                
                @foreach($products as $product)
                <tr>
                  <!-- Product Image -->
                  <td width="110" style="border: 1px solid #ddd; text-align: center; vertical-align: top;">
                    <img src="{{ url(IMAGE_PATH.$product['attributes']['image']) }}" alt="{{ $product['name'] }}" width="80" style="display:block; width:80px; height:auto; max-width:80px; border-radius:6px;">
                  </td>

                  <!-- Product Info -->
                  <td style="border: 1px solid #ddd;">
                    <strong>{{ $product['name'] }}</strong><br>
                    Quantity: {{ $product['quantity'] }}<br>
                    Price: ${{ $product['price'] }}<br>
                    Subtotal: ${{ $product['subtotal'] }}
                  </td>
                </tr>
                @endforeach

              </table>

              <!-- Total Section -->
              <table cellpadding="8" cellspacing="0" width="100%" style="border-collapse: collapse; margin-top: 15px;">
                <tr>
                  <td align="right" style="border: 1px solid #ddd;"><strong>Total Amount:</strong></td>
                  <td width="150" style="border: 1px solid #ddd;"><strong>${{ $amount }}</strong></td>
                </tr>
              </table>

              <p style="color: #555555; font-size: 15px; margin-top: 20px;">
                Your order will be shipped within <strong>90 days</strong>.  
                Once ready, you will receive a separate email with a payment link.
              </p>

              <p style="color: #555555; font-size: 15px;">
                <strong>Note:</strong> You may cancel your pre-order anytime before completing the payment.
              </p>

              <p style="color: #555555; font-size: 15px;">
                Thank you for choosing Devil's Juice!
              </p>
            </td>
          </tr>

          <!-- Footer -->
          <tr>
            <td style="background-color: #f1f1f1; padding: 25px; text-align: center; font-size: 13px; color: #555;">
              
              <!-- Website Link -->
              <?php /*<p style="margin: 5px 0;">
                <a href="{{ url('/') }}" style="color: #000; text-decoration: none; font-weight: bold;">
                  Back to Website
                </a>
              </p> */ ?>
              <p style="margin: 15px 0; text-align: center;">
                <a href="{{ url('/') }}"
                  style="display: inline-block;
                          background-color: #000;
                          color: #ffffff;
                          text-decoration: none;
                          padding: 12px 25px;
                          border-radius: 5px;
                          font-weight: bold;
                          font-size: 14px;">
                  Back to Website
                </a>
              </p>

              <!-- Policy Links -->
              <p style="margin: 5px 0;">
                <a href="{{ url('/terms-condition') }}" style="color: #555; text-decoration: none;">
                  Terms & Conditions
                </a> |
                <a href="{{ url('/privacy-policy') }}" style="color: #555; text-decoration: none;">
                  Privacy Policy
                </a>
              </p>

              <!-- Social Media -->
              <p style="margin: 10px 0;">
                <a href="{{ $settings->instagram_link }}" style="margin: 0 8px; text-decoration: none;">Instagram</a> |
                <a href="{{ $settings->facebook_link }}" style="margin: 0 8px; text-decoration: none;">Facebook</a> |
                <a href="{{ $settings->twitter_link }}" style="margin: 0 8px; text-decoration: none;">Twitter</a>
              </p>

              <p style="margin-top: 10px; font-size: 12px; color: #888;">
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
