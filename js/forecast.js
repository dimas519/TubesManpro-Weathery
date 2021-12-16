console.log("halo");

let rf = document.querySelector("#rainfall")
rf.addEventListener("click",function(){
    document.querySelector("#rainfallRes").classList.toggle("w3-hide")
    document.querySelector("#drop_content").classList.toggle("w3-hide")
    rf.classList.toggle("w3-hide")
})
let rf1 = document.querySelector("#remo1")
rf1.addEventListener("click", function(){
    document.querySelector("#rainfallRes").classList.toggle("w3-hide")
    let rf2 = document.querySelector("#rainfallRes").children
    console.log(rf2[1]);
    rf.classList.toggle("w3-hide")
})

let ev = document.querySelector("#evaporation")
ev.addEventListener("click",function(){
    document.querySelector("#evaporationRes").classList.toggle("w3-hide")
    document.querySelector("#drop_content").classList.toggle("w3-hide")
    ev.classList.toggle("w3-hide")
})

let ss = document.querySelector("#sunshine")
ss.addEventListener("click",function(){
    document.querySelector("#sunshineRes").classList.toggle("w3-hide")
    document.querySelector("#drop_content").classList.toggle("w3-hide")
    ss.classList.toggle("w3-hide")
})

let ws = document.querySelector("#windspeed")
ws.addEventListener("click",function(){
    document.querySelector("#windspeedRes").classList.toggle("w3-hide")
    document.querySelector("#drop_content").classList.toggle("w3-hide")
    ws.classList.toggle("w3-hide")
})

let x = document.querySelector("#humidity")
x.addEventListener("click",function(){
    document.querySelector("#humidityRes").classList.toggle("w3-hide")
    document.querySelector("#drop_content").classList.toggle("w3-hide")
    x.classList.toggle("w3-hide")
})

let ps = document.querySelector("#pressure")
ps.addEventListener("click",function(){
    document.querySelector("#pressureRes").classList.toggle("w3-hide")
    document.querySelector("#drop_content").classList.toggle("w3-hide")
    ps.classList.toggle("w3-hide")
})