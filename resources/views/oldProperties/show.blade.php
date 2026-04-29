<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name') }}</title>
</head>
<body>
    <h1>Single Property Page</h1>
        <div style="border:1px solid #ccc; padding:15px; margin-bottom: 25px;">
            <h2>{{ $property->title }}</h2>
            <p><strong>Price: </strong>{{ $property->formatted_price }}</p>
            <p><strong>Location: </strong>{{ $property->location }}</p>
            <p><strong>Status: </strong>{{ $property->status }}</p>
        </div>
</body>
</html>

