document.addEventListener("DOMContentLoaded", function () {
    const includeHTML = (path, element) => {
        fetch(path)
            .then((response) => response.text())
            .then((html) => {
                element.innerHTML = html;
            });
    };
  
    const topBarContainernnonPHP = document.getElementById("topBarContainernnonPHP");
    if (topBarContainernnonPHP) {
        includeHTML("../menu/menu.html", topBarContainernnonPHP);
    }
  });
