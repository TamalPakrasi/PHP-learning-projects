const path = new URL(location.href).pathname;

// Log in form
if (path === "/login") {
  await import("/assets/JS/login.js");
}

// Sign up form
else if (path === "/signup") {
  await import("/assets/JS/signup.js")
}
