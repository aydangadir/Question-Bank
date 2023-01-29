<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

</head>
<body>
    @include('components.message')
    @include('partials._navbar')
    <table class="table">
    <thead>
        <tr>
        <th scope="col">#</th>
        <th scope="col">Question</th>
        <th scope="col">Category</th>
        <th scope="col">View</th>
        <th scope="col">Edit</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($questions as $index=>$question)
        <tr>
        <th scope="row">{{$index+1}}</th>
        <td>{{$question['question']}}</td>
        <td>{{$question['questionType']['questionType']}}</td>
        <td><a href="./question/{{$question['id']}}">view</a></td>
        <td><a href="./question/{{$question['id']}}/edit">edit</a></td>
        </tr>
        @endforeach
    </tbody>
    </table>
</body>
</html>