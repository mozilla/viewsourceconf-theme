var easter_egg = new Konami();
easter_egg.code = function() {

    var dragon = document.getElementById("dragon");
    dragon.style.display = "block";

    document.getElementById("thar-she-goes").onclick = function() {
        dragon.style.display = "none";
    };
};
easter_egg.load();
