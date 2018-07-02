// FIles to monitor: php and html file.

// TODO Add a way to monitor everything in the directory.
let req = new XMLHttpRequest();
let currPHPFile = currFile;
let currHTMLFile = currFile.substring(currFile.lastIndexOf('.'), 0) + "-content.html";

req.onreadystatechange = function() {
    if(this.readyState == 4 && this.status == 200){
        newStat = req.responseText;
        if(startStat != "" && startStat != newStat) {
            console.log("Reloading...");
            location.reload(true);
        }
        startStat = newStat;
    }
}

setInterval(function() {
    req.open("GET", "../php/get_stat.php?file="+currPHPFile);
    req.send();
}, 500);

setInterval(function() {
    req.open("GET", "../php/get_stat.php?file="+currHTMLFile);
    req.send();
}, 500);