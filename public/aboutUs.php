<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Rainforest</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/shop-homepage.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">

    <style>
        body {
            font-family: Arial, Helvetica, sans-serif;
            margin: 0;
            padding: 100px 500px;
        }

        html {
            box-sizing: border-box;
        }

        *,
        *:before,
        *:after {
            box-sizing: inherit;
        }

        .column {
            float: left;
            width: 33.3%;
            margin-bottom: 16px;
            padding: 0 8px;
        }

        .card {
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
            margin: 8px;
        }

        .about-section {
            padding: 50px;
            text-align: center;
            background-color: #778899;
            color: white;
        }

        .container {
            padding: 0 16px;
        }

        .container::after,
        .row::after {
            content: "";
            clear: both;
            display: table;
        }

        .title {
            color: grey;
        }

        .button {
            border: none;
            outline: 0;
            display: inline-block;
            padding: 8px;
            color: white;
            background-color: #000;
            text-align: center;
            cursor: pointer;
            width: 100%;
        }

        .button:hover {
            background-color: #555;
        }

        @media screen and (max-width: 650px) {
            .column {
                width: 100%;
                display: block;
            }
        }
    </style>

</head>

<body>

    <?php require_once("../resources/config.php"); ?>
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <?php include(TEMPLATE_FRONT . DS . "top_nav.php") ?>
    </nav>



    <div class="about-section">
        <h1>About Us</h1>
    </div>

    <h2 style="text-align:center">Our Team</h2>
    <div class="row">
        <div class="column">
            <div class="card">
                <div class="container">
                    <h2>Nafis Khan</h2>
                    <p class="title">Team Member</p>
                    <p>Email: nafisrizwank@gmail.com</p>
                </div>
            </div>
        </div>

        <div class="column">
            <div class="card">
                <div class="container">
                    <h2>Fahim Miah</h2>
                    <p class="title">Team Member</p>
                    <p>fmiah432000@gmail.com</p>
                </div>
            </div>
        </div>

        <div class="column">
            <div class="card">
                <div class="container">
                    <h2>Herbert Holder</h2>
                    <p class="title">Team Member</p>
                    <p>herbrholder@gmail.com</p>
                </div>
            </div>
        </div>
        <div class="column">
            <div class="card">
                <div class="container">
                    <h2>Emmanuel Ninbi Yobo</h2>
                    <p class="title">Team Member</p>
                    <p>Kwakuyobo17@gmail.com</p>
                </div>
            </div>
        </div>
    </div>

    <br>

    <?php include_once(TEMPLATE_FRONT . DS . "footer.php"); ?>