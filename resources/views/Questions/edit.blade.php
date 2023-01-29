<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Create</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

</head>
<body>
    @include('partials/_navbar')

    <br>
    <form action="/edit/{{$question['id']}}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <h3>Editing a {{$question['questionType']['questionType']}} question</h3>
        </div>
        <div class="mb-3">
            <label for="Question" class="form-label">Question</label>
            <input type="text" class="form-control" id="Question" name="Question" value="{{$question['question']}}" placeholder="Question" required>
        </div>
        <div class="mb-3">
            <label for="Mark" class="form-label">Mark</label>
            <input type="text" class="form-control" id="Mark" name="Mark" value="{{$question['mark']}}" placeholder="Mark" required>
        </div>
        @include("partials._edit_questionType{$question['questionType']['id']}")
        <div class="mb-3">
            <label for="Feedback" class="form-label">Feedback (Optional)</label>
            <input type="text" class="form-control" id="Feedback" name="Feedback" value="{{$question['feedback']}}" placeholder="Feedback">
        </div>
        <div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </form>
</body>
</html>