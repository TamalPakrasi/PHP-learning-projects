<nav
  class="sticky top-0 left-0 bg-linear-180 from-nav-1 to-nav-2 shadow-box backdrop-blur-sm border-border-box border rounded-full p-3">
  <ul class="flex gap-3 items-center ms-3">
    <li><a href="/" class="text-lg lg:text-xl <?php echo $active_page === "tasks" ? "text-white font-semibold" : "text-[#96a0c0]" ?>">Tasks</a></li>
    <li><a href="/employees" class="text-lg lg:text-xl <?php echo $active_page === "employees" ? "text-white font-semibold" : "text-[#96a0c0]" ?>">Employees</a></li>
  </ul>
</nav>