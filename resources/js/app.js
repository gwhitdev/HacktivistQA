require('./bootstrap');
const questionInputPlaceholder = document.getElementById('question');

const placeHolderQuestions = [
    'What is your quest?',
    'What is your favourite colour?',
    'What is the airspeed velocity of an unladen swallow?',
];

function getRandomNumber(){
    return Math.floor(Math.random() * 3);
}

function chooseRandomQuestion(questionArray){
    const number = getRandomNumber();
    return questionArray[number];
}

questionInputPlaceholder.placeholder = chooseRandomQuestion(placeHolderQuestions);
