//Odabir svih potrebnih elemenata
const start_btn = document.querySelector(".start_btn button");
const info_box = document.querySelector(".info_box");
const exit_btn = info_box.querySelector(".buttons .quit");
const continue_btn = info_box.querySelector(".buttons .restart");
const quiz_box = document.querySelector(".quiz_box");
const result_box = document.querySelector(".result_box");
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

const restart_quiz = result_box.querySelector(".buttons .restart");
const quit_quiz = result_box.querySelector(".buttons .quit");

// Ako je kliknuto Ponovi kviz 
restart_quiz.onclick = ()=>{
    quiz_box.classList.add("activeQuiz"); 
    result_box.classList.remove("activeResult"); //skloni result box
    timeValue = 20; 
    que_count = 0;
    que_numb = 1;
    userScore = 0;
    widthValue = 0;
    showQuetions(que_count); 
    queCounter(que_numb); 
    clearInterval(counter); //ocisti counter
    clearInterval(counterLine); 
    startTimer(timeValue); //poziva startTimer funkciju
    startTimerLine(widthValue); //poziva startTimerLine funkciju
    timeText.textContent = "Preostalo vreme"; 
    next_btn.classList("show"); 
}

// Ako je kliknuto Izadji 
quit_quiz.onclick = ()=>{
    window.location.href="kviz.html"; //vraca na pocetni prozor
}

const next_btn = document.querySelector("footer .next_btn");
const bottom_ques_counter = document.querySelector("footer .total_que");

// Ako je kliknuto dugme Sledece
next_btn.onclick = ()=>{
    if(que_count < questions.length - 1){ //ako je broj pitanja manji od ukupne duzine pitanja
        que_count++; //inkrementuje  pitanjae
        que_numb++; //inkrementuje broj pitanja
        showQuetions(que_count); //poziva showQestions funkciju
        queCounter(que_numb); 
        clearInterval(counter); //ocisti counter
        clearInterval(counterLine); //ocisti counterLine
        startTimer(timeValue); //poziv startTimer funkcije
        startTimerLine(widthValue); //poziv startTimerLine funkcije
        timeText.textContent = "Preostalo vreme"; 
        next_btn.classList("show"); 
    }else{
        clearInterval(counter); 
        clearInterval(counterLine);
        showResult(); 
    }
}

//uzimanje pitanja i opcija iz niza
function showQuetions(index){
    const que_text = document.querySelector(".que_text");

    //Kreiranje  span i div taga za pitanja i opcije
    let que_tag = '<span>'+ questions[index].numb + ". " + questions[index].question +'</span>';
    let option_tag = '<div class="option"><span>'+ questions[index].options[0] +'</span></div>'
    + '<div class="option"><span>'+ questions[index].options[1] +'</span></div>'
    + '<div class="option"><span>'+ questions[index].options[2] +'</span></div>'
    + '<div class="option"><span>'+ questions[index].options[3] +'</span></div>';
    que_text.innerHTML = que_tag; 
    option_list.innerHTML = option_tag; 
    
    const option = option_list.querySelectorAll(".option");

    
    for(i=0; i < option.length; i++){
        option[i].setAttribute("onclick", "optionSelected(this)");
    }
}
let tickIconTag = '<div class="icon tick"><i class="fas fa-check"></i></div>';
let crossIconTag = '<div class="icon cross"><i class="fas fa-times"></i></div>';

//ako je korisnik kliknuo na neku opciju
function optionSelected(answer){
    clearInterval(counter); 
    clearInterval(counterLine); 
    let userAns = answer.textContent; 
    let correcAns = questions[que_count].answer; 
    const allOptions = option_list.children.length; 
    
    if(userAns == correcAns){ //ako je opcija koju je korisnik kliknuo tacan odgovor
        userScore += 1; //povecaj broj poena za 1
        answer.classList.add("correct"); //dodaj zelenu boju za tacan odgovor
        answer.insertAdjacentHTML("beforeend", tickIconTag); //dodaj kvacicu za tacan odgovor
        console.log("Correct Answer");
        console.log("Your correct answers = " + userScore);
    }else{
        answer.classList.add("incorrect"); //dodaj crvenu boju za netacan odgovor
        answer.insertAdjacentHTML("beforeend", crossIconTag); //dodaj x ikonicu za netacan odgovor
        console.log("Wrong Answer");

        for(i=0; i < allOptions; i++){
            if(option_list.children[i].textContent == correcAns){ 
                option_list.children[i].setAttribute("class", "option correct"); 
                option_list.children[i].insertAdjacentHTML("beforeend", tickIconTag); 
                console.log("Auto selected correct answer.");
            }
        }
    }
    for(i=0; i < allOptions; i++){
        option_list.children[i].classList.add("disabled"); //kada korisnik jednom izaberu jednu opciju, onemoguci sve ostale
    }
    next_btn.classList.add("show"); 
}
function startTimer(time){
    counter = setInterval(timer, 1000);
    function timer(){
        timeCount.textContent = time; //zamena vrednosti timeCount sa time 
        time--; 
        if(time < 9){ 
            let addZero = timeCount.textContent; 
            timeCount.textContent = "0" + addZero; 
        }
        if(time < 0){ 
            clearInterval(counter); 
            timeText.textContent = "Vreme je isteklo"; 
            const allOptions = option_list.children.length; 
            let correcAns = questions[que_count].answer; 
            for(i=0; i < allOptions; i++){
                if(option_list.children[i].textContent == correcAns){ 
                    option_list.children[i].setAttribute("class", "option correct"); 
                    option_list.children[i].insertAdjacentHTML("beforeend", tickIconTag); 
                    console.log("Time Off: Auto selected correct answer.");
                }
            }
            for(i=0; i < allOptions; i++){
                option_list.children[i].classList.add("disabled"); 
            }
            next_btn.classList.add("show"); 
        }
    }
}

function startTimerLine(time){
    counterLine = setInterval(timer, 29);
    function timer(){
        time += 1; 
        time_line.style.width = time + "px"; 
        if(time > 549){ 
            clearInterval(counterLine); 
        }
    }
}


function showResult(){
    info_box.classList.remove("activeInfo"); 
    quiz_box.classList.remove("activeQuiz");
    result_box.classList.add("activeResult"); 
    const scoreText = result_box.querySelector(".score_text");
    if (userScore > 3){ // ako je korisnik osvojio vise od 3 poena
        
        let scoreTag = '<span>Čestitamo! 🎉, Osvojio/la si <p>'+ userScore +'</p> od <p>'+ questions.length +'</p> poena</span>';
        scoreText.innerHTML = scoreTag;  
    }
    else if(userScore > 1){ // ako je korisnik osvojio vise od 1 poena
        let scoreTag = '<span>Super 😎, Osvojio/la si <p>'+ userScore +'</p> od <p>'+ questions.length +'</p> poena</span>';
        scoreText.innerHTML = scoreTag;
    }
    else{ // ako je osvojio manje od 1
        let scoreTag = '<span>Žao nam je 😐, Osvojio/la si <p>'+ userScore +'</p> od <p>'+ questions.length +'</p> poena</span>';
        scoreText.innerHTML = scoreTag;
    }
}

function queCounter(index){
    
    let totalQueCounTag = '<span><p>'+ index +'</p> of <p>'+ questions.length +'</p> Pitanje</span>';
    bottom_ques_counter.innerHTML = totalQueCounTag;  
}
