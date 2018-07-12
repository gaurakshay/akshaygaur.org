let req = new XMLHttpRequest();
startStat="";

req.onreadystatechange = function() {
    if(this.readyState == 4 && this.status == 200){
        newStat = req.responseText;
        // console.log(newStat);
        if(startStat != "" && startStat != newStat) {
            document.location.reload(true);
        }
        startStat = newStat;
    }
}

setInterval(function() {
    req.open("GET", "../php/get_stat.php");
    req.send();
}, 1000);