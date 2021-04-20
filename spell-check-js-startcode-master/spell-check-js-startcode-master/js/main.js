// Spell Check Start Code

// Global Variables
let dictionary;
let aliceWords;

// Load Data Files into Global Variables
loadDictionary();
loadAliceText();


//Spell Check Dictionary
document.getElementById('submit1').addEventListener('click', s1);

function s1(){
    let input = document.getElementById('input').value;
    let selection = document.getElementById('selection1').value;
    if(selection == 'linear'){ 
        document.getElementById('results1').innerHTML = input + ' is in position ' + linearSearch(dictionary, input);
    } else if(selection == 'binary'){
        document.getElementById('results1').innerHTML = input + ' is in position ' + binarySearch(dictionary, input);
    }
}

//Spell Check Alice
document.getElementById('submit2').addEventListener('click', s2);

function s2(){
    let input = document.getElementById('input').value;
    let selection = document.getElementById('selection2').value;
    if(selection == 'linear'){ 
        if(linearSearch(dictionary, input) == linearSearch(aliceWords, input)) {
          let nums = dictionary.length;
          document.getElementById('results2').innerHTML = 'there are ' + nums + ' not found.'
        }  
    } else if(selection == 'binary'){
        if(binarySearch(dictionary, input) == binarySearch(aliceWords, input)) {
          let nums = dictionary.length
          document.getElementById('results2').innerHTML = 'there are ' + nums + ' not found.'
        }
    }
}

//Functions linear and binary search
function linearSearch(anArray, item){
    for(n=0; n<anArray.length; n++){
        if(anArray[n] == item){
            return n;
        }
    }
    return 'not found';
  }

function binarySearch(anArray, item) {
    let li = 0;
    let ui = anArray.length - 1;
    
    while (li <= ui) {
        let mi = Math.floor((li + ui) / 2);
      if (anArray[mi] === item) {
        return mi;
      } else if (anArray[mi] < item) {
        li = mi + 1;
      } else {
        ui = mi - 1;
      }
    }
    return 'not found';
}

  