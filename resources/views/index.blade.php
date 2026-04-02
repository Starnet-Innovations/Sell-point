<x-layout.layout title="SellPoint - Home">

    <!-- ── HERO ── -->
<section class="hero">
  <div class="blob blob-1"></div>
  <div class="blob blob-2"></div>
  <div class="blob blob-3"></div>

  <h1>Your <span>Premium</span> Classified Ads Platform</h1>
  <p>Buy, sell and discover amazing deals in your neighbourhood — fast, easy, and free.</p>

  <div class="search-bar">
    <select>
      <option>All Categories</option>
      <option>Cars</option>
      <option>Properties</option>
      <option>Electronics</option>
      <option>Fashion</option>
      <option>Jobs</option>
      <option>Animals</option>
    </select>
    <div class="search-divider"></div>
    <select>
      <option>New &amp; Used</option>
      <option>New</option>
      <option>Used</option>
    </select>
    <div class="search-divider"></div>
    <input type="text" placeholder="What are you looking for?" />
    <button class="btn-featured">
      <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" style="margin-right:6px;vertical-align:middle"><circle cx="11" cy="11" r="8"/><path d="M21 21l-4.35-4.35"/></svg>
      Search
    </button>
  </div>
</section>

<!-- ── CATEGORY NAV BAR ── -->
<div class="cat-nav">
  <span class="cat-nav-label">Browse SellPoint</span>

  <a class="cat-nav-item active" href="#">
    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><path d="M5 17H3a2 2 0 01-2-2V5a2 2 0 012-2h11a2 2 0 012 2v3"/><rect x="9" y="11" width="14" height="10" rx="2"/><circle cx="12" cy="19" r="1"/><circle cx="20" cy="19" r="1"/></svg>
    Cars
  </a>
  <a class="cat-nav-item" href="#">
    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><path d="M3 9l9-7 9 7v11a2 2 0 01-2 2H5a2 2 0 01-2-2z"/><polyline points="9 22 9 12 15 12 15 22"/></svg>
    Properties
  </a>
  <a class="cat-nav-item" href="#">
    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0118 0z"/><circle cx="12" cy="10" r="3"/></svg>
    Location
  </a>
  <a class="cat-nav-item" href="#">
    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><rect x="2" y="3" width="20" height="14" rx="2"/><path d="M8 21h8M12 17v4"/></svg>
    Electronics
  </a>
  <a class="cat-nav-item" href="#">
    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><path d="M20.38 3.46L16 2a4 4 0 01-8 0L3.62 3.46a2 2 0 00-1.34 2.23l.58 3.57a1 1 0 00.99.84H7v10a2 2 0 002 2h6a2 2 0 002-2V10h3.15a1 1 0 00.99-.84l.58-3.57a2 2 0 00-1.34-2.23z"/></svg>
    Fashion
  </a>
  <a class="cat-nav-item" href="#">
    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><path d="M17 21v-2a4 4 0 00-4-4H5a4 4 0 00-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 00-3-3.87M16 3.13a4 4 0 010 7.75"/></svg>
    Jobs
  </a>
</div>

<!-- ── BROWSE BY CATEGORY ── -->
<div class="browse-section">
  <div class="browse-pills">
    <span style="font-weight:600;font-size:.9rem;color:var(--text);margin-right:4px">Browse by:</span>
    <button class="browse-pill active">
      <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"/><path d="M12 8v8M8 12h8"/></svg>
      All Listings
    </button>
    <button class="browse-pill">
      <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="2" y="7" width="20" height="14" rx="2"/><path d="M16 21V5a2 2 0 00-2-2h-4a2 2 0 00-2 2v16"/></svg>
      Jobs &amp; Electronics
    </button>
    <button class="browse-pill">
      <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M20 9V7a2 2 0 00-2-2H4a2 2 0 00-2 2v10a2 2 0 002 2h2M9 22l3-3 3 3M12 19v-9"/></svg>
      Animals &amp; Pets
    </button>
    <button class="browse-pill">
      <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M3 9l9-7 9 7v11a2 2 0 01-2 2H5a2 2 0 01-2-2z"/></svg>
      Properties
    </button>
  </div>
</div>

<!-- ── FEATURED LISTINGS ── -->
<section class="featured-section">
  <div class="section-header">
    <h2>Featured Listings</h2>
    <div class="section-tabs">
      <button class="section-tab active">Sponsored</button>
      <button class="section-tab">Trending</button>
      <button class="section-tab">Recent</button>
    </div>
  </div>

  <div class="cards-grid" id="cards-grid">
    <!-- JS-rendered cards -->
  </div>
</section>

@push('scripts')
    <script src="{{ asset('scripts/index.js') }}"></script>
@endpush

</x-layout.layout>