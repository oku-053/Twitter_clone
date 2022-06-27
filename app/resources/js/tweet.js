//文字数カウント
var formInput = document.getElementById("tweetForm");
var counterSpan = document.getElementById("inputCounter");
classDanger = "mb-4 text-danger"
classDefault =  document.getElementById("inputCount").className

formInput.addEventListener("keyup", function() {
  counterSpan.textContent = formInput.value.length;
  switch(true){
    case counterSpan.textContent > 140:
        document.getElementById("inputCount").className = classDanger;
        document.getElementById("tweetButton").disabled = true;
        break;
    default:
        document.getElementById("inputCount").className = classDefault;
        document.getElementById("tweetButton").disabled = false;
  }
});



    
  