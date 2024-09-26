<!-- Archivo generado por laravel para autenticacion de diferentes requerimientos de seguridad --><
x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- nombre -->
        <div>
            <x-input-label for="name" :value="__('Nombre')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Apellido -->
        <div class="mt-4">
            <x-input-label for="apellido" :value="__('Apellido')" />
            <x-text-input id="apellido" class="block mt-1 w-full" type="text" name="apellido" :value="old('apellido')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('apellido')" class="mt-2" />
        </div>

        
        <!-- Correo institucional -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Correo institucional')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Estrato -->
        <div class="mt-4">
            <x-input-label for="Estrato" :value="__('Estrato')" />
            <x-text-input id="estrato" class="block mt-1 w-full" type="text" name="estrato" :value="old('estrato')" />
            <x-input-error :messages="$errors->get('estrato')" class="mt-2" />
        </div>

         <!-- centro -->
         <div class="mt-4">
            <x-input-label for="centro" :value="__('Centro ')" />
            <select class="form-select" aria-label="Default select example" name='id_centros'>
                @foreach ($centros as $centro)
                    <option value="{{ $centro->id }}">{{ $centro->nombre }}</option>
                @endforeach
            </select>
        </div>
        
         <!-- regional -->
        <div class="mt-4">
            <x-input-label for="regional" :value="__('Regional')" />
            <x-text-input id="regional" class="block mt-1 w-full" type="text" name="regional" :value="old('regional')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('regional')" class="mt-2" />
        </div>

           <!-- tipo de documento -->
           <div class="mt-4">
            <x-input-label for="tp_documento" :value="__('Tipo de documento')" />
            <select class="form-select" aria-label="Default select example" name="tp_documento">
                <option value="tarjeta_identidad">Tarjeta de identidad</option>
                <option value="cédula_ciudadania">Cédula de Ciudadania</option>
                <option value="cedula_extranjera">Cedula extranjera</option>
              </select>
            <x-input-error :messages="$errors->get('regional')" class="mt-2" />
        </div>

         <!-- Documento -->
         <div class="mt-4">
            <x-input-label for="documento" :value="__('Documento')" />
            <x-text-input id="documento" class="block mt-1 w-full" type="number" name="documento" :value="old('documento')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('documento')" class="mt-2" />
        </div>


        <!-- Rol -->
        <div class="mt-4">
            <x-input-label for="centro" :value="__('Rol ')" />
            <select class="form-select" name="id_roles" id="id_roles" aria-label="Default select example">
                @foreach ($roles as $role)
                    <option value="{{ $role->id }}">{{ $role->rol }}</option>
                @endforeach
            </select>
        </div>

        <!-- contraseña -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>
        

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                            type="password"
                            name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                {{ __('Ya estás registrado?') }}
            </a>

            <x-primary-button class="ms-4">
                {{ __('Registrar') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
