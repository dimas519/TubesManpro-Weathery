let counter = 0

let rf = document.querySelector("#rainfall")
let rfI = document.querySelector("#rainfallInput")
console.log(rfI);
rf.addEventListener("click",function(){
    rfI.value = "0"
    document.querySelector("#rainfallRes").classList.toggle("w3-hide")
    document.querySelector("#drop_content").classList.toggle("w3-hide")
    rf.classList.toggle("w3-hide")
    counter = counter + 1
})
let rf1 = document.querySelector("#remo1")
rf1.addEventListener("click", function(){
    rfI.value = "-1"
    document.querySelector("#rainfallRes").classList.toggle("w3-hide")
    rf.classList.toggle("w3-hide")
    counter = counter - 1
})

//------------------------------------------------------------------------------------------------------------

let ev = document.querySelector("#evaporation")
let evI = document.querySelector("#evaporationInput")
console.log(evI);
ev.addEventListener("click",function(){
    evI.value = "0"
    document.querySelector("#evaporationRes").classList.toggle("w3-hide")
    document.querySelector("#drop_content").classList.toggle("w3-hide")
    ev.classList.toggle("w3-hide")
    counter = counter + 1
})

let ev1 = document.querySelector("#remo2")
ev1.addEventListener("click", function(){
    evI.value = "-1"
    document.querySelector("#evaporationRes").classList.toggle("w3-hide")
    ev.classList.toggle("w3-hide")
    counter = counter - 1
})

//------------------------------------------------------------------------------------------------------------

let ss = document.querySelector("#sunshine")
let ssI = document.querySelector("#sunshineInput")
ss.addEventListener("click",function(){
    ssI.value = "0"
    document.querySelector("#sunshineRes").classList.toggle("w3-hide")
    document.querySelector("#drop_content").classList.toggle("w3-hide")
    ss.classList.toggle("w3-hide")
    counter = counter + 1
})

let ss1 = document.querySelector("#remo3")
ss1.addEventListener("click", function(){
    ssI.value = "-1"
    document.querySelector("#sunshineRes").classList.toggle("w3-hide")
    ss.classList.toggle("w3-hide")
    counter = counter - 1
})

//------------------------------------------------------------------------------------------------------------

let ws = document.querySelector("#windspeed")
let wsI = document.querySelector("#windInput")
ws.addEventListener("click",function(){
    wsI.value = "0"
    document.querySelector("#windspeedRes").classList.toggle("w3-hide")
    document.querySelector("#drop_content").classList.toggle("w3-hide")
    ws.classList.toggle("w3-hide")
    counter = counter + 1
})

let ws1 = document.querySelector("#remo4")
ws1.addEventListener("click", function(){
    wsI.value = "-1"
    document.querySelector("#windspeedRes").classList.toggle("w3-hide")
    ws.classList.toggle("w3-hide")
    counter = counter - 1
})

//------------------------------------------------------------------------------------------------------------

let x = document.querySelector("#humidity")
let xI = document.querySelector("#humidityInput")
x.addEventListener("click",function(){
    xI.value = "0"
    document.querySelector("#humidityRes").classList.toggle("w3-hide")
    document.querySelector("#drop_content").classList.toggle("w3-hide")
    x.classList.toggle("w3-hide")
    counter = counter + 1
})

let x1 = document.querySelector("#remo5")
x1.addEventListener("click", function(){
    xI.value = "-1"
    document.querySelector("#humidityRes").classList.toggle("w3-hide")
    x.classList.toggle("w3-hide")
    counter = counter - 1
})

//------------------------------------------------------------------------------------------------------------

let ps = document.querySelector("#pressure")
let psI = document.querySelector("#pressureInput")
ps.addEventListener("click",function(){
    psI.value = "0"
    document.querySelector("#pressureRes").classList.toggle("w3-hide")
    document.querySelector("#drop_content").classList.toggle("w3-hide")
    ps.classList.toggle("w3-hide")
    counter = counter + 1
})

let ps1 = document.querySelector("#remo6")
ps1.addEventListener("click", function(){
    psI.value = "-1"
    document.querySelector("#pressureRes").classList.toggle("w3-hide")
    ps.classList.toggle("w3-hide")
    counter = counter - 1
})

//------------------------------------------------------------------------------------------------------------

let submit = document.querySelector("#submit_button")
submit.addEventListener("click",function(){
    if(counter >= 2){
        document.getElementById('form-predict').submit()
    }else{
        alert("atribut yang diinput minimal 2")
    }
})