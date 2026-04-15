<!-- ── NAVBAR ── -->
<nav>
  <a class="nav-logo" href="#">
    <img src="{{ asset('img/logo.png') }}" alt="SellPoint" />
    <span class="nav-logo-name">Sell<span>Point</span></span>
  </a>

  <ul class="nav-links">
    <li><a href="#">Discover</a></li>
    <li><a href="#">Explore</a></li>
    <li class="dropdown">
        <span><a href="categories.html">Categories</a></span>
      <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M6 9l6 6 6-6"/></svg>
    </li>
  </ul>

  <div class="nav-right">
    <svg class="nav-search-icon" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="11" cy="11" r="8"/><path d="M21 21l-4.35-4.35"/></svg>
    <a href="login.html"><button class="btn-login">Login</button></a>
    <a href="signup.html"><button class="btn-post">Post Ad</button></a>
  </div>
</nav>