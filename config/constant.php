<?php 
    defined('ADMIN')   || define('ADMIN', 'admin');
    defined('ADMIN_MAIL_TO')   || define('ADMIN_MAIL_TO', 'test152@yopmail.com');
    defined('IMAGE_PATH')   || define('IMAGE_PATH', 'assets/uploads/images/');
    defined('VIDEO_PATH')   || define('VIDEO_PATH', 'assets/uploads/videos/');
    defined('MAINTAIN_STOCK')   || define('MAINTAIN_STOCK', 'Yes'); // Yes/No : check stock when order
    defined('PAYPAL_CURRENCY')   || define('PAYPAL_CURRENCY', 'USD');

    defined('PDF_PATH')   || define('PDF_PATH', 'storage/app/pdf/');
    defined('STRIPE_KEY')   || define('STRIPE_KEY', env('STRIPE_KEY'));  
    defined('STRIPE_SECRET')   || define('STRIPE_SECRET', env('STRIPE_SECRET'));  
    defined('STRIPE_CURRENCY')   || define('STRIPE_CURRENCY', 'AUD');

