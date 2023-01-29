<div style="padding-right:5%;padding-left:5%" id="demo">
  <br>

  <h5>Check the answers which are correct</h5>
  <div class="form-check">
    @php
    $first = $question['answer'][0]['isCorrect']; 
    @endphp

    @if($first == 100)
      <input class="form-check-input" type="radio" name="radio" value="True" id="Answer1" checked>
    @else
      <input class="form-check-input" type="radio" name="radio" value="True" id="Answer1">
    @endif
    <label class="form-check-label" for="Answer1">
      True
    </label>
  </div>
  <div class="form-check">
    @if($first != 100)
    <input class="form-check-input" type="radio" name="radio" value="False" id="Answer2" checked>
    @else
      <input class="form-check-input" type="radio" name="radio" value="False" id="Answer2">
    @endif
      <label class="form-check-label" for="Answer2">
      False
    </label>
  </div>
</div>