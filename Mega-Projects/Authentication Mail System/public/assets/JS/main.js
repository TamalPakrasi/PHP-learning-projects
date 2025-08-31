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
      username.value.length > 5 && /^[a-z]+(?: [a-z]+)?$/i.test(username.value);

    const validEmail = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/.test(
      email.value
    );

    const validPass = password.value.length === 8;

    if (validUsername && validEmail && validPass) {
      $sendOtp.removeAttr("disabled");
      $sendOtp.removeClass(["cursor-not-allowed", "bg-indigo-200"]);
      $sendOtp.addClass([
        "cursor-pointer",
        "bg-indigo-500",
        "hover:bg-indigo-600",
      ]);
    } else {
      if ($sendOtp.attr("disabled") === undefined) {
        $sendOtp.attr("disabled", "");
        $sendOtp.removeClass([
          "cursor-pointer",
          "bg-indigo-500",
          "hover:bg-indigo-600",
        ]);
        $sendOtp.addClass(["cursor-not-allowed", "bg-indigo-200"]);
      }
    }
  }

  function handleSubmit(e) {
    e.preventDefault();

    const $formdata = $(this).serializeArray();

    $.ajax({
      type: "POST",
      url: "/api/signup",
      data: JSON.stringify({ data: $formdata }),
      contentType: "application/json",
      dataType: "json",
      beforeSend: function () {
        $sendOtp.attr("disabled", "");
        $sendOtp.removeClass([
          "cursor-pointer",
          "bg-indigo-500",
          "hover:bg-indigo-600",
        ]);
        $sendOtp.addClass(["cursor-none", "bg-indigo-200"]);
        $sendOtp.html("Sending...");
      },
      success: function (response) {
        console.log(response);
      },
      error: function (xhr, status, err) {},
      complete: function () {
        $sendOtp.removeClass(["bg-indigo-200"]);
        $sendOtp.addClass(["bg-indigo-500", "hover:bg-indigo-600"]);
        $sendOtp.html("Email has been sent....");
      },
    });
  }

  $signupForm.on("input", handleInput);
  $signupForm.on("submit", handleSubmit);
}
