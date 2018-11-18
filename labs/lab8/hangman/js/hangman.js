// Variables
var alphabet = ['A','B','C','D','E','F','G','H',
                'I','J','K','L','M','N','O','P',
                'Q','R','S','T','U','V','W','X','Y','Z'];
var selectedWord = "";
var selectedHint = "";
var board = [];
var remainingGuesses=6;
//var words = ["snake","monkey","beetle"];
var words = [{ word: "snake", hint: "it's a reptile" },
             { word: "monkey", hint:"it's a mammal" },
             { word: "beetle", hint:"it's an insect" }];

// math floor turns real numbers to ints

// Listeners
window.onload = startGame();

// Functions
function startGame(){
    pickWord();
    initBoard();
    updateBoard();
    createLetters();
}

function pickWord(){
    var randomInt = Math.floor(Math.random() * words.length);
    selectedWord = words[randomInt].word.toUpperCase();
    //console.log(selectedWord);
    selectedHint = words[randomInt].hint;
}

function initBoard(){
    for(var letter in selectedWord) {
        board.push("_");
    }
}

function updateBoard(){
    $("#word").empty();
    
    for(var i = 0; i < board.length;i++){
        $("#word").append(board[i] + " ");
    }  
    $("#word").append("<br />");
    
    //$("#word").append("<span class='hint'>Hint: " + selectedHint+"</span>");
}

function disableButton(btn){
    btn.prop("disabled",true);
    btn.attr("class","btn btn-danger");
}

function endGame(win){
    $("#letters").hide();
    if(win){
        $("#won").show();
    } else {
        $("#lost").show();
    }
}


function updateMan(){
    $("#hangImg").attr("src","img/stick_" + (6 - remainingGuesses) + ".png");
}



function createLetters(){
    for(var letter of alphabet){
        $("#letters").append("<button class = 'letter' id='" + letter + "'>" + letter + "</button>");
    }
}


$(".replayBtn").on("click",function(){
    location.reload();
});

$(".letter").click(function(){
    checkLetter($(this).attr("id"));
    disableButton($(this));
});

$(".hintBtn").on("click",function(){
    $("#word").append("<span class='hint'>Hint: " + selectedHint+"</span>");
    remainingGuesses-=1;
    updateMan();
});

// $(".hint").click(function(){
//     checkLetter($(this).attr("id"));
//     disableButton($(this));
// })



function checkLetter(letter){
    var positions = new Array();
    
    // put all the positions the letter exists in an array
    console.log("!");
    for(var i =0; i<selectedWord.length; i++){
        if(letter == selectedWord[i]){
            positions.push(i);
            
        }
    }
    console.log(positions.length);
    if(positions.length>0){
        console.log(":)");
        updateWord(positions,letter);
        if(!board.includes('_')){
            endGame(true);
        }
        
    }else{
        console.log(":(");
        remainingGuesses-=1;
        updateMan();
        // console.log(remainingGuesses);
    }
    
    if(remainingGuesses<=0){
        endGame(false);
    }
}

function updateWord(positions,letter){
    
    for(var pos of positions) {
        board[pos] = letter;
    }
    
    updateBoard();
}

// function pickWord(){
//     var randomInt = Math.floor(Math.random() * words.length);
//     selectedWord = words[randomInt].word.toUpperCase();
// }
            