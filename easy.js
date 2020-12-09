(function() {
  const myQuestions = [
    {
      question: "1 + 2 =",
      answers: {
        a: "3",
        b: "4"
      },
      correctAnswer: "a"
    },
    {
      question: "3 - 2 =",
      answers: {
        a: "1",
        b: "2"
      },
      correctAnswer: "a"
    },
    {
      question: "4 + 4 =",
      answers: {
        a: "7",
        b: "8"
      },
      correctAnswer: "b"
    },
	{
      question: "6 - 2 =",
      answers: {
        a: "3",
        b: "4"
      },
      correctAnswer: "b"
    },
	{
      question: "6 + 3 =",
      answers: {
        a: "8",
        b: "9"
      },
      correctAnswer: "b"
    },
	{
      question: "7 - 4 =",
      answers: {
        a: "3",
        b: "5"
      },
      correctAnswer: "a"
    },
	{
      question: "10 + 1 =",
      answers: {
        a: "9",
        b: "11"
      },
      correctAnswer: "b"
    },
	{
      question: "16 - 3 =",
      answers: {
        a: "13",
        b: "19"
      },
      correctAnswer: "a"
    },
	{
      question: "9 + 5 =",
      answers: {
        a: "14",
        b: "15"
      },
      correctAnswer: "a"
    },
	{
      question: "13 - 4 =",
      answers: {
        a: "7",
        b: "9"
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
  nextButton.addEventListener("click", showNextSlide);
})();

var timerVar = setInterval(countTimer, 1000);
var totalSeconds = 0;
function countTimer() {
   ++totalSeconds;
   var hour = Math.floor(totalSeconds /3600);
   var minute = Math.floor((totalSeconds - hour*3600)/60);
   var seconds = totalSeconds - (hour*3600 + minute*60);

   document.getElementById("timer").innerHTML = hour + ":" + minute + ":" + seconds;
}

    
  
