const navLinks = document.querySelectorAll(".nav-link");

navLinks.forEach((link) => {
  link.addEventListener("click", (e) => {
    navLinks.forEach((link) =>
      link.classList.contains("active") ? link.classList.remove("active") : null
    );
    e.target.classList.add("active");
  });
});

const tooltipTriggerList = document.querySelectorAll('[data-coreui-toggle="tooltip"]')
const tooltipList = [...tooltipTriggerList].map(tooltipTriggerEl => new coreui.Tooltip(tooltipTriggerEl))


const attachment = document.getElementById("attachment");
attachment.addEventListener("click", () => {
  document.getElementById("file").click();
})