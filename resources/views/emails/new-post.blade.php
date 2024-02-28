<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Yeni Bir Post Paylaşıldı!</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .card {
            border-radius: 15px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s;
        }

        .card:hover {
            transform: translateY(-5px);
        }

        .card-title {
            color: #333;
            font-weight: bold;
        }

        .card-subtitle {
            color: #666;
        }

        .card-text {
            color: #444;
        }

        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
            color: #fff;
        }

        .btn-primary:hover {
            background-color: #0056b3;
            border-color: #0056b3;
        }

        .footer {
            color: #333;
            border-radius: 0 0 15px 15px;
            padding: 10px;
            text-align: center;
        }
    </style>
</head>

<body>
<div class="container mt-5">
    <div class="card">
        <div class="card-body">
            <h5 class="card-title text-center">Yeni Bir Post Paylaşıldı!</h5>
            <h6 class="card-subtitle mb-2 text-muted text-center">{{ $post->title }}</h6>
            <p class="card-text text-center">{{ $post->content }}</p>

        </div>
    </div>
    <div class="footer mt-3">
        <div class="text-center">
            <a href="http://127.0.0.1:8000/post/{{$post->slug}}" class="btn btn-primary">Postu Gör</a>
        </div>
    </div>
</div>
</body>

</html>
