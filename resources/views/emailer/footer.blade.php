<tr>
  <td style="background-color: #f1f1f1; padding: 25px; text-align: center; font-size: 13px; color: #555;">
    
    <!-- Back to Website Button -->
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
      <a href="{{ $settings->instagram_link ?? '#' }}" style="margin: 0 8px; text-decoration: none;">Instagram</a> |
      <a href="{{ $settings->facebook_link ?? '#' }}" style="margin: 0 8px; text-decoration: none;">Facebook</a> |
      <a href="{{ $settings->twitter_link ?? '#' }}" style="margin: 0 8px; text-decoration: none;">Twitter</a>
    </p>

    <p style="margin-top: 10px; font-size: 12px; color: #888;">
      © {{ date('Y') }} Devil's Juice. All rights reserved.
    </p>

  </td>
</tr>