<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Selamat Datang di Fairy Nails</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f9f9f9;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 600px;
            margin: 20px auto;
            background: white;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
            text-align: center;
        }

        .header img {
            max-width: 150px;
            margin: 20px auto;
        }

        .content {
            text-align: left;
            padding: 20px;
        }

        .button {
            display: inline-block;
            background-color: #007bff;
            color: white;
            padding: 12px 25px;
            text-decoration: none;
            border-radius: 5px;
            font-weight: bold;
            font-size: 16px;
            margin-top: 20px;
        }

        .footer {
            font-size: 12px;
            color: #777;
            padding: 20px;
            text-align: center;
        }

        .social-icons img {
            width: 30px;
            margin: 0 5px;
        }

        a {
            color: #007bff;
            text-decoration: none;
        }
    </style>
</head>

<body>

    <div class="container">
        <!-- Header -->
        <div class="header">
            <p><a href="{{ url('/email/view') }}">Lihat di Browser</a></p>
            <img src="https://imgur.com/1Pxcjlz.png" alt="Fairy Nails Logo">
        </div>

        <!-- Konten Email -->
        <div class="content">


            <h2 style="color: #333; text-align: center;">Halo Admin,</h2>
            <p style="color: #555;">User baru telah mendaftar dan menunggu validasi:</p>
            <ul style="color: #555;">
                <li><strong>Nama:</strong> {{ $pendingUser->name }}</li>
                <li><strong>Email:</strong> {{ $pendingUser->email }}</li>
                <li><strong>No. Telepon:</strong> {{ $pendingUser->phone }}</li>
            </ul>
            <p style="color: #555;">Silakan login ke dashboard admin untuk memvalidasi user ini.</p>

            <!-- Footer -->
            <div class="footer">
                <p>Tetap terhubung dengan kami:</p>
                <div class="social-icons">
                    <a href="#"><img src="https://imgur.com/EJk7f3d.png" alt="Email"></a>
                    <a href="https://www.instagram.com/fairynailsid/profilecard/?igsh=NGhyOHV5bjA2d2ps"><img
                            src="https://imgur.com/d8Z6Urn.png" alt="Instagram"></a>
                    <a href="https://www.tiktok.com/@fairynailsid?_t=ZS-8smGZZjPnzW&_r=1"><img
                            src="https://imgur.com/undefined.png" alt="Tiktok"></a>
                    <a href="https://api.whatsapp.com/send/?phone=62895404204495&text&type=phone_number&app_absent=0"><img
                            src="https://imgur.com/undefined.png" alt="Phone"></a>
                </div>
                <div class="mt-8 pt-6 border-t border-pink-300 text-center text-sm">
                    <p>&copy; {!! date('Y') !!} Fairy Nails. All rights reserved.</p>
                </div>
            </div>
        </div>
</body>

</html>
