let chevronRight = '<svg class="page-next" viewBox="0 0 256 512"><path d="M17.525 36.465l-7.071 7.07c-4.686 4.686-4.686 12.284 0 16.971L205.947 256 10.454 451.494c-4.686 4.686-4.686 12.284 0 16.971l7.071 7.07c4.686 4.686 12.284 4.686 16.97 0l211.051-211.05c4.686-4.686 4.686-12.284 0-16.971L34.495 36.465c-4.686-4.687-12.284-4.687-16.97 0z"></path></svg>';
let chevronLeft = '<svg class="page-prev" viewBox="0 0 256 512"><path d="M238.475 475.535l7.071-7.07c4.686-4.686 4.686-12.284 0-16.971L50.053 256 245.546 60.506c4.686-4.686 4.686-12.284 0-16.971l-7.071-7.07c-4.686-4.686-12.284-4.686-16.97 0L10.454 247.515c-4.686 4.686-4.686 12.284 0 16.971l211.051 211.05c4.686 4.686 12.284 4.686 16.97-.001z"></path></svg>';
let url = window.location.href;
let currFile = (url.substring(url.lastIndexOf('/')+1));
let pageNumber = parseInt(currFile.substring(0, currFile.lastIndexOf('.')));
let nextLink = '';
let prevLink = '';
let a = '';

function makeReq(method, url, done) {
    let xhr = new XMLHttpRequest();
    xhr.open(method, url);
    xhr.onload = function() {
        done(null, xhr.response);
    }
    xhr.onerror = function() {
        done(xhr.response);
    };
    xhr.send();
}

function createNavigation(pageNumber, chevronRight, chevronLeft, maxIndex) {
    // console.log("max index: " + maxIndex);
    // Set the navigation chevrons to their correct value.
    if(isNaN(pageNumber)){
        nextLink = '<a href="./02.php">' + chevronRight + '</a>';
    } else if (pageNumber == 2) {
        nextLink =  '<a href="./' + (pageNumber + 1).toString().padStart(2, '0') + '.php">' + chevronRight + '</a>';
        prevLink =  '<a href="./index.php">' + chevronLeft + '</a>';
    } else if (pageNumber < maxIndex) {
        nextLink =  '<a href="./' + (pageNumber + 1).toString().padStart(2, '0') + '.php">' + chevronRight + '</a>';
        prevLink =  '<a href="./' + (pageNumber - 1).toString().padStart(2, '0') + '.php">' + chevronLeft + '</a>';
    } else if (pageNumber == maxIndex) {
        prevLink =  '<a href="./' + (pageNumber - 1).toString().padStart(2, '0') + '.php">' + chevronLeft + '</a>';
    }

    let range = document.createRange();
    range.selectNode(document.getElementsByTagName("main").item(0));
    if(prevLink != '') {
        document.body.appendChild(range.createContextualFragment(prevLink));
    }
    if(nextLink != '') {
        document.body.appendChild(range.createContextualFragment(nextLink));
    }
}


// Set the highlight for the current page.
if(isNaN(pageNumber)){
    currFile = 'index.php'
    a = document.querySelector('a[href*="index.php"]');
} else {
    a = document.querySelector('a[href*="'+pageNumber+'.php"]');
}
a.parentElement.setAttribute('class', 'active');

// Get the max index from current directory
let currPath = window.location.pathname;
let currDir = currPath.substring(1, currPath.lastIndexOf('/'));
makeReq('GET', '../php/max_index.php?dir='+currDir, function(err, data) {
    if (err) {
        console.log ("Error : " + err);
    }
    // console.log(data);
    maxIndex = parseInt(data);
    createNavigation(pageNumber, chevronRight, chevronLeft, maxIndex);
})




