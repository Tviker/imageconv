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
<div class="col-sm-12">
    <form enctype="multipart/form-data" type="mu" class="form-inline" method="post" action="{{route('image.store')}}">
        @csrf

        <div class="form-group">
            <input name="image" type="file">
            <select name="output" id="output" class="form-control">
                <option selected disabled>Output...</option>
                <option value="original">original image</option>
                <option value="square">square image</option>
                <option value="small">small image</option>
                <option value="all">all three</option>
            </select>
            <button class="btn btn-primary" type="submit">Send</button>
        </div>
    </form>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
</div>
<script src="/js/app.js"></script>

</body>
</html>
