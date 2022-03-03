window.addEventListener("DOMContentLoaded", (e) => {
  console.log("DOM fully loaded and parsed2");
  const navbarToggler = document.getElementById("navbar-toggler");
  const menuWrapper = document.getElementsByClassName("menu-wrapper");
  navbarToggler.addEventListener("click", () => {
    navbarToggler.classList.toggle("js-is-active");

    menuWrapper[0].classList.toggle("js-is-open");
    console.log("click");
  });
});
