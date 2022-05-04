
<body class="bg-[url('unsplash.jpg')] bg-cover" x-data="{ openMenu : false }"
:class="openMenu ? 'overflow-hidden' : 'overflow-visible' ">

<style>
  [x-cloak] {
    display: none !important;
  }
</style>

<header class="flex items-center justify-between px-8 py-4 bg-white drop-shadow-sm">

  <!-- Logo -->
  <a href="/" class="text-lg font-bold">Logo</a>

  <!-- Mobile Menu Toggle -->
  <button class="flex flex-col items-center align-middle md:hidden" @click="openMenu = !openMenu"
    :aria-expanded="openMenu" aria-controls="mobile-navigation" aria-label="Navigation Menu">
    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
    </svg>
    <span class="text-xs">Menu</span>
  </button>

  <!-- Main Navigations -->
  <nav class="hidden md:flex">
    

    <ul class="flex flex-row gap-2">
      <li>
        <a href="#" class="inline-flex px-3 py-2 rounded bg-slate-200" aria-current="true">Home</a>
      </li>
      <li>
        <a href="#" class="inline-flex px-3 py-2 rounded hover:bg-slate-200">About</a>
      </li>
      <li>
        <a href="#" class="inline-flex px-3 py-2 rounded hover:bg-slate-200">Articles</a>
      </li>
      <li>
        <a href="#" class="inline-flex px-3 py-2 rounded hover:bg-slate-200">Contact</a>
      </li>
    </ul>

  </nav>

</header>

<!-- Pop Out Navigation -->
<nav id="mobile-navigation" class="fixed top-0 bottom-0 left-0 right-0 z-10 backdrop-blur-sm"
  :class="openMenu ? 'visible' : 'invisible' " x-cloak>

  <!-- UL Links -->
  <ul class="absolute top-0 bottom-0 right-0 z-10 w-10/12 py-4 transition-all bg-white drop-shadow-2xl"
    :class="openMenu ? 'translate-x-0' : 'translate-x-full'">

    <li class="border-b border-inherit">
      <a href="#" class="block p-4" aria-current="true">Home</a>
    </li>
    <li class="border-b border-inherit">
      <a href="#" class="block p-4">About</a>
    </li>
    <li class="border-b border-inherit">
      <a href="#" class="block p-4">Articles</a>
    </li>
    <li class="border-b border-inherit">
      <a href="#" class="block p-4">Contact</a>
    </li>

  </ul>

  <!-- Close Button -->
  <button class="absolute top-0 bottom-0 left-0 right-0" @click="openMenu = !openMenu" :aria-expanded="openMenu"
    aria-controls="mobile-navigation" aria-label="Close Navigation Menu">
    <svg xmlns="http://www.w3.org/2000/svg" class="absolute w-6 h-6 top-2 left-2" fill="none" viewBox="0 0 24 24"
      stroke="currentColor">
      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
    </svg>
  </button>

</nav>

</body>