const $loginTogglers = $("button[data-role='login']");
const $loginFormWrapper = $("#login-form-wrapper");
const $loginForms = $loginFormWrapper.find("form");

if ($loginTogglers.length > 0 && $loginFormWrapper.length > 0) {
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
