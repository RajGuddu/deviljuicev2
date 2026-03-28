<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Digital Marketing Assignment</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 40px;
            line-height: 1.6;
            color: #333;
        }

        h1, h2, h3 {
            color: #2c3e50;
        }

        h1 {
            text-align: center;
            text-decoration: underline;
        }

        hr {
            border: 1px solid #bdc3c7;
            margin: 20px 0;
        }

        p {
            text-align: justify;
        }

        ul {
            margin-left: 20px;
            list-style-type: square;
        }

        .section {
            margin-bottom: 25px;
        }

        .footer {
            margin-top: 50px;
            text-align: center;
            font-size: 12px;
            color: gray;
        }
    </style>
</head>
<body>

    <h1>Digital Marketing Assignment</h1>
    <hr>

    <div class="section">
        <h2>Student Details</h2>
        <p><strong>Name:</strong>{{ $name }}</p>
        <p><strong>Roll Number:</strong> {{ $roll_no }}</p>
        <p><strong>Course:</strong> Digital Marketing</p>
        <p><strong>Date:</strong> {{ $date }}</p>
    </div>

    <div class="section">
        <h2>Topic: Introduction to Digital Marketing</h2>
        <p>
            Digital marketing is the practice of promoting products or services using digital channels such as social media, search engines, email, websites, and mobile apps. 
            It is a key strategy for businesses to reach and engage with their target audience efficiently.
        </p>
    </div>

    <div class="section">
        <h2>Key Strategies of Digital Marketing</h2>
        <ul>
            <li>Search Engine Optimization (SEO)</li>
            <li>Content Marketing</li>
            <li>Social Media Marketing</li>
            <li>Email Marketing</li>
            <li>Pay Per Click (PPC) Advertising</li>
        </ul>
    </div>

    <div class="section">
        <h2>Importance</h2>
        <p>
            Digital marketing allows businesses to analyze campaigns in real time, reach global audiences, reduce costs compared to traditional marketing, 
            and measure performance using analytics. It has become an essential part of modern marketing strategies.
        </p>
    </div>

    <div class="section">
        <h2>Conclusion</h2>
        <p>
            In conclusion, digital marketing is an indispensable tool for businesses of all sizes. It helps in building brand awareness, increasing conversions, 
            and connecting with customers more effectively than ever before.
        </p>
    </div>

    <div class="footer">
        &copy; 2026 Digital Marketing Assignment
    </div>

</body>
</html>