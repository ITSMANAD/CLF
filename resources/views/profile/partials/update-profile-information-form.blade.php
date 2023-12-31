<section>
    <header>


        <p class="mt-1 text-sm text-gray-600">
            {{ __("ویرایش اطلاعات حساب کاربری") }}
        </p>
    </header>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('profile.update') }}" class="mt-6 space-y-6">
        @csrf
        @method('patch')

        <div>
            <x-input-label for="name" :value="__('نام و نام خانوادگی')" />
            <x-text-input id="name" name="name" type="text" class="input-field text-end" :value="old('name', $user->name)" required autofocus autocomplete="name" />
            <x-input-error class="mt-2" :messages="$errors->get('name')" />
        </div>
        <div>
            <x-input-label for="address" :value="__('آدرس دقیق')" />
            <x-text-input id="address" name="address" type="text" class="input-field text-end" :value="old('name', $user->address)" required autofocus autocomplete="name" />
            <x-input-error class="mt-2" :messages="$errors->get('address')" />
        </div>
        <div>
            <x-input-label for="postalcode" :value="__('کد پستی')" />
            <x-text-input id="postalcode" name="postalcode" type="text" class="input-field text-end" :value="old('name', $user->postalcode)" required autofocus autocomplete="name" />
            <x-input-error class="mt-2" :messages="$errors->get('postalcode')" />
        </div>
        <div>
            <x-input-label for="phone" :value="__('شماره همراه')" />
            <x-text-input id="phone" name="phone" type="text" class="input-field text-end" :value="old('name', $user->phone)" required autofocus autocomplete="name" />
            <x-input-error class="mt-2" :messages="$errors->get('name')" />
        </div>
        <div>
            <x-input-label for="email" :value="__('ایمیل')" />
            <x-text-input id="email" name="email" type="email" class="input-field text-end" :value="old('email', $user->email)" required autocomplete="username" />
            <x-input-error class="mt-2" :messages="$errors->get('email')" />

            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                <div>
                    <p class="text-sm mt-2 text-gray-800">
                        {{ __('Your email address is unverified.') }}

                        <button form="send-verification" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            {{ __('Click here to re-send the verification email.') }}
                        </button>
                    </p>

                    @if (session('status') === 'verification-link-sent')
                        <p class="mt-2 font-medium text-sm text-green-600">
                            {{ __('A new verification link has been sent to your email address.') }}
                        </p>
                    @endif
                </div>
            @endif
        </div>

        <div class="flex items-center gap-4">
            <button type="submit" class="btn btn-primary pt-2 fs-6 fw-bold">{{ __('ثبت اطلاعات') }}</button>

            @if (session('status') === 'profile-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-success"
                >{{ __('ذخیره شد.') }}</p>
            @endif
        </div>
    </form>
</section>
