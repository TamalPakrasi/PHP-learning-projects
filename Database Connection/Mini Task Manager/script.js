console.log("script is running....");

const markCompleteBtns = document.querySelectorAll(".checkbox");
const deleteBtns = document.querySelectorAll(".delete");

if (markCompleteBtns) {
  markCompleteBtns.forEach((btn) => {
    btn.addEventListener("click", (e) => {
      const id = e.target.dataset.id;
      const complete = Number(e.target.checked);
      console.log(complete);
      location.href = `updatedelete.php?operation=markcomplete&id=${id}&status=${complete}`;
    });
  });
}

if (deleteBtns) {
  deleteBtns.forEach((btn) => {
    btn.addEventListener("click", (e) => {
      const id = e.target.dataset.id;
      const complete = e.target.dataset.complete;
      if (complete === "1")
        location.href = `updatedelete.php?operation=deletetask&id=${id}}`;
    });
  });
}
