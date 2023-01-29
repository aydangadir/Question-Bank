<div style="padding-right:5%;padding-left:5%" id="demo">
    <br>
    
    <h5>Check the answers which are correct</h5>
    <div class="form-check">
      @php
      $first = $question['answer'][0]['isCorrect']; 
      @endphp

      @if($first == 100)
        <input class="form-check-input" type="radio" name="radio" value="RadioAnswer1" id="Answer1" checked>
      @else
        <input class="form-check-input" type="radio" name="radio" value="RadioAnswer1" id="Answer1">
      @endif
      <label class="form-check-label" for="Answer1">
        First Answer
      </label>
      <input type="text" class="form-control" id="Answer1" name="Answer1" value="{{$question['answer'][0]['answer']}}" placeholder="Answer1"></div> 

      <br>
      
    <div class="form-check">

      @if($first != 100)
        <input class="form-check-input" type="radio" name="radio" value="RadioAnswer2" id="Answer2" checked>
      @else
        <input class="form-check-input" type="radio" name="radio" value="RadioAnswer2" id="Answer2">
      @endif
      <label class="form-check-label" for="Answer2">
        Second Answer
      </label>
      <input type="text" class="form-control" id="Answer2" name="Answer2" value="{{$question['answer'][1]['answer']}}" placeholder="Answer2"></div> 

</div>
