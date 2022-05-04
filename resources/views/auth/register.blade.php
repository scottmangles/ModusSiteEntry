<x-guest-layout>
   
    <x-auth-validation-errors class="mb-4" :errors="$errors" />
     <div class="flex min-h-full">
       
       <div class="flex flex-col justify-center flex-1 px-4 py-12 sm:px-6 lg:flex-none lg:px-20 xl:px-24">
         <div class="w-full h-full max-w-sm mx-auto lg:w-96">
           <div>
            <x-application-logo />
             <h2 class="mt-2 text-3xl font-extrabold text-gray-900">Register New User</h2>
           </div>
     
           <div class="mt-2">
             <div class="mt-2">
               <form action="{{ route('register') }}" method="POST" class="space-y-6">
               @csrf
                 <!-- Name -->
                <div>
                    <x-label for="name" :value="__('Name')" />

                    <x-input id="name" class="block w-full mt-1" type="text" name="name" :value="old('name')" required autofocus />
                </div>

                  <!-- Email Address -->
                 <div class="mt-2">
                   <x-label for="email" :value="__('Email')" />
   
                   <x-input id="email" class="block w-full mt-1" type="email" name="email" :value="old('email')" required autofocus />
                 </div>

                 <!-- Mobile -->
                 <div class="mt-2">
                    <x-label for="mobile" :value="__('Mobile')" />
    
                    <x-input id="mobile" class="block w-full mt-1" type="tel" name="mobile" :value="old('vehicle_reg')" required autofocus />
                  </div>

                  <!-- Sub Contractor -->
                  <div class="mt-2">
                    <x-label for="sub_contractor" :value="__('Sub Contractor')" />
    
                    <x-contractor-select-box id="sub_contractor" class="block w-full mt-1" name="sub_contractor" :value="old('sub_contractor')" required autofocus></x-contractor-select-box>
                  </div>

                  <!-- Vehicle Make -->
                 <div class="mt-2">
                    <x-label for="vehicle_make" :value="__('Vehicle Make (optional)')" />
    
                    <x-input id="vehicle_make" class="block w-full mt-1" type="text" name="vehicle_make" :value="old('vehicle_make')" required autofocus />
                  </div>

                  <!-- Vehicle Reg -->
                 <div class="mt-2">
                    <x-label for="vehicle_reg" :value="__('Vehicle Reg (optional)')" />
    
                    <x-input id="vehicle_reg" class="block w-full mt-1" type="text" name="vehicle_reg" :value="old('vehicle_reg')" required autofocus />
                  </div>

                  <!-- Cscs number -->
                 <div class="mt-2">
                    <x-label for="cscs_number" :value="__('Cscs Card Number (optional)')" />
    
                    <x-input id="cscs_number" class="block w-full mt-1" type="text" name="cscs_number" :value="old('cscs_number')" required autofocus />
                  </div>

                 <!-- Password -->
                 <div class="mt-2">
                   <x-label for="password" :value="__('Password')" />
   
                   <x-input id="password" class="block w-full mt-1"
                            type="password"
                            name="password"
                            required autocomplete="current-password" />
                 </div>

                 <!-- Confirm Password -->
                <div class="mt-4 mb-6">
                    <x-label for="password_confirmation" :value="__('Confirm Password')" />

                    <x-input id="password_confirmation" class="block w-full mt-1"
                             type="password"
                             name="password_confirmation" required />
                </div>
   
                 <div  class="mt-5 mb-5">
                   <x-button>Register</x-button>
                 </div>
                 <div class="mt-5 mb-6">
                   <p>
                     Already have an account?
                     <a class="underline text-sm text-[#173a68] hover:text-blue-800" href="{{ route('login') }}">
                       {{ __(' Login') }}
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
         <img class="absolute inset-0" src="{{ URL::asset('images/logo-dark.png') }}" alt="">
       </div>
     </div>
   
   </x-guest-layout>