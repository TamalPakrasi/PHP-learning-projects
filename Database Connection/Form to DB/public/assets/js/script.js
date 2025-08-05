console.log("Script is running....");

const signingBtns = document.querySelectorAll(".signing-btns");

signingBtns.forEach((btn) => {
  btn.addEventListener("click", (e) => {
    const [first, second] = e.currentTarget.innerText.split(" ");
    const relocateTo = `/${first[0].toLowerCase()}${first.slice(1)}${second}`;
    location.href = relocateTo;
  });
});
