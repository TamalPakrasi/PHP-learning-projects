<div class="flex min-h-full flex-col justify-center px-6 py-12 lg:px-8 container">
  <div class="sm:mx-auto sm:w-full sm:max-w-sm">
    <img src="https://tailwindcss.com/plus-assets/img/logos/mark.svg?color=indigo&shade=500" alt="Your Company" class="mx-auto h-10 w-auto" />
    <h2 class="mt-10 text-center text-2xl/9 font-bold tracking-tight text-indigo-500">Sign up</h2>
  </div>

  <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm">
    <form action="#" method="POST" class="space-y-6">
      <div>
        <label for="new_user" class="block text-sm/6 font-medium text-gray-700">Username</label>
        <div class="mt-2">
          <input id="new_user" type="text" name="new_user" required autocomplete="off" class="block w-full rounded-md bg-white/5 px-3 py-1.5 text-base border-2 border-indigo-500 outline-1 -outline-offset-1 outline-white/10 placeholder:text-gray-500 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-500 sm:text-sm/6" />
        </div>
      </div>

      <div>
        <label for="new_email" class="block text-sm/6 font-medium text-gray-700">Email address</label>
        <div class="mt-2">
          <input id="new_email" type="email" name="new_email" required autocomplete="email" class="block w-full rounded-md bg-white/5 px-3 py-1.5 text-base border-2 border-indigo-500 outline-1 -outline-offset-1 outline-white/10 placeholder:text-gray-500 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-500 sm:text-sm/6" />
        </div>
      </div>

      <div>
        <div class="flex items-center justify-between">
          <label for="new_password" class="block text-sm/6 font-medium text-gray-700">Password</label>
        </div>
        <div class="mt-2">
          <input id="new_password" type="password" name="new_password" required autocomplete="current-password" class="block w-full rounded-md bg-white/5 px-3 py-1.5 text-base border-2 border-indigo-500 outline-1 -outline-offset-1 outline-white/10 placeholder:text-gray-500 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-500 sm:text-sm/6" minlength="8" maxlength="8" />
        </div>
      </div>

      <div>
        <button class="flex w-full justify-center rounded-md bg-indigo-500 px-3 py-1.5 text-sm/6 font-semibold text-white hover:bg-indigo-400 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-500  cursor-pointer">
          Send OTP to email
        </button>
      </div>

      <div class="mt-3">
        <label for="otp" class="block text-sm/6 font-medium text-gray-700">ENTER THE ONE TIME PASSWORD</label>
        <div class="mt-2">
          <input id="otp" type="text" name="otp" required autocomplete="off" class="block w-full rounded-md bg-white/5 px-3 py-1.5 text-base border-2 border-indigo-500 outline-1 -outline-offset-1 outline-white/10 placeholder:text-gray-500 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-500 sm:text-sm/6 select-none" placeholder="XXXX" minlength="4" maxlength="4" />
        </div>
      </div>

      <div>
        <button type="submit" class="flex w-full justify-center rounded-md bg-indigo-500 px-3 py-1.5 text-sm/6 font-semibold text-white hover:bg-indigo-400 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-500  cursor-pointer">
          Sign up
        </button>
      </div>

      <p class="mt-10 text-center text-sm/6 text-gray-400">
        Already have a registered account?
        <a href="/login" class="font-semibold text-indigo-400 hover:text-indigo-300">Log in</a>
      </p>
    </form>
  </div>
</div>