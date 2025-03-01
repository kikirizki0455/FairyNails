<section>
    <header>
        <h2 class="text-lg font-medium text-white ">
            {{ __('Profile Information') }}
        </h2>
        <p class="mt-1 text-sm text-white ">
            {{ __("Update your account's profile information and email address.") }}
        </p>
    </header>
    <div class="mt-4 p-4 rounded-lg text-white relative overflow-hidden transition-transform duration-300 hover:scale-[1.02]
    @php
switch($user->level) {
            case 'bronze': 
                echo 'bg-gradient-to-br from-[#cd7f32] to-[#8b4513] border-4 border-[#8b4513] shadow-lg shadow-[#8b4513]/30';
                break;
            case 'silver': 
                echo 'bg-gradient-to-br from-[#c0c0c0] to-[#808080] border-4 border-[#d3d3d3] shadow-lg shadow-[#d3d3d3]/30';
                break;
            case 'gold': 
                echo 'bg-gradient-to-br from-[#ffd700] to-[#daa520] border-4 border-[#ffd700] shadow-lg shadow-[#ffd700]/30';
                break;
            case 'platinum': 
            echo 'bg-gradient-to-br from-[#e5e4e2] via-[#a2a3a3] to-[#b9b9b9] border-4 border-[#8fd8ff] shadow-lg shadow-[#8fd8ff]/30 animate-platinum-glow';
            break;
        } @endphp"
        style="@if ($user->level === 'bronze') border-image: linear-gradient(to right, #8b4513, #cd7f32) 1;
           @elseif($user->level === 'silver') border-image: linear-gradient(45deg, #c0c0c0, #ffffff) 1;
           @elseif($user->level === 'gold') border-image: linear-gradient(to right, #daa520, #ffd700) 1;
           @elseif($user->level === 'platinum') background-size: 200% 200% animation: platinumShine 3s linear infinite border-image: linear-gradient(45deg, #e5e4e2, #8fd8ff) 1; @endif">
        @if ($user->level === 'platinum')
            <div class="absolute inset-0 overflow-hidden">
                <div class="absolute -inset-12 animate-platinum-shine">
                    <div
                        class="absolute inset-0 bg-gradient-to-r from-transparent via-white/30 to-transparent transform -skew-x-12">
                    </div>
                </div>
            </div>
        @endif
        <!-- Konten tetap sama -->
        <h3 class="text-lg font-semibold text-gray-100">Status Akun</h3>
        <p class="mt-2 text-sm">
            Level: <span class="font-bold text-gray-100">{{ $user->level }}</span>
        </p>
        <p class="text-sm">
            EXP: <span class="font-bold text-gray-100">{{ $user->exp }}</span>
        </p>
        <p class="text-sm">
            Points: <span class="font-bold text-gray-100">{{ $user->points }}</span>
        </p>

        <!-- Efek khusus untuk setiap level -->
        <div class="absolute inset-0 pointer-events-none">
            @if ($user->level === 'bronze')
                <div
                    class="absolute inset-0 bg-[url('https://www.transparenttextures.com/patterns/wood-pattern.png')] opacity-20">
                </div>
            @elseif($user->level === 'silver')
                <div
                    class="absolute inset-0 bg-[url('https://www.transparenttextures.com/patterns/diamond-upholstery.png')] opacity-15">
                </div>
            @elseif($user->level === 'gold')
                <div
                    class="absolute inset-0 bg-[url('https://www.transparenttextures.com/patterns/gold-scale.png')] opacity-20">
                </div>
            @elseif($user->level === 'platinum')
                <div
                    class="absolute inset-0 bg-[url('https://www.transparenttextures.com/patterns/diamond-eye.png')] opacity-15">
                </div>
            @endif
        </div>

        <!-- Efek kilauan -->
        <div
            class="absolute top-0 right-0 w-44 h-full bg-gradient-to-r from-transparent via-white/20 to-transparent opacity-30 transform skew-x-12">
        </div>
    </div>



    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('profile.update') }}" class="mt-6 space-y-6">
        @csrf
        @method('patch')

        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" :value="old('name', $user->name)"
                required autofocus autocomplete="name" />
            <x-input-error class="mt-2" :messages="$errors->get('name')" />
        </div>

        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" name="email" type="email" class="mt-1 block w-full" :value="old('email', $user->email)"
                required autocomplete="username" />
            <x-input-error class="mt-2" :messages="$errors->get('email')" />

            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && !$user->hasVerifiedEmail())
                <div>
                    <p class="text-sm mt-2 text-gray-800 dark:text-gray-200">
                        {{ __('Your email address is unverified.') }}

                        <button form="send-verification"
                            class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800">
                            {{ __('Click here to re-send the verification email.') }}
                        </button>
                    </p>

                    @if (session('status') === 'verification-link-sent')
                        <p class="mt-2 font-medium text-sm text-green-600 dark:text-green-400">
                            {{ __('A new verification link has been sent to your email address.') }}
                        </p>
                    @endif
                </div>
            @endif
        </div>
        <div>
            <x-input-label for="phone" :value="__('phone')" />
            <x-text-input id="phone" name="phone" type="text" class="mt-1 block w-full" :value="old('phone', $user->phone ?? '')"
                required autofocus autocomplete="phone" />
            <x-input-error class="mt-2" :messages="$errors->get('phone')" />
        </div>
        <div>
            <x-input-label for="addres" :value="__('Address')" />
            <x-text-input id="address" address="address" type="text" class="mt-1 block w-full" :value="old('address', $user->address)"
                required autofocus autocomplete="address" />
            <x-input-error class="mt-2" :messages="$errors->get('address')" />
        </div>
        <div>
            <x-input-label for="birthdate" :value="__('Birthdate')" />
            <x-text-input id="birthdate" birthdate="birthdate" type="date" class="mt-1 block w-full"
                :value="old('birthdate', $user->birthdate)" required autofocus autocomplete="birthdate" />
            <x-input-error class="mt-2" :messages="$errors->get('name')" />
        </div>
        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Save') }}</x-primary-button>

            @if (session('status') === 'profile-updated')
                <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-gray-600 dark:text-gray-400">{{ __('Saved.') }}</p>
            @endif
        </div>
    </form>
    <style>
        @keyframes platinumShine {
            0% {
                background-position: 0% 50%;
            }

            50% {
                background-position: 100% 50%;
            }

            100% {
                background-position: 0% 50%;
            }
        }

        @keyframes platinumShineOverlay {
            0% {
                transform: translateX(-100%) skewX(-15deg);
            }

            100% {
                transform: translateX(200%) skewX(-15deg);
            }
        }

        .animate-platinum-shine {
            animation: platinumShineOverlay 3s infinite;
        }
    </style>
</section>
