
<div class="bg-cover " x-data="{ openMenu : false }"
:class="openMenu ? 'overflow-hidden' : 'overflow-visible' ">

<style>
[x-cloak] {
  display: none !important;
}
</style>

<div>
  <!-- Off-canvas menu for mobile, show/hide based on off-canvas menu state. -->
  <div class="fixed inset-0 z-40 flex md:hidden" role="dialog" :class="openMenu ? 'visible' : 'invisible' " x-cloak>
    <!--
      Off-canvas menu overlay, show/hide based on off-canvas menu state.
    -->
    <div class="fixed inset-0 bg-gray-600 bg-opacity-75" aria-hidden="true"></div>

    <!--
      Off-canvas menu, show/hide based on off-canvas menu state.
    -->
    <div class="relative flex flex-col flex-1 w-full max-w-xs bg-gray-800">
      
      
      
      
    <!--
        Close button, show/hide based on off-canvas menu state.
      -->
      <div class="absolute top-0 right-0 pt-2 -mr-12">
        <button type="button" class="flex items-center justify-center w-10 h-10 ml-1 rounded-full focus:outline-none focus:ring-2 focus:ring-inset focus:ring-white" @click="openMenu = !openMenu" :aria-expanded="openMenu">
          <span class="sr-only">Close sidebar</span>
          <!-- Heroicon name: outline/x -->
          <svg class="w-6 h-6 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
          </svg>
        </button>
      </div>

      <div class="flex-1 h-0 pt-5 pb-4 overflow-y-auto">
        <div class="flex items-center flex-shrink-0 px-4">
          <x-application-logo/>
          <h1 class="ml-2 text-xl font-bold text-white">Site Management</h1>
        </div>
        <nav class="flex-1 px-2 mt-5 space-y-1">
          <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
          <a href="{{ route('dashboard') }}" class="flex items-center px-2 py-2 text-sm font-medium text-white bg-gray-900 rounded-md group">
            <!--
              Heroicon name: outline/home
            -->
            <svg class="flex-shrink-0 w-6 h-6 mr-3 text-gray-300" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
            </svg>
            Dashboard
          </a>

          @if(Auth::user()->role == 'site_manager')
            <a href="{{ route('sites.show', [Auth::user()->siteManager->id]) }}" class="flex items-center px-2 py-2 text-sm font-medium text-gray-300 rounded-md hover:bg-gray-700 hover:text-white group">
              <!-- Heroicon name: office building -->
              <svg class="flex-shrink-0 w-6 h-6 mr-3 text-gray-400 group-hover:text-gray-300" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
              </svg>
              {{ Auth::user()->siteManager->name }} site
            </a>

          <a href="{{ route('site_inductions.index') }}" class="flex items-center px-2 py-2 text-sm font-medium text-gray-300 rounded-md hover:bg-gray-700 hover:text-white group">
            <svg class="flex-shrink-0 w-6 h-6 mr-3 text-gray-400 group-hover:text-gray-300" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
            </svg>
            Unassigned users
          </a>

          <a href="{{ route('showUsersAccess', [Auth::user()->siteManager->id]) }}" class="flex items-center px-2 py-2 text-sm font-medium text-gray-300 rounded-md hover:bg-gray-700 hover:text-white group">
            <svg class="flex-shrink-0 w-6 h-6 mr-3 text-gray-400 group-hover:text-gray-300" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
            </svg>
            Users with access
          </a>

          <a href="{{ route('showUsersBanned', [Auth::user()->siteManager->id]) }}" class="flex items-center px-2 py-2 text-sm font-medium text-gray-300 rounded-md hover:bg-gray-700 hover:text-white group">
            <svg class="flex-shrink-0 w-6 h-6 mr-3 text-gray-400 group-hover:text-gray-300" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
            </svg>
            Banned users
          </a>
          @endif

          @if(Auth::user()->role == 'admin')

          <a href="{{ route('users.index') }}" class="flex items-center px-2 py-2 text-sm font-medium text-gray-300 rounded-md hover:bg-gray-700 hover:text-white group">
            <svg class="flex-shrink-0 w-6 h-6 mr-3 text-gray-400 group-hover:text-gray-300" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
            </svg>
            Users
          </a>

          <a href="{{ route('contractors.index') }}" class="flex items-center px-2 py-2 text-sm font-medium text-gray-300 rounded-md hover:bg-gray-700 hover:text-white group">
            <!-- Heroicon name: outline/users -->
            <svg class="flex-shrink-0 w-6 h-6 mr-3 text-gray-400 group-hover:text-gray-300" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
            </svg>
            Contractors
          </a>

          <a href="{{ route('sites.index') }}" class="flex items-center px-2 py-2 text-sm font-medium text-gray-300 rounded-md hover:bg-gray-700 hover:text-white group">
            <!-- Heroicon name: office building -->
            <svg class="flex-shrink-0 w-6 h-6 mr-3 text-gray-400 group-hover:text-gray-300" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
            </svg>
            Sites
          </a>
{{--  
          <a href="#" class="flex items-center px-2 py-2 text-sm font-medium text-gray-300 rounded-md hover:bg-gray-700 hover:text-white group">
            <!-- Heroicon name: document-text -->
            <svg class="flex-shrink-0 w-6 h-6 mr-3 text-gray-400 group-hover:text-gray-300" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
            </svg>
            Site Induction
          </a>
--}}
          <a href="#" class="flex items-center px-2 py-2 text-sm font-medium text-gray-300 rounded-md hover:bg-gray-700 hover:text-white group">
            <!-- Heroicon name: box -->
            <svg class="flex-shrink-0 w-6 h-6 mr-3 text-gray-400 group-hover:text-gray-300" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 3a2 2 0 100 4h12a2 2 0 100-4H4z" />
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" fill-rule="evenodd" d="M3 8h14v7a2 2 0 01-2 2H5a2 2 0 01-2-2V8zm5 3a1 1 0 011-1h2a1 1 0 110 2H9a1 1 0 01-1-1z" clip-rule="evenodd" />
            </svg>
            Toolbox Talks
          </a>


          <a href="#" class="flex items-center px-2 py-2 text-sm font-medium text-gray-300 rounded-md hover:bg-gray-700 hover:text-white group">
            <!-- Heroicon name: outline/chart-bar -->
            <svg class="flex-shrink-0 w-6 h-6 mr-3 text-gray-400 group-hover:text-gray-300" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
            </svg>
            Reports
          </a>
          @endif
          
          <form method="POST" action="{{ route('logout') }}">
            @csrf
          <a href="#" class="flex items-center px-2 py-2 text-sm font-medium text-gray-300 rounded-md hover:bg-gray-700 hover:text-white group"  onclick="event.preventDefault();
          this.closest('form').submit();">
            <!-- Heroicon name: logout -->
            <svg class="flex-shrink-0 w-6 h-6 mr-3 text-gray-400 group-hover:text-gray-300" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
            </svg>
            Logout
          </a>
        </form>

        </nav>
      </div>
      <div class="flex flex-shrink-0 p-4 bg-gray-700">
        <a href="#" class="flex-shrink-0 block group">
          <div class="flex items-center">
            <div class="ml-3">
              <p class="text-base font-medium text-white">{{ Auth::user()->name }}</p>
              <a href="{{ route('users.edit', [Auth::user()->id]) }}"><p class="text-xs font-medium text-gray-300 group-hover:text-gray-200">View profile</p></a>
            </div>
          </div>
        </a>
      </div>
    </div>

    <div class="flex-shrink-0 w-14">
      <!-- Force sidebar to shrink to fit close icon -->
    </div>
  </div>

  <!-- Static sidebar for desktop -->
  <div class="hidden md:flex md:w-64 md:flex-col md:fixed md:inset-y-0">
    <!-- Sidebar component, swap this element with another sidebar if you like -->
    <div class="flex flex-col flex-1 min-h-0 bg-gray-800">
      <div class="flex flex-col flex-1 pt-5 pb-4 overflow-y-auto">
        <div class="flex items-center flex-shrink-0 px-4">
          <x-application-logo/>
          <h1 class="ml-2 text-xl font-bold text-white">Site Management</h1>
        </div>
        <nav class="flex-1 px-2 mt-5 space-y-1">
          <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
          <a href="{{ route('dashboard') }}" class="flex items-center px-2 py-2 text-sm font-medium text-white bg-gray-900 rounded-md group">
            <!--
              Heroicon name: outline/home
            -->
            <svg class="flex-shrink-0 w-6 h-6 mr-3 text-gray-300" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
            </svg>
            Dashboard
          </a>

          @if(Auth::user()->role == 'site_manager')
          <a href="{{ route('sites.show', [Auth::user()->siteManager->id]) }}" class="flex items-center px-2 py-2 text-sm font-medium text-gray-300 rounded-md hover:bg-gray-700 hover:text-white group">
            <!-- Heroicon name: office building -->
            <svg class="flex-shrink-0 w-6 h-6 mr-3 text-gray-400 group-hover:text-gray-300" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
            </svg>
            {{ Auth::user()->siteManager->name }} site
          </a>

          <a href="{{ route('site_inductions.index') }}" class="flex items-center px-2 py-2 text-sm font-medium text-gray-300 rounded-md hover:bg-gray-700 hover:text-white group">
            <svg class="flex-shrink-0 w-6 h-6 mr-3 text-gray-400 group-hover:text-gray-300" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
            </svg>
            Unassigned users
          </a>

          <a href="{{ route('showUsersAccess', [Auth::user()->siteManager->id]) }}" class="flex items-center px-2 py-2 text-sm font-medium text-gray-300 rounded-md hover:bg-gray-700 hover:text-white group">
            <svg class="flex-shrink-0 w-6 h-6 mr-3 text-gray-400 group-hover:text-gray-300" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
            </svg>
            Users with access
          </a>

          <a href="{{ route('showUsersBanned', [Auth::user()->siteManager->id]) }}" class="flex items-center px-2 py-2 text-sm font-medium text-gray-300 rounded-md hover:bg-gray-700 hover:text-white group">
            <svg class="flex-shrink-0 w-6 h-6 mr-3 text-gray-400 group-hover:text-gray-300" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
            </svg>
            Banned users
          </a>
        @endif

          @if(Auth::user()->role == 'admin')

          <a href="{{ route('users.index') }}" class="flex items-center px-2 py-2 text-sm font-medium text-gray-300 rounded-md hover:bg-gray-700 hover:text-white group">
            <svg class="flex-shrink-0 w-6 h-6 mr-3 text-gray-400 group-hover:text-gray-300" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
            </svg>
            Users
          </a>

          <a href="{{ route('contractors.index') }}" class="flex items-center px-2 py-2 text-sm font-medium text-gray-300 rounded-md hover:bg-gray-700 hover:text-white group">
            <!-- Heroicon name: outline/users -->
            <svg class="flex-shrink-0 w-6 h-6 mr-3 text-gray-400 group-hover:text-gray-300" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
            </svg>
            Contractors
          </a>

          <a href="{{ route('sites.index') }}" class="flex items-center px-2 py-2 text-sm font-medium text-gray-300 rounded-md hover:bg-gray-700 hover:text-white group">
            <!-- Heroicon name: office building -->
            <svg class="flex-shrink-0 w-6 h-6 mr-3 text-gray-400 group-hover:text-gray-300" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
            </svg>
            Sites
          </a>
{{--  
          <a href="#" class="flex items-center px-2 py-2 text-sm font-medium text-gray-300 rounded-md hover:bg-gray-700 hover:text-white group">
            <!-- Heroicon name: document-text -->
            <svg class="flex-shrink-0 w-6 h-6 mr-3 text-gray-400 group-hover:text-gray-300" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
            </svg>
            Site Induction
          </a>
        --}}
          <a href="#" class="flex items-center px-2 py-2 text-sm font-medium text-gray-300 rounded-md hover:bg-gray-700 hover:text-white group">
            <!-- Heroicon name: box -->
            <svg class="flex-shrink-0 w-6 h-6 mr-3 text-gray-400 group-hover:text-gray-300" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 3a2 2 0 100 4h12a2 2 0 100-4H4z" />
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" fill-rule="evenodd" d="M3 8h14v7a2 2 0 01-2 2H5a2 2 0 01-2-2V8zm5 3a1 1 0 011-1h2a1 1 0 110 2H9a1 1 0 01-1-1z" clip-rule="evenodd" />
            </svg>
            Toolbox Talks
          </a>

          <a href="#" class="flex items-center px-2 py-2 text-sm font-medium text-gray-300 rounded-md hover:bg-gray-700 hover:text-white group">
            <!-- Heroicon name: outline/chart-bar -->
            <svg class="flex-shrink-0 w-6 h-6 mr-3 text-gray-400 group-hover:text-gray-300" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
            </svg>
            Reports
          </a>

          @endif

          <form method="POST" action="{{ route('logout') }}">
            @csrf
          <a href="#" class="flex items-center px-2 py-2 text-sm font-medium text-gray-300 rounded-md hover:bg-gray-700 hover:text-white group"  onclick="event.preventDefault();
          this.closest('form').submit();">
            <!-- Heroicon name: outline/chart-bar -->
            
            <svg class="flex-shrink-0 w-6 h-6 mr-3 text-gray-400 group-hover:text-gray-300" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
            </svg>
            Logout
          </a>
        </form>

        
        </i>
        </nav>
      </div>
      <div class="flex flex-shrink-0 p-4 bg-gray-700">
          <div class="flex items-center">
            
            <div class="ml-3">
              <p class="text-sm font-medium text-white">{{ Auth::user()->name }}</p>
              <a href="{{ route('users.edit', [Auth::user()->id]) }}"><p class="text-xs font-medium text-gray-300 group-hover:text-gray-200">View profile</p></a>
            </div>
          </div>
      </div>
    </div>
  </div>
  <div class="flex flex-col flex-1 md:pl-64">
    <div class="sticky top-0 z-10 pt-1 pl-1 bg-gray-100 md:hidden sm:pl-3 sm:pt-3">
      <button type="button" class="-ml-0.5 -mt-0.5 h-12 w-12 inline-flex items-center justify-center rounded-md text-gray-500 hover:text-gray-900 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-indigo-500" @click="openMenu = !openMenu"
      :aria-expanded="openMenu">
        <span class="sr-only">Open sidebar</span>
        <!-- Mobile Menu Toggle -->
        <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
        </svg>
      </button>
    </div>
    <main class="flex-1">
      <div class="py-6">
        <div class="px-4 mx-auto max-w-7xl sm:px-6 lg:px-8">
          <h1 class="text-2xl font-semibold text-gray-900">{{ $header ?? '' }}</h1>
        </div>
        <div class="px-4 mx-auto max-w-7xl sm:px-6 md:px-8">
           <!-- Page Content -->
           <main>
             <!-- Validation Errors -->
             <x-auth-validation-errors class="mb-4" :errors="$errors" />
            <!-- Success and warning message -->
            <x-alert/>
                {{ $slot }}
         
          </main>
          <!-- End page content -->
        </div>
      </div>
    </main>
  </div>
</div>
