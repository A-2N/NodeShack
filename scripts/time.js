var date = new Date();
var now = date.getHours() + ":" + date.getMinutes();
var datetime = date.getMonth() + "/" +date.getDate()+"/" +date.getFullYear();
console.log(now)
    document.getElementById("date").innerText = datetime;
    document.getElementById("time").innerText = now;
