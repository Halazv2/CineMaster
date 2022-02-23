document.getElementById("ajoute").onclick = function() {

    var hafid = document.getElementById("form");
    console.log("here");
    alert(hafid);

    if (hafid.style.display === "none") {
      hafid.style.display = "block";
    } else {
      hafid.style.display = "none";
    }

}
