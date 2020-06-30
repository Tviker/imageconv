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
    <form class="form-inline" action="">
        <div class="form-group">
            <input type="file" id="image" id="image-input" >
            <select id="inputState" class="form-control">
                <option selected disabled>Output...</option>
                <option value="original">original image</option>
                <option value="square">square image</option>
                <option value="small">small image</option>
                <option value="all">all three</option>
            </select>
            <button class="btn btn-primary" type="submit">Send</button>
        </div>
    </form>
</div>
<script src="/js/app.js"></script>

</body>
</html>
