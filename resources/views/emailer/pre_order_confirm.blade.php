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
                    <a href="{{ url('our-vodka/'.$product['attributes']['pro_url']) }}" style="text-decoration: none;">
                    <img src="{{ url(IMAGE_PATH.$product['attributes']['image']) }}" alt="{{ $product['name'] }}" width="80" style="display:block; width:80px; height:auto; max-width:80px; border-radius:6px;">
                    </a>
                  </td>

                  <!-- Product Info -->
                  <td style="border: 1px solid #ddd;">
                    <strong>{{ $product['name'] }}</strong><br>
                    Quantity: {{ $product['quantity'] }}<br>
                    Price: ${{ number_format($product['price'],2) }}<br>
                    Subtotal: ${{ number_format($product['subtotal'],2) }}
                  </td>
                </tr>
                @endforeach

              </table>

              <!-- Total Section -->
              <table cellpadding="8" cellspacing="0" width="100%" style="border-collapse: collapse; margin-top: 15px;">
                <tr>
                  <td align="right" style="border: 1px solid #ddd;"><strong>Total Amount:</strong></td>
                  <td width="150" style="border: 1px solid #ddd;"><strong>${{ number_format($amount,2) }}</strong></td>
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
          @include('emailer/footer')

        </table>
      </td>
    </tr>
  </table>
</body>
</html>
