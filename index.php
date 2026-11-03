<?php
// =====================================================================
// PHONG CÁCH XANH — Website bán đồ trang trí bàn học & bàn làm việc
// Phong cách: Retro Light (nền kem sáng, xanh sage, đất nung, vàng mù tạt)
//
// - Chạy được trên PHP 7.4+ (XAMPP / Laragon / php -S localhost:8000), không cần database.
// - Muốn dùng MySQL: thay mảng $products bằng kết quả truy vấn PDO có cùng tên khóa.
// - Sản phẩm có 'image' => null sẽ hiện khung giữ chỗ; thay bằng ảnh thật khi có
//   (ví dụ 'assets/img/chau-sen-da.jpg').
// =====================================================================

$json_flags = JSON_UNESCAPED_UNICODE | JSON_HEX_TAG | JSON_HEX_AMP | JSON_HEX_APOS | JSON_HEX_QUOT;

// ---------- Thông tin cửa hàng (dữ liệu mẫu, sửa tại đây) ----------
$shop = [
    'name'           => 'Phong Cách Xanh',
    'tagline'        => 'Retro Desk Decor Studio',
    'phone'          => '0900 123 456',
    'email'          => 'hello@phongcachxanh.vn',
    'address'        => '123 Đường Ánh Dương, Quận 1, TP. HCM',
    'hours'          => '8:00 – 21:00 (Thứ 2 – Chủ nhật)',
    'free_ship'      => 500000,   // miễn phí giao hàng từ mức này
    'combo_discount' => 0.10,     // giảm 10% khi mua theo combo
];

// ---------- Danh mục ----------
$categories = [
    'stand'     => ['label' => 'Kệ & Giá Đỡ',       'sub' => 'Nâng màn hình bằng gỗ',  'icon' => 'fa-desktop'],
    'lamp'      => ['label' => 'Đèn Bàn',            'sub' => 'Ánh sáng ấm 3000K',      'icon' => 'fa-lightbulb'],
    'plant'     => ['label' => 'Cây Xanh Mini',      'sub' => 'Chậu gốm để bàn',        'icon' => 'fa-seedling'],
    'organizer' => ['label' => 'Sắp Xếp Gọn Gàng',   'sub' => 'Kệ sách, khay đựng bút', 'icon' => 'fa-box-archive'],
    'decor'     => ['label' => 'Đồ Trang Trí',       'sub' => 'Đồng hồ, lịch gỗ',       'icon' => 'fa-clock'],
    'deskmat'   => ['label' => 'Thảm Deskmat',       'sub' => 'Nỉ & Felt cao cấp',      'icon' => 'fa-border-all'],
    'gear'      => ['label' => 'Gear Tông Sáng',     'sub' => 'Phím, chuột, tai nghe',  'icon' => 'fa-keyboard'],
];

// ---------- Sản phẩm ----------
$products = [
    [
        "id" => 1, "category" => "stand", "short" => "Kệ gỗ sồi",
        "name" => "Kệ Nâng Màn Hình Stand Wood Gỗ Sồi Sáng (Oak)",
        "price" => 1150000, "oldPrice" => 1350000, "rating" => 4.9, "reviews" => 62, "tag" => "Best Seller",
        "image" => "https://images.unsplash.com/photo-1527443224154-c4a3942d3acf?auto=format&fit=crop&w=600&q=80",
        "desc" => "Gỗ sồi tự nhiên phủ sơn bảo vệ chống nước màu sáng. Chân thép sơn tĩnh điện xám nhạt, chịu tải 30kg."
    ],
    [
        "id" => 2, "category" => "lamp", "short" => "Đèn bàn 3000K",
        "name" => "Đèn Bàn Chống Cận Minimalist White Brass 3000K",
        "price" => 850000, "oldPrice" => 1050000, "rating" => 4.9, "reviews" => 48, "tag" => "Decor Hot",
        "image" => "https://images.unsplash.com/photo-1513506003901-1e6a229e2d15?auto=format&fit=crop&w=600&q=80",
        "desc" => "Thân hợp kim trắng mờ phối chi tiết đồng thau vintage. Bóng LED ánh sáng ấm, chỉnh được 3 mức độ sáng."
    ],
    [
        "id" => 3, "category" => "lamp", "short" => "Đèn ScreenBar",
        "name" => "Thanh Đèn Treo Màn Hình ScreenBar White LED",
        "price" => 1290000, "oldPrice" => 1500000, "rating" => 4.9, "reviews" => 41, "tag" => "Tiết Kiệm Chỗ",
        "image" => "https://images.unsplash.com/photo-1547082299-de196ea013d6?auto=format&fit=crop&w=600&q=80",
        "desc" => "Gắn trực tiếp trên cạnh trên màn hình, không chiếm diện tích bàn. Ánh sáng chiếu xuống mặt bàn, hạn chế chói màn hình."
    ],
    [
        "id" => 4, "category" => "deskmat", "short" => "Deskmat nỉ xám",
        "name" => "Deskmat Nỉ Xám Nhạt Felt Pad Premium 90x40cm",
        "price" => 350000, "oldPrice" => 420000, "rating" => 4.9, "reviews" => 120, "tag" => "Must-Have",
        "image" => "https://images.unsplash.com/photo-1600585154340-be6161a56a0c?auto=format&fit=crop&w=600&q=80",
        "desc" => "Thảm trải bàn nỉ wool felt màu xám sáng, chống trượt. Bề mặt êm, bảo vệ mặt bàn gỗ và di chuột mượt."
    ],
    [
        "id" => 5, "category" => "organizer", "short" => "Kệ sách mini",
        "name" => "Kệ Sách Mini Để Bàn 2 Tầng Gỗ Bạch Dương Sáng",
        "price" => 450000, "oldPrice" => 550000, "rating" => 4.7, "reviews" => 94, "tag" => "Gọn Gàng",
        "image" => "https://images.unsplash.com/photo-1593062096033-9a26b09da705?auto=format&fit=crop&w=600&q=80",
        "desc" => "Kệ đựng sách vở, khay bút và chậu cây nhỏ. Thiết kế tối giản, hợp bàn học diện tích hẹp."
    ],
    [
        "id" => 6, "category" => "organizer", "short" => "Khay đựng bút",
        "name" => "Khay Đựng Bút Gỗ Tre 3 Ngăn Phủ Dầu Tự Nhiên",
        "price" => 180000, "oldPrice" => 220000, "rating" => 4.8, "reviews" => 73, "tag" => "Gọn Gàng",
        "image" => null,
        "desc" => "Khay gỗ tre nhẹ, 3 ngăn đựng bút, thước và ghim giấy. Mặt gỗ phủ dầu tự nhiên, giữ mặt bàn luôn ngăn nắp."
    ],
    [
        "id" => 7, "category" => "plant", "short" => "Chậu sen đá",
        "name" => "Chậu Sen Đá Mini Gốm Men Kem Có Đĩa Lót",
        "price" => 120000, "oldPrice" => 150000, "rating" => 4.9, "reviews" => 156, "tag" => "Mảng Xanh",
        "image" => null,
        "desc" => "Chậu gốm men kem có lỗ thoát nước và đĩa lót, kèm sen đá mini dễ chăm. Thêm một mảng xanh nhỏ cho góc bàn."
    ],
    [
        "id" => 8, "category" => "decor", "short" => "Đồng hồ retro",
        "name" => "Đồng Hồ Để Bàn Retro Mặt Tròn Màu Kem",
        "price" => 320000, "oldPrice" => 390000, "rating" => 4.8, "reviews" => 67, "tag" => "Retro Vibes",
        "image" => null,
        "desc" => "Đồng hồ kim chạy êm, vỏ kim loại sơn kem, chân đứng gập gọn. Điểm nhấn hoài cổ cho bàn học và bàn làm việc."
    ],
    [
        "id" => 9, "category" => "decor", "short" => "Lịch gỗ",
        "name" => "Lịch Gỗ Để Bàn Xoay Ngày Tháng Dùng Mãi",
        "price" => 260000, "oldPrice" => 310000, "rating" => 4.7, "reviews" => 39, "tag" => "Mới Về",
        "image" => null,
        "desc" => "Lịch gỗ xoay ngày – tháng, dùng lại mỗi năm không cần thay. Mặt gỗ sáng, chữ khắc gọn gàng."
    ],
    [
        "id" => 10, "category" => "gear", "short" => "Phím cơ cream",
        "name" => "Bàn Phím Cơ Bluetooth Filco Cream Light Retro",
        "price" => 3750000, "oldPrice" => 4100000, "rating" => 5.0, "reviews" => 80, "tag" => "High-End",
        "image" => "https://images.unsplash.com/photo-1587829741301-dc798b83add3?auto=format&fit=crop&w=600&q=80",
        "desc" => "Keycaps PBT màu cream off-white phối chữ xám. Switch Cherry MX êm, kết nối 3 thiết bị cùng lúc."
    ],
    [
        "id" => 11, "category" => "gear", "short" => "Chuột trắng",
        "name" => "Chuột Gaming Không Dây Pulsar X2V2 Pure White",
        "price" => 2390000, "oldPrice" => 2690000, "rating" => 5.0, "reviews" => 58, "tag" => "Ultra Light",
        "image" => "https://images.unsplash.com/photo-1615663245857-ac93bb7c39e7?auto=format&fit=crop&w=600&q=80",
        "desc" => "Trọng lượng 53g siêu nhẹ, sắc trắng tinh tế. Cảm biến PAW3395 26.000 DPI chính xác cho góc setup hiện đại."
    ],
    [
        "id" => 12, "category" => "gear", "short" => "Tai nghe trắng",
        "name" => "Tai Nghe Studio Over-Ear Pure White Audio",
        "price" => 2450000, "oldPrice" => 2800000, "rating" => 4.8, "reviews" => 35, "tag" => "New Arrival",
        "image" => "https://images.unsplash.com/photo-1546435770-a3e426bf472b?auto=format&fit=crop&w=600&q=80",
        "desc" => "Đệm da mềm màu trắng xám. Màng loa 50mm cho âm thanh cân bằng khi học tập và nghe nhạc."
    ],
];

// ---------- Combo setup (giá tự tính từ sản phẩm, giảm theo $shop['combo_discount']) ----------
$combos = [
    [
        "id" => 1, "badge" => "Set #1 · Oak & Cream",
        "title" => "Góc Học Tập Gỗ Sồi Tông Kem Ấm",
        "desc" => "Kệ nâng màn hình gỗ sồi, đèn bàn 3000K, deskmat nỉ xám nhạt và một chậu cây mini cho góc học tập dịu mắt.",
        "image" => "https://images.unsplash.com/photo-1527443224154-c4a3942d3acf?auto=format&fit=crop&w=800&q=80",
        "items" => [1, 2, 4, 7],
    ],
    [
        "id" => 2, "badge" => "Set #2 · Retro Green",
        "title" => "Góc Decor Retro Xanh Dịu",
        "desc" => "Kệ sách mini, khay đựng bút, đồng hồ để bàn và lịch gỗ. Bộ nhỏ gọn cho bàn học diện tích hẹp.",
        "image" => "https://images.unsplash.com/photo-1593062096033-9a26b09da705?auto=format&fit=crop&w=800&q=80",
        "items" => [5, 6, 8, 9],
    ],
    [
        "id" => 3, "badge" => "Set #3 · Light Gear",
        "title" => "Góc Làm Việc Tông Sáng Tối Giản",
        "desc" => "Bàn phím cơ cream, chuột không dây siêu nhẹ, thanh đèn ScreenBar và deskmat nỉ xám cho những buổi làm việc dài.",
        "image" => "https://images.unsplash.com/photo-1550745165-9bc0b252726f?auto=format&fit=crop&w=800&q=80",
        "items" => [10, 11, 3, 4],
    ],
];

$productsById = [];
foreach ($products as $p) {
    $productsById[$p['id']] = $p;
}
foreach ($combos as &$c) {
    $sum = 0;
    foreach ($c['items'] as $pid) {
        $sum += $productsById[$pid]['price'];
    }
    $c['original'] = $sum;
    $c['price']    = (int) (round($sum * (1 - $shop['combo_discount']) / 1000) * 1000);
}
unset($c);

$counts = array_count_values(array_column($products, 'category'));

// ---------- Bài viết ----------
$posts = [
    [
        "tag" => "Ánh Sáng Học Tập", "read" => "5 phút đọc", "date" => "15/10/2026",
        "title" => "Chọn đèn bàn cho góc học tập: nhiệt độ màu bao nhiêu Kelvin thì dễ chịu cho mắt?",
        "excerpt" => "Ánh sáng vàng dịu quanh 3000K–4000K thường được ưa chuộng cho buổi tối. Cùng xem cách chọn và đặt đèn đúng chỗ.",
        "image" => "https://images.unsplash.com/photo-1513506003901-1e6a229e2d15?auto=format&fit=crop&w=600&q=80",
    ],
    [
        "tag" => "Công Thái Học", "read" => "7 phút đọc", "date" => "21/10/2026",
        "title" => "Vì sao nên nâng màn hình lên tầm mắt bằng kệ gỗ monitor stand?",
        "excerpt" => "Cải thiện tư thế ngồi khi làm việc nhiều giờ mỗi ngày, đồng thời tận dụng khoảng trống dưới kệ để cất đồ gọn gàng.",
        "image" => "https://images.unsplash.com/photo-1527443224154-c4a3942d3acf?auto=format&fit=crop&w=600&q=80",
    ],
    [
        "tag" => "Cây Xanh Để Bàn", "read" => "6 phút đọc", "date" => "28/10/2026",
        "title" => "5 loại cây mini dễ chăm cho bàn làm việc ít ánh sáng",
        "excerpt" => "Sen đá, lưỡi hổ mini, trầu bà… những lựa chọn nhỏ gọn, ít tưới nước, hợp với người bận rộn.",
        "image" => "https://images.unsplash.com/photo-1593062096033-9a26b09da705?auto=format&fit=crop&w=600&q=80",
    ],
];

// ---------- Helper ----------
function e($s) { return htmlspecialchars((string) $s, ENT_QUOTES, 'UTF-8'); }
function format_vnd($amount) { return number_format($amount, 0, ',', '.') . '₫'; }
function section_heading($eyebrow, $title, $sub = '') {
    echo '<div class="text-center max-w-2xl mx-auto mb-10">';
    echo '<span class="text-xs font-bold text-retro-olive tracking-widest uppercase">' . e($eyebrow) . '</span>';
    echo '<h2 class="font-serif text-3xl sm:text-4xl font-bold text-retro-dark mt-1">' . e($title) . '</h2>';
    echo '<div class="flex items-center justify-center gap-3 text-retro-olive mt-3"><span class="h-px w-12 bg-retro-border"></span><i class="fa-solid fa-leaf text-sm"></i><span class="h-px w-12 bg-retro-border"></span></div>';
    if ($sub !== '') {
        echo '<p class="text-retro-sub text-sm mt-3 leading-relaxed">' . e($sub) . '</p>';
    }
    echo '</div>';
}
$hero = $combos[0];
?>
<!DOCTYPE html>
<html lang="vi" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= e($shop['name']) ?> – Đồ Trang Trí Bàn Học & Bàn Làm Việc Phong Cách Retro</title>
    <meta name="description" content="Phong Cách Xanh: kệ gỗ nâng màn hình, đèn bàn, cây xanh mini, đồng hồ, lịch gỗ và gear tông sáng để decor bàn học, bàn làm việc phong cách retro.">

    <!-- Tailwind CSS CDN (bản demo; khi triển khai thật nên build CSS riêng) -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Be+Vietnam+Pro:ital,wght@0,300;0,400;0,500;0,600;0,700;1,400&family=Playfair+Display:ital,wght@0,600;0,700;1,400&display=swap" rel="stylesheet">

    <script>
        // Đặt ở <head> để onerror của ảnh luôn gọi được hàm này
        function imgFallback(img) {
            var d = document.createElement('div');
            d.className = 'ph ' + img.className;
            d.innerHTML = '<i class="fa-solid ' + (img.getAttribute('data-icon') || 'fa-image') + '"></i>';
            img.parentNode.replaceChild(d, img);
        }

        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        retro: {
                            bg: '#FAF4E8',          /* Nền kem sáng chủ đạo */
                            paper: '#FFFDF8',       /* Giấy trắng ngà cho card */
                            cardHover: '#F3EAD6',   /* Kem đậm hơn một chút */
                            accent: '#B5502F',      /* Đất nung retro */
                            accentHover: '#9A4125',
                            olive: '#5B6E50',       /* Xanh sage */
                            oliveDark: '#465640',
                            gold: '#D8A33A',        /* Vàng mù tạt */
                            dark: '#2F2A24',        /* Nâu than ấm */
                            sub: '#6B6256',         /* Chữ phụ */
                            border: '#E3D6BF'       /* Viền kem */
                        }
                    },
                    fontFamily: {
                        sans: ['"Be Vietnam Pro"', 'sans-serif'],
                        serif: ['"Playfair Display"', 'serif'],
                    }
                }
            }
        }
    </script>
    <style>
        body {
            background-color: #FAF4E8;
            /* Họa tiết chấm bi nhẹ kiểu giấy cũ, nằm dưới nội dung nên không cản click */
            background-image: radial-gradient(rgba(150, 120, 80, 0.14) 1.1px, transparent 1.1px);
            background-size: 22px 22px;
            color: #2F2A24;
            font-family: 'Be Vietnam Pro', sans-serif;
        }
        /* Hiệu ứng bóng cứng kiểu retro khi hover */
        .hard-shadow { transition: transform .2s ease, box-shadow .2s ease, border-color .2s ease; }
        .hard-shadow:hover { transform: translate(-2px, -2px); box-shadow: 5px 5px 0 #2F2A24; border-color: #2F2A24; }
        /* Nhãn dán */
        .sticker {
            background: #D8A33A; color: #2F2A24; font-size: 10px; font-weight: 700;
            letter-spacing: .06em; text-transform: uppercase; padding: 3px 10px;
            border-radius: 999px; border: 1.5px solid #2F2A24; box-shadow: 2px 2px 0 #2F2A24;
            transform: rotate(-3deg);
        }
        .filter-btn {
            padding: .5rem 1rem; border-radius: 999px; font-size: .75rem; font-weight: 700;
            border: 1px solid #E3D6BF; background: #FAF4E8; color: #2F2A24; transition: all .2s ease;
        }
        .filter-btn:hover { border-color: #5B6E50; }
        .filter-btn.is-active { background: #2F2A24; border-color: #2F2A24; color: #FFFDF8; }
        /* Khung giữ chỗ khi chưa có ảnh */
        .ph {
            display: flex; align-items: center; justify-content: center; font-size: 2.25rem; color: #9C8B68;
            background: repeating-linear-gradient(45deg, #F3EAD6, #F3EAD6 10px, #EBDFC4 10px, #EBDFC4 20px);
        }
        @keyframes fadeIn { from { opacity: 0; transform: translateY(8px) scale(.98); } to { opacity: 1; transform: none; } }
        .animate-fadeIn { animation: fadeIn .25s ease-out; }
        .custom-scrollbar::-webkit-scrollbar { width: 5px; height: 5px; }
        .custom-scrollbar::-webkit-scrollbar-track { background: #F3EAD6; }
        .custom-scrollbar::-webkit-scrollbar-thumb { background: #5B6E50; border-radius: 99px; }
        section[id] { scroll-margin-top: 5rem; }
        @media (prefers-reduced-motion: reduce) {
            * { animation: none !important; transition: none !important; scroll-behavior: auto !important; }
        }
    </style>
</head>
<body class="flex flex-col min-h-screen">

    <!-- Thanh thông báo -->
    <div class="bg-retro-olive text-retro-paper text-xs py-2 px-4 md:px-12 flex justify-between items-center gap-4">
        <span class="font-medium flex items-center gap-2 mx-auto md:mx-0 text-center">
            <i class="fa-solid fa-gift text-retro-gold"></i>
            Giảm <?= (int) round($shop['combo_discount'] * 100) ?>% khi mua theo Combo Setup · Miễn phí giao hàng từ <?= format_vnd($shop['free_ship']) ?>
        </span>
        <a href="tel:<?= e(preg_replace('/\s+/', '', $shop['phone'])) ?>" class="hidden md:inline hover:text-retro-gold transition">
            <i class="fa-solid fa-headset mr-1"></i> Hotline: <?= e($shop['phone']) ?>
        </a>
    </div>

    <!-- Header -->
    <header class="sticky top-0 z-40 bg-retro-bg/90 backdrop-blur-md border-b border-retro-border">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-20">
                <button id="mobile-menu-btn" type="button" aria-label="Mở menu" class="md:hidden text-retro-dark p-2 rounded-lg hover:bg-retro-paper border border-retro-border">
                    <i class="fa-solid fa-bars text-xl"></i>
                </button>

                <a href="#" class="flex items-center gap-3 group">
                    <div class="w-11 h-11 rounded-full bg-retro-olive border-2 border-retro-dark flex items-center justify-center text-retro-paper group-hover:bg-retro-oliveDark transition-colors shadow-[2px_2px_0_#2F2A24]">
                        <i class="fa-solid fa-leaf text-lg"></i>
                    </div>
                    <div>
                        <span class="font-serif font-bold text-xl tracking-tight text-retro-dark block leading-none uppercase"><?= e($shop['name']) ?></span>
                        <span class="text-[10px] tracking-widest text-retro-olive font-bold uppercase block mt-1"><?= e($shop['tagline']) ?></span>
                    </div>
                </a>

                <nav class="hidden md:flex items-center space-x-7 text-sm font-medium text-retro-dark">
                    <a href="#categories" class="hover:text-retro-accent transition-colors">Danh Mục</a>
                    <a href="#products" class="hover:text-retro-accent transition-colors">Sản Phẩm</a>
                    <a href="#combos" class="hover:text-retro-accent transition-colors flex items-center gap-1.5">
                        Combo Setup <span class="bg-retro-accent text-white text-[9px] px-1.5 py-0.5 rounded font-bold">-<?= (int) round($shop['combo_discount'] * 100) ?>%</span>
                    </a>
                    <a href="#blog" class="hover:text-retro-accent transition-colors">Cẩm Nang Decor</a>
                </nav>

                <div class="flex items-center space-x-3 sm:space-x-4">
                    <div class="relative hidden lg:block w-60">
                        <label for="search-input" class="sr-only">Tìm sản phẩm</label>
                        <input id="search-input" type="search" autocomplete="off" placeholder="Tìm kệ gỗ, đèn bàn, cây mini..." class="w-full bg-retro-paper border border-retro-border text-retro-dark text-xs rounded-full py-2.5 pl-4 pr-9 focus:outline-none focus:border-retro-olive transition-all">
                        <i class="fa-solid fa-magnifying-glass absolute right-3.5 top-3 text-retro-sub text-xs pointer-events-none"></i>
                    </div>

                    <button id="cart-btn" type="button" aria-label="Mở giỏ hàng" class="relative p-2.5 text-retro-dark hover:bg-retro-paper border border-transparent hover:border-retro-border rounded-full transition-all">
                        <i class="fa-solid fa-bag-shopping text-lg"></i>
                        <span id="cart-badge" class="absolute top-0 right-0 bg-retro-accent text-white text-[10px] font-bold w-5 h-5 rounded-full flex items-center justify-center border-2 border-retro-bg">0</span>
                    </button>

                    <button type="button" onclick="showToast('Tính năng đăng nhập sẽ được bổ sung ở phiên bản sau.')" class="hidden sm:flex items-center gap-2 text-xs font-semibold px-4 py-2.5 rounded-full border border-retro-dark hover:bg-retro-dark hover:text-white transition-all duration-300">
                        <i class="fa-regular fa-user"></i>
                        <span>Đăng Nhập</span>
                    </button>
                </div>
            </div>
        </div>

        <!-- Menu mobile -->
        <div id="mobile-menu" class="hidden md:hidden bg-retro-paper border-t border-retro-border px-4 py-4 space-y-1">
            <label for="search-input-mobile" class="sr-only">Tìm sản phẩm</label>
            <input id="search-input-mobile" type="search" autocomplete="off" placeholder="Tìm sản phẩm decor..." class="w-full bg-retro-bg border border-retro-border text-retro-dark text-sm rounded-lg p-2.5 mb-2 focus:outline-none focus:border-retro-olive">
            <a href="#categories" class="block text-retro-dark font-medium py-2 hover:text-retro-accent">Danh Mục Decor</a>
            <a href="#products" class="block text-retro-dark font-medium py-2 hover:text-retro-accent">Tất Cả Sản Phẩm</a>
            <a href="#combos" class="block text-retro-dark font-medium py-2 hover:text-retro-accent">Combo Setup Giảm <?= (int) round($shop['combo_discount'] * 100) ?>%</a>
            <a href="#blog" class="block text-retro-dark font-medium py-2 hover:text-retro-accent">Cẩm Nang Decor</a>
        </div>
    </header>

    <main class="flex-grow">
        <noscript>
            <p class="text-center text-sm bg-retro-gold/20 text-retro-dark py-3">Trang cần bật JavaScript để hiển thị danh sách sản phẩm và giỏ hàng.</p>
        </noscript>

        <!-- Hero -->
        <section class="relative bg-gradient-to-b from-retro-bg via-retro-bg to-retro-paper border-b border-retro-border overflow-hidden py-16 lg:py-20">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
                <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 items-center">
                    <div class="lg:col-span-7 space-y-6 text-center lg:text-left">
                        <div class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full bg-retro-paper border border-retro-border text-retro-dark text-xs font-semibold">
                            <span class="w-2 h-2 rounded-full bg-retro-olive"></span>
                            Đồ trang trí bàn học & bàn làm việc · Retro sáng, xanh dịu
                        </div>
                        <h1 class="font-serif text-4xl sm:text-5xl lg:text-6xl font-bold leading-tight text-retro-dark">
                            Góc Bàn Nhỏ, <br>
                            <span class="italic font-normal text-retro-olive">Retro Sáng</span> Và Xanh Dịu.
                        </h1>
                        <p class="text-retro-sub text-base sm:text-lg max-w-xl mx-auto lg:mx-0 leading-relaxed">
                            Kệ gỗ nâng màn hình, đèn bàn ánh sáng ấm, cây xanh mini, đồng hồ và lịch gỗ. Mọi thứ phối cùng tông kem – sage – đất nung để bàn học, bàn làm việc của bạn dễ chịu hơn mỗi ngày.
                        </p>

                        <div class="flex flex-col sm:flex-row items-center justify-center lg:justify-start gap-4 pt-2">
                            <a href="#products" class="w-full sm:w-auto px-8 py-3.5 bg-retro-dark text-retro-paper font-semibold rounded-xl hover:bg-retro-olive transition-all duration-300 flex items-center justify-center gap-2 group shadow-[3px_3px_0_#5B6E50] hover:shadow-none">
                                Xem Sản Phẩm
                                <i class="fa-solid fa-arrow-right text-xs group-hover:translate-x-1 transition-transform"></i>
                            </a>
                            <a href="#combos" class="w-full sm:w-auto px-8 py-3.5 bg-retro-paper border border-retro-dark text-retro-dark font-semibold rounded-xl hover:bg-retro-cardHover transition-all flex items-center justify-center gap-2">
                                Gợi Ý Combo Setup
                            </a>
                        </div>

                        <div class="pt-8 border-t border-dashed border-retro-border grid grid-cols-3 gap-4 max-w-md mx-auto lg:mx-0">
                            <div>
                                <span class="block font-serif text-2xl font-bold text-retro-dark"><?= count($products) ?></span>
                                <span class="text-xs text-retro-sub">Sản phẩm chọn lọc</span>
                            </div>
                            <div>
                                <span class="block font-serif text-2xl font-bold text-retro-dark"><?= count($combos) ?></span>
                                <span class="text-xs text-retro-sub">Combo setup sẵn</span>
                            </div>
                            <div>
                                <span class="block font-serif text-2xl font-bold text-retro-dark">7 ngày</span>
                                <span class="text-xs text-retro-sub">Đổi trả dễ dàng</span>
                            </div>
                        </div>
                    </div>

                    <div class="lg:col-span-5 relative">
                        <div class="relative mx-auto max-w-md lg:max-w-none">
                            <div class="absolute -top-3 -left-3 w-full h-full border-2 border-retro-dark/30 rounded-2xl pointer-events-none"></div>
                            <span class="sticker absolute -top-4 right-4 z-10">Retro Light</span>
                            <div class="relative bg-retro-paper p-4 rounded-2xl border border-retro-dark shadow-[5px_5px_0_#2F2A24]">
                                <img src="<?= e($hero['image']) ?>" alt="<?= e($hero['title']) ?>" data-icon="fa-gift" onerror="imgFallback(this)" class="w-full h-72 sm:h-80 object-cover rounded-xl">
                                <div class="flex items-center justify-between gap-3 pt-3">
                                    <div class="min-w-0">
                                        <h3 class="font-bold text-retro-dark text-base truncate"><?= e($hero['title']) ?></h3>
                                        <p class="text-xs text-retro-olive font-medium"><?= count($hero['items']) ?> món · giá combo</p>
                                    </div>
                                    <div class="text-right shrink-0">
                                        <span class="block text-retro-accent font-bold text-lg leading-none"><?= format_vnd($hero['price']) ?></span>
                                        <span class="text-retro-sub text-[11px] line-through"><?= format_vnd($hero['original']) ?></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Cam kết -->
        <section class="py-6 bg-retro-paper border-b border-retro-border">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                    <?php
                    $badges = [
                        ['fa-tree',         'text-retro-olive',  'Gỗ Tự Nhiên Chọn Lọc',  'Gỗ sồi & bạch dương, phủ dầu bảo vệ'],
                        ['fa-truck-fast',   'text-retro-accent', 'Giao Hàng Cẩn Thận',    'Đóng gói chống va đập'],
                        ['fa-wand-magic-sparkles', 'text-retro-gold', 'Tư Vấn Setup Miễn Phí', 'Phối đồ cùng tông màu phòng'],
                        ['fa-shield-halved','text-retro-olive',  'Đổi Trả & Bảo Hành',    'Đổi trả 7 ngày · Gear bảo hành 12 tháng'],
                    ];
                    foreach ($badges as $b): ?>
                    <div class="flex items-center gap-3 p-3.5 rounded-xl bg-retro-bg border border-retro-border">
                        <div class="w-10 h-10 shrink-0 rounded-lg bg-retro-paper border border-retro-border flex items-center justify-center text-lg">
                            <i class="fa-solid <?= e($b[0]) ?> <?= e($b[1]) ?>"></i>
                        </div>
                        <div>
                            <h4 class="font-bold text-xs text-retro-dark"><?= e($b[2]) ?></h4>
                            <p class="text-[11px] text-retro-sub leading-snug"><?= e($b[3]) ?></p>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </section>

        <!-- Danh mục -->
        <section id="categories" class="py-16">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <?php section_heading('Phân Loại Đồ Trang Trí', 'Danh Mục Decor Bàn Học & Bàn Làm Việc', 'Chọn theo nhu cầu: nâng tầm mắt, thắp sáng, thêm mảng xanh hay sắp xếp gọn gàng.'); ?>

                <div class="grid grid-cols-2 sm:grid-cols-4 lg:grid-cols-7 gap-4">
                    <?php foreach ($categories as $slug => $cat): ?>
                    <button type="button" data-cat="<?= e($slug) ?>" class="group p-4 rounded-2xl border border-retro-border bg-retro-paper text-center hard-shadow">
                        <div class="w-14 h-14 rounded-full bg-retro-bg border border-retro-border mx-auto flex items-center justify-center text-retro-dark text-xl group-hover:bg-retro-olive group-hover:text-white group-hover:border-retro-dark transition-colors mb-3">
                            <i class="fa-solid <?= e($cat['icon']) ?>"></i>
                        </div>
                        <h3 class="font-bold text-xs text-retro-dark"><?= e($cat['label']) ?></h3>
                        <p class="text-[11px] text-retro-sub mt-0.5 leading-snug"><?= e($cat['sub']) ?></p>
                        <p class="text-[11px] text-retro-olive font-semibold mt-1"><?= (int) ($counts[$slug] ?? 0) ?> sản phẩm</p>
                    </button>
                    <?php endforeach; ?>
                </div>
            </div>
        </section>

        <!-- Sản phẩm -->
        <section id="products" class="py-16 bg-retro-paper border-t border-b border-retro-border">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex flex-col lg:flex-row lg:items-end justify-between gap-5 mb-6">
                    <div>
                        <span class="text-xs font-bold text-retro-olive tracking-widest uppercase">Chọn Lọc Cho Góc Bàn</span>
                        <h2 class="font-serif text-3xl sm:text-4xl font-bold text-retro-dark mt-1">Sản Phẩm Nổi Bật</h2>
                        <p id="result-count" class="text-xs text-retro-sub mt-2" aria-live="polite"></p>
                    </div>
                    <div class="flex items-center gap-2">
                        <label for="sort-select" class="text-xs font-semibold text-retro-sub">Sắp xếp:</label>
                        <select id="sort-select" class="bg-retro-bg border border-retro-border text-retro-dark text-xs font-semibold rounded-full py-2 pl-3 pr-8 focus:outline-none focus:border-retro-olive">
                            <option value="default">Mặc định</option>
                            <option value="price-asc">Giá thấp → cao</option>
                            <option value="price-desc">Giá cao → thấp</option>
                            <option value="rating">Đánh giá cao nhất</option>
                        </select>
                    </div>
                </div>

                <div id="filter-tabs" class="flex flex-wrap gap-2 mb-8">
                    <button type="button" data-filter="all" class="filter-btn is-active">Tất Cả</button>
                    <?php foreach ($categories as $slug => $cat): ?>
                    <button type="button" data-filter="<?= e($slug) ?>" class="filter-btn"><?= e($cat['label']) ?></button>
                    <?php endforeach; ?>
                </div>

                <div id="products-grid" class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                    <!-- Render bằng JavaScript từ mảng $products của PHP -->
                </div>
            </div>
        </section>

        <!-- Combo setup -->
        <section id="combos" class="py-16">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <?php section_heading('Phối Cảnh Không Gian', 'Combo Setup Retro Light', 'Bộ sản phẩm đã phối sẵn tông màu. Mua theo combo được giảm ' . (int) round($shop['combo_discount'] * 100) . '% so với mua lẻ.'); ?>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    <?php foreach ($combos as $c): ?>
                    <article class="bg-retro-paper rounded-2xl overflow-hidden border border-retro-border flex flex-col group hard-shadow">
                        <div class="relative overflow-hidden h-56">
                            <img src="<?= e($c['image']) ?>" alt="<?= e($c['title']) ?>" loading="lazy" data-icon="fa-gift" onerror="imgFallback(this)" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                            <span class="sticker absolute top-3 left-3"><?= e($c['badge']) ?></span>
                        </div>
                        <div class="p-5 flex flex-col flex-grow">
                            <h3 class="font-serif font-bold text-lg text-retro-dark leading-snug"><?= e($c['title']) ?></h3>
                            <p class="text-xs text-retro-sub mt-1.5 leading-relaxed"><?= e($c['desc']) ?></p>
                            <div class="flex flex-wrap gap-1.5 mt-3">
                                <?php foreach ($c['items'] as $pid): ?>
                                <span class="text-[11px] font-medium text-retro-dark bg-retro-bg border border-retro-border rounded-full px-2.5 py-0.5"><?= e($productsById[$pid]['short']) ?></span>
                                <?php endforeach; ?>
                            </div>
                            <div class="mt-auto pt-4">
                                <div class="pt-3 border-t border-dashed border-retro-border flex items-end justify-between gap-3">
                                    <div>
                                        <span class="block text-retro-accent font-bold text-lg leading-none"><?= format_vnd($c['price']) ?></span>
                                        <span class="text-[11px] text-retro-sub"><span class="line-through"><?= format_vnd($c['original']) ?></span> · tiết kiệm <?= format_vnd($c['original'] - $c['price']) ?></span>
                                    </div>
                                    <button type="button" onclick="addCombo(<?= (int) $c['id'] ?>)" class="text-xs font-bold bg-retro-dark text-retro-paper px-4 py-2.5 rounded-xl hover:bg-retro-olive transition whitespace-nowrap">
                                        <i class="fa-solid fa-cart-plus mr-1"></i> Thêm combo
                                    </button>
                                </div>
                            </div>
                        </div>
                    </article>
                    <?php endforeach; ?>
                </div>
            </div>
        </section>

        <!-- Cẩm nang -->
        <section id="blog" class="py-16 bg-retro-paper border-t border-retro-border">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <?php section_heading('Cẩm Nang & Mẹo Hay', 'Kinh Nghiệm Decor Bàn Học'); ?>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    <?php foreach ($posts as $post): ?>
                    <article class="bg-retro-bg rounded-2xl p-4 border border-retro-border flex flex-col justify-between hard-shadow">
                        <div>
                            <img src="<?= e($post['image']) ?>" alt="<?= e($post['title']) ?>" loading="lazy" data-icon="fa-book-open" onerror="imgFallback(this)" class="w-full h-44 object-cover rounded-xl mb-3">
                            <span class="text-[11px] font-bold text-retro-olive uppercase tracking-wider"><?= e($post['tag']) ?></span>
                            <h3 class="font-bold text-retro-dark text-sm mt-1 line-clamp-2"><?= e($post['title']) ?></h3>
                            <p class="text-retro-sub text-xs mt-1.5 line-clamp-3 leading-relaxed"><?= e($post['excerpt']) ?></p>
                        </div>
                        <div class="mt-4 pt-3 border-t border-dashed border-retro-border flex items-center justify-between text-[11px] text-retro-sub">
                            <span><i class="fa-regular fa-clock mr-1"></i> <?= e($post['read']) ?></span>
                            <span><?= e($post['date']) ?></span>
                        </div>
                    </article>
                    <?php endforeach; ?>
                </div>
            </div>
        </section>

        <!-- Đăng ký nhận tin -->
        <section class="py-14 bg-retro-olive text-retro-paper">
            <div class="max-w-3xl mx-auto px-4 text-center">
                <div class="w-12 h-12 rounded-full bg-white/15 text-retro-gold flex items-center justify-center mx-auto mb-3 text-xl">
                    <i class="fa-regular fa-paper-plane"></i>
                </div>
                <h2 class="font-serif text-3xl font-bold">Nhận Ưu Đãi 10% Cho Đơn Đầu Tiên</h2>
                <p class="text-white/80 text-sm mt-2 max-w-md mx-auto leading-relaxed">
                    Đăng ký email để nhận mã giảm giá và bản tin gợi ý bố trí góc học tập, góc làm việc.
                </p>

                <form onsubmit="handleNewsletter(event)" class="mt-6 flex flex-col sm:flex-row gap-2 max-w-md mx-auto">
                    <label for="newsletter-email" class="sr-only">Email của bạn</label>
                    <input id="newsletter-email" type="email" required placeholder="Nhập địa chỉ email của bạn..." class="px-4 py-3 rounded-xl bg-white/15 border border-white/30 text-white placeholder-white/60 text-sm focus:outline-none focus:border-retro-gold flex-grow">
                    <button type="submit" class="px-6 py-3 bg-retro-dark text-retro-paper font-bold rounded-xl hover:bg-black transition text-sm whitespace-nowrap">
                        Đăng Ký Ngay
                    </button>
                </form>
            </div>
        </section>
    </main>

    <!-- Footer -->
    <footer class="bg-retro-paper border-t border-retro-border text-retro-dark pt-12 pb-8">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-5 gap-8 pb-10 border-b border-dashed border-retro-border">
                <div class="lg:col-span-2 space-y-3">
                    <div class="flex items-center gap-2.5">
                        <div class="w-9 h-9 rounded-full bg-retro-olive border-2 border-retro-dark flex items-center justify-center text-retro-paper text-sm">
                            <i class="fa-solid fa-leaf"></i>
                        </div>
                        <span class="font-serif font-bold text-lg tracking-tight uppercase"><?= e($shop['name']) ?></span>
                    </div>
                    <p class="text-xs text-retro-sub leading-relaxed max-w-sm">
                        Cung cấp đồ trang trí cho bàn học và bàn làm việc: kệ gỗ nâng màn hình, đèn bàn, cây xanh mini, đồ sắp xếp và gear tông sáng, theo phong cách retro nhẹ nhàng.
                    </p>
                    <div class="space-y-1.5 text-xs text-retro-sub">
                        <p><i class="fa-solid fa-location-dot w-4 text-retro-olive"></i> <?= e($shop['address']) ?></p>
                        <p><i class="fa-solid fa-phone w-4 text-retro-olive"></i> Hotline: <?= e($shop['phone']) ?></p>
                        <p><i class="fa-solid fa-envelope w-4 text-retro-olive"></i> <?= e($shop['email']) ?></p>
                    </div>
                </div>

                <div>
                    <h4 class="font-bold text-xs uppercase tracking-wider mb-3">Sản Phẩm</h4>
                    <ul class="space-y-2 text-xs text-retro-sub">
                        <?php foreach (['stand', 'lamp', 'plant', 'organizer', 'decor'] as $slug): ?>
                        <li><a href="#products" data-cat="<?= e($slug) ?>" class="hover:text-retro-olive transition"><?= e($categories[$slug]['label']) ?></a></li>
                        <?php endforeach; ?>
                    </ul>
                </div>

                <div>
                    <h4 class="font-bold text-xs uppercase tracking-wider mb-3">Chính Sách</h4>
                    <ul class="space-y-2 text-xs text-retro-sub">
                        <li><a href="#" class="hover:text-retro-olive transition">Đổi trả trong 7 ngày</a></li>
                        <li><a href="#" class="hover:text-retro-olive transition">Bảo hành Gear 12 tháng</a></li>
                        <li><a href="#" class="hover:text-retro-olive transition">Giao hàng & đóng gói</a></li>
                        <li><a href="#" class="hover:text-retro-olive transition">Bảo mật thông tin</a></li>
                    </ul>
                </div>

                <div>
                    <h4 class="font-bold text-xs uppercase tracking-wider mb-3">Kết Nối</h4>
                    <div class="flex gap-2 mb-4">
                        <a href="#" aria-label="Facebook" class="w-8 h-8 rounded-full bg-retro-bg border border-retro-border flex items-center justify-center hover:bg-retro-dark hover:text-white transition text-xs"><i class="fa-brands fa-facebook-f"></i></a>
                        <a href="#" aria-label="Instagram" class="w-8 h-8 rounded-full bg-retro-bg border border-retro-border flex items-center justify-center hover:bg-retro-dark hover:text-white transition text-xs"><i class="fa-brands fa-instagram"></i></a>
                        <a href="#" aria-label="YouTube" class="w-8 h-8 rounded-full bg-retro-bg border border-retro-border flex items-center justify-center hover:bg-retro-dark hover:text-white transition text-xs"><i class="fa-brands fa-youtube"></i></a>
                    </div>
                    <span class="text-[11px] font-bold text-retro-sub block mb-1">Giờ làm việc:</span>
                    <p class="text-[11px] text-retro-sub"><?= e($shop['hours']) ?></p>
                </div>
            </div>

            <div class="pt-6 flex flex-col sm:flex-row items-center justify-between text-[11px] text-retro-sub gap-3">
                <p>© <?= date('Y') ?> <?= e($shop['name']) ?>. Website demo cho đồ án thiết kế web.</p>
                <div class="flex items-center gap-3">
                    <span>Thanh toán:</span>
                    <i class="fa-brands fa-cc-visa text-base" aria-label="Visa"></i>
                    <i class="fa-brands fa-cc-mastercard text-base" aria-label="Mastercard"></i>
                    <i class="fa-solid fa-qrcode text-base" aria-label="QR"></i>
                </div>
            </div>
        </div>
    </footer>

    <!-- Giỏ hàng -->
    <div id="cart-drawer" class="fixed inset-0 z-50 opacity-0 invisible pointer-events-none transition-all duration-300" aria-hidden="true">
        <div id="cart-backdrop" class="absolute inset-0 bg-retro-dark/40 backdrop-blur-sm cursor-pointer"></div>
        <div id="cart-panel" role="dialog" aria-label="Giỏ hàng" class="absolute right-0 top-0 bottom-0 w-full max-w-md bg-retro-paper border-l border-retro-dark shadow-2xl flex flex-col translate-x-full transition-transform duration-300">
            <div class="p-4 border-b border-retro-border flex items-center justify-between bg-retro-bg">
                <div class="flex items-center gap-2">
                    <i class="fa-solid fa-bag-shopping text-retro-olive"></i>
                    <h3 class="font-serif font-bold text-base text-retro-dark">Giỏ Hàng Của Bạn</h3>
                </div>
                <button id="close-cart-btn" type="button" aria-label="Đóng giỏ hàng" class="w-8 h-8 rounded-full bg-retro-paper border border-retro-border flex items-center justify-center text-retro-dark hover:bg-retro-accent hover:text-white transition">
                    <i class="fa-solid fa-xmark text-xs"></i>
                </button>
            </div>

            <div id="cart-items-container" class="flex-grow overflow-y-auto p-4 space-y-3 custom-scrollbar"></div>

            <div class="p-4 border-t border-retro-border bg-retro-bg space-y-3">
                <div>
                    <p id="ship-note" class="text-[11px] text-retro-sub mb-1.5"></p>
                    <div class="h-1.5 rounded-full bg-retro-border overflow-hidden">
                        <div id="ship-bar" class="h-full bg-retro-olive transition-all duration-300" style="width:0%"></div>
                    </div>
                </div>
                <div class="flex justify-between text-xs">
                    <span class="text-retro-sub">Tạm tính:</span>
                    <span id="cart-total-price" class="font-bold text-retro-dark text-sm">0₫</span>
                </div>
                <p class="text-[11px] text-retro-sub">Đã bao gồm thuế GTGT. Phí giao hàng tính ở bước thanh toán.</p>
                <button id="checkout-btn" type="button" class="w-full py-3 bg-retro-accent text-white font-bold rounded-xl hover:bg-retro-accentHover transition text-sm disabled:opacity-50 disabled:cursor-not-allowed">
                    Tiến Hành Thanh Toán
                </button>
            </div>
        </div>
    </div>

    <!-- Xem nhanh sản phẩm -->
    <div id="quickview-modal" class="fixed inset-0 z-50 hidden items-center justify-center p-4 bg-retro-dark/50 backdrop-blur-sm" onclick="if (event.target === this) closeQuickView()">
        <div role="dialog" aria-label="Xem nhanh sản phẩm" class="bg-retro-paper rounded-2xl max-w-3xl w-full border border-retro-dark shadow-[6px_6px_0_#2F2A24] overflow-hidden relative animate-fadeIn max-h-[92vh] overflow-y-auto">
            <button type="button" onclick="closeQuickView()" aria-label="Đóng" class="absolute top-3 right-3 z-10 w-8 h-8 rounded-full bg-retro-paper border border-retro-border flex items-center justify-center text-retro-dark hover:bg-retro-accent hover:text-white transition">
                <i class="fa-solid fa-xmark text-xs"></i>
            </button>
            <div id="quickview-content" class="grid grid-cols-1 md:grid-cols-2 p-6 gap-6"></div>
        </div>
    </div>

    <!-- Thông báo nhỏ -->
    <div id="toast" role="status" class="fixed bottom-6 right-6 z-[60] max-w-xs bg-retro-dark text-retro-paper px-4 py-3 rounded-xl shadow-xl flex items-center gap-3 border border-retro-olive transform translate-y-24 opacity-0 transition-all duration-300 pointer-events-none">
        <i class="fa-solid fa-circle-check text-retro-gold text-base"></i>
        <span id="toast-message" class="text-xs font-semibold"></span>
    </div>

    <script>
        // ============ Dữ liệu từ PHP ============
        const products   = <?= json_encode(array_values($products), $json_flags) ?>;
        const categories = <?= json_encode($categories, $json_flags) ?>;
        const combos     = <?= json_encode(array_values($combos), $json_flags) ?>;
        const FREE_SHIP    = <?= (int) $shop['free_ship'] ?>;
        const DISCOUNT_PCT = <?= (int) round($shop['combo_discount'] * 100) ?>;
        const CART_KEY     = 'pcx_cart_v1';

        // ============ Trạng thái ============
        let cart = [];            // [{ key: 'p3' | 'c1', quantity }]
        let activeFilter = 'all';
        let searchTerm = '';
        let sortMode = 'default';
        let toastTimer = null;

        // ============ Tiện ích ============
        const $ = (id) => document.getElementById(id);
        const esc = (s) => String(s).replace(/[&<>"']/g, (c) => ({ '&': '&amp;', '<': '&lt;', '>': '&gt;', '"': '&quot;', "'": '&#39;' }[c]));
        const formatPrice = (n) => new Intl.NumberFormat('vi-VN').format(n) + '₫';
        // Bỏ dấu tiếng Việt để tìm kiếm "den ban" vẫn ra "Đèn Bàn"
        const normalize = (s) => String(s).normalize('NFD').replace(/[\u0300-\u036f]/g, '').replace(/đ/g, 'd').replace(/Đ/g, 'D').toLowerCase().trim();

        function thumb(src, icon, alt, cls) {
            if (!src) return `<div class="ph ${cls}"><i class="fa-solid ${icon}"></i></div>`;
            return `<img src="${esc(src)}" alt="${esc(alt)}" loading="lazy" data-icon="${icon}" onerror="imgFallback(this)" class="${cls}">`;
        }

        function showToast(msg) {
            $('toast-message').textContent = msg;
            const toast = $('toast');
            toast.classList.remove('translate-y-24', 'opacity-0');
            clearTimeout(toastTimer);
            toastTimer = setTimeout(() => toast.classList.add('translate-y-24', 'opacity-0'), 2800);
        }

        // ============ Danh sách sản phẩm ============
        function getVisibleProducts() {
            const q = normalize(searchTerm);
            let list = products.filter((p) => {
                if (activeFilter !== 'all' && p.category !== activeFilter) return false;
                if (!q) return true;
                return normalize(p.name + ' ' + p.desc + ' ' + categories[p.category].label).includes(q);
            });
            if (sortMode === 'price-asc') list.sort((a, b) => a.price - b.price);
            else if (sortMode === 'price-desc') list.sort((a, b) => b.price - a.price);
            else if (sortMode === 'rating') list.sort((a, b) => b.rating - a.rating || b.reviews - a.reviews);
            return list;
        }

        function productCard(p) {
            const cat = categories[p.category];
            const off = p.oldPrice > p.price ? Math.round((1 - p.price / p.oldPrice) * 100) : 0;
            return `
            <article class="group bg-retro-paper rounded-2xl border border-retro-border overflow-hidden flex flex-col hard-shadow">
                <div class="relative overflow-hidden h-52 bg-retro-cardHover">
                    ${thumb(p.image, cat.icon, p.name, 'w-full h-full object-cover group-hover:scale-105 transition-transform duration-500')}
                    ${p.tag ? `<span class="sticker absolute top-3 left-3">${esc(p.tag)}</span>` : ''}
                    ${off ? `<span class="absolute top-3 right-3 bg-retro-accent text-white text-[11px] font-bold px-2 py-0.5 rounded-md">-${off}%</span>` : ''}
                    <button type="button" onclick="openQuickView(${p.id})" class="absolute bottom-3 left-1/2 -translate-x-1/2 bg-retro-paper text-retro-dark text-xs font-bold px-3.5 py-1.5 rounded-full border border-retro-dark opacity-100 md:opacity-0 md:group-hover:opacity-100 focus:opacity-100 transition-opacity duration-300 hover:bg-retro-dark hover:text-white whitespace-nowrap">
                        <i class="fa-regular fa-eye mr-1"></i> Xem nhanh
                    </button>
                </div>

                <div class="p-4 flex flex-col flex-grow">
                    <div class="flex items-center justify-between text-xs mb-1">
                        <span class="text-[11px] font-bold text-retro-olive uppercase tracking-wider">${esc(cat.label)}</span>
                        <span class="flex items-center gap-1 text-retro-gold"><i class="fa-solid fa-star"></i><span class="font-bold text-retro-dark">${p.rating}</span><span class="text-retro-sub text-[11px]">(${p.reviews})</span></span>
                    </div>
                    <h3 class="font-bold text-retro-dark text-sm leading-snug line-clamp-2 group-hover:text-retro-olive transition-colors">${esc(p.name)}</h3>
                    <p class="text-retro-sub text-xs mt-1.5 line-clamp-2 leading-relaxed">${esc(p.desc)}</p>

                    <div class="mt-auto pt-4 flex items-center justify-between">
                        <div>
                            <span class="block text-retro-accent font-bold text-base leading-none">${formatPrice(p.price)}</span>
                            ${p.oldPrice > p.price ? `<span class="text-retro-sub/70 text-[11px] line-through">${formatPrice(p.oldPrice)}</span>` : ''}
                        </div>
                        <button type="button" onclick="addToCart(${p.id})" aria-label="Thêm vào giỏ: ${esc(p.name)}" class="w-9 h-9 rounded-lg bg-retro-bg border border-retro-border flex items-center justify-center text-retro-dark hover:bg-retro-dark hover:text-white transition-colors">
                            <i class="fa-solid fa-cart-plus text-sm"></i>
                        </button>
                    </div>
                </div>
            </article>`;
        }

        function renderProducts() {
            const grid = $('products-grid');
            const list = getVisibleProducts();

            $('result-count').textContent = list.length
                ? `Đang hiển thị ${list.length} sản phẩm`
                : '';

            if (!list.length) {
                grid.innerHTML = `
                    <div class="col-span-full text-center py-14 text-retro-sub space-y-3">
                        <i class="fa-regular fa-face-smile-wink text-4xl text-retro-border"></i>
                        <p class="text-sm">Chưa tìm thấy sản phẩm phù hợp.</p>
                        <button type="button" onclick="resetFilters()" class="text-xs font-bold text-retro-accent hover:underline">Xóa bộ lọc và xem tất cả</button>
                    </div>`;
                return;
            }
            grid.innerHTML = list.map(productCard).join('');
        }

        function setFilter(cat, scroll) {
            activeFilter = cat;
            document.querySelectorAll('.filter-btn').forEach((btn) => {
                btn.classList.toggle('is-active', btn.dataset.filter === cat);
            });
            renderProducts();
            if (scroll) $('products').scrollIntoView({ behavior: 'smooth' });
        }

        function resetFilters() {
            searchTerm = '';
            $('search-input').value = '';
            $('search-input-mobile').value = '';
            setFilter('all', false);
        }

        // ============ Giỏ hàng ============
        // key: 'p<id>' cho sản phẩm lẻ, 'c<id>' cho combo
        function lineInfo(key) {
            const id = Number(key.slice(1));
            if (key[0] === 'c') {
                const c = combos.find((x) => x.id === id);
                return c ? { name: c.title, price: c.price, image: c.image, icon: 'fa-gift', note: `Combo ${c.items.length} món · giảm ${DISCOUNT_PCT}%` } : null;
            }
            const p = products.find((x) => x.id === id);
            return p ? { name: p.name, price: p.price, image: p.image, icon: categories[p.category].icon, note: '' } : null;
        }

        function loadCart() {
            try {
                const raw = JSON.parse(localStorage.getItem(CART_KEY) || '[]');
                cart = Array.isArray(raw) ? raw.filter((l) => l && lineInfo(String(l.key)) && l.quantity > 0) : [];
            } catch (e) { cart = []; }
        }
        function saveCart() {
            try { localStorage.setItem(CART_KEY, JSON.stringify(cart)); } catch (e) { /* bỏ qua nếu bị chặn */ }
        }

        function addLine(key, qty) {
            const line = cart.find((l) => l.key === key);
            if (line) line.quantity += qty; else cart.push({ key, quantity: qty });
        }

        function addToCart(productId) {
            const p = products.find((x) => x.id === productId);
            if (!p) return;
            addLine('p' + productId, 1);
            updateCartUI();
            showToast(`Đã thêm "${p.name}" vào giỏ!`);
        }

        function addCombo(comboId) {
            const c = combos.find((x) => x.id === comboId);
            if (!c) return;
            addLine('c' + comboId, 1);
            updateCartUI();
            showToast(`Đã thêm combo "${c.title}" (giảm ${DISCOUNT_PCT}%).`);
        }

        function changeQty(key, delta) {
            const line = cart.find((l) => l.key === key);
            if (!line) return;
            line.quantity += delta;
            if (line.quantity <= 0) cart = cart.filter((l) => l.key !== key);
            updateCartUI();
        }

        function removeLine(key) {
            cart = cart.filter((l) => l.key !== key);
            updateCartUI();
        }

        function updateCartUI() {
            saveCart();
            $('cart-badge').textContent = cart.reduce((s, l) => s + l.quantity, 0);

            const container = $('cart-items-container');
            if (!cart.length) {
                container.innerHTML = `
                    <div class="text-center py-12 text-retro-sub space-y-2">
                        <i class="fa-solid fa-basket-shopping text-4xl text-retro-border"></i>
                        <p class="text-sm">Giỏ hàng của bạn đang trống.</p>
                        <a href="#products" onclick="toggleCart(false)" class="inline-block text-xs font-bold text-retro-accent hover:underline">Xem sản phẩm →</a>
                    </div>`;
            } else {
                container.innerHTML = cart.map((l) => {
                    const info = lineInfo(l.key);
                    return `
                    <div class="flex gap-3 p-2.5 bg-retro-bg rounded-xl border border-retro-border items-center">
                        ${thumb(info.image, info.icon, info.name, 'w-14 h-14 shrink-0 object-cover rounded-lg border border-retro-border')}
                        <div class="flex-grow min-w-0">
                            <h4 class="font-bold text-xs text-retro-dark line-clamp-2">${esc(info.name)}</h4>
                            ${info.note ? `<span class="text-[11px] text-retro-olive font-semibold">${esc(info.note)}</span>` : ''}
                            <span class="text-retro-accent font-bold text-xs block mt-0.5">${formatPrice(info.price)}</span>
                            <div class="flex items-center gap-1.5 mt-1.5">
                                <button type="button" onclick="changeQty('${l.key}', -1)" aria-label="Giảm số lượng" class="w-6 h-6 rounded bg-retro-paper border border-retro-border flex items-center justify-center text-xs hover:bg-retro-dark hover:text-white">−</button>
                                <span class="text-xs font-bold w-5 text-center">${l.quantity}</span>
                                <button type="button" onclick="changeQty('${l.key}', 1)" aria-label="Tăng số lượng" class="w-6 h-6 rounded bg-retro-paper border border-retro-border flex items-center justify-center text-xs hover:bg-retro-dark hover:text-white">+</button>
                            </div>
                        </div>
                        <button type="button" onclick="removeLine('${l.key}')" aria-label="Xóa khỏi giỏ" class="text-retro-sub hover:text-retro-accent p-1.5">
                            <i class="fa-solid fa-trash-can text-xs"></i>
                        </button>
                    </div>`;
                }).join('');
            }

            const total = cart.reduce((s, l) => s + lineInfo(l.key).price * l.quantity, 0);
            $('cart-total-price').textContent = formatPrice(total);
            $('checkout-btn').disabled = cart.length === 0;

            const remaining = FREE_SHIP - total;
            $('ship-bar').style.width = Math.min(100, (total / FREE_SHIP) * 100) + '%';
            $('ship-note').textContent = total === 0
                ? `Miễn phí giao hàng cho đơn từ ${formatPrice(FREE_SHIP)}`
                : (remaining > 0 ? `Mua thêm ${formatPrice(remaining)} để được miễn phí giao hàng` : 'Đơn hàng của bạn được miễn phí giao hàng');
        }

        function toggleCart(show) {
            const drawer = $('cart-drawer');
            drawer.classList.toggle('opacity-0', !show);
            drawer.classList.toggle('invisible', !show);
            drawer.classList.toggle('pointer-events-none', !show);
            drawer.setAttribute('aria-hidden', String(!show));
            $('cart-panel').classList.toggle('translate-x-full', !show);
            document.body.classList.toggle('overflow-hidden', show);
        }

        // ============ Xem nhanh ============
        function openQuickView(id) {
            const p = products.find((x) => x.id === id);
            if (!p) return;
            const cat = categories[p.category];
            $('quickview-content').innerHTML = `
                <div class="bg-retro-cardHover rounded-xl overflow-hidden border border-retro-border h-64 md:h-full min-h-[16rem]">
                    ${thumb(p.image, cat.icon, p.name, 'w-full h-full object-cover')}
                </div>
                <div class="flex flex-col justify-between gap-4">
                    <div>
                        <span class="text-[11px] font-bold text-retro-olive uppercase tracking-wider">${esc(cat.label)}</span>
                        <h2 class="font-serif font-bold text-xl text-retro-dark mt-0.5 leading-snug">${esc(p.name)}</h2>
                        <div class="flex items-center gap-1.5 mt-1.5 text-xs">
                            <i class="fa-solid fa-star text-retro-gold"></i>
                            <span class="font-bold text-retro-dark">${p.rating}</span>
                            <span class="text-retro-sub">(${p.reviews} đánh giá)</span>
                        </div>
                        <p class="text-sm text-retro-sub mt-3 leading-relaxed">${esc(p.desc)}</p>
                    </div>
                    <div class="space-y-3 pt-3 border-t border-dashed border-retro-border">
                        <div class="flex items-baseline gap-2">
                            <span class="text-2xl font-bold text-retro-accent">${formatPrice(p.price)}</span>
                            ${p.oldPrice > p.price ? `<span class="text-xs text-retro-sub line-through">${formatPrice(p.oldPrice)}</span>` : ''}
                        </div>
                        <button type="button" onclick="addToCart(${p.id}); closeQuickView();" class="w-full py-3 bg-retro-dark text-retro-paper font-bold rounded-xl hover:bg-retro-olive transition text-sm flex items-center justify-center gap-2">
                            <i class="fa-solid fa-cart-plus"></i> Thêm Vào Giỏ Hàng
                        </button>
                    </div>
                </div>`;
            const modal = $('quickview-modal');
            modal.classList.remove('hidden');
            modal.classList.add('flex');
        }

        function closeQuickView() {
            const modal = $('quickview-modal');
            modal.classList.add('hidden');
            modal.classList.remove('flex');
        }

        function handleNewsletter(e) {
            e.preventDefault();
            showToast('Đã đăng ký nhận tin ưu đãi thành công!');
            e.target.reset();
        }

        // ============ Sự kiện ============
        document.addEventListener('click', (e) => {
            const tab = e.target.closest('[data-filter]');
            if (tab) { setFilter(tab.dataset.filter, false); return; }
            const catBtn = e.target.closest('[data-cat]');
            if (catBtn) { setFilter(catBtn.dataset.cat, true); }
        });

        $('sort-select').addEventListener('change', (e) => { sortMode = e.target.value; renderProducts(); });

        ['search-input', 'search-input-mobile'].forEach((id) => {
            const input = $(id);
            input.addEventListener('input', (e) => {
                searchTerm = e.target.value;
                // đồng bộ hai ô tìm kiếm
                ['search-input', 'search-input-mobile'].forEach((other) => { if (other !== id) $(other).value = searchTerm; });
                renderProducts();
            });
            input.addEventListener('keydown', (e) => {
                if (e.key === 'Enter') { $('products').scrollIntoView({ behavior: 'smooth' }); }
            });
        });

        $('cart-btn').addEventListener('click', () => toggleCart(true));
        $('close-cart-btn').addEventListener('click', () => toggleCart(false));
        $('cart-backdrop').addEventListener('click', () => toggleCart(false));
        $('checkout-btn').addEventListener('click', () => showToast('Đây là bản demo, chưa kết nối cổng thanh toán.'));

        document.addEventListener('keydown', (e) => {
            if (e.key === 'Escape') { toggleCart(false); closeQuickView(); }
        });

        const mobileMenu = $('mobile-menu');
        $('mobile-menu-btn').addEventListener('click', () => mobileMenu.classList.toggle('hidden'));
        mobileMenu.querySelectorAll('a').forEach((a) => a.addEventListener('click', () => mobileMenu.classList.add('hidden')));

        // ============ Khởi tạo ============
        window.addEventListener('DOMContentLoaded', () => {
            loadCart();
            renderProducts();
            updateCartUI();
        });
    </script>
</body>
</html>
