<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Koperasi SMK Muthia Harapan Cicalengka</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap');

        * { margin: 0; padding: 0; box-sizing: border-box; font-family: 'Inter', sans-serif; }
        body { display: flex; background-color: #f1f5f9; min-height: 100vh; color: #1e293b; overflow-x: hidden; }

        /* --- SIDEBAR KIRI --- */
        .sidebar { width: 260px; background-color: #ffffff; padding: 32px 24px; display: flex; flex-direction: column; border-right: 1px solid #e2e8f0; box-shadow: 4px 0 24px rgba(0, 0, 0, 0.02); flex-shrink: 0; }
        .sidebar-brand { font-size: 18px; font-weight: 700; color: #064e3b; margin-bottom: 36px; display: flex; align-items: center; gap: 10px; }
        .sidebar-profile { display: flex; align-items: center; gap: 12px; padding: 12px; background: #ecfdf5; border-radius: 12px; margin-bottom: 30px; border: 1px solid #a7f3d0; }
        .profile-avatar { width: 44px; height: 44px; background: #059669; border-radius: 50%; display: flex; justify-content: center; align-items: center; color: white; flex-shrink: 0; }
        .profile-avatar svg { width: 24px; height: 24px; fill: currentColor; }
        .profile-info .name { font-size: 13px; font-weight: 600; color: #064e3b; word-break: break-all; }
        .profile-info .role { font-size: 11px; color: #047857; }
        .nav-menu { display: flex; flex-direction: column; gap: 8px; }
        .nav-item { padding: 12px 16px; text-decoration: none; color: #64748b; font-weight: 500; font-size: 14px; border-radius: 10px; transition: all 0.2s ease; display: flex; align-items: center; gap: 12px; cursor: pointer; border: none; background: transparent; width: 100%; text-align: left; }
        .nav-item.active { background-color: #059669; color: #ffffff; font-weight: 600; box-shadow: 0 4px 12px rgba(5, 150, 105, 0.25); }
        .nav-item:hover:not(.active) { background-color: #f8fafc; color: #0f172a; }
        .nav-logout { margin-top: auto; color: #ef4444; }
        .nav-logout:hover { background-color: #fef2f2 !important; color: #dc2626 !important; }

        /* --- KONTEN UTAMA KANAN --- */
        .main-content { flex: 1; padding: 32px 40px; display: flex; flex-direction: column; gap: 28px; overflow-y: auto; height: 100vh; }
        .topbar { display: flex; justify-content: space-between; align-items: center; }
        .welcome-text h1 { font-size: 24px; font-weight: 700; color: #0f172a; }
        .welcome-text p { font-size: 14px; color: #64748b; }
        .topbar-right { display: flex; align-items: center; gap: 16px; }
        .search-container { position: relative; width: 280px; }
        .search-container svg { position: absolute; left: 14px; top: 50%; transform: translateY(-50%); color: #94a3b8; width: 18px; height: 18px; }
        .search-bar { width: 100%; padding: 10px 16px 10px 42px; border-radius: 10px; border: 1px solid #cbd5e1; background-color: #ffffff; font-size: 14px; outline: none; transition: all 0.2s ease; }
        .search-bar:focus { border-color: #059669; box-shadow: 0 0 0 3px rgba(5, 150, 105, 0.15); }
        
        .icon-btn { background: #ffffff; border: 1px solid #cbd5e1; cursor: pointer; width: 40px; height: 40px; border-radius: 10px; display: flex; justify-content: center; align-items: center; color: #475569; transition: all 0.2s ease; position: relative; }
        .icon-btn:hover { border-color: #059669; color: #059669; }
        .icon-btn .badge { position: absolute; top: -5px; right: -5px; width: 18px; height: 18px; background-color: #ef4444; color: white; border-radius: 50%; font-size: 10px; font-weight: bold; display: flex; justify-content: center; align-items: center; } 

        .page-view { display: none; flex-direction: column; gap: 28px; }
        .page-view.active { display: flex; }

        /* --- STYLE BERANDA --- */
        .home-hero { width: 100%; height: 260px; border-radius: 20px; background: linear-gradient(135deg, #059669 0%, #047857 100%); display: flex; flex-direction: column; justify-content: center; padding: 40px; color: white; position: relative; overflow: hidden; box-shadow: 0 10px 25px -5px rgba(5, 150, 105, 0.3); }
        .home-hero h2 { font-size: 30px; font-weight: 700; margin-bottom: 10px; }
        .home-hero p { font-size: 15px; color: #d1fae5; max-width: 550px; margin-bottom: 20px; line-height: 1.5; }
        .home-hero-btn { background: #ffffff; color: #059669; border: none; padding: 12px 24px; border-radius: 10px; font-weight: 700; font-size: 14px; cursor: pointer; width: max-content; transition: background 0.2s; }
        .home-hero-btn:hover { background: #f0fdf4; }

        .category-section { display: flex; flex-direction: column; gap: 14px; }
        .category-grid { display: grid; grid-template-columns: repeat(auto-fit, minmax(130px, 1fr)); gap: 16px; }
        .category-card { background: white; padding: 20px 14px; border-radius: 14px; border: 1px solid #e2e8f0; text-align: center; cursor: pointer; transition: all 0.2s; font-weight: 600; font-size: 13px; color: #334155; }
        .category-card:hover { border-color: #059669; color: #059669; box-shadow: 0 4px 12px rgba(0,0,0,0.03); transform: translateY(-2px); }

        .section-title { font-size: 18px; font-weight: 700; color: #0f172a; }
        .product-grid { display: grid; grid-template-columns: repeat(auto-fill, minmax(220px, 1fr)); gap: 20px; }
        .product-card { background: #ffffff; padding: 16px; border-radius: 16px; border: 1px solid #e2e8f0; display: flex; flex-direction: column; transition: all 0.2s ease; }
        .product-card:hover { transform: translateY(-4px); border-color: #34d399; box-shadow: 0 10px 15px -3px rgba(0,0,0,0.05); }
        
        .product-img { width: 100%; height: 160px; object-fit: cover; border-radius: 12px; margin-bottom: 14px; background: #f8fafc; border: 1px solid #e2e8f0; }
        
        .product-info { margin-bottom: 14px; }
        .product-title { font-size: 15px; font-weight: 600; color: #1e293b; margin-bottom: 4px; }
        .product-price { font-size: 15px; font-weight: 700; color: #059669; }
        .btn-beli { background-color: #059669; color: #ffffff; border: none; padding: 10px 0; border-radius: 10px; font-weight: 600; font-size: 14px; cursor: pointer; transition: background-color 0.2s ease; width: 100%; margin-top: auto; }
        .btn-beli:hover { background-color: #047857; }

        /* --- MODAL BASE --- */
        .modal-overlay { position: fixed; top: 0; left: 0; width: 100%; height: 100%; background: rgba(0,0,0,0.5); display: none; justify-content: center; align-items: center; z-index: 1000; }
        .modal-overlay.active { display: flex; }
        .modal-content { background: white; width: 480px; border-radius: 16px; padding: 24px; display: flex; flex-direction: column; gap: 18px; box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1); }
        .modal-header { display: flex; justify-content: space-between; align-items: center; border-bottom: 1px solid #e2e8f0; padding-bottom: 12px; }
        .modal-header h3 { font-size: 18px; font-weight: 700; color: #0f172a; }
        .close-modal { background: none; border: none; font-size: 22px; cursor: pointer; color: #64748b; }

        /* MODAL VARIASI */
        .product-preview-modal { display: flex; gap: 16px; align-items: center; padding-bottom: 12px; border-bottom: 1px solid #f1f5f9; }
        .preview-img { width: 64px; height: 64px; object-fit: cover; border-radius: 8px; border: 1px solid #e2e8f0; flex-shrink: 0; }
        .preview-details .p-name { font-weight: 700; font-size: 15px; color: #0f172a; }
        .preview-details .p-price { font-weight: 700; font-size: 16px; color: #059669; margin-top: 2px; }

        .variant-section { display: flex; flex-direction: column; gap: 8px; }
        .variant-label { font-size: 13px; font-weight: 600; color: #475569; }
        .size-options { display: flex; gap: 10px; flex-wrap: wrap; }
        .size-btn { padding: 8px 16px; border: 1px solid #cbd5e1; border-radius: 8px; background: #ffffff; cursor: pointer; font-size: 13px; font-weight: 600; color: #334155; transition: all 0.2s ease; }
        .size-btn:hover { border-color: #059669; color: #059669; }
        .size-btn.active { border-color: #059669; background: #ecfdf5; color: #059669; box-shadow: 0 0 0 2px rgba(5, 150, 105, 0.2); }

        .qty-control { display: flex; align-items: center; gap: 12px; margin-top: 4px; }
        .qty-btn { width: 34px; height: 34px; border-radius: 8px; border: 1px solid #cbd5e1; background: white; font-size: 16px; font-weight: bold; cursor: pointer; display: flex; justify-content: center; align-items: center; color: #334155; }
        .qty-btn:hover { background: #f8fafc; }
        .qty-input { width: 50px; text-align: center; font-weight: 700; font-size: 15px; border: none; outline: none; }

        .modal-action-btns { display: grid; grid-template-columns: 1fr 1fr; gap: 12px; margin-top: 10px; }
        .btn-cart-outline { border: 1px solid #059669; background: #ecfdf5; color: #059669; padding: 12px; border-radius: 10px; font-weight: 700; cursor: pointer; }
        .btn-cart-outline:hover { background: #d1fae5; }
        .btn-buy-now { border: none; background: #059669; color: white; padding: 12px; border-radius: 10px; font-weight: 700; cursor: pointer; }
        .btn-buy-now:hover { background: #047857; }

        /* --- KERANJANG SELEKTIF --- */
        .cart-select-all { display: flex; align-items: center; gap: 10px; font-size: 13px; font-weight: 600; color: #475569; padding-bottom: 8px; border-bottom: 1px solid #e2e8f0; }
        .cart-select-all input[type="checkbox"], .cart-item-checkbox { width: 18px; height: 18px; accent-color: #059669; cursor: pointer; }
        .cart-items-list { max-height: 280px; overflow-y: auto; display: flex; flex-direction: column; gap: 10px; padding-right: 4px; }
        .cart-item-row { display: flex; align-items: center; gap: 12px; padding: 12px; background: #f8fafc; border-radius: 10px; font-size: 14px; border: 1px solid #e2e8f0; }
        .cart-item-details { flex: 1; }
        .cart-item-title { font-weight: 600; color: #0f172a; font-size: 14px; }
        .cart-item-sub { font-size: 12px; color: #64748b; margin-top: 2px; }
        .cart-item-badge { display: inline-block; background: #e2e8f0; color: #334155; font-size: 10px; padding: 2px 6px; border-radius: 4px; font-weight: 700; margin-left: 4px; }
        .cart-item-price { font-weight: 700; color: #059669; font-size: 14px; }
        .btn-delete-item { background: none; border: none; color: #ef4444; cursor: pointer; padding: 4px; border-radius: 6px; font-size: 16px; transition: background 0.2s; }
        .btn-delete-item:hover { background: #fef2f2; }

        .total-row { display: flex; justify-content: space-between; align-items: center; font-weight: 700; font-size: 15px; color: #0f172a; margin-top: 6px; padding-top: 12px; border-top: 1px dashed #cbd5e1; }
        .btn-checkout { background-color: #059669; color: white; border: none; padding: 12px; border-radius: 10px; font-weight: 600; cursor: pointer; text-align: center; width: 100%; }
        .btn-checkout:disabled { background-color: #94a3b8; cursor: not-allowed; }

        /* TOAST NOTIFIKASI */
        .toast { position: fixed; bottom: 20px; right: 20px; background: #064e3b; color: white; padding: 12px 20px; border-radius: 10px; font-size: 14px; font-weight: 500; box-shadow: 0 10px 15px -3px rgba(0,0,0,0.1); transform: translateY(100px); opacity: 1; transition: all 0.3s ease; z-index: 1100; opacity: 0; }
        .toast.show { transform: translateY(0); opacity: 1; }

        /* KARTU HALAMAN BANTUAN & PROFIL */
        .card-panel { background: white; padding: 24px; border-radius: 16px; border: 1px solid #e2e8f0; display: flex; flex-direction: column; gap: 16px; }
        .form-group { display: flex; flex-direction: column; gap: 6px; }
        .form-group label { font-size: 13px; font-weight: 600; color: #475569; }
        .form-group input { padding: 10px 14px; border-radius: 8px; border: 1px solid #cbd5e1; font-size: 14px; outline: none; }
        .btn-save { background: #059669; color: white; border: none; padding: 10px 16px; border-radius: 8px; font-weight: 600; cursor: pointer; width: max-content; }
        table.size-table { width: 100%; border-collapse: collapse; margin-top: 8px; }
        table.size-table th, table.size-table td { border: 1px solid #e2e8f0; padding: 12px; text-align: left; font-size: 14px; }
        table.size-table th { background: #f8fafc; color: #0f172a; font-weight: 600; }
    </style>
</head>
<body>

    <!-- SIDEBAR KIRI -->
    <div class="sidebar">
        <div class="sidebar-brand">🏫 Koperasi SMK MHC</div>
        <div class="sidebar-profile">
            <div class="profile-avatar">
                <svg viewBox="0 0 24 24"><path d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z"/></svg>
            </div>
            <div class="profile-info">
                <div class="name" id="userNameDisplay">Siswa / Admin</div>
                <div class="role">SMK Muthia Harapan</div>
            </div>
        </div>

        <div class="nav-menu">
            <button class="nav-item active" onclick="switchPage('beranda', this)">Beranda</button>
            <button class="nav-item" onclick="switchPage('katalog', this)">Katalog Seragam</button>
            <button class="nav-item" onclick="switchPage('ukuran', this)">Panduan Ukuran</button>
            <button class="nav-item" onclick="switchPage('akun', this)">Profil Sekolah</button>
            <button class="nav-item nav-logout" onclick="handleLogout()">Keluar</button>
        </div>
    </div>

    <!-- KONTEN UTAMA KANAN -->
    <div class="main-content">
        <div class="topbar">
            <div class="welcome-text">
                <h1 id="pageTitle">Dashboard Utama</h1>
                <p id="pageSubtitle">Selamat datang di layanan pemesanan atribut dan seragam resmi sekolah.</p>
            </div>
            
            <div class="topbar-right">
                <div class="search-container">
                    <svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                    <input type="text" id="searchInput" class="search-bar" placeholder="Cari seragam atau atribut..." oninput="filterProducts(this.value)">
                </div>
                
                <button class="icon-btn" title="Keranjang Belanja" onclick="toggleCartModal(true)">
                    <span class="badge" id="cartBadge">0</span>
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="9" cy="21" r="1"></circle><circle cx="20" cy="21" r="1"></circle><path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"></path></svg>
                </button>
            </div>
        </div>

        <!-- VIEW BERANDA -->
        <div id="view-beranda" class="page-view active">
            <div class="home-hero">
                <h2>Koperasi SMK Muthia Harapan Cicalengka</h2>
                <p>Pusat penyediaan lengkap seragam sekolah resmi (Putra & Putri Berhijab), pakaian praktik jurusan RPL, TSM, seragam olahraga, pramuka, batik, hingga atribut sekolah.</p>
                <button class="home-hero-btn" onclick="switchPage('katalog', document.querySelectorAll('.nav-item')[1])">Lihat Katalog Lengkap</button>
            </div>

            <div class="category-section">
                <h3 class="section-title">Kategori Seragam & Atribut</h3>
                <div class="category-grid">
                    <div class="category-card" onclick="filterProducts('Putra')">👦 Seragam Putra</div>
                    <div class="category-card" onclick="filterProducts('Putri')">🧕 Seragam Putri (Hijab)</div>
                    <div class="category-card" onclick="filterProducts('Pramuka')">🏕️ Seragam Pramuka</div>
                    <div class="category-card" onclick="filterProducts('Olahraga')">⚽ Seragam Olahraga</div>
                    <div class="category-card" onclick="filterProducts('Batik')">🥻 Batik Sekolah</div>
                    <div class="category-card" onclick="filterProducts('Jurusan')">💻 Jurusan (RPL/TSM)</div>
                    <div class="category-card" onclick="filterProducts('Atribut')">🎖️ Atribut & Almamater</div>
                </div>
            </div>

            <h3 class="section-title">Daftar Produk Unggulan</h3>
            <div class="product-grid" id="productContainerBeranda"></div>
        </div>

        <!-- VIEW KATALOG -->
        <div id="view-katalog" class="page-view">
            <h3 class="section-title">Semua Katalog Seragam & Atribut</h3>
            <div class="product-grid" id="productContainerKatalog"></div>
        </div>

        <!-- VIEW UKURAN -->
        <div id="view-ukuran" class="page-view">
            <div class="card-panel">
                <h3 class="section-title">Panduan Ukuran Seragam Sekolah</h3>
                <p style="font-size: 14px; color: #64748b;">Sesuaikan ukuran lingkar dada dan panjang baju/celana sebelum memesan.</p>
                <table class="size-table">
                    <thead>
                        <tr>
                            <th>Ukuran</th>
                            <th>Lebar Dada</th>
                            <th>Panjang Baju</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr><td>S</td><td>48 cm</td><td>68 cm</td></tr>
                        <tr><td>M</td><td>50 cm</td><td>70 cm</td></tr>
                        <tr><td>L</td><td>52 cm</td><td>72 cm</td></tr>
                        <tr><td>XL</td><td>54 cm</td><td>74 cm</td></tr>
                        <tr><td>XXL</td><td>56 cm</td><td>76 cm</td></tr>
                    </tbody>
                </table>
            </div>
        </div>

        <!-- VIEW PROFIL SEKOLAH (Dulu Akun Saya) -->
        <div id="view-akun" class="page-view">
            <div class="card-panel" style="max-width: 600px;">
                <h3 class="section-title">Profil SMK Muthia Harapan Cicalengka</h3>
                <div class="form-group">
                    <label>Nama Instansi / Sekolah</label>
                    <input type="text" id="inputNamaAkun" value="SMK Muthia Harapan Cicalengka" readonly style="background: #f8fafc;">
                </div>
                <div class="form-group">
                    <label>Alamat Sekolah</label>
                    <input type="text" value="Jl. Raya Cicalengka - Majalaya, Kabupaten Bandung" readonly style="background: #f8fafc;">
                </div>
                <div class="form-group">
                    <label>Program Keunggulan / Jurusan</label>
                    <input type="text" value="Rekayasa Perangkat Lunak (RPL) & Teknik Sepeda Motor (TSM)" readonly style="background: #f8fafc;">
                </div>
                <div class="form-group">
                    <label>Kontak Koperasi / Layanan Siswa</label>
                    <input type="text" value="koperasi@smkmuthiaharapan.sch.id" readonly style="background: #f8fafc;">
                </div>
                <button class="btn-save" onclick="showToast('Informasi profil sekolah resmi.')">Informasi Terverifikasi</button>
            </div>
        </div>
    </div>

    <!-- MODAL VARIASI PRODUK -->
    <div class="modal-overlay" id="variantModal">
        <div class="modal-content">
            <div class="modal-header">
                <h3>Pilih Detail Ukuran</h3>
                <button class="close-modal" onclick="closeVariantModal()">&times;</button>
            </div>

            <div class="product-preview-modal">
                <img id="modalProdImg" class="preview-img" src="" alt="Produk">
                <div class="preview-details">
                    <div class="p-name" id="modalProdTitle">Nama Produk</div>
                    <div class="p-price" id="modalProdPrice">Rp 0</div>
                </div>
            </div>

            <div class="variant-section">
                <div class="variant-label">Pilih Ukuran:</div>
                <div class="size-options">
                    <button class="size-btn active" onclick="selectSize('S', this)">S</button>
                    <button class="size-btn" onclick="selectSize('M', this)">M</button>
                    <button class="size-btn" onclick="selectSize('L', this)">L</button>
                    <button class="size-btn" onclick="selectSize('XL', this)">XL</button>
                    <button class="size-btn" onclick="selectSize('XXL', this)">XXL</button>
                </div>
            </div>

            <div class="variant-section">
                <div class="variant-label">Jumlah Berapa:</div>
                <div class="qty-control">
                    <button class="qty-btn" onclick="changeQty(-1)">-</button>
                    <input type="text" id="modalQtyInput" class="qty-input" value="1" readonly>
                    <button class="qty-btn" onclick="changeQty(1)">+</button>
                </div>
            </div>

            <div class="modal-action-btns">
                <button class="btn-cart-outline" onclick="confirmAddToCart(false)">+ Keranjang</button>
                <button class="btn-buy-now" onclick="confirmAddToCart(true)">Beli Sekarang</button>
            </div>
        </div>
    </div>

    <!-- MODAL KERANJANG BELANJA (SELEKTIF) -->
    <div class="modal-overlay" id="cartModal">
        <div class="modal-content">
            <div class="modal-header">
                <h3>Keranjang Belanja Koperasi</h3>
                <button class="close-modal" onclick="toggleCartModal(false)">&times;</button>
            </div>

            <div class="cart-select-all" id="selectAllContainer">
                <input type="checkbox" id="selectAllCheckbox" onchange="toggleSelectAll(this.checked)" checked>
                <label for="selectAllCheckbox">Pilih Semua Produk</label>
            </div>

            <div class="cart-items-list" id="cartItemsList"></div>

            <div class="total-row">
                <div>
                    <span>Total Pembayaran:</span><br>
                    <small id="selectedCountText" style="font-weight: normal; color: #64748b;">(0 item dipilih)</small>
                </div>
                <span id="cartTotalPrice" style="color: #059669; font-size: 18px;">Rp 0</span>
            </div>

            <button class="btn-checkout" id="btnCheckout" onclick="checkout()">Lanjut Pembayaran</button>
        </div>
    </div>

    <!-- TOAST NOTIFIKASI -->
    <div class="toast" id="toastNotification">Item berhasil ditambahkan!</div>

    <script>
        // Data Produk Seragam Lengkap Putra, Putri (Hijab), Olahraga, Pramuka, Batik, Jurusan & Atribut
        const products = [
            { id: 1, name: "Seragam Putih Abu Putra", price: 135000, image: "a.jpg" },
            { id: 2, name: "Seragam Putih Abu Putri (Hijab)", price: 145000, image: "a.jpg" },
            { id: 3, name: "Seragam Pramuka Lengkap Putra", price: 155000, image: "c.jpg" },
            { id: 4, name: "Seragam Pramuka Putri (Hijab)", price: 165000, image: "l.jpg" },
            { id: 5, name: "Seragam Olahraga Sekolah Putra", price: 120000, image: "e.jpg" },
            { id: 6, name: "Seragam Olahraga Putri (Hijab & Celana Panjang)", price: 130000, image: "f.jpg" },
            { id: 7, name: "Baju Batik Khas Sekolah", price: 110000, image: "g.jpg" },
            { id: 8, name: "Baju Praktik Jurusan RPL", price: 175000, image: "j.jpg" },
            { id: 9, name: "Baju Praktik Jurusan TSM", price: 185000, image: "i.jpg" },
            { id: 10, name: "Almamater SMK Muthia Harapan", price: 210000, image: "k.jpg" },
            { id: 11, name: "Atribut Lengkap (Dasi, Topi & Badge)", price: 45000, image: "k.jpg" }
        ];

        let cart = [];
        let selectedProduct = null;
        let selectedSize = 'S';
        let selectedQty = 1;

        function renderProducts(filterText = "") {
            const containerBeranda = document.getElementById('productContainerBeranda');
            const containerKatalog = document.getElementById('productContainerKatalog');
            
            const filtered = products.filter(p => p.name.toLowerCase().includes(filterText.toLowerCase()));
            
            const htmlString = filtered.length > 0 ? filtered.map(p => `
                <div class="product-card">
                    <img src="${p.image}" alt="${p.name}" class="product-img">
                    <div class="product-info">
                        <div class="product-title">${p.name}</div>
                        <div class="product-price">Rp ${p.price.toLocaleString('id-ID')}</div>
                    </div>
                    <button class="btn-beli" onclick="openVariantModal(${p.id})">Beli</button>
                </div>
            `).join('') : '<p style="color: #64748b; font-size: 14px;">Produk tidak ditemukan.</p>';

            if(containerBeranda) containerBeranda.innerHTML = htmlString;
            if(containerKatalog) containerKatalog.innerHTML = htmlString;
        }

        function openVariantModal(productId) {
            selectedProduct = products.find(p => p.id === productId);
            selectedSize = 'S';
            selectedQty = 1;

            document.getElementById('modalProdTitle').innerText = selectedProduct.name;
            document.getElementById('modalProdPrice').innerText = 'Rp ' + selectedProduct.price.toLocaleString('id-ID');
            document.getElementById('modalProdImg').src = selectedProduct.image;
            document.getElementById('modalQtyInput').value = selectedQty;

            const sizeBtns = document.querySelectorAll('.size-btn');
            sizeBtns.forEach(btn => btn.classList.remove('active'));
            sizeBtns[0].classList.add('active');

            document.getElementById('variantModal').classList.add('active');
        }

        function closeVariantModal() {
            document.getElementById('variantModal').classList.remove('active');
        }

        function selectSize(size, element) {
            selectedSize = size;
            document.querySelectorAll('.size-btn').forEach(btn => btn.classList.remove('active'));
            element.classList.add('active');
        }

        function changeQty(delta) {
            if (selectedQty + delta >= 1) {
                selectedQty += delta;
                document.getElementById('modalQtyInput').value = selectedQty;
            }
        }

        function confirmAddToCart(isBuyNow = false) {
            const itemKey = `${selectedProduct.id}-${selectedSize}`;
            const existingIndex = cart.findIndex(item => item.key === itemKey);

            if (isBuyNow) {
                cart.forEach(item => item.selected = false);
            }

            if (existingIndex > -1) {
                cart[existingIndex].qty += selectedQty;
                cart[existingIndex].selected = true;
            } else {
                cart.push({
                    key: itemKey,
                    id: selectedProduct.id,
                    name: selectedProduct.name,
                    price: selectedProduct.price,
                    image: selectedProduct.image,
                    size: selectedSize,
                    qty: selectedQty,
                    selected: true
                });
            }

            updateCartUI();
            closeVariantModal();

            if (isBuyNow) {
                toggleCartModal(true);
            } else {
                showToast(`${selectedProduct.name} (Ukuran ${selectedSize}, ${selectedQty}x) dimasukkan ke keranjang!`);
            }
        }

        function updateCartUI() {
            const totalQty = cart.reduce((sum, item) => sum + item.qty, 0);
            document.getElementById('cartBadge').innerText = totalQty;

            const listContainer = document.getElementById('cartItemsList');
            const totalPriceEl = document.getElementById('cartTotalPrice');
            const btnCheckout = document.getElementById('btnCheckout');
            const selectAllContainer = document.getElementById('selectAllContainer');
            const selectAllCheckbox = document.getElementById('selectAllCheckbox');

            if (cart.length === 0) {
                listContainer.innerHTML = '<p style="font-size: 14px; color: #94a3b8; text-align: center; padding: 20px;">Keranjang belanja Anda kosong</p>';
                totalPriceEl.innerText = 'Rp 0';
                document.getElementById('selectedCountText').innerText = '(0 item dipilih)';
                btnCheckout.disabled = true;
                selectAllContainer.style.display = 'none';
                return;
            }

            selectAllContainer.style.display = 'flex';

            let totalPrice = 0;
            let selectedItemCount = 0;

            listContainer.innerHTML = cart.map((item, index) => {
                const subtotal = item.price * item.qty;
                if (item.selected) {
                    totalPrice += subtotal;
                    selectedItemCount += item.qty;
                }

                return `
                    <div class="cart-item-row">
                        <input type="checkbox" class="cart-item-checkbox" ${item.selected ? 'checked' : ''} onchange="toggleItemSelect(${index})">
                        <div class="cart-item-details">
                            <div class="cart-item-title">${item.name} <span class="cart-item-badge">Ukuran ${item.size}</span></div>
                            <div class="cart-item-sub">${item.qty} pcs x Rp ${item.price.toLocaleString('id-ID')}</div>
                        </div>
                        <span class="cart-item-price">Rp ${subtotal.toLocaleString('id-ID')}</span>
                        <button class="btn-delete-item" title="Hapus" onclick="deleteCartItem(${index})">🗑️</button>
                    </div>
                `;
            }).join('');

            totalPriceEl.innerText = 'Rp ' + totalPrice.toLocaleString('id-ID');
            document.getElementById('selectedCountText').innerText = `(${selectedItemCount} item dipilih)`;

            const allSelected = cart.every(item => item.selected);
            selectAllCheckbox.checked = allSelected;

            btnCheckout.disabled = selectedItemCount === 0;
        }

        function toggleItemSelect(index) {
            cart[index].selected = !cart[index].selected;
            updateCartUI();
        }

        function toggleSelectAll(isChecked) {
            cart.forEach(item => item.selected = isChecked);
            updateCartUI();
        }

        function deleteCartItem(index) {
            cart.splice(index, 1);
            updateCartUI();
            showToast("Item berhasil dihapus dari keranjang.");
        }

        function checkout() {
            const selectedItems = cart.filter(item => item.selected);

            if (selectedItems.length === 0) {
                return alert("Pilih minimal satu produk yang ingin dicheckout!");
            }

            const totalCost = selectedItems.reduce((sum, item) => sum + (item.price * item.qty), 0);
            let rincian = selectedItems.map(i => `- ${i.name} (Ukuran ${i.size}) x${i.qty}`).join('\n');
            
            alert(`Berhasil Checkout ${selectedItems.length} Produk untuk SMK Muthia Harapan Cicalengka:\n\n${rincian}\n\nTotal Pembayaran: Rp ${totalCost.toLocaleString('id-ID')}`);

            cart = cart.filter(item => !item.selected);
            updateCartUI();
            toggleCartModal(false);
        }

        function switchPage(pageId, element) {
            document.querySelectorAll('.nav-item').forEach(el => el.classList.remove('active'));
            if(element) element.classList.add('active');

            document.querySelectorAll('.page-view').forEach(view => view.classList.remove('active'));
            document.getElementById('view-' + pageId).classList.add('active');

            const titles = {
                beranda: ["Dashboard Utama", "Selamat datang di layanan pemesanan atribut dan seragam resmi sekolah."],
                katalog: ["Katalog Seragam", "Daftar lengkap seluruh seragam, pakaian praktik jurusan, dan atribut."],
                ukuran: ["Panduan Ukuran", "Panduan lengkap ukuran seragam sekolah sebelum membeli."],
                akun: ["Profil Sekolah", "Informasi profil resmi SMK Muthia Harapan Cicalengka."]
            };
            document.getElementById('pageTitle').innerText = titles[pageId][0];
            document.getElementById('pageSubtitle').innerText = titles[pageId][1];
        }

        function filterProducts(query) {
            document.getElementById('searchInput').value = query;
            renderProducts(query);
        }

        function toggleCartModal(show) {
            document.getElementById('cartModal').classList.toggle('active', show);
        }

        function showToast(message) {
            const toast = document.getElementById('toastNotification');
            toast.innerText = message;
            toast.classList.add('show');
            setTimeout(() => toast.classList.remove('show'), 2500);
        }

        function handleLogout() {
            if(confirm("Yakin ingin keluar dari sistem?")) {
                window.location.href = 'login.php';
            }
        }

        renderProducts();
        updateCartUI();
    </script>
</body>
</html>