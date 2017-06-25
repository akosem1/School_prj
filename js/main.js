function cl (a){
console.log (a);
}

function readFromDB(a) {
    var i;
    var x = document.getElementsByClassName("readFromDB");
    for (i = 0; i < x.length; i++) {
        x[i].style.display = "none"; 
    }
    document.getElementById(a).style.display = "block"; 
}
