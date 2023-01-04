<x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label  for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Address -->
        <div class="mt-4">
            <x-input-label for="zipcode" :value="__('CEP')" />
            <x-text-input id="zipcode" x-data="" x-on:click="getZipcode()" type="text"  class="block mt-1 w-full"  name="zipcode" :value="old('zipcode')" required />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />

        </div>

        <div class="grid grid-cols-3 gap-4">
            <div class="mt-4 col-span-2">
                <x-input-label for="address_1" :value="__('Endereço')" />
                <x-text-input id="address_1" class="block mt-1 w-full" type="email" name="address_1" :value="old('address_1')" required />
                <x-input-error :messages="$errors->get('address_1')" class="mt-2" />
            </div>
            <div class="mt-4">
                <x-input-label for="number" :value="__('Nº')" />
                <x-text-input id="number" class="block mt-1 w-full" type="text" name="number" :value="old('number')" required />
                <x-input-error :messages="$errors->get('number')" class="mt-2" />
            </div>
        </div>

        <div class="mt-4">
            <x-input-label for="number" :value="__('Bairro')" />
            <x-text-input id="number" class="block mt-1 w-full" type="text" name="number" :value="old('number')" required />
            <x-input-error :messages="$errors->get('number')" class="mt-2" />
        </div>

        <div class="grid grid-cols-3 gap-4">
            <div class="mt-4">
                <x-input-label for="state" :value="__('Estado')" />
                <x-text-input id="state" class="block mt-1 w-full" type="text" name="state" disabled="true" :value="old('state')" required />
                <x-input-error :messages="$errors->get('state')" class="mt-2" />
            </div>
            <div class="mt-4 col-span-2">
                <x-input-label for="city" :value="__('Cidade')" />
                <x-text-input id="city" class="block mt-1 w-full" type="email" disabled="true" name="city" :value="old('city')" required />
                <x-input-error :messages="$errors->get('city')" class="mt-2" />
            </div>

        </div>
        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="ml-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>