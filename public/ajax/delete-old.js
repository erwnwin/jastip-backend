console.log("Script delete-old.js loaded");

setInterval(function() {
    console.log("Sending request to delete old data");
    var xhr = new XMLHttpRequest();
    xhr.open("GET", "/api/titipan/delete-old-data", true);
    xhr.onreadystatechange = function() {
        if (xhr.readyState === 4) {
            console.log("Response received: ", xhr.responseText);
        }
    };
    xhr.send();
}, 300000); // setiap 5 menit dihapus