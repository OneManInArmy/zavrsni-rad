var broj = 0;
function vrti() {
    var i;
    var x = document.getElementsByClassName("slideimg");
    for (i = 0; i < x.length; i++) {
        x[i].style.display = "none";
    }
    broj++;
    if (broj > x.length) {broj = 1}
    x[broj-1].style.display = "block";
    setTimeout(vrti, 2000); // Change image every 2 seconds
}
