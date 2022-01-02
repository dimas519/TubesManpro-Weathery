

function getArrData(data){
    let date=document.getElementsByClassName(data)
    
    let arr=[]
    
    for (let i=0;i<date.length;i++){
        arr.push(date[i].textContent)
    }
    
    return arr;
}


function  buildDayArr(){
return getArrData('chartDate')
}


function buildRainfall(){
    let data=getArrData('chartRainFall')
    let title=buildDayArr();





     
     let myChart ={
        type: 'line',
        data: {
            labels:title,
            datasets:[{
                label: 'Rainfall',
                data : data,
                backgroundColor: "rgb(255, 159, 64)",
                borderWidth :5,
                borderColor: "rgb(0, 0, 0)",
                fill:false,
                lineTension:0
            }],
            

        },
     options:{

         title:{
            display:true,
            text:'Rainfall Line Chart',
        
        },
        
        responsive : true
     } ,
    };

        let ctx =document.getElementById("canvasRainfall").getContext("2d");
        new Chart(ctx,myChart);





}


function buildMinTemp(){
    let data=getArrData('chartMinTemp')
    let title=buildDayArr();





     
     let myChart1 ={
        type: 'line' ,
        data: {
            datasets:[{
                label: 'Min Temperature',
                data : data,
                backgroundColor: "rgb(255, 159, 64)",
                borderWidth :5,
                borderColor: "rgb(0, 0, 0)",
                fill:false,
                lineTension:0
            }],
            labels:title
        },
     options:{
         
         title:{
            display:true,
            text:'Min Temperature Chart'
        },
        responsive : true
     } ,
    };

        let ctx1 =document.getElementById("canvasMinMax").getContext("2d");
        new Chart(ctx1,myChart1);





}


function buildMaxTemp(){
    let data=getArrData('chartMaxTemp')
    let title=buildDayArr();





     
     let myChart2 ={
        type: 'line' ,
        data: {
            datasets:[{
                label: 'Max Temperature',
                data : data,
                backgroundColor: "rgb(255, 159, 64)",
                borderWidth :5,
                borderColor: "rgb(0, 0, 0)",
                fill:false,
                lineTension:0
            }],
            labels:title
        },
     options:{
         
         title:{
            display:true,
            text:'Max Temperature Chart'
        },
        responsive : true
     } ,
    };
   
        let ctx2 =document.getElementById("canvasMaxMax").getContext("2d");
        new Chart(ctx2,myChart2);

}

function buildSunshine(){
    let data=getArrData('chartSunshine')
    let title=buildDayArr();




     
     let myChart2 ={
        type: 'line' ,
        data: {
            datasets:[{
                label: 'Sunshine',
                data : data,
                backgroundColor: "rgb(255, 159, 64)",
                borderWidth :5,
                borderColor: "rgb(0, 0, 0)",
                fill:false,
                lineTension:0
            }],
            labels:title
        },
     options:{
         
         title:{
            display:true,
            text:'Sunshine Temperature Chart'
        },
        responsive : true
     } ,
    };
   
        let ctx2 =document.getElementById("canvasSunshine").getContext("2d");
        new Chart(ctx2,myChart2);


}


function buildEvaporation(){
    let data=getArrData('chartEvaporation')
    let title=buildDayArr();





     
     let myChart2 ={
        type: 'line' ,
        data: {
            datasets:[{
                label: 'Evaporation',
                data : data,
                backgroundColor: "rgb(255, 159, 64)",
                borderWidth :5,
                borderColor: "rgb(0, 0, 0)",
                fill:false,
                lineTension:0
            }],
            labels:title
        },
     options:{
         
         title:{
            display:true,
            text:'Evaporation Chart'
        },
        responsive : true
     } ,
    };
   
        let ctx2 =document.getElementById("canvasEvaporation").getContext("2d");
        new Chart(ctx2,myChart2);


}



