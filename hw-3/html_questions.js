//Odabir svih potrebnih elemenata
const start_btn = document.querySelector(".start_btn button");
const info_box = document.querySelector(".info_box");

// ako je kliknuto start button
start_btn.onclick = ()=>{
    info_box.classList.add("activeInfo"); //prikazuje info box
}

// if ako je kliknuto odustani button 
exit_btn.onclick = ()=>{
    info_box.classList.remove("activeInfo"); //sakrije info box
}
