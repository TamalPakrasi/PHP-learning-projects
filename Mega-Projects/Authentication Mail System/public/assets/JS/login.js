const $loginTogglersWrapper = $("#toggle-btns");
const $loginForm = $("#login-form");
const $emailWrapper = $("#email-wrapper");
const $passWrapper = $("#pass-wrapper");

function getPassNode() {
  return `<div class="flex items-center justify-between">
            <label for="password" class="block text-sm/6 font-medium text-gray-700">Password</label>
          </div>
          <div class="mt-2">
            <input id="password" type="password" name="password" required autocomplete="current-password" class="block w-full rounded-md bg-white/5 px-3 py-1.5 text-base border-2 border-indigo-500 outline-1 -outline-offset-1 outline-white/10 placeholder:text-gray-500 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-500 sm:text-sm/6" />
          </div>`;
}

function handleFormSubmit(e) {
  e.preventDefault();
}

function handleFormToggle(e) {
  $loginTogglersWrapper.children().removeClass("active-login-style");
  $(this).addClass("active-login-style");

  if ($(this).attr("data-role") === "otp") {
    $passWrapper.empty();
    $loginForm.find(`button[type="submit"]`).text("Send OTP to email");
    $loginForm.on("submit", handleFormSubmit);
  } else {
    $passWrapper.html(getPassNode());
    $loginForm.find(`button[type="submit"]`).text("Log in");
    $loginForm.off("submit", handleFormSubmit);
  }
}

$("#toggle-btns").on("click", "button", handleFormToggle);
