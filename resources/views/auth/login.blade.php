<x-guest-layout>
   
 <x-auth-validation-errors class="mb-4" :errors="$errors" />
  <div class="flex min-h-full">
    
    <div class="flex flex-col justify-center flex-1 px-4 py-12 sm:px-6 lg:flex-none lg:px-20 xl:px-24">
      <div class="w-full h-full max-w-sm mx-auto lg:w-96">
        <div class="mt-4">
          <img class="w-auto h-12" src="https://www.moduspartnerships.co.uk/assets/img/logo-dark.png" alt="Workflow">
          <h2 class="mt-6 text-5xl font-extrabold text-gray-900">Welcome back</h2>
          <h4 class="mt-6 text-xl font-extrabold text-gray-900">Sign in to your account</h4>
        </div>
  
        <div class="mt-8">
          <div class="mt-6">
            <form action="{{ route('login') }}" method="POST" class="space-y-6">
            @csrf
               <!-- Email Address -->
              <div class="mt-6">
                <x-label for="email" :value="__('Email')" />

                <x-input id="email" class="block w-full mt-1" type="email" name="email" :value="old('email')" required autofocus />
              </div>

              <!-- Password -->
              <div class="mt-6">
                <x-label for="password" :value="__('Password')" />

                <x-input id="password" class="block w-full mt-1"
                         type="password"
                         name="password"
                         required autocomplete="current-password" />
              </div>

              <div class="flex items-center justify-between">
                <!-- Remember Me -->
                <div class="block mt-6">
                    <label for="remember_me" class="inline-flex items-center">
                        <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-[#173a68] shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50" name="remember">
                        <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                    </label>
                </div>
                
              <div class="flex items-center justify-end mt-6">
                @if (Route::has('password.request'))
                  <a class="underline text-sm text-[#173a68] hover:text-blue-800" href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                  </a>
                @endif
              </div>
                
              </div>
  
              <div  class="mt-6 mb-6">
                <x-button>Sign in</x-button>
              </div>
              <div class="mt-5">
                <p>
                  Don't have an account?
                  <a class="underline text-sm text-[#173a68] hover:text-blue-800" href="{{ route('register') }}">
                    {{ __(' Create an account') }}
                  </a>
                </p>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
    <div class="relative flex-1 hidden w-0 lg:block">
      <img class="absolute inset-0 object-cover w-full h-full" src="https://www.moduspartnerships.co.uk/assets/img/slider/slider1a.jpg" alt="">
      <img class="absolute inset-0" src="https://www.moduspartnerships.co.uk/assets/img/logo-dark.png" alt="">
    </div>
  </div>

</x-guest-layout>