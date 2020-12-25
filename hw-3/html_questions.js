//Odabir svih potrebnih elemenata
const start_btn = document.querySelector(".start_btn button");
const info_box = document.querySelector(".info_box");
const exit_btn = info_box.querySelector(".buttons .quit");
const quiz_box = document.querySelector(".quiz_box");
const option_list = document.querySelector(".option_list");
const time_line = document.querySelector("header .time_line");
const timeText = document.querySelector(".timer .time_left_txt");
const timeCount = document.querySelector(".timer .timer_sec");

// ako je kliknuto start button
start_btn.onclick = ()=>{
    info_box.classList.add("activeInfo"); //prikazuje info box
}

// if ako je kliknuto odustani button 
exit_btn.onclick = ()=>{
    info_box.classList.remove("activeInfo"); //sakrije info box
}

// ako je kliknuto započni kviz button
continue_btn.onclick = ()=>{
    info_box.classList.remove("activeInfo"); //sakrije info box
    quiz_box.classList.add("activeQuiz"); //prikazuje quiz box
    showQuetions(0); //poziva showQestions funkciju
    queCounter(1); 
    startTimer(20); //poziva startTimer funkciju
    startTimerLine(0); 
}

let timeValue =  20;
let que_count = 0;
let que_numb = 1;
let userScore = 0;
let counter;
let counterLine;
let widthValue = 0;
