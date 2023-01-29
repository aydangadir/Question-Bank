<div style="padding-right:5%;padding-left:5%" id="demo">
    <br>
 
    <div class="row">
        <div class="col">
            <input type="text" class="form-control" name='Answer' placeholder="The Numerical Answer" aria-label="Answer" value="{{$question['answer'][0]['answer']}}" required>
        </div>
        <div class="col">
            <input type="text" class="form-control" name='Error' placeholder="+/- Error" aria-label="Error" value="{{$question['answer'][0]['isCorrect']}}" required>
        </div>
    </div>
</div>
<br>