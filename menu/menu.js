document.addEventListener("DOMContentLoaded", function () {
  const includeHTML = (path, element) => {
      fetch(path)
          .then((response) => response.text())
          .then((html) => {
              element.innerHTML = html;
          });
  };

  const topBarContainer = document.getElementById("topBarContainer");
  if (topBarContainer) {
      includeHTML("../menu/menu.html", topBarContainer);
  }
});

// JavaScript function to trigger form submission

function logout(event) {
    event.preventDefault(); // Prevent the default link behavior
    document.getElementById("logoutForm").submit();
}