<main>
  <div class="grid grid-cols-2 overflow-hidden mb-2" id="toggle-btns">
    <button class="text-base font-medium py-2 px-3 rounded-sm cursor-pointer active-login-style" data-role="pass">Log in using Password</button>
    <button class="text-base font-medium py-2 px-3 rounded-sm cursor-pointer" data-role="otp">Log in using OTP</button>
  </div>

  <div class="flex min-h-full flex-col justify-center px-6 py-12 lg:px-8">
    <div class="sm:mx-auto sm:w-full sm:max-w-sm">
      <img src="https://tailwindcss.com/plus-assets/img/logos/mark.svg?color=indigo&shade=500" alt="Your Company" class="mx-auto h-10 w-auto" />
      <h2 class="mt-10 text-center text-2xl/9 font-bold tracking-tight text-indigo-500">Log in to your account</h2>
    </div>

    <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm" id="login-form-wrapper">
      <form action="/login" method="POST" class="space-y-6" id="login-form">
        <div id="email-wrapper">
          <label for="email" class="block text-sm/6 font-medium text-gray-700">Email address</label>
          <div class="mt-2">
            <input id="email" type="email" name="email" required autocomplete="email" class="block w-full rounded-md bg-white/5 px-3 py-1.5 text-base border-2 border-indigo-500 outline-1 -outline-offset-1 outline-white/10 placeholder:text-gray-500 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-500 sm:text-sm/6" />
          </div>
        </div>

        <div id="pass-wrapper">
          <div class="flex items-center justify-between">
            <label for="password" class="block text-sm/6 font-medium text-gray-700">Password</label>
          </div>
          <div class="mt-2">
            <input id="password" type="password" name="password" required autocomplete="current-password" class="block w-full rounded-md bg-white/5 px-3 py-1.5 text-base border-2 border-indigo-500 outline-1 -outline-offset-1 outline-white/10 placeholder:text-gray-500 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-500 sm:text-sm/6" />
          </div>
        </div>

        <div class="message_or_button">
          <button type="submit" class="flex w-full justify-center rounded-md bg-indigo-500 px-3 py-1.5 text-sm/6 font-semibold text-white hover:bg-indigo-600 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-500 cursor-pointer">Log in</button>
        </div>
      </form>

      <!-- <form action="#" method="POST" class="space-y-6 hidden">
        <div>
          <label for="email" class="block text-sm/6 font-medium text-gray-700">Email address</label>
          <div class="mt-2">
            <input id="email" type="email" name="email" required autocomplete="email" class="block w-full rounded-md bg-white/5 px-3 py-1.5 text-base border-2 border-indigo-500 outline-1 -outline-offset-1 outline-white/10 placeholder:text-gray-500 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-500 sm:text-sm/6" />
          </div>
        </div>

        <div>
          <button class="flex w-full justify-center rounded-md bg-indigo-500 px-3 py-1.5 text-sm/6 font-semibold text-white hover:bg-indigo-400 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-500">Send OTP to email</button>
        </div>

      </form> -->

      <p class="mt-10 text-center text-sm/6 text-gray-400">
        Don't have an account yet?
        <a href="/signup" class="font-semibold text-indigo-400 hover:text-indigo-300">Register</a>
      </p>
    </div>
  </div>

</main>