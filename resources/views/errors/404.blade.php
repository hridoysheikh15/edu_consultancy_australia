<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page Not Found</title>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Arvo', serif;
            background-color: #fff;
            text-align: center;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .page_404 {
            width: 100%;
            max-width: 600px;
        }

        .four_zero_four_bg {
            background-image: url(https://cdn.dribbble.com/users/285475/screenshots/2083086/dribbble_1.gif);
            background-position: center;
            background-size: cover;
            background-repeat: no-repeat;
            height: 300px;
            width: 100%;
        }

        .four_zero_four_bg h1{
            font-size:80px;
            }

        .contant_box_404 {
            padding: 20px;
            text-align: center;
        }

        .contant_box_404 h3 {
            font-size: 24px;
            margin-bottom: 10px;
        }

        .contant_box_404 p {
            font-size: 16px;
            color: #555;
            margin-bottom: 20px;
        }

        .link_404 {
            color: #fff !important;
            padding: 12px 24px;
            background: #39ac31;
            border-radius: 5px;
            text-decoration: none;
            font-size: 18px;
            transition: 0.3s;
        }

        .link_404:hover {
            background: #2f8c27;
        }
    </style>
</head>

<body>
    <section class="page_404">
        <div class="four_zero_four_bg">
            <h1 class="text-center ">404</h1>
        </div>
        <div class="contant_box_404">
            <h3>Look like you're lost</h3>
            <p>The page you are looking for is not available!</p>
            <a href="/" class="link_404">Go to Home</a>
        </div>
    </section>
</body>

</html>
