const listings = [
    { id: 1,  title: "2021 Mercedes C-Class",   location: "Lagos, Nigeria",    price: "₦48,500,000", priceLabel: "Fixed price",   rating: 4.5, reviews: 42, seller: "James R.", badge: "Featured", img: "https://images.unsplash.com/photo-1549399542-7e3f8b79c341?w=400&h=280&fit=crop" },
    { id: 2,  title: "Denim Jacket – Slim Fit",  location: "Abuja, Nigeria",    price: "₦95,000",     priceLabel: "or best offer", rating: 4.0, reviews: 18, seller: "Maria L.", badge: null,       img: "https://images.unsplash.com/photo-1576995853123-5a10305d93c0?w=400&h=280&fit=crop" },
    { id: 3,  title: "Indoor Plant Bundle",       location: "Port Harcourt, NG", price: "₦52,000",     priceLabel: "per bundle",    rating: 4.8, reviews: 56, seller: "GreenCo",  badge: "New",      img: "https://images.unsplash.com/photo-1463936575829-25148e1db1b8?w=400&h=280&fit=crop" },
    { id: 4,  title: "Mid-Century Armchair",      location: "Ibadan, Nigeria",   price: "₦320,000",    priceLabel: "Negotiable",    rating: 3.5, reviews: 9,  seller: "Tom H.",   badge: null,       img: "https://images.unsplash.com/photo-1555041469-a586c61ea9bc?w=400&h=280&fit=crop" },
    { id: 5,  title: "Desktop PC – i9 RTX 4080",  location: "Lagos, Nigeria",    price: "₦2,150,000",  priceLabel: "Fixed price",   rating: 4.7, reviews: 33, seller: "TechHub",  badge: "Hot",      img: "https://images.unsplash.com/photo-1587831990711-23ca6441447b?w=400&h=280&fit=crop" },
    { id: 6,  title: "Vintage Gold Watch",        location: "Kano, Nigeria",     price: "₦270,000",    priceLabel: "or best offer", rating: 4.2, reviews: 14, seller: "Ana S.",   badge: null,       img: "https://images.unsplash.com/photo-1523275335684-37898b6baf30?w=400&h=280&fit=crop" },
    { id: 7,  title: "Leather Backpack",          location: "Enugu, Nigeria",    price: "₦140,000",    priceLabel: "Fixed price",   rating: 4.6, reviews: 27, seller: "BagStore", badge: null,       img: "https://images.unsplash.com/photo-1553062407-98eeb64c6a62?w=400&h=280&fit=crop" },
    { id: 8,  title: "Women's Formal Suit",       location: "Abuja, Nigeria",    price: "₦310,000",    priceLabel: "Negotiable",    rating: 4.4, reviews: 31, seller: "StyleCo",  badge: "New",      img: "https://images.unsplash.com/photo-1594938298603-c8148c4b4dce?w=400&h=280&fit=crop" },
    { id: 9,  title: "Tablet Pro 12\" 256GB",     location: "Lagos, Nigeria",    price: "₦1,180,000",  priceLabel: "Fixed price",   rating: 4.9, reviews: 88, seller: "iStore",   badge: "Featured", img: "https://images.unsplash.com/photo-1544244015-0df4b3ffc6b0?w=400&h=280&fit=crop" },
    { id: 10, title: "Pendant Ceiling Light",     location: "Benin City, NG",    price: "₦110,000",    priceLabel: "per unit",      rating: 4.1, reviews: 12, seller: "LightUp",  badge: null,       img: "https://images.unsplash.com/photo-1565814329452-e1efa11c5b89?w=400&h=280&fit=crop" },
    { id: 11, title: "Studio Apartment",          location: "Lekki, Lagos",      price: "₦850,000",    priceLabel: "per month",     rating: 4.3, reviews: 7,  seller: "PropCo",   badge: "Rent",     img: "https://images.unsplash.com/photo-1502672260266-1c1ef2d93688?w=400&h=280&fit=crop" },
    { id: 12, title: "Road Bicycle 21-Speed",     location: "Kaduna, Nigeria",   price: "₦480,000",    priceLabel: "or best offer", rating: 4.5, reviews: 22, seller: "CycleMax", badge: null,       img: "https://images.unsplash.com/photo-1485965120184-e220f721d03e?w=400&h=280&fit=crop" },
  ];

  function starSVG(filled) {
    return `<svg viewBox="0 0 24 24" fill="${filled ? '#f59e0b' : 'none'}" stroke="${filled ? '#f59e0b' : '#d1d5db'}" stroke-width="2" class="${filled ? 'star-filled' : 'star-empty'}"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg>`;
  }

  function renderStars(rating) {
    let html = '';
    for (let i = 1; i <= 5; i++) {
      html += starSVG(i <= Math.round(rating));
    }
    return html;
  }

  function badgeClass(badge) {
    if (!badge) return '';
    const map = { Hot: 'badge-hot', New: 'badge-new', Rent: 'badge-rent' };
    return map[badge] || '';
  }

  function renderCards(items) {
    return items.map(item => `
      <div class="card" onclick="window.location.href='product.html'">
        <div class="card-img">
          <img src="${item.img}" alt="${item.title}" loading="lazy" />
          ${item.badge ? `<span class="card-badge ${badgeClass(item.badge)}">${item.badge}</span>` : ''}
          <button class="card-fav" title="Save to wishlist">
            <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2"><path d="M20.84 4.61a5.5 5.5 0 00-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 00-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 000-7.78z"/></svg>
          </button>
          <div class="card-price-tag">
            <div>
              <div class="card-price-value">${item.price}</div>
              <div class="card-price-label">${item.priceLabel}</div>
            </div>
            <button class="card-contact-btn">Contact</button>
          </div>
        </div>
        <div class="card-body">
          <div class="card-title">${item.title}</div>
          <div class="card-sub">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0118 0z"/><circle cx="12" cy="10" r="3"/></svg>
            ${item.location}
          </div>
          <div class="card-stars">
            ${renderStars(item.rating)}
            <span>${item.rating} &nbsp;(${item.reviews} reviews)</span>
          </div>
          <div class="card-footer">
            <div class="card-seller">
              <div class="card-avatar">${item.seller.slice(0,2).toUpperCase()}</div>
              <span class="card-seller-name">${item.seller}</span>
            </div>
            <button class="card-action" title="View listing">
              <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
            </button>
          </div>
        </div>
      </div>
    `).join('');
  }

  document.getElementById('cards-grid').innerHTML = renderCards(listings);

  // Tab switching
  document.querySelectorAll('.section-tab').forEach(tab => {
    tab.addEventListener('click', () => {
      document.querySelectorAll('.section-tab').forEach(t => t.classList.remove('active'));
      tab.classList.add('active');
    });
  });

  // Browse pill switching
  document.querySelectorAll('.browse-pill').forEach(pill => {
    pill.addEventListener('click', () => {
      document.querySelectorAll('.browse-pill').forEach(p => p.classList.remove('active'));
      pill.classList.add('active');
    });
  });

  // Category nav
  document.querySelectorAll('.cat-nav-item').forEach(item => {
    item.addEventListener('click', e => {
      e.preventDefault();
      document.querySelectorAll('.cat-nav-item').forEach(i => i.classList.remove('active'));
      item.classList.add('active');
    });
  });

  // Fav heart toggle
  document.querySelectorAll('.card-fav').forEach(btn => {
    btn.addEventListener('click', e => {
      e.stopPropagation();
      const svg = btn.querySelector('svg');
      const active = svg.getAttribute('fill') === '#e74c3c';
      svg.setAttribute('fill', active ? 'none' : '#e74c3c');
      svg.setAttribute('stroke', active ? 'currentColor' : '#e74c3c');
    });
  });
