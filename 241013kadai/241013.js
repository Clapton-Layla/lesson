const date=new Date();
const year=date.getUTCFullYear();
const month=date.getUTCMonth()+1;
const start=new Date(year,month-1,1);
const end=new Date(year,month,0);
const startday=start.getDay();
const endday=end.getDate();
const lastMonthEndDay=new Date(year,month-1,0);
const lastMonthEndDayCount=lastMonthEndDay.getDate();


const calenderMonth=document.getElementById("calenderMonth");
//const first=document.createElement("th");
const firstMonth=document.createTextNode(year+"年"+month+"月");
//first.appendChild(firstMonth);
//calenderMonth.appendChild(first);
calenderMonth.appendChild(firstMonth);

const calender=document.getElementById("calender");

var count=1;

for(var i=0;i<5;i++){//修正
    const week=document.createElement("tr");

    for(var j=0;j<7;j++){
        if(i==0&&j<startday){
            const day=document.createElement("td","/td");
            week.appendChild(day);
        }
        else if(count>endday){//修正
            /*
            const day=document.createElement("td","/td");
            week.appendChild(day);
            */
           continue;
        }
        else{
            const day=document.createElement("td","/td");
            const num=document.createTextNode(count);
            day.appendChild(num);
            week.appendChild(day);
            count++
        }
    }
    calender.appendChild(week);
}
if(count<29&&month!=2){
    const week=document.createElement("tr");
    for(var j=0;j<7;j++){
        if(count>endday){
            const day=document.createElement("td","/td");
            week.appendChild(day);
        }
        else{
            const day=document.createElement("td","/td");
            const num=document.createTextNode(count);
            day.appendChild(num);
            week.appendChild(day);
            count++
        }
    }
    calender.appendChild(week);
}

const nextmonth=date.getUTCMonth()+2;
const nextstart=new Date(year,nextmonth-1,1);
const nextstartday=nextstart.getDay();
const nextend=new Date(year,nextmonth,0);
const nextendday=nextend.getDate();

function nextYear(){
if(month==11||month==12){
    return year+=1;
}
else{
    return year;
}
}

const calenderNextMonth=document.getElementById("calenderNextMonth");
const secondMonth=document.createTextNode(nextYear+"年"+nextmonth+"月");
calenderNextMonth.appendChild(secondMonth);

const nextcalender=document.getElementById("nextcalender");

//年末の年表示を場合わけ

var count=1;

for(var i=0;i<5;i++){
    const week=document.createElement("tr");

    for(var j=0;j<7;j++){
        if(i==0&&j<nextstartday){
            const day=document.createElement("td","/td");
            week.appendChild(day);
        }
        else if(count>nextendday){
            /*
            const day=document.createElement("td","/td");
            week.appendChild(day);
            */
            continue;
        }
        else{
            const day=document.createElement("td","/td");
            const num=document.createTextNode(count);
            day.appendChild(num);
            week.appendChild(day);
            count++
        }
    }
    nextcalender.appendChild(week);
}
if(count<29&&nextmonth!=2){
    const week=document.createElement("tr");
    for(var j=0;j<7;j++){
        if(count>nextendday){
            const day=document.createElement("td","/td");
            week.appendChild(day);
        }
        else{
            const day=document.createElement("td","/td");
            const num=document.createTextNode(count);
            day.appendChild(num);
            week.appendChild(day);
            count++
        }
    }
    nextcalender.appendChild(week);
}


const monthAfterNext=date.getUTCMonth()+3;
const monthAfterNextstart=new Date(year,monthAfterNext-1,1);
const monthAfterNextstartday=monthAfterNextstart.getDay();
const monthAfterNextend=new Date(year,monthAfterNext,0);
const monthAfterNextendday=monthAfterNextend.getDate();

const calenderMonthAfterNext=document.getElementById("calenderMonthAfterNext");
const thirdMonth=document.createTextNode(year+"年"+monthAfterNext+"月");
calenderMonthAfterNext.appendChild(thirdMonth);

const monthAfterNextcalender=document.getElementById("monthAfterNextcalender");

var count=1;

for(var i=0;i<5;i++){
    const week=document.createElement("tr");

    for(var j=0;j<7;j++){
        if(i==0&&j<monthAfterNextstartday){
            const day=document.createElement("td","/td");
            week.appendChild(day);
        }
        else if(count>monthAfterNextendday){
            /*
            const day=document.createElement("td","/td");
            week.appendChild(day);
            */
            continue;
        }
        else{
            const day=document.createElement("td","/td");
            const num=document.createTextNode(count);
            day.appendChild(num);
            week.appendChild(day);
            count++
        }
    }
    monthAfterNextcalender.appendChild(week);
}
if(count<29&&monthAfterNext!=2){
    const week=document.createElement("tr");
    for(var j=0;j<7;j++){
        if(count>monthAfterNextendday){
            const day=document.createElement("td","/td");
            week.appendChild(day);
        }
        else{
            const day=document.createElement("td","/td");
            const num=document.createTextNode(count);
            day.appendChild(num);
            week.appendChild(day);
            count++
        }
    }
    monthAfterNextcalender.appendChild(week);
}

// const calender=document.getElementById("calender");
// //const btbl=document.createElement("tbody");
// const week=document.createElement("tr");

// for(var i=0;i<7;i++){
//     var count=startday+1+i;
//     if(startday!=start){
//         const cell=document.createElement("td");
//         const day=document.createTextNode("");
//         cell.appendChild(day);
//         week.appendChild(cell);
//     }
//     else{
//         const cell=document.createElement("td");
//         const day=document.createTextNode(start+i);
//         cell.appendChild(day);
//         week.appendChild(cell);
//     }
// }

// /*
// for(var j=0;j<7;i++){
//     const cell=document.createElement("td");
//     const day=document.createTextNode(j);
//     cell.appendChild(day);
//     week.appendChild(cell);
// }
// */

// //btbl.appendChild(week);
// calender.appendChild(week);
