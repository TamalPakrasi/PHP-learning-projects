const navLinks = document.querySelectorAll(".nav-link");
const form = document.getElementById("composeMailForm");
const fileCount = document.getElementById("fileCount");
const fileInput = document.getElementById("files");

navLinks.forEach((link) => {
  link.addEventListener("click", (e) => {
    navLinks.forEach((link) =>
      link.classList.contains("active") ? link.classList.remove("active") : null
    );
    e.target.classList.add("active");
  });
});

const tooltipTriggerList = document.querySelectorAll(
  '[data-coreui-toggle="tooltip"]'
);
const tooltipList = [...tooltipTriggerList].map(
  (tooltipTriggerEl) => new coreui.Tooltip(tooltipTriggerEl)
);

const attachment = document.getElementById("attachment");
attachment.addEventListener("click", () => {
  fileInput.click();
});

document.querySelector(".submit").addEventListener("click", (e) => {
  e.preventDefault();
  form.action = "back.php?send=true";
  form.submit();
});

function checkFormFilledUp() {
  let res = true;
  const fields = form.querySelectorAll(".form-control");
  res = Array.from(fields).every((field) => field.value.length > 0);
  return res;
}

const composeModal = document.getElementById("composeMail");

const composeModalMutation = new MutationObserver((mutations) => {
  mutations.forEach((mutation) => {
    if (mutation.attributeName === "class") {
      const oldClasses = mutation.oldValue.split(" ");
      const newClasses = composeModal.className.split(" ");
      const removed = oldClasses.filter((cls) => !newClasses.includes(cls));

      if (removed.includes("show") && !form.action.includes("?send")) {
        if (checkFormFilledUp()) {
          form.action = "back.php";
          form.submit();
        } else {
          setTimeout(() => {
            form.reset();
            fileCount.textContent = "No file Choosen";
          }, 100);
        }
      }
    }
  });
});

composeModalMutation.observe(composeModal, {
  attributes: true,
  attributeFilter: ["class"],
  attributeOldValue: true,
});

fileInput.addEventListener("change", (e) => {
  const files = e.target.files.length;
  switch (files) {
    case 0:
      fileCount.textContent = "No file Choosen";
      break;
    case 1:
      fileCount.textContent = "1 file choosen";
    default:
      fileCount.textContent = `${files} files choosen`;
      break;
  }
});
