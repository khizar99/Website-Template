function calculateScore() {
    const allAnswered = document.querySelectorAll('input[name^="q"]:checked').length === 9;
    
    if (!allAnswered) {
        alert("Please answer all questions before submitting.");
        return;
    }
    let score = 0;

    const q1 = parseInt(document.querySelector('input[name="q1"]:checked').value);
    const q2 = parseInt(document.querySelector('input[name="q2"]:checked').value);
    const q3 = parseInt(document.querySelector('input[name="q3"]:checked').value);
    const q4 = parseInt(document.querySelector('input[name="q4"]:checked').value);
    const q5 = parseInt(document.querySelector('input[name="q5"]:checked').value);
    const q6 = parseInt(document.querySelector('input[name="q6"]:checked').value);
    const q7 = parseInt(document.querySelector('input[name="q7"]:checked').value);
    const q8 = parseInt(document.querySelector('input[name="q8"]:checked').value);
    const q9 = parseInt(document.querySelector('input[name="q9"]:checked').value);

    score = q1 + q2 + q3 + q4 + q5 + q6 + q7 + q8 + q9;

    const percentage = (score / 27) * 100;

    let resultText = "";

    if (percentage <= 25) {
        resultText = "You have a low chance of having anxiety.";
    } else if (percentage > 25 && percentage <= 50) {
        resultText = "You have a moderate chance of having anxiety.";
    } else if (percentage > 50 && percentage <= 75) {
        resultText = "You have a high chance of having anxiety.";
    } else {
        resultText = "You have an extremelyhigh chance of having anxiety. Please consult a mental health professional for further evaluation.";
    }	document.getElementById("result").innerHTML = "Your score is " + percentage.toFixed(2) + "%. " + resultText;
}


function calculateScore1() {
    const allAnswered = document.querySelectorAll('input[name^="q"]:checked').length === 15;
    
    if (!allAnswered) {
        alert("Please answer all questions before submitting.");
        return;
    }
    let score = 0;

    const q11 = parseInt(document.querySelector('input[name="q11"]:checked').value);
    const q12 = parseInt(document.querySelector('input[name="q12"]:checked').value);
    const q13 = parseInt(document.querySelector('input[name="q13"]:checked').value);
    const q14 = parseInt(document.querySelector('input[name="q14"]:checked').value);
    const q15 = parseInt(document.querySelector('input[name="q15"]:checked').value);
    const q16 = parseInt(document.querySelector('input[name="q16"]:checked').value);
    const q17 = parseInt(document.querySelector('input[name="q17"]:checked').value);
    const q18 = parseInt(document.querySelector('input[name="q18"]:checked').value);
    const q19 = parseInt(document.querySelector('input[name="q19"]:checked').value);
    const q20 = parseInt(document.querySelector('input[name="q20"]:checked').value);
    const q21 = parseInt(document.querySelector('input[name="q21"]:checked').value);
    const q22 = parseInt(document.querySelector('input[name="q22"]:checked').value);
    const q23 = parseInt(document.querySelector('input[name="q23"]:checked').value);
    const q24 = parseInt(document.querySelector('input[name="q24"]:checked').value);
    const q25 = parseInt(document.querySelector('input[name="q25"]:checked').value);

    score = q11 + q12 + q13 + q14 + q15 + q16 + q17 + q18 + q19 + q20 + q21 + q22 + q23 + q24 + q25 ;

    const percentage = (score / 45) * 100;

    let resultText = "";

    if (percentage <= 25) {
        resultText = "You have a low chance of having depression.";
    } else if (percentage > 25 && percentage <= 50) {
        resultText = "You have a moderate chance of having depression.";
    } else if (percentage > 50 && percentage <= 75) {
        resultText = "You have a high chance of having depression.";
    } else {
        resultText = "You have an extremelyhigh chance of having anxiety. Please consult a mental health professional for further evaluation.";
    }	document.getElementById("result1").innerHTML = "Your score is " + percentage.toFixed(2) + "%. " + resultText;
}



function calculateScore2() {
    const allAnswered = document.querySelectorAll('input[name^="q"]:checked').length === 15;
    
    if (!allAnswered) {
        alert("Please answer all questions before submitting.");
        return;
    }
    let score = 0;

    const q30 = parseInt(document.querySelector('input[name="q30"]:checked').value);
    const q31 = parseInt(document.querySelector('input[name="q31"]:checked').value);
    const q32 = parseInt(document.querySelector('input[name="q32"]:checked').value);
    const q33 = parseInt(document.querySelector('input[name="q33"]:checked').value);
    const q34 = parseInt(document.querySelector('input[name="q34"]:checked').value);
    const q35 = parseInt(document.querySelector('input[name="q35"]:checked').value);
    const q36 = parseInt(document.querySelector('input[name="q36"]:checked').value);
    const q37 = parseInt(document.querySelector('input[name="q37"]:checked').value);
    const q38 = parseInt(document.querySelector('input[name="q38"]:checked').value);
    const q39 = parseInt(document.querySelector('input[name="q39"]:checked').value);
    const q40 = parseInt(document.querySelector('input[name="q40"]:checked').value);
    const q41 = parseInt(document.querySelector('input[name="q41"]:checked').value);
    const q42 = parseInt(document.querySelector('input[name="q42"]:checked').value);
    const q43 = parseInt(document.querySelector('input[name="q43"]:checked').value);
    const q44 = parseInt(document.querySelector('input[name="q44"]:checked').value);

    score = q30 + q31 + q32 + q33 + q34 + q35 + q36 + q37 + q38 + q39 + q40 + q41 + q42 + q43 + q44; 

    const percentage = (score / 45) * 100;

    let resultText = "";

    if (percentage <= 25) {
        resultText = "You have a low chance of having ADHD.";
    } else if (percentage > 25 && percentage <= 50) {
        resultText = "You have a moderate chance of having ADHD.";
    } else if (percentage > 50 && percentage <= 75) {
        resultText = "You have a high chance of having ADHD.";
    } else {
        resultText = "You have an extremelyhigh chance of having ADHD. Please consult a mental health professional for further evaluation.";
    }	document.getElementById("result2").innerHTML = "Your score is " + percentage.toFixed(2) + "%. " + resultText;
}

function showADHDQuiz() {
    document.getElementsByClassName("ADHD-Quiz")[0].style.display = "block";
    document.getElementsByClassName("Depression-Quiz")[0].style.display = "none";
    document.getElementsByClassName("Anxiety-Quiz")[0].style.display = "none";
  }
  
  function showDepressionQuiz() {
    document.getElementsByClassName("ADHD-Quiz")[0].style.display = "none";
    document.getElementsByClassName("Depression-Quiz")[0].style.display = "block";
    document.getElementsByClassName("Anxiety-Quiz")[0].style.display = "none";
  }
  
  function showAnxietyQuiz() {
    document.getElementsByClassName("ADHD-Quiz")[0].style.display = "none";
    document.getElementsByClassName("Depression-Quiz")[0].style.display = "none";
    document.getElementsByClassName("Anxiety-Quiz")[0].style.display = "block";
  }
  