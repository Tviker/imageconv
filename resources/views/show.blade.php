<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Index</title>
    <!-- Bootstrap core CSS -->
    <link href="/css/app.css" rel="stylesheet">
</head>
<body>
<script src="/js/app.js"></script>
<div class="col-sm-12">
    <table class="table">
        <thead>
        <tr>
            <th scope="col">base64</th>
            <th scope="col">type</th>
            <th scope="col">image</th>

        </tr>
        </thead>
        <tbody>

        @foreach($images as $image)
            <tr>
                <td>{{$image->base_64}}</td>
                <td>{{$image->type}}</td>
                <td><img src="{{url($image->path_image)}}" alt="{{$image->base_64}}"></td>

            </tr>
        @endforeach

        </tbody>
    </table>
</div>
</body>
</html>
