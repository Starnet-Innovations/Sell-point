<x-guest-layout>
    <div class="min-h-[60vh] flex flex-col sm:justify-center items-center pt-6 sm:pt-0">
        <div class="w-full sm:max-w-md mt-6 px-6 py-8 bg-white shadow-md overflow-hidden sm:rounded-lg border border-gray-100">
            
            <h2 class="text-2xl font-bold text-gray-800 mb-4">Verify your email</h2>

            <div class="mb-6 text-sm text-gray-600 leading-relaxed">
                {{ __('Thanks for signing up! Before getting started, could you verify your email address by clicking on the link we just emailed to you? If you didn\'t receive the email, we will gladly send you another.') }}
            </div>

            @if (session('status') == 'verification-link-sent')
                <div class="mb-4 font-medium text-sm text-green-600 bg-green-50 p-3 rounded-md">
                    {{ __('A new verification link has been sent to the email address you provided during registration.') }}
                </div>
            @endif

            <div class="mt-8 flex flex-col space-y-4">
                <form method="POST" action="{{ route('verification.send') }}">
                    @csrf
                    <div>
                        <x-primary-button class="w-full justify-center py-3">
                            {{ __('Resend Verification Email') }}
                        </x-primary-button>
                    </div>
                </form>

                <form method="POST" action="{{ route('logout') }}" class="text-center">
                    @csrf
                    <button type="submit" class="underline text-sm text-gray-500 hover:text-gray-900 transition duration-150 ease-in-out">
                        {{ __('Log Out') }}
                    </button>
                </form>
            </div>
        </div>
    </div>
</x-guest-layout>