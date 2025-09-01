"use strict";

const path = new URL(location.href).pathname;

// Log in form
if (path === "/login") {
  const $loginTogglers = $("button[data-role='login']");
  const $loginFormWrapper = $("#login-form-wrapper");
  const $loginForms = $loginFormWrapper.find("form");

  $($loginTogglers).on("click", function () {
    $($loginTogglers).removeClass("active-login-style");
    $(this).addClass("active-login-style");
    const $dataId = $(this).attr("data-id");

    $loginForms.trigger("reset");
    $loginForms.removeClass("hidden");
    switch ($dataId) {
      case "with-pass":
        $loginForms.eq(1).addClass("hidden");
        break;
      case "with-otp":
        $loginForms.eq(0).addClass("hidden");
        break;
    }
  });
}

// Sign up form
else if (path === "/signup") {
  const $sendOtp = $("#send-otp");
  const $signupForm = $("form");

  function handleInput(e) {
    const $formdata = $(this).serializeArray();
    const [username, email, password] = $formdata;

    const validUsername =
      username.value.trim().length > 5 &&
      /^[a-z]+(?: [a-z]+)?$/i.test(username.value);

    const validEmail = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/.test(
      email.value.trim()
    );

    const validPass = password.value.trim().length === 8;

    if (validUsername && validEmail && validPass) {
      $sendOtp
        .removeAttr("disabled")
        .removeClass(["cursor-not-allowed", "bg-indigo-200"])
        .addClass(["cursor-pointer", "bg-indigo-500", "hover:bg-indigo-600"]);
    } else {
      if ($sendOtp.attr("disabled") === undefined) {
        $sendOtp
          .attr("disabled", "")
          .removeClass([
            "cursor-pointer",
            "bg-indigo-500",
            "hover:bg-indigo-600",
          ])
          .addClass(["cursor-not-allowed", "bg-indigo-200"]);
      }
    }
  }

  function handleOTPSubmit(e) {
    e.preventDefault();
    const $formdata = $(this).serializeArray();
    let message = null;
    const node = `<section class="mt-3">
        <div>
          <label for="otp" class="block text-sm/6 font-medium text-gray-700">ENTER THE ONE TIME PASSWORD</label>
          <div class="mt-2">
            <input id="otp" type="text" name="otp" required autocomplete="off" class="block w-full rounded-md bg-white/5 px-3 py-1.5 text-base border-2 border-indigo-500 outline-1 -outline-offset-1 outline-white/10 placeholder:text-gray-500 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-500 sm:text-sm/6 select-none" placeholder="XXXX" minlength="4" maxlength="4" />
          </div>
        </div>

        <div class="mt-3">
          <button type="submit" class="flex w-full justify-center rounded-md bg-indigo-500 px-3 py-1.5 text-sm/6 font-semibold text-white hover:bg-indigo-400 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-500  cursor-pointer">
            Sign up
          </button>
        </div>
      </section>`;

    $.ajax({
      type: "POST",
      url: "/api/signup",
      data: JSON.stringify({ data: $formdata }),
      contentType: "application/json",
      dataType: "json",
      beforeSend: function () {
        $sendOtp
          .removeClass([
            "cursor-pointer",
            "bg-indigo-500",
            "hover:bg-indigo-600",
          ])
          .addClass(["cursor-none", "bg-indigo-200"])
          .attr("disabled", "");

        $signupForm
          .find("input")
          .removeClass("bg-white/5")
          .addClass("bg-gray-200")
          .attr("readOnly", "");

        $sendOtp.html("Sending...");
      },
      success: function (response, status, xhr) {
        message = { ...response, status: xhr.status };
      },
      error: function (xhr, status, err) {
        const res = xhr.responseJSON;
        message = { ...res, status: xhr.status };
      },
      complete: function () {
        if (message && message.status === 201) {
          $(".message_or_button").html(
            `<p class="text-sm text-gray-700 font-medium">${message.msg} check <span class="text-indigo-600">${message.to}</span></p>`
          );
          message = null;
          $signupForm.off("input", handleInput);
          $signupForm.off("submit", handleOTPSubmit);
          $(node).appendTo($signupForm);
        } else {
          $sendOtp
            .addClass([
              "cursor-pointer",
              "bg-indigo-500",
              "hover:bg-indigo-600",
            ])
            .removeClass(["cursor-none", "bg-indigo-200"])
            .removeAttr("disabled");

          $signupForm
            .find("input")
            .addClass("bg-white/5")
            .removeClass("bg-gray-200")
            .removeAttr("readOnly");

          $sendOtp.html("Send OTP to email");

          $(
            `<div class="text-center text-indigo-500 text-xl">${message.msg}</div>`
          ).insertBefore($signupForm.parent());
          message = null;
        }
      },
    });
  }

  $signupForm.on("input", handleInput);
  $signupForm.on("submit", handleOTPSubmit);
}
