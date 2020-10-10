    function date(){
        var date = new Date();
        var now = date.toLocaleTimeString();
        var datetime = date.getMonth() + "/" +date.getDate()+"/" +date.getFullYear();
        console.log(now)
        document.getElementById("date").innerText = datetime;
        document.getElementById("time").innerText = now;

    }
    setInterval(date,1000)


