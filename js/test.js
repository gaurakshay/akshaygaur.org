// Set scroll position to where we were the last time:
let scrollPos = parseInt(localStorage.getItem('scrollPos'));
console.log('Scrolling to - ' + scrollPos);
window.scrollTo(0, scrollPos);

// FIles to monitor: php and html file.
// TODO Add a way to monitor everything in the directory.
let req = new XMLHttpRequest();
let currPHPFile = currFile;
let currHTMLFile = currFile.substring(currFile.lastIndexOf('.'), 0) + "-content.html";
startStat="";

req.onreadystatechange = function() {
    if(this.readyState == 4 && this.status == 200){
        newStat = req.responseText;
        if(startStat != "" && startStat != newStat) {
            console.log("Reloading...");
            console.log(window.pageYOffset);
            localStorage.setItem('scrollPos', window.scrollY);
            document.location.reload(true);
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