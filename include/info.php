<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Hospital Information</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" />
    <style>
        body {
            min-height: 100vh;
            background-color: rgb(194, 107, 123);
            /* bright pink/red color */
            color: black;
        }

        .container {
            margin-top: 50px;
        }

        .card {
            background-color: rgba(156, 16, 37, 0.02);
            /* slightly transparent white */
            border-radius: 10px;
            padding: 20px;
            color: black;
        }

        .youtube {
            background-color: rgba(255, 255, 255, 0.3);
            padding: 20px;
            border-radius: 10px;
        }

        a.btn-info,
        a.btn-danger {
            color: black;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1 class="text-center mb-4">Welcome to Our Hospital</h1>

        <div class="card mb-4">
            <div class="card-body">
                <h2 class="card-title">About the Hospital</h2>
                <p class="card-text">Our hospital is committed to providing the best healthcare services, equipped with modern facilities and experienced professionals.</p>
            </div>
        </div>

        <div class="card mb-4">
            <div class="card-body">
                <h2 class="card-title">Established Year</h2>
                <p class="card-text">Our journey began in <strong>2005</strong>, and since then, we've been dedicated to serving the community with top-notch medical care.</p>
            </div>
        </div>

        <div class="card mb-4">
            <div class="card-body">
                <h2 class="card-title">Facebook Page</h2>
                <p class="card-text">
                    Stay connected with us on Facebook for updates and health tips:
                    <a href="https://facebook.com/YourPage" target="_blank" class="btn btn-info">Visit our Facebook Page</a>
                </p>
            </div>
        </div>

        <div class="card mb-4 youtube">
            <div class="card-body">
                <h2 class="card-title">YouTube Channel</h2>
                <p class="card-text">
                    Watch our latest health videos and hospital updates on YouTube! Subscribe to our channel:
                    <a href="https://youtube.com/YourChannel" target="_blank" class="btn btn-danger">Visit YouTube Channel</a>
                </p>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>

</html>