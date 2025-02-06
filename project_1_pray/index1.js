function time() {
    var time = document.getElementById("time");

    const now = new Date();

    let hours = now.getHours();
    let minutes = now.getMinutes();
    let seconds = now.getSeconds();

 
    hours = hours < 10 ? '0' + hours : hours;
    minutes = minutes < 10 ? '0' + minutes : minutes;
    seconds = seconds < 10 ? '0' + seconds : seconds;


    time.innerHTML = `${hours}:${minutes}:${seconds}`;
}

time();
setInterval(time, 1000);