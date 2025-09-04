const $autoComplete = $("#autocomplete-list");
const $searchForm = $("#searchForm");
let isSearching = true;
let count = -1;

function addMouseEvent() {
  $(".list-group-item").on({
    mouseenter: function () {
      if (!$(this).hasClass("active")) {
        $(this).addClass("active");
      }
    },
    mouseleave: function () {
      if ($(this).hasClass("active")) {
        $(this).removeClass("active");
      }
    },
  });
}

function addResponseToDom(categories) {
  $.each(categories, function (ind, val) {
    const { data } = val;
    $(`<li class="list-group-item" role="button">${data}</li>`).appendTo(
      $autoComplete
    );

    addMouseEvent();
  });
}

function getCatagories(searchData) {
  $.ajax({
    type: "GET",
    url: `controller/back.php?search=${searchData}`,
    dataType: "json",
    success: function (response) {
      $autoComplete.html("");
      if (response.length > 0) {
        addResponseToDom(response);
      } else {
        $($autoComplete).html(`<li class="list-group-item">No Data Found</li>`);
      }
    },
    error: function (err) {
      console.error(err);
    },
  });
}

function searchCategory(form) {
  const $formdata = form.serializeArray();
  const { value } = $formdata[0];
  if (value) {
    getCatagories(value.trim());
  } else {
    $($autoComplete).html("");
  }
}

function travarseDropdown(e) {
  const list = $($autoComplete).children();
  if (e.key.toLowerCase() === "arrowdown") {
    isSearching = false;
    if (list.length > 0 && count < list.length - 1) {
      count++;
      $(list).removeClass("active");
      $(list[count]).addClass("active");
    }
  } else if (e.key.toLowerCase() === "arrowup") {
    isSearching = false;
    if (list.length > 0 && count > 0) {
      count--;
      $(list).removeClass("active");
      $(list[count]).addClass("active");
    }
  } else {
    $(list).removeClass("active");
    count = -1;
    isSearching = true;
  }
}

$($searchForm).on({
  input: function (e) {
    if (isSearching) {
      searchCategory($(this));
    }
  },
  keydown: function (e) {
    travarseDropdown(e);
  },
});
