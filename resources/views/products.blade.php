<x-layout.layout title="SellPoint - Home">


    <style>
        /* ── BREADCRUMB ── */
    .breadcrumb {
      padding: 16px 40px;
      display: flex;
      align-items: center;
      gap: 8px;
      font-size: 0.8rem;
      color: var(--muted);
    }
    .breadcrumb a { color: var(--muted); text-decoration: none; transition: color .2s; }
    .breadcrumb a:hover { color: var(--green); }
    .breadcrumb svg { width: 12px; height: 12px; flex-shrink: 0; }
    .breadcrumb span { color: var(--text); font-weight: 600; }

    /* ── MAIN LAYOUT ── */
    .page-wrap {
      max-width: 1140px;
      margin: 0 auto;
      padding: 0 40px 80px;
      display: grid;
      grid-template-columns: 1fr 340px;
      gap: 32px;
      align-items: start;
    }

    /* ── GALLERY ── */
    .gallery {
      background: var(--white);
      border-radius: 16px;
      overflow: hidden;
      box-shadow: 0 2px 16px rgba(0,0,0,.06);
      margin-bottom: 24px;
    }
    .gallery-main {
      position: relative;
      height: 400px;
      overflow: hidden;
      cursor: zoom-in;
    }
    .gallery-main img {
      width: 100%;
      height: 100%;
      object-fit: cover;
      transition: transform .4s ease;
    }
    .gallery-main:hover img { transform: scale(1.04); }
    .gallery-badge {
      position: absolute;
      top: 16px;
      left: 16px;
      background: var(--green);
      color: #fff;
      font-size: 0.7rem;
      font-weight: 700;
      padding: 4px 10px;
      border-radius: 5px;
      text-transform: uppercase;
      letter-spacing: 0.5px;
    }
    .gallery-fav {
      position: absolute;
      top: 14px;
      right: 14px;
      background: rgba(255,255,255,.92);
      border: none;
      border-radius: 50%;
      width: 36px;
      height: 36px;
      display: flex;
      align-items: center;
      justify-content: center;
      cursor: pointer;
      box-shadow: 0 2px 8px rgba(0,0,0,.12);
      color: var(--muted);
      transition: color .2s, transform .15s;
    }
    .gallery-fav:hover { color: #ef4444; transform: scale(1.1); }
    .gallery-arrow {
      position: absolute;
      top: 50%;
      transform: translateY(-50%);
      background: rgba(255,255,255,.9);
      border: none;
      border-radius: 50%;
      width: 36px;
      height: 36px;
      display: flex;
      align-items: center;
      justify-content: center;
      cursor: pointer;
      box-shadow: 0 2px 8px rgba(0,0,0,.14);
      color: var(--text);
      transition: background .2s;
      z-index: 2;
    }
    .gallery-arrow:hover { background: var(--green); color: #fff; }
    .gallery-arrow.prev { left: 12px; }
    .gallery-arrow.next { right: 12px; }
    .gallery-thumbs {
      display: flex;
      gap: 8px;
      padding: 12px;
      overflow-x: auto;
    }
    .gallery-thumb {
      width: 72px;
      height: 56px;
      border-radius: 8px;
      overflow: hidden;
      flex-shrink: 0;
      cursor: pointer;
      border: 2px solid transparent;
      transition: border-color .2s;
    }
    .gallery-thumb.active { border-color: var(--green); }
    .gallery-thumb img { width: 100%; height: 100%; object-fit: cover; }

    /* ── PRODUCT INFO ── */
    .product-info {
      background: var(--white);
      border-radius: 16px;
      padding: 24px;
      box-shadow: 0 2px 16px rgba(0,0,0,.06);
      margin-bottom: 24px;
    }
    .product-meta {
      display: flex;
      align-items: center;
      justify-content: space-between;
      margin-bottom: 10px;
    }
    .product-category {
      font-size: 0.75rem;
      font-weight: 700;
      color: var(--green);
      text-transform: uppercase;
      letter-spacing: 0.5px;
      background: var(--green-light);
      padding: 3px 10px;
      border-radius: 50px;
    }
    .product-id { font-size: 0.75rem; color: var(--muted); }
    .product-title {
      font-size: 1.5rem;
      font-weight: 800;
      line-height: 1.25;
      margin-bottom: 12px;
    }
    .product-rating {
      display: flex;
      align-items: center;
      gap: 6px;
      margin-bottom: 16px;
    }
    .stars { display: flex; gap: 2px; }
    .stars svg { width: 14px; height: 14px; }
    .star-f { color: #f59e0b; }
    .star-e { color: #d1d5db; }
    .rating-count { font-size: 0.8rem; color: var(--muted); }
    .product-price-row {
      display: flex;
      align-items: baseline;
      gap: 10px;
      margin-bottom: 6px;
    }
    .product-price {
      font-size: 2rem;
      font-weight: 900;
      color: var(--green);
      letter-spacing: -0.5px;
    }
    .product-price-label {
      font-size: 0.8rem;
      color: var(--muted);
      font-weight: 500;
    }
    .product-negotiable {
      display: inline-flex;
      align-items: center;
      gap: 4px;
      font-size: 0.75rem;
      color: #f59e0b;
      font-weight: 600;
      background: #fef9c3;
      padding: 3px 10px;
      border-radius: 50px;
      margin-bottom: 20px;
    }
    .product-attrs {
      display: grid;
      grid-template-columns: 1fr 1fr;
      gap: 10px;
      padding: 16px 0;
      border-top: 1px solid var(--border);
      border-bottom: 1px solid var(--border);
      margin-bottom: 20px;
    }
    .attr-item {
      display: flex;
      flex-direction: column;
      gap: 2px;
    }
    .attr-label {
      font-size: 0.7rem;
      color: var(--muted);
      text-transform: uppercase;
      letter-spacing: 0.4px;
      font-weight: 600;
    }
    .attr-value {
      font-size: 0.88rem;
      font-weight: 700;
      color: var(--text);
    }
    .product-description h3 {
      font-size: 0.95rem;
      font-weight: 700;
      margin-bottom: 10px;
    }
    .product-description p {
      font-size: 0.875rem;
      color: var(--muted);
      line-height: 1.7;
    }
    .read-more {
      background: none;
      border: none;
      color: var(--green);
      font-size: 0.82rem;
      font-weight: 600;
      cursor: pointer;
      padding: 0;
      margin-top: 6px;
    }

    /* ── TAGS ── */
    .product-tags {
      display: flex;
      flex-wrap: wrap;
      gap: 8px;
      margin-top: 20px;
    }
    .tag {
      background: var(--bg);
      border: 1px solid var(--border);
      padding: 4px 12px;
      border-radius: 50px;
      font-size: 0.75rem;
      color: var(--muted);
      cursor: pointer;
      transition: border-color .2s, color .2s;
    }
    .tag:hover { border-color: var(--green); color: var(--green); }

    /* ── SIDEBAR ── */
    .sidebar { display: flex; flex-direction: column; gap: 20px; }

    /* Seller card */
    .seller-card {
      background: var(--white);
      border-radius: 16px;
      padding: 22px;
      box-shadow: 0 2px 16px rgba(0,0,0,.06);
    }
    .seller-card h3 {
      font-size: 0.85rem;
      font-weight: 700;
      color: var(--muted);
      text-transform: uppercase;
      letter-spacing: 0.5px;
      margin-bottom: 16px;
    }
    .seller-info {
      display: flex;
      align-items: center;
      gap: 12px;
      margin-bottom: 14px;
    }
    .seller-avatar {
      width: 52px;
      height: 52px;
      border-radius: 50%;
      background: var(--green-light);
      display: flex;
      align-items: center;
      justify-content: center;
      font-size: 1.1rem;
      font-weight: 800;
      color: var(--green);
      flex-shrink: 0;
    }
    .seller-name { font-weight: 700; font-size: 0.95rem; margin-bottom: 2px; }
    .seller-joined { font-size: 0.75rem; color: var(--muted); }
    .seller-badges {
      display: flex;
      gap: 6px;
      margin-bottom: 16px;
      flex-wrap: wrap;
    }
    .seller-badge {
      display: flex;
      align-items: center;
      gap: 4px;
      font-size: 0.72rem;
      font-weight: 600;
      padding: 3px 9px;
      border-radius: 50px;
    }
    .seller-badge.verified { background: var(--green-light); color: var(--green); }
    .seller-badge.active   { background: #fef3c7; color: #92400e; }
    .seller-badge svg { width: 11px; height: 11px; }
    .seller-stats {
      display: grid;
      grid-template-columns: 1fr 1fr;
      gap: 10px;
      margin-bottom: 18px;
      padding: 14px 0;
      border-top: 1px solid var(--border);
      border-bottom: 1px solid var(--border);
    }
    .seller-stat { text-align: center; }
    .seller-stat-val { font-size: 1.1rem; font-weight: 800; color: var(--text); }
    .seller-stat-lbl { font-size: 0.7rem; color: var(--muted); }

    .btn-call {
      width: 100%;
      padding: 12px;
      background: var(--green);
      color: #fff;
      border: none;
      border-radius: 10px;
      font-size: 0.9rem;
      font-weight: 700;
      cursor: pointer;
      display: flex;
      align-items: center;
      justify-content: center;
      gap: 8px;
      margin-bottom: 10px;
      transition: background .2s;
    }
    .btn-call:hover { background: var(--green-dark); }
    .btn-chat {
      width: 100%;
      padding: 11px;
      background: var(--white);
      border: 1.5px solid var(--green);
      color: var(--green);
      border-radius: 10px;
      font-size: 0.9rem;
      font-weight: 700;
      cursor: pointer;
      display: flex;
      align-items: center;
      justify-content: center;
      gap: 8px;
      transition: background .2s;
    }
    .btn-chat:hover { background: var(--green-light); }

    /* Safety tip */
    .safety-card {
      background: #fef9c3;
      border: 1.5px solid #fde68a;
      border-radius: 14px;
      padding: 16px;
    }
    .safety-card h4 {
      display: flex;
      align-items: center;
      gap: 6px;
      font-size: 0.82rem;
      font-weight: 700;
      color: #92400e;
      margin-bottom: 8px;
    }
    .safety-card ul {
      list-style: none;
      display: flex;
      flex-direction: column;
      gap: 5px;
    }
    .safety-card ul li {
      font-size: 0.75rem;
      color: #78350f;
      display: flex;
      align-items: flex-start;
      gap: 5px;
      line-height: 1.4;
    }
    .safety-card ul li::before { content: '•'; color: #f59e0b; font-weight: 700; flex-shrink: 0; }

    /* Share row */
    .share-row {
      display: flex;
      align-items: center;
      gap: 10px;
      font-size: 0.8rem;
      color: var(--muted);
      font-weight: 600;
    }
    .share-btn {
      width: 34px;
      height: 34px;
      border-radius: 50%;
      background: var(--bg);
      border: 1.5px solid var(--border);
      display: flex;
      align-items: center;
      justify-content: center;
      cursor: pointer;
      color: var(--muted);
      transition: border-color .2s, color .2s;
    }
    .share-btn:hover { border-color: var(--green); color: var(--green); }

    /* ── RELATED ── */
    .related-section { padding: 0 40px 60px; max-width: 1140px; margin: 0 auto; }
    .related-section h2 { font-size: 1.2rem; font-weight: 800; margin-bottom: 20px; }
    .related-grid {
      display: grid;
      grid-template-columns: repeat(auto-fill, minmax(190px, 1fr));
      gap: 16px;
    }
    .r-card {
      background: var(--white);
      border-radius: 12px;
      overflow: hidden;
      box-shadow: 0 2px 10px rgba(0,0,0,.05);
      cursor: pointer;
      transition: transform .2s, box-shadow .2s;
      text-decoration: none;
      color: var(--text);
      display: block;
    }
    .r-card:hover { transform: translateY(-4px); box-shadow: 0 8px 24px rgba(22,163,74,.15); }
    .r-card-img {
      height: 130px;
      overflow: hidden;
      position: relative;
    }
    .r-card-img img { width: 100%; height: 100%; object-fit: cover; transition: transform .3s; }
    .r-card:hover .r-card-img img { transform: scale(1.05); }
    .r-card-price-tag {
      position: absolute;
      bottom: 0; left: 0; right: 0;
      background: linear-gradient(to top, rgba(10,30,10,.6), transparent);
      padding: 20px 10px 8px;
      font-size: 0.9rem;
      font-weight: 800;
      color: #fff;
    }
    .r-card-body { padding: 10px 12px 12px; }
    .r-card-title { font-size: 0.82rem; font-weight: 700; margin-bottom: 3px; white-space: nowrap; overflow: hidden; text-overflow: ellipsis; }
    .r-card-loc { font-size: 0.72rem; color: var(--muted); display: flex; align-items: center; gap: 3px; }
    .r-card-loc svg { width: 10px; height: 10px; }

    @media (max-width: 900px) {
      .page-wrap { grid-template-columns: 1fr; padding: 0 20px 60px; }
      .related-section { padding: 0 20px 60px; }
      nav { padding: 0 20px; }
      .breadcrumb { padding: 14px 20px; }
    }
    @media (max-width: 500px) {
      .gallery-main { height: 260px; }
      .product-title { font-size: 1.2rem; }
      .product-price { font-size: 1.6rem; }
    }
    </style>

    
<!-- BREADCRUMB -->
<div class="breadcrumb">
  <a href="index.html">Home</a>
  <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M9 18l6-6-6-6"/></svg>
  <a href="#">Cars</a>
  <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M9 18l6-6-6-6"/></svg>
  <span>2021 Mercedes C-Class</span>
</div>

<!-- PAGE BODY -->
<div class="page-wrap">

  <!-- LEFT COLUMN -->
  <div>
    <!-- Gallery -->
    <div class="gallery">
      <div class="gallery-main" id="gallery-main">
        <img id="main-img" src="https://images.unsplash.com/photo-1549399542-7e3f8b79c341?w=900&h=600&fit=crop" alt="2021 Mercedes C-Class" />
        <span class="gallery-badge">Featured</span>
        <button class="gallery-fav" id="fav-btn" title="Save to wishlist">
          <svg width="17" height="17" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M20.84 4.61a5.5 5.5 0 00-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 00-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 000-7.78z"/></svg>
        </button>
        <button class="gallery-arrow prev" id="prev-btn">
          <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M15 18l-6-6 6-6"/></svg>
        </button>
        <button class="gallery-arrow next" id="next-btn">
          <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M9 18l6-6-6-6"/></svg>
        </button>
      </div>
      <div class="gallery-thumbs" id="thumbs"></div>
    </div>

    <!-- Product Info -->
    <div class="product-info">
      <div class="product-meta">
        <span class="product-category">Cars &amp; Vehicles</span>
        <span class="product-id">Ad #SP-00142</span>
      </div>
      <h1 class="product-title">2021 Mercedes-Benz C-Class C300 – Excellent Condition</h1>
      <div class="product-rating">
        <div class="stars" id="detail-stars"></div>
        <span class="rating-count">4.5 · 42 reviews</span>
      </div>
      <div class="product-price-row">
        <span class="product-price">₦48,500,000</span>
        <span class="product-price-label">Fixed price</span>
      </div>
      <div class="product-negotiable">
        <svg width="11" height="11" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="20 6 9 17 4 12"/></svg>
        Price is negotiable
      </div>

      <div class="product-attrs">
        <div class="attr-item">
          <span class="attr-label">Condition</span>
          <span class="attr-value">Used – Excellent</span>
        </div>
        <div class="attr-item">
          <span class="attr-label">Year</span>
          <span class="attr-value">2021</span>
        </div>
        <div class="attr-item">
          <span class="attr-label">Mileage</span>
          <span class="attr-value">24,000 km</span>
        </div>
        <div class="attr-item">
          <span class="attr-label">Fuel Type</span>
          <span class="attr-value">Petrol</span>
        </div>
        <div class="attr-item">
          <span class="attr-label">Transmission</span>
          <span class="attr-value">Automatic</span>
        </div>
        <div class="attr-item">
          <span class="attr-label">Location</span>
          <span class="attr-value">Lagos, Nigeria</span>
        </div>
        <div class="attr-item">
          <span class="attr-label">Colour</span>
          <span class="attr-value">Obsidian Black</span>
        </div>
        <div class="attr-item">
          <span class="attr-label">Posted</span>
          <span class="attr-value">2 days ago</span>
        </div>
      </div>

      <div class="product-description">
        <h3>Description</h3>
        <p id="desc-text">
          This is a well-maintained 2021 Mercedes-Benz C300 with only 24,000 km on the odometer. The car is in excellent condition, both inside and outside. It comes with a full service history, all original documents, and has never been involved in any accident.
          Features include leather seats, panoramic sunroof, MBUX infotainment with voice control, wireless Apple CarPlay &amp; Android Auto, 360-degree camera, blind spot assist, lane keeping assist, and AMG Sport package exterior.
          <span id="desc-more" style="display:none"> The vehicle is registered in Lagos and comes with current customs clearance papers. All Lagos taxes are paid up to date. Serious buyers only — test drive is available upon request with valid ID. The price is firm but open to genuine negotiation for outright buyers.</span>
        </p>
        <button class="read-more" id="read-more-btn">Read more</button>
      </div>

      <div class="product-tags">
        <span class="tag">Mercedes</span>
        <span class="tag">C-Class</span>
        <span class="tag">Luxury Car</span>
        <span class="tag">Lagos</span>
        <span class="tag">2021</span>
        <span class="tag">Automatic</span>
        <span class="tag">Foreign Used</span>
      </div>

      <!-- Share -->
      <div style="margin-top:22px; padding-top:20px; border-top:1px solid var(--border)">
        <div class="share-row">
          Share:
          <button class="share-btn" title="Share on WhatsApp">
            <svg width="15" height="15" viewBox="0 0 24 24" fill="currentColor"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347z"/><path d="M12 0C5.373 0 0 5.373 0 12c0 2.127.557 4.126 1.528 5.862L0 24l6.318-1.498A11.946 11.946 0 0012 24c6.627 0 12-5.373 12-12S18.627 0 12 0zm0 21.818a9.818 9.818 0 01-5.007-1.369l-.36-.214-3.727.883.936-3.617-.236-.374A9.818 9.818 0 1112 21.818z"/></svg>
          </button>
          <button class="share-btn" title="Copy link">
            <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M10 13a5 5 0 007.54.54l3-3a5 5 0 00-7.07-7.07l-1.72 1.71"/><path d="M14 11a5 5 0 00-7.54-.54l-3 3a5 5 0 007.07 7.07l1.71-1.71"/></svg>
          </button>
          <button class="share-btn" title="Share on Facebook">
            <svg width="15" height="15" viewBox="0 0 24 24" fill="currentColor"><path d="M18 2h-3a5 5 0 00-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 011-1h3z"/></svg>
          </button>
          <button class="share-btn" title="Share on X">
            <svg width="14" height="14" viewBox="0 0 24 24" fill="currentColor"><path d="M18.244 2.25h3.308l-7.227 8.26 8.502 11.24H16.17l-5.214-6.817L4.99 21.75H1.68l7.73-8.835L1.254 2.25H8.08l4.713 6.231zm-1.161 17.52h1.833L7.084 4.126H5.117z"/></svg>
          </button>
        </div>
      </div>
    </div>

    <!-- Report link -->
    <p style="font-size:.75rem;color:var(--muted);padding:0 4px">
      Something wrong with this ad?
      <a href="#" style="color:var(--green);text-decoration:none;font-weight:600">Report listing</a>
    </p>
  </div>

  <!-- RIGHT SIDEBAR -->
  <div class="sidebar">

    <!-- Seller Card -->
    <div class="seller-card">
      <h3>Seller Information</h3>
      <div class="seller-info">
        <div class="seller-avatar">JR</div>
        <div>
          <div class="seller-name">James Rotimi</div>
          <div class="seller-joined">Member since Jan 2022</div>
        </div>
      </div>
      <div class="seller-badges">
        <span class="seller-badge verified">
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="20 6 9 17 4 12"/></svg>
          Verified Seller
        </span>
        <span class="seller-badge active">
          <svg viewBox="0 0 24 24" fill="currentColor"><circle cx="12" cy="12" r="4"/></svg>
          Usually responds in 1hr
        </span>
      </div>
      <div class="seller-stats">
        <div class="seller-stat">
          <div class="seller-stat-val">48</div>
          <div class="seller-stat-lbl">Total Ads</div>
        </div>
        <div class="seller-stat">
          <div class="seller-stat-val">4.8 ★</div>
          <div class="seller-stat-lbl">Seller Rating</div>
        </div>
      </div>

      <button class="btn-call" id="call-btn">
        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M22 16.92v3a2 2 0 01-2.18 2 19.79 19.79 0 01-8.63-3.07A19.5 19.5 0 013.07 9.81a19.79 19.79 0 01-3.07-8.68A2 2 0 012 .99h3a2 2 0 012 1.72c.127.96.361 1.903.7 2.81a2 2 0 01-.45 2.11L6.09 8.91a16 16 0 006 6l1.27-1.27a2 2 0 012.11-.45c.907.339 1.85.573 2.81.7A2 2 0 0122 16.92z"/></svg>
        Show Phone Number
      </button>
      <button class="btn-chat">
        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 15a2 2 0 01-2 2H7l-4 4V5a2 2 0 012-2h14a2 2 0 012 2z"/></svg>
        Send Message
      </button>
    </div>

    <!-- Location Card -->
    <div class="seller-card">
      <h3>Location</h3>
      <div style="background:#d1fae5;border-radius:10px;height:130px;display:flex;align-items:center;justify-content:center;margin-bottom:12px;position:relative;overflow:hidden">
        <!-- Simple map placeholder -->
        <svg width="100%" height="100%" viewBox="0 0 300 130" style="position:absolute;top:0;left:0;opacity:.4">
          <rect width="300" height="130" fill="#bbf7d0"/>
          <line x1="0" y1="65" x2="300" y2="65" stroke="#86efac" stroke-width="1"/>
          <line x1="150" y1="0" x2="150" y2="130" stroke="#86efac" stroke-width="1"/>
          <line x1="0" y1="32" x2="300" y2="32" stroke="#86efac" stroke-width="0.5"/>
          <line x1="0" y1="98" x2="300" y2="98" stroke="#86efac" stroke-width="0.5"/>
          <line x1="75" y1="0" x2="75" y2="130" stroke="#86efac" stroke-width="0.5"/>
          <line x1="225" y1="0" x2="225" y2="130" stroke="#86efac" stroke-width="0.5"/>
        </svg>
        <div style="position:relative;text-align:center">
          <svg width="28" height="28" viewBox="0 0 24 24" fill="#16a34a" style="filter:drop-shadow(0 2px 4px rgba(0,0,0,.3))"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0118 0z"/><circle cx="12" cy="10" r="3" fill="#fff"/></svg>
          <div style="font-size:.72rem;font-weight:700;color:var(--green);margin-top:4px;background:rgba(255,255,255,.9);padding:2px 8px;border-radius:50px">Lagos, Nigeria</div>
        </div>
      </div>
      <p style="font-size:.8rem;color:var(--muted);display:flex;align-items:center;gap:5px">
        <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0118 0z"/><circle cx="12" cy="10" r="3"/></svg>
        Victoria Island, Lagos State
      </p>
    </div>

    <!-- Safety Tips -->
    <div class="safety-card">
      <h4>
        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/></svg>
        Safety Tips
      </h4>
      <ul>
        <li>Meet seller in a public, safe location</li>
        <li>Do not pay in advance before inspecting</li>
        <li>Verify documents before making payment</li>
        <li>Use SellPoint escrow for large transactions</li>
        <li>Report suspicious ads immediately</li>
      </ul>
    </div>

  </div>
</div>

<!-- RELATED LISTINGS -->
<div class="related-section">
  <h2>Similar Listings</h2>
  <div class="related-grid" id="related-grid"></div>
</div>

<script>
  // Gallery images
  const images = [
    "https://images.unsplash.com/photo-1549399542-7e3f8b79c341?w=900&h=600&fit=crop",
    "https://images.unsplash.com/photo-1606664515524-ed2f786a0bd6?w=900&h=600&fit=crop",
    "https://images.unsplash.com/photo-1618843479313-40f8afb4b4d8?w=900&h=600&fit=crop",
    "https://images.unsplash.com/photo-1503376780353-7e6692767b70?w=900&h=600&fit=crop",
  ];

  let current = 0;
  const mainImg = document.getElementById('main-img');
  const thumbsEl = document.getElementById('thumbs');

  // Build thumbs
  images.forEach((src, i) => {
    const div = document.createElement('div');
    div.className = 'gallery-thumb' + (i === 0 ? ' active' : '');
    div.innerHTML = `<img src="${src}" alt="View ${i+1}" loading="lazy" />`;
    div.addEventListener('click', () => setSlide(i));
    thumbsEl.appendChild(div);
  });

  function setSlide(idx) {
    current = (idx + images.length) % images.length;
    mainImg.src = images[current];
    document.querySelectorAll('.gallery-thumb').forEach((t, i) => {
      t.classList.toggle('active', i === current);
    });
  }

  document.getElementById('prev-btn').addEventListener('click', () => setSlide(current - 1));
  document.getElementById('next-btn').addEventListener('click', () => setSlide(current + 1));

  // Favourite toggle
  const favBtn = document.getElementById('fav-btn');
  favBtn.addEventListener('click', () => {
    const svg = favBtn.querySelector('svg');
    const saved = svg.getAttribute('fill') === '#ef4444';
    svg.setAttribute('fill', saved ? 'none' : '#ef4444');
    svg.setAttribute('stroke', saved ? 'currentColor' : '#ef4444');
  });

  // Read more
  let expanded = false;
  document.getElementById('read-more-btn').addEventListener('click', () => {
    expanded = !expanded;
    document.getElementById('desc-more').style.display = expanded ? 'inline' : 'none';
    document.getElementById('read-more-btn').textContent = expanded ? 'Show less' : 'Read more';
  });

  // Show phone number
  document.getElementById('call-btn').addEventListener('click', function () {
    this.innerHTML = `<svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M22 16.92v3a2 2 0 01-2.18 2 19.79 19.79 0 01-8.63-3.07A19.5 19.5 0 013.07 9.81a19.79 19.79 0 01-3.07-8.68A2 2 0 012 .99h3a2 2 0 012 1.72c.127.96.361 1.903.7 2.81a2 2 0 01-.45 2.11L6.09 8.91a16 16 0 006 6l1.27-1.27a2 2 0 012.11-.45c.907.339 1.85.573 2.81.7A2 2 0 0122 16.92z"/></svg>+234 801 234 5678`;
    this.style.background = '#15803d';
  });

  // Stars
  function starHTML(rating) {
    let h = '';
    for (let i = 1; i <= 5; i++) {
      const filled = i <= Math.round(rating);
      h += `<svg viewBox="0 0 24 24" fill="${filled ? '#f59e0b' : 'none'}" stroke="${filled ? '#f59e0b' : '#d1d5db'}" stroke-width="2" class="${filled ? 'star-f' : 'star-e'}"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg>`;
    }
    return h;
  }
  document.getElementById('detail-stars').innerHTML = starHTML(4.5);

  // Related listings
  const related = [
    { title: "2020 Toyota Camry XSE",   price: "₦32,000,000", location: "Abuja",  img: "https://images.unsplash.com/photo-1621007947382-bb3c3994e3fb?w=400&h=260&fit=crop" },
    { title: "2019 BMW 3 Series 330i",  price: "₦28,500,000", location: "Lagos",  img: "https://images.unsplash.com/photo-1555215695-3004980ad54e?w=400&h=260&fit=crop" },
    { title: "2022 Lexus ES 350",       price: "₦55,000,000", location: "Lagos",  img: "https://images.unsplash.com/photo-1616788494672-ec7ca25fdda9?w=400&h=260&fit=crop" },
    { title: "2018 Honda Accord Sport", price: "₦18,000,000", location: "PH",     img: "https://images.unsplash.com/photo-1580273916550-e323be2ae537?w=400&h=260&fit=crop" },
    { title: "2021 Audi A4 40 TFSI",    price: "₦42,000,000", location: "Abuja",  img: "https://images.unsplash.com/photo-1606152421802-db97b9c7a11b?w=400&h=260&fit=crop" },
  ];

  document.getElementById('related-grid').innerHTML = related.map(r => `
    <a class="r-card" href="product.html">
      <div class="r-card-img">
        <img src="${r.img}" alt="${r.title}" loading="lazy" />
        <div class="r-card-price-tag">${r.price}</div>
      </div>
      <div class="r-card-body">
        <div class="r-card-title">${r.title}</div>
        <div class="r-card-loc">
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0118 0z"/><circle cx="12" cy="10" r="3"/></svg>
          ${r.location}, Nigeria
        </div>
      </div>
    </a>
  `).join('');

  // Copy link share button
  document.querySelectorAll('.share-btn').forEach(btn => {
    btn.addEventListener('click', () => {
      if (btn.title === 'Copy link') {
        navigator.clipboard.writeText(window.location.href).catch(() => {});
        btn.style.borderColor = 'var(--green)';
        btn.style.color = 'var(--green)';
        setTimeout(() => { btn.style.borderColor = ''; btn.style.color = ''; }, 1500);
      }
    });
  });
</script>


</x-layout.layout>