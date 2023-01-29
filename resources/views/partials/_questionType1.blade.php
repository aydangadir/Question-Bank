<label for="Mark" class="form-label">Number of answers:</label>
<input type="number" id="number" name='number' value="number">
<button type="button" onclick="myFunction()">Enter</button>
<br>
<div style="padding-right:5%;padding-left:5%" id="demo"></div>
<br>
<script>
    
// Here the value is stored in new variable x 
function myFunction() {
    var x = document.getElementById("number").value;

    let inputs_for_ans = `<h5>Check the answers which are correct</h5>`;
    for(let i = 1; i <= x; i++) {
        inputs_for_ans += `<div class="form-check"><input class="form-check-input" name="CheckAnswer${i}" type="checkbox" value="CheckAnswer${i}" id="AnswerCheck${i}">`;

        inputs_for_ans += `<label for="Answer${i}" class="form-label">Answer ${i}</label>`;
        inputs_for_ans += `<input type="text" class="form-control" id="Answer${i}" name="Answer${i}" placeholder="Answer ${i}"></div> `;
    }    
    document.getElementById("demo").innerHTML = inputs_for_ans;
}
</script>
