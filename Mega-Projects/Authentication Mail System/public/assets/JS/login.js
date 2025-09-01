const $loginTogglersWrapper = $("#toggle-btns");
const $loginForm = $("#login-form");
const $emailWrapper = $("#email-wrapper");
const $passWrapper = $("#pass-wrapper");
let message = null;

const getOTPNode = () => {
  return `<section class="mt-3 otp-sec">
        <div>
          <label for="otp" class="block text-sm/6 font-medium text-gray-700">ENTER THE ONE TIME PASSWORD</label>
          <div class="mt-2">
            <input id="otp" type="text" name="otp" required autocomplete="off" class="block w-full rounded-md bg-white/5 px-3 py-1.5 text-base border-2 border-indigo-500 outline-1 -outline-offset-1 outline-white/10 placeholder:text-gray-500 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-500 sm:text-sm/6 select-none" placeholder="XXXX" minlength="4" maxlength="4" />
          </div>
        </div>

        <div class="mt-3">
          <button type="submit" class="flex w-full justify-center rounded-md bg-indigo-500 px-3 py-1.5 text-sm/6 font-semibold text-white hover:bg-indigo-400 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-500  cursor-pointer">
            Log in
          </button>
        </div>
      </section>`;
};

function getPassNode() {
  return `<div class="flex items-center justify-between">
            <label for="password" class="block text-sm/6 font-medium text-gray-700">Password</label>
          </div>
          <div class="mt-2">
            <input id="password" type="password" name="password" required autocomplete="current-password" class="block w-full rounded-md bg-white/5 px-3 py-1.5 text-base border-2 border-indigo-500 outline-1 -outline-offset-1 outline-white/10 placeholder:text-gray-500 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-500 sm:text-sm/6" />
          </div>`;
}

const onLoading = () => {
  $loginForm
    .find(`button[type="submit"]`)
    .removeClass(["cursor-pointer", "bg-indigo-500", "hover:bg-indigo-600"])
    .addClass(["cursor-none", "bg-indigo-200"])
    .attr("disabled", "");

  $loginForm
    .find("input[type='email']")
    .removeClass("bg-white/5")
    .addClass("bg-gray-200")
    .attr("readOnly", "");

  $loginForm.find(`button[type="submit"]`).html("Sending...");
};

const onSuccess = (response, status, xhr) => {
  message = { ...response, status: xhr.status };
};

const onError = (xhr, status, err) => {
  const res = xhr.responseJSON;
  message = { ...res, status: xhr.status };
};

const onCompleteSuccess = () => {
  $(".message_or_button").html(
    `<p class="text-sm text-gray-700 font-medium">${message.msg} check <span class="text-indigo-600">${message.to}</span></p>`
  );
  message = null;
  $loginForm.off("submit", handleFormSubmit);
  $("#toggle-btns").off("click", "button", handleFormToggle);
  const node = getOTPNode();
  $(node).appendTo($loginForm);
};

const onCompleteFail = () => {
  $loginForm
    .find(`button[type="submit"]`)
    .addClass(["cursor-pointer", "bg-indigo-500", "hover:bg-indigo-600"])
    .removeClass(["cursor-none", "bg-indigo-200"])
    .removeAttr("disabled");

  $loginForm
    .find("input")
    .addClass("bg-white/5")
    .removeClass("bg-gray-200")
    .removeAttr("readOnly");

  $loginForm.find(`button[type="submit"]`).html("Send OTP to email");

  $(
    `<div class="text-center text-indigo-500 text-xl mt-3">${message.msg}</div>`
  ).insertBefore($loginForm.parent());
  message = null;
};

const onComplete = () => {
  if (message && message.status === 201) {
    onCompleteSuccess();
  } else {
    onCompleteFail();
  }
};

function handleFormSubmit(e) {
  e.preventDefault();
  const $formdata = $(this).serializeArray();
  const [$email] = $formdata;

  $.ajax({
    type: "POST",
    url: "/api/login",
    data: JSON.stringify({ email: $email.value }),
    contentType: "application/json",
    dataType: "json",
    beforeSend: onLoading,
    success: onSuccess,
    error: onError,
    complete: onComplete,
  });
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
