function runListener() {
    var input = document.getElementById("search-element");
    input.addEventListener("keypress", function(event) {
        if (event.key === "Enter") {
            var text = document.getElementById("search-element").value;
            serachFlager(text)

        }
    });
}


function serachFlager(text) {
    var badwordsArray = require('badwords/array');
    const map1 = badwordsArray.map(x=> x === text)
    .reduce((truth, a) => truth || a)
    alert(map1)
}