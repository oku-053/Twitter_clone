//文字数カウント
var formInput = document.getElementById("tweetForm");
var counterSpan = document.getElementById("inputCounter");
class_danger = "mb-4 text-danger"
class_default =  document.getElementById("inputCount").className

formInput.addEventListener("keyup", function() {
  counterSpan.textContent = formInput.value.length;
  switch(true){
    case counterSpan.textContent > 140:
        document.getElementById("inputCount").className = class_danger;
        document.getElementById("tweetButton").disabled = true;
        break;
    default:
        document.getElementById("inputCount").className = class_default;
        document.getElementById("tweetButton").disabled = false;
  }
});



    
  