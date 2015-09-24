var easter_egg = new Konami();easter_egg.code = function() {

	var dragon = document.getElementById("dragon");
	dragon.style.display = "block";


	document.getElementById("thar-she-goes").onclick = function() {
		document.getElementById("dragon").style.visibility = "hidden";
	}
}
easter_egg.load();