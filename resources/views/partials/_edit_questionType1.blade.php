<br>
<div style="padding-right:5%;padding-left:5%" id="demo">
    @foreach ($question['answer'] as $index=>$ans) 
      <div class="row">
        <div class="col">
            <label for="Answer{{$index}}" class="form-label">Answer {{$index}}</label>
            <input type="text" class="form-control" id="Answer{{$index}}" name="Answer{{$index}}" value="{{$ans['answer']}}" placeholder="Answer {{$index}}">        
        </div>
        <div class="col">
            <label for="Answer_corr{{$index}}" class="form-label">Correctness</label>
            <input type="text" class="form-control" id="Answer_corr{{$index}}" name="Answer_corr{{$index}}" value="{{$ans['isCorrect']}}" placeholder="Correctness for Answer {{$index}}">                </div>
    </div>
  @endforeach
</div>
<br>
