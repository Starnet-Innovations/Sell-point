<x-layout.layout title="SellPoint - Home">

    <style>
        /* ── STATS BAR ── */
    .stats-bar {
      background: var(--white);
      border-bottom: 1px solid var(--border);
      padding: 14px 40px;
      display: flex;
      gap: 40px;
      overflow-x: auto;
    }
    .stat-item {
      display: flex; align-items: center; gap: 8px;
      white-space: nowrap; flex-shrink: 0;
    }
    .stat-item svg { width: 16px; height: 16px; color: var(--green); }
    .stat-item strong { font-size: .9rem; color: var(--text); }
    .stat-item span { font-size: .8rem; color: var(--muted); }

    /* ── PAGE BODY ── */
    .page-body { max-width: 1140px; margin: 0 auto; padding: 40px 40px 80px; }

    /* ── FEATURED CATEGORIES (big cards) ── */
    .section-title {
      font-size: 1.1rem; font-weight: 800; color: var(--text);
      margin-bottom: 18px; display: flex; align-items: center; gap: 10px;
    }
    .section-title::after {
      content: ''; flex: 1; height: 1px; background: var(--border);
    }

    .featured-cats {
      display: grid;
      grid-template-columns: repeat(3, 1fr);
      gap: 18px;
      margin-bottom: 48px;
    }
    .feat-card {
      border-radius: 16px;
      overflow: hidden;
      position: relative;
      height: 180px;
      cursor: pointer;
      text-decoration: none;
      display: block;
    }
    .feat-card img {
      width: 100%; height: 100%; object-fit: cover;
      transition: transform .4s ease;
    }
    .feat-card:hover img { transform: scale(1.06); }
    .feat-overlay {
      position: absolute; inset: 0;
      background: linear-gradient(to top, rgba(10,30,10,.75) 0%, rgba(0,0,0,.1) 60%);
      display: flex; flex-direction: column;
      justify-content: flex-end;
      padding: 18px;
    }
    .feat-name {
      font-size: 1.05rem; font-weight: 800; color: #fff; margin-bottom: 3px;
    }
    .feat-count {
      font-size: .75rem; color: rgba(255,255,255,.8);
    }
    .feat-icon {
      position: absolute; top: 14px; right: 14px;
      background: rgba(255,255,255,.2);
      backdrop-filter: blur(6px);
      border-radius: 10px;
      width: 36px; height: 36px;
      display: flex; align-items: center; justify-content: center;
      color: #fff;
    }

    /* ── ALL CATEGORIES GRID ── */
    .all-cats-grid {
      display: grid;
      grid-template-columns: repeat(auto-fill, minmax(260px, 1fr));
      gap: 16px;
      margin-bottom: 48px;
    }
    .cat-card {
      background: var(--white);
      border-radius: 14px;
      padding: 18px 20px;
      border: 1.5px solid var(--border);
      cursor: pointer;
      transition: border-color .2s, box-shadow .2s, transform .2s;
      text-decoration: none;
      display: block;
      color: var(--text);
    }
    .cat-card:hover {
      border-color: var(--green);
      box-shadow: 0 6px 24px rgba(22,163,74,.12);
      transform: translateY(-2px);
    }
    .cat-card-top {
      display: flex; align-items: center; gap: 14px; margin-bottom: 14px;
    }
    .cat-icon {
      width: 46px; height: 46px; border-radius: 12px;
      display: flex; align-items: center; justify-content: center;
      flex-shrink: 0;
    }
    .cat-icon svg { width: 22px; height: 22px; }
    .cat-label { font-size: .95rem; font-weight: 700; }
    .cat-total { font-size: .75rem; color: var(--muted); margin-top: 1px; }
    .cat-subs {
      display: flex; flex-wrap: wrap; gap: 6px;
    }
    .cat-sub {
      font-size: .72rem; color: var(--muted);
      background: var(--bg);
      padding: 3px 10px; border-radius: 50px;
      border: 1px solid var(--border);
      transition: color .15s, border-color .15s;
    }
    .cat-card:hover .cat-sub { border-color: #bbf7d0; }
    .cat-arrow {
      margin-left: auto;
      color: var(--muted);
      transition: color .2s, transform .2s;
    }
    .cat-card:hover .cat-arrow { color: var(--green); transform: translateX(3px); }

    /* ── POPULAR SEARCHES ── */
    .popular-wrap {
      background: var(--white);
      border-radius: 16px;
      padding: 24px;
      border: 1.5px solid var(--border);
    }
    .popular-wrap h3 { font-size: .9rem; font-weight: 700; margin-bottom: 14px; color: var(--muted); text-transform: uppercase; letter-spacing: .5px; }
    .popular-tags { display: flex; flex-wrap: wrap; gap: 8px; }
    .popular-tag {
      display: flex; align-items: center; gap: 6px;
      background: var(--bg); border: 1.5px solid var(--border);
      padding: 7px 14px; border-radius: 50px;
      font-size: .82rem; font-weight: 500; cursor: pointer;
      transition: all .2s; text-decoration: none; color: var(--text);
    }
    .popular-tag:hover { border-color: var(--green); color: var(--green); background: var(--green-light); }
    .popular-tag svg { width: 13px; height: 13px; }

    @media (max-width: 900px) {
      .featured-cats { grid-template-columns: 1fr 1fr; }
      nav { padding: 0 20px; }
      .hero { padding: 40px 20px 30px; }
      .stats-bar { padding: 12px 20px; }
      .page-body { padding: 28px 20px 60px; }
    }
    @media (max-width: 580px) {
      .featured-cats { grid-template-columns: 1fr; }
      .nav-links { display: none; }
      .all-cats-grid { grid-template-columns: 1fr; }
    }
    </style>

    <!-- HERO -->
<div class="hero">
  <h1>Browse All <span>Categories</span></h1>
  <p>Find exactly what you're looking for across thousands of listings in Nigeria</p>
  <div class="hero-search">
    <input type="text" placeholder="Search categories or listings…" id="cat-search" />
    <button>Search</button>
  </div>
</div>

<!-- STATS BAR -->
<div class="stats-bar">
  <div class="stat-item">
    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="2" y="3" width="20" height="14" rx="2"/><path d="M8 21h8M12 17v4"/></svg>
    <strong>24</strong><span>Categories</span>
  </div>
  <div class="stat-item">
    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M20.59 13.41l-7.17 7.17a2 2 0 01-2.83 0L2 12V2h10l8.59 8.59a2 2 0 010 2.82z"/><line x1="7" y1="7" x2="7.01" y2="7"/></svg>
    <strong>148,000+</strong><span>Active Listings</span>
  </div>
  <div class="stat-item">
    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M17 21v-2a4 4 0 00-4-4H5a4 4 0 00-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 00-3-3.87M16 3.13a4 4 0 010 7.75"/></svg>
    <strong>62,000+</strong><span>Verified Sellers</span>
  </div>
  <div class="stat-item">
    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0118 0z"/><circle cx="12" cy="10" r="3"/></svg>
    <strong>36</strong><span>States Covered</span>
  </div>
  <div class="stat-item">
    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>
    <strong>New ads daily</strong><span>Updated every hour</span>
  </div>
</div>

<!-- PAGE BODY -->
<div class="page-body">

  <!-- Featured Categories -->
  <div class="section-title">Top Categories</div>
  <div class="featured-cats" id="featured-cats"></div>

  <!-- All Categories -->
  <div class="section-title">All Categories</div>
  <div class="all-cats-grid" id="all-cats-grid"></div>

  <!-- Popular Searches -->
  <div class="popular-wrap">
    <h3>Popular Searches</h3>
    <div class="popular-tags">
      <a href="product.html" class="popular-tag">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="11" cy="11" r="8"/><path d="M21 21l-4.35-4.35"/></svg>
        Toyota Camry Lagos
      </a>
      <a href="product.html" class="popular-tag">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="11" cy="11" r="8"/><path d="M21 21l-4.35-4.35"/></svg>
        iPhone 15 Pro
      </a>
      <a href="product.html" class="popular-tag">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="11" cy="11" r="8"/><path d="M21 21l-4.35-4.35"/></svg>
        3 Bedroom Flat Abuja
      </a>
      <a href="product.html" class="popular-tag">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="11" cy="11" r="8"/><path d="M21 21l-4.35-4.35"/></svg>
        Generator for sale
      </a>
      <a href="product.html" class="popular-tag">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="11" cy="11" r="8"/><path d="M21 21l-4.35-4.35"/></svg>
        Laptop Dell i7
      </a>
      <a href="product.html" class="popular-tag">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="11" cy="11" r="8"/><path d="M21 21l-4.35-4.35"/></svg>
        Ankara fabric
      </a>
      <a href="product.html" class="popular-tag">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="11" cy="11" r="8"/><path d="M21 21l-4.35-4.35"/></svg>
        Tricycle Keke Napep
      </a>
      <a href="product.html" class="popular-tag">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="11" cy="11" r="8"/><path d="M21 21l-4.35-4.35"/></svg>
        Samsung TV 55 inch
      </a>
      <a href="product.html" class="popular-tag">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="11" cy="11" r="8"/><path d="M21 21l-4.35-4.35"/></svg>
        Office space rent Lekki
      </a>
      <a href="product.html" class="popular-tag">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="11" cy="11" r="8"/><path d="M21 21l-4.35-4.35"/></svg>
        Puppies for sale
      </a>
      <a href="product.html" class="popular-tag">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="11" cy="11" r="8"/><path d="M21 21l-4.35-4.35"/></svg>
        Solar panels inverter
      </a>
      <a href="product.html" class="popular-tag">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="11" cy="11" r="8"/><path d="M21 21l-4.35-4.35"/></svg>
        Refrigerator LG
      </a>
    </div>
  </div>

</div>


<script>
  const featuredCats = [
    {
      name: "Cars & Vehicles",
      count: "32,400 listings",
      img: "https://images.unsplash.com/photo-1549399542-7e3f8b79c341?w=600&h=360&fit=crop",
      icon: `<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M5 17H3a2 2 0 01-2-2V5a2 2 0 012-2h11a2 2 0 012 2v3"/><rect x="9" y="11" width="14" height="10" rx="2"/><circle cx="12" cy="19" r="1"/><circle cx="20" cy="19" r="1"/></svg>`
    },
    {
      name: "Properties",
      count: "18,200 listings",
      img: "https://images.unsplash.com/photo-1502672260266-1c1ef2d93688?w=600&h=360&fit=crop",
      icon: `<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M3 9l9-7 9 7v11a2 2 0 01-2 2H5a2 2 0 01-2-2z"/><polyline points="9 22 9 12 15 12 15 22"/></svg>`
    },
    {
      name: "Electronics",
      count: "41,700 listings",
      img: "https://images.unsplash.com/photo-1587831990711-23ca6441447b?w=600&h=360&fit=crop",
      icon: `<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="2" y="3" width="20" height="14" rx="2"/><path d="M8 21h8M12 17v4"/></svg>`
    },
    {
      name: "Fashion",
      count: "27,900 listings",
      img: "https://images.unsplash.com/photo-1576995853123-5a10305d93c0?w=600&h=360&fit=crop",
      icon: `<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M20.38 3.46L16 2a4 4 0 01-8 0L3.62 3.46a2 2 0 00-1.34 2.23l.58 3.57a1 1 0 00.99.84H7v10a2 2 0 002 2h6a2 2 0 002-2V10h3.15a1 1 0 00.99-.84l.58-3.57a2 2 0 00-1.34-2.23z"/></svg>`
    },
    {
      name: "Jobs",
      count: "9,100 listings",
      img: "https://images.unsplash.com/photo-1454165804606-c3d57bc86b40?w=600&h=360&fit=crop",
      icon: `<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="2" y="7" width="20" height="14" rx="2"/><path d="M16 21V5a2 2 0 00-2-2h-4a2 2 0 00-2 2v16"/></svg>`
    },
    {
      name: "Animals & Pets",
      count: "5,800 listings",
      img: "https://images.unsplash.com/photo-1587300003388-59208cc962cb?w=600&h=360&fit=crop",
      icon: `<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M10 5.172C10 3.782 8.423 2.679 6.5 3c-2.823.47-4.113 6.006-4 7 .08.703 1.725 1.722 3.656 1 1.261-.472 1.96-1.45 1.974-2.514M14.53 5.172c0-1.39 1.577-2.493 3.5-2.172 2.822.47 4.112 6.006 4 7-.08.703-1.726 1.722-3.656 1-1.262-.472-1.96-1.45-1.975-2.514M5 19.5c.5 1 2 2 3.5 2s3-1 4-1 2.5 1 4 1 3-1 3.5-2"/><path d="M6 19c0-3.728 2.686-6.75 6-6.75S18 15.272 18 19"/></svg>`
    },
  ];

  const allCats = [
    {
      label: "Cars & Vehicles",
      total: "32,400",
      color: "#fef3c7", icon_color: "#d97706",
      subs: ["Cars", "Motorcycles", "Trucks", "Buses", "Spare Parts", "Boats"],
      icon: `<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M5 17H3a2 2 0 01-2-2V5a2 2 0 012-2h11a2 2 0 012 2v3"/><rect x="9" y="11" width="14" height="10" rx="2"/><circle cx="12" cy="19" r="1"/><circle cx="20" cy="19" r="1"/></svg>`
    },
    {
      label: "Properties",
      total: "18,200",
      color: "#e0f2fe", icon_color: "#0284c7",
      subs: ["Houses for Rent", "Land for Sale", "Commercial", "Short Let", "Serviced Apartments"],
      icon: `<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M3 9l9-7 9 7v11a2 2 0 01-2 2H5a2 2 0 01-2-2z"/><polyline points="9 22 9 12 15 12 15 22"/></svg>`
    },
    {
      label: "Electronics",
      total: "41,700",
      color: "#ede9fe", icon_color: "#7c3aed",
      subs: ["Phones", "Laptops", "TVs", "Cameras", "Audio", "Gaming", "Accessories"],
      icon: `<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="2" y="3" width="20" height="14" rx="2"/><path d="M8 21h8M12 17v4"/></svg>`
    },
    {
      label: "Fashion & Clothing",
      total: "27,900",
      color: "#fce7f3", icon_color: "#db2777",
      subs: ["Men's Clothing", "Women's Clothing", "Shoes", "Bags", "Watches", "Jewellery"],
      icon: `<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M20.38 3.46L16 2a4 4 0 01-8 0L3.62 3.46a2 2 0 00-1.34 2.23l.58 3.57a1 1 0 00.99.84H7v10a2 2 0 002 2h6a2 2 0 002-2V10h3.15a1 1 0 00.99-.84l.58-3.57a2 2 0 00-1.34-2.23z"/></svg>`
    },
    {
      label: "Jobs & Services",
      total: "9,100",
      color: "#dcfce7", icon_color: "#16a34a",
      subs: ["Full-time", "Part-time", "Freelance", "Internships", "Government", "Remote"],
      icon: `<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="2" y="7" width="20" height="14" rx="2"/><path d="M16 21V5a2 2 0 00-2-2h-4a2 2 0 00-2 2v16"/></svg>`
    },
    {
      label: "Animals & Pets",
      total: "5,800",
      color: "#fef9c3", icon_color: "#ca8a04",
      subs: ["Dogs", "Cats", "Birds", "Fish", "Livestock", "Pet Supplies"],
      icon: `<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M10 5.172C10 3.782 8.423 2.679 6.5 3c-2.823.47-4.113 6.006-4 7 .08.703 1.725 1.722 3.656 1 1.261-.472 1.96-1.45 1.974-2.514M14.53 5.172c0-1.39 1.577-2.493 3.5-2.172 2.822.47 4.112 6.006 4 7-.08.703-1.726 1.722-3.656 1-1.262-.472-1.96-1.45-1.975-2.514M5 19.5c.5 1 2 2 3.5 2s3-1 4-1 2.5 1 4 1 3-1 3.5-2"/><path d="M6 19c0-3.728 2.686-6.75 6-6.75S18 15.272 18 19"/></svg>`
    },
    {
      label: "Home & Garden",
      total: "14,300",
      color: "#f0fdf4", icon_color: "#15803d",
      subs: ["Furniture", "Appliances", "Kitchenware", "Garden Tools", "Lighting", "Decor"],
      icon: `<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M3 9l9-7 9 7v11a2 2 0 01-2 2H5a2 2 0 01-2-2z"/></svg>`
    },
    {
      label: "Phones & Tablets",
      total: "19,500",
      color: "#eff6ff", icon_color: "#2563eb",
      subs: ["iPhones", "Samsung", "Tecno", "Infinix", "Tablets", "Smartwatches"],
      icon: `<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="5" y="2" width="14" height="20" rx="2" ry="2"/><line x1="12" y1="18" x2="12.01" y2="18"/></svg>`
    },
    {
      label: "Food & Agriculture",
      total: "7,200",
      color: "#ecfdf5", icon_color: "#059669",
      subs: ["Fresh Produce", "Grains & Cereals", "Poultry", "Farm Equipment", "Seeds"],
      icon: `<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M12 22V12M12 12C12 6 6 2 2 2c0 4 2 8 6 10M12 12c0-6 6-10 10-10-2 4-4 8-8 10"/></svg>`
    },
    {
      label: "Sports & Fitness",
      total: "6,400",
      color: "#fff7ed", icon_color: "#ea580c",
      subs: ["Gym Equipment", "Bicycles", "Football", "Tennis", "Swimming", "Outdoor"],
      icon: `<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"/><path d="M4.93 4.93l4.24 4.24M14.83 14.83l4.24 4.24M14.83 9.17l4.24-4.24M14.83 9.17l3.53-3.53M4.93 19.07l4.24-4.24"/></svg>`
    },
    {
      label: "Health & Beauty",
      total: "11,800",
      color: "#fdf2f8", icon_color: "#be185d",
      subs: ["Skincare", "Haircare", "Vitamins", "Medical Equipment", "Fragrances"],
      icon: `<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M20.84 4.61a5.5 5.5 0 00-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 00-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 000-7.78z"/></svg>`
    },
    {
      label: "Education & Books",
      total: "4,300",
      color: "#f0f9ff", icon_color: "#0369a1",
      subs: ["Textbooks", "Tutorials", "Stationery", "Courses", "School Uniforms"],
      icon: `<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M2 3h6a4 4 0 014 4v14a3 3 0 00-3-3H2z"/><path d="M22 3h-6a4 4 0 00-4 4v14a3 3 0 013-3h7z"/></svg>`
    },
  ];

  // Render featured
  document.getElementById('featured-cats').innerHTML = featuredCats.map(c => `
    <a class="feat-card" href="product.html">
      <img src="${c.img}" alt="${c.name}" loading="lazy" />
      <div class="feat-overlay">
        <div class="feat-name">${c.name}</div>
        <div class="feat-count">${c.count}</div>
      </div>
      <div class="feat-icon">${c.icon}</div>
    </a>
  `).join('');

  // Render all categories
  document.getElementById('all-cats-grid').innerHTML = allCats.map(c => `
    <a class="cat-card" href="product.html">
      <div class="cat-card-top">
        <div class="cat-icon" style="background:${c.color};color:${c.icon_color}">${c.icon}</div>
        <div>
          <div class="cat-label">${c.label}</div>
          <div class="cat-total">${c.total} listings</div>
        </div>
        <svg class="cat-arrow" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M9 18l6-6-6-6"/></svg>
      </div>
      <div class="cat-subs">
        ${c.subs.map(s => `<span class="cat-sub">${s}</span>`).join('')}
      </div>
    </a>
  `).join('');

  // Search filter
  document.getElementById('cat-search').addEventListener('input', function () {
    const q = this.value.toLowerCase();
    document.querySelectorAll('.cat-card').forEach(card => {
      card.style.display = card.textContent.toLowerCase().includes(q) ? '' : 'none';
    });
  });
</script>

</x-layout.layout>