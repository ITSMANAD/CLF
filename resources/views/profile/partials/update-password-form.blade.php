<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('تغییر رمز عبور') }}
        </h2>
    </header>

    <form method="post" action="{{ route('password.update') }}" class="mt-6 space-y-6">
        @csrf
        @method('put')

        <div>
            <x-input-label for="current_password" :value="__('رمز عبور فعلی')" />
            <x-text-input id="current_password" name="current_password" type="password" class="input-field text-end" autocomplete="current-password" />
            <x-input-error :messages="$errors->updatePassword->get('current_password')" class="mt-2" />
        </div>

        <div>
            <x-input-label for="password" :value="__('رمز عبور جدید')" />
            <x-text-input id="password" name="password" type="password" class="input-field text-end" autocomplete="new-password" />
            <x-input-error :messages="$errors->updatePassword->get('password')" class="mt-2" />
        </div>

        <div>
            <x-input-label for="password_confirmation" :value="__('تکرار رمز عبور')" />
            <x-text-input id="password_confirmation" name="password_confirmation" type="password" class="input-field text-end" autocomplete="new-password" />
            <x-input-error :messages="$errors->updatePassword->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center gap-4">
            <button type="submit" class="btn btn-primary fs-6 mt-1">{{ __('ذخیره اطلاعات') }}</button>

            @if (session('status') === 'password-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-success"
                >{{ __('ذخیره شد!') }}</p>
            @endif
        </div>
    </form>
</section>
