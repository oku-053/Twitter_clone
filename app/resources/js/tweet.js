//文字数カウント
var input = document.getElementById("tweetForm");
var span = document.getElementById("inputCounter");
class2 = "mb-4 text-danger"
class1 =  document.getElementById("inputCount").className

input.addEventListener("keyup", function() {
  span.textContent = input.value.length;
  switch(true){
    case span.textContent > 140:
        document.getElementById("inputCount").className = class2;
        document.getElementById("tweetButton").disabled = true;
        break;
    default:
        document.getElementById("inputCount").className = class1;
        document.getElementById("tweetButton").disabled = false;
  }
});

console.log("test1")



    
  