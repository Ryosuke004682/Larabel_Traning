<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>神様</title>
</head>
<body>
    <h1>神様</h1>
    @foreach($samples as $sample)
        <p><a href="/samples/{{ $sample->id }}">{{ $sample->name }}</a></p>
    @endforeach
</body>
</html>