document.getElementById("check").onclick = function () {
  document.getElementById("login").style.display = "none";
  document.getElementById("signup").style.display = "block";
};
document.getElementById("log").onclick = function () {
  document.getElementById("signup").style.display = "none";
  document.getElementById("login").style.display = "block";
};
