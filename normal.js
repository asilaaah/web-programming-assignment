var timerVar = setInterval(countTimer, 1000);
var totalSeconds = 0;
function countTimer() {
   ++totalSeconds;
   var hour = Math.floor(totalSeconds /3600);
   var minute = Math.floor((totalSeconds - hour*3600)/60);
   var seconds = totalSeconds - (hour*3600 + minute*60);

   document.getElementById("timer").innerHTML = hour + ":" + minute + ":" + seconds;
}

(function() {
  const myQuestions = [
    {
      question: "25 + 5 =",
      answers: {
        a: "30",
        b: "50"
      },
      correctAnswer: "a"
    },
    {
      question: "25 - 5 =",
      answers: {
        a: "20",
        b: "30"
      },
      correctAnswer: "a"
    },
    {
      question: "34 + 5 =",
      answers: {
        a: "37",
        b: "39"
      },
      correctAnswer: "b"
    },
	{
      question: "36 - 3 =",
      answers: {
        a: "31",
        b: "33"
      },
      correctAnswer: "b"
    },
	{
      question: "4 + 42 =",
      answers: {
        a: "44",
        b: "46"
      },
      correctAnswer: "b"
    },
	{
      question: "49 - 4 =",
      answers: {
        a: "45",
        b: "44"
      },
      correctAnswer: "a"
    },
	{
      question: "50 + 7 =",
      answers: {
        a: "55",
        b: "57"
      },
      correctAnswer: "b"
    },
	{
      question: "45 - 6 =",
      answers: {
        a: "39",
        b: "40"
      },
      correctAnswer: "a"
    },
	{
      question: "59 + 2 =",
      answers: {
        a: "61",
        b: "62"
      },
      correctAnswer: "a"
    },
	{
      question: "50 - 3 =",
      answers: {
        a: "43",
        b: "47"
      },
      correctAnswer: "b"
    }
  ];

  function buildQuiz() {
    // we'll need a place to store the HTML output
    const output = [];

    // for each question...
    myQuestions.forEach((currentQuestion, questionNumber) => {
      // we'll want to store the list of answer choices
      const answers = [];

      // and for each available answer...
      for (letter in currentQuestion.answers) {
        // ...add an HTML radio button
        answers.push(
          `<label>
             <input type="radio" name="question${questionNumber}" value="${letter}">
              ${currentQuestion.answers[letter]}
           </label>`
        );
      }

      // add this question and its answers to the output
      output.push(
        `<div class="slide">
           <div class="question"> ${currentQuestion.question} </div>
           <div class="answers"> ${answers.join("")} </div>
         </div>`
      );
	  
	  
    });

    // finally combine our output list into one string of HTML and put it on the page
    quizContainer.innerHTML = output.join("");
  }

  function showResults() {
    // gather answer containers from our quiz
    const answerContainers = quizContainer.querySelectorAll(".answers");
	

    // keep track of user's answers
    let numCorrect = 0;

    // for each question...
    myQuestions.forEach((currentQuestion, questionNumber) => {
      // find selected answer
      const answerContainer = answerContainers[questionNumber];
      const selector = `input[name=question${questionNumber}]:checked`;
      const userAnswer = (answerContainer.querySelector(selector) || {}).value;

      // if answer is correct
      if (userAnswer === currentQuestion.correctAnswer) {
        // add to the number of correct answers
        numCorrect++;

        // color the answers green
        answerContainers[questionNumber].style.color = "lightgreen";
      } else {
        // if answer is wrong or blank
        // color the answers red
        answerContainers[questionNumber].style.color = "red";
      }
    });
      
    clearInterval(timerVar);

    // show number of correct answers out of total
	const marks = [numCorrect * 100];
	resultsContainer.style.display = "block";
	resultsContainer.innerHTML = `${numCorrect} out of ${myQuestions.length} correct answers. You got ${marks} marks!`;
	

		
    /* resultsContainer.innerHTML = ; */
  }

  function showSlide(n) {
    slides[currentSlide].classList.remove("active-slide");
    slides[n].classList.add("active-slide");
    currentSlide = n;
    
    if (currentSlide === slides.length - 1) {
      nextButton.style.display = "none";
      submitButton.style.display = "inline-block";
    } else {
      nextButton.style.display = "inline-block";
      submitButton.style.display = "none";
    }
  }

  function showNextSlide() {
    showSlide(currentSlide + 1);
  }
  
  function exitQuiz(){
	  var r = confirm("Are you sure you want to exit?");
	  if (r == true){
		  window.location.href="level.php";
	  }
	  else{
		  return false;
	  }  
  }
  
  function disableRadio(){
	  var radios = document.formName.Radio;
	  
	  for (var i=0, iLen=radios.length; i<iLen; i++) {
		  radios[i].disabled = true;
} 

  }
  

  const quizContainer = document.getElementById("quiz");
  const resultsContainer = document.getElementById("results");
  const submitButton = document.getElementById("submit");
  const homeButton = document.getElementById("home");

  // display quiz right away
  buildQuiz();

  const nextButton = document.getElementById("next");
  const slides = document.querySelectorAll(".slide");
  let currentSlide = 0;

  showSlide(0);

  // on submit, show results
  homeButton.addEventListener("click", exitQuiz);
  submitButton.addEventListener("click", showResults);
  submitButton.addEventListener("click", disableRadio);
  nextButton.addEventListener("click", showNextSlide);
})();
