<x-guest-layout>
    <div class="auth-card">
        <div class="auth-card-header">
            <img src="{{ asset('logo.png') }}" alt="SellPoint" style="height: 64px; margin-bottom: 16px;" />
            <h1>Welcome back</h1>
            <p>Sign in to your SellPoint account</p>
        </div>

        @if ($errors->any())
            <div class="error-banner">
                <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"/><line x1="12" y1="8" x2="12" y2="12"/><line x1="12" y1="16" x2="12.01" y2="16"/></svg>
                <span>Invalid credentials provided.</span>
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div class="form-group">
                <label for="phone">Phone Number</label>
                <div class="phone-wrap">
                    <div class="phone-prefix">
                        <svg width="20" height="14" viewBox="0 0 20 14" fill="none"><rect width="20" height="14" rx="2" fill="#008751"/><rect x="6.67" width="6.67" height="14" fill="#fff"/></svg>
                        +234
                    </div>
                    <div class="input-wrap">
                        <span class="input-icon">
                            <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M22 16.92v3a2 2 0 01-2.18 2 19.79 19.79 0 01-8.63-3.07A19.5 19.5 0 013.07 9.81a19.79 19.79 0 01-3.07-8.68A2 2 0 012 .99h3a2 2 0 012 1.72c.127.96.361 1.903.7 2.81a2 2 0 01-.45 2.11L6.09 8.91a16 16 0 006 6l1.27-1.27a2 2 0 012.11-.45c.907.339 1.85.573 2.81.7A2 2 0 0122 16.92z"/></svg>
                        </span>
                        <input type="email" name="email" id="email" value="{{ old('email') }}" required autofocus placeholder="0801 234 5678" />
                    </div>
                </div>
                @error('email') <p class="field-hint error">{{ $message }}</p> @enderror
            </div>

            <div class="form-group">
                <label for="password">Password</label>
                <div class="input-wrap">
                    <span class="input-icon">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="11" width="18" height="11" rx="2" ry="2"/><path d="M7 11V7a5 5 0 0110 0v4"/></svg>
                    </span>
                    <input type="password" name="password" id="password" required placeholder="Enter your password" />
                </div>
                @error('password') <p class="field-hint error">{{ $message }}</p> @enderror
            </div>

            <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px;">
                <label style="display: flex; align-items: center; gap: 5px; font-weight: normal;">
                    <input type="checkbox" name="remember"> <span style="font-size: 0.8rem;">Remember me</span>
                </label>
                @if (Route::has('password.request'))
                    <a href="{{ route('password.request') }}" style="font-size: 0.78rem; color: var(--green); text-decoration: none; font-weight: 600;">Forgot password?</a>
                @endif
            </div>

            <button type="submit" class="btn-submit">Sign In</button>
        </form>

        <div style="text-align: center; margin-top: 24px; font-size: 0.83rem; color: var(--muted);">
            Don't have an account? <a href="{{ route('register') }}" style="color: var(--green); font-weight: 700; text-decoration: none;">Create one</a>
        </div>
    </div>
</x-guest-layout>