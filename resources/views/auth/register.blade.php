<x-guest-layout>
    <div class="auth-card">
        <div class="auth-card-header">
            <img src="{{ asset('logo.png') }}" alt="SellPoint" />
            <h1>Create your account</h1>
            <p>Join thousands of buyers and sellers across Nigeria</p>
        </div>

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <div class="form-group">
                <label for="full_name">Full Name</label>
                <div class="input-wrap">
                    <span class="input-icon">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M20 21v-2a4 4 0 00-4-4H8a4 4 0 00-4 4v2"/><circle cx="12" cy="7" r="4"/></svg>
                    </span>
                    <input type="text" name="full_name" id="full_name" value="{{ old('full_name') }}" placeholder="e.g. Chukwuemeka Obi" required autofocus />
                </div>
                @error('name') <p class="field-hint error">{{ $message }}</p> @enderror
            </div>

            <div class="form-group">
                <label for="phone">Phone Number</label>
                <div class="phone-wrap">
                    <div class="phone-prefix">
                        <img src="{{ asset('img/ng-flag.png') }}" alt="NG"> +234
                    </div>
                    <div class="input-wrap">
                        <input type="tel" name="phone" id="phone" value="{{ old('phone') }}" placeholder="0801 234 5678" maxlength="11" required />
                    </div>
                </div>
                @error('phone') <p class="field-hint error">{{ $message }}</p> @enderror
            </div>

            <div class="form-group">
                <label for="email">Email Address</label>
                <div class="input-wrap">
                    <span class="input-icon">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/><polyline points="22,6 12,13 2,6"/></svg>
                    </span>
                    <input type="email" name="email" id="email" value="{{ old('email') }}" placeholder="you@example.com" required />
                </div>
                @error('email') <p class="field-hint error">{{ $message }}</p> @enderror
            </div>

            <div class="form-group">
                <label for="password">Password</label>
                <div class="input-wrap">
                    <span class="input-icon">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="11" width="18" height="11" rx="2" ry="2"/><path d="M7 11V7a5 5 0 0110 0v4"/></svg>
                    </span>
                    <input type="password" name="password" id="password" placeholder="Create a strong password" required />
                    <button type="button" class="toggle-pw" data-target="password">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/><circle cx="12" cy="12" r="3"/></svg>
                    </button>
                </div>
                <div class="strength-wrap">
                    <div class="strength-bars"><div class="strength-bar"></div><div class="strength-bar"></div><div class="strength-bar"></div><div class="strength-bar"></div></div>
                </div>
                @error('password') <p class="field-hint error">{{ $message }}</p> @enderror
            </div>

            <div class="form-group">
                <label for="password_confirmation">Repeat Password</label>
                <div class="input-wrap">
                    <span class="input-icon">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/></svg>
                    </span>
                    <input type="password" name="password_confirmation" id="password_confirmation" placeholder="Repeat your password" required />
                </div>
            </div>

            <button type="submit" class="btn-submit">Create Account</button>
        </form>

        <div class="divider">or sign up with</div>
        <button class="btn-google">
            Continue with Google
        </button>

        <div class="auth-footer">
            Already have an account? <a href="{{ route('login') }}">Sign in</a>
        </div>

        <p class="terms">
            By creating an account you agree to our <a href="#">Terms</a> and <a href="#">Privacy</a>.
        </p>
    </div>
</x-guest-layout>