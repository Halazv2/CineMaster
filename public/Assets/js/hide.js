document.getElementById("hide").onclick = function() {

    var x = document.getElementById("slider");
    // var y = window.matchMedia("(max-width: 700px)")
    if (x.style.display === "none") {

        x.style.display = "flex";
        x.style.flexDirection ="row";
        x.style.flexWrap = "wrap"

        // if (y.matches) { // If media query matches
        //     x.style.flexDirection = "column";
        //   } 
    } else {
        x.style.display = "none";
    }
}