
document.addEventListener("DOMContentLoaded", function () {
  document.querySelector("#iconMenu").addEventListener("click", mostrarMenu);

  function mostrarMenu() {
    let menu = document.querySelector("#menu");
    if (menu.className === "menu") {
      menu.className += " menu-responsive";
    } else {
      menu.className = "menu";
    }
  }

  function cargarPagina(url) {
    location.href = url;
  }

  document.querySelector("#btn-home").addEventListener("click", (event) => {
    document.querySelector("#btn-indoor").classList.remove("actual");
    event.currentTarget.classList.add("actual");
    cargarPagina("home");
  });

  document.querySelector("#btn-indoor").addEventListener("click", (event) => {
    document.querySelector("#btn-home").classList.remove("actual");
    event.currentTarget.classList.add("actual");
    cargarPagina("indoor");
  });

  try {
    document.querySelector("#btn-login").addEventListener("click", (event) => {
      cargarPagina("login");
    });
  } catch {
    document.querySelector("#btn-logout").addEventListener("click", (event) => {
      cargarPagina("logout");
    });

    document.querySelector("#btn-users").addEventListener("click", (event) => {
           cargarPagina("editUsers");
      });
    
  }
});
