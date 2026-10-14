
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard CleanWash</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">

    <style>
        :root {
            --primary: #2563eb;
            --sidebar: #111827;
            --bg: #f5f7fb;
        }

        body {
            background: var(--bg);
            font-family: Arial, sans-serif;
            color: #1e293b;
            margin: 0;
        }

        .sidebar {
            width: 250px;
            height: 100vh;
            position: fixed;
            top: 0;
            left: 0;
            background: var(--sidebar);
            color: white;
            padding: 24px 16px;
            z-index: 1050;
            transition: .3s;
        }

        .brand {
            font-size: 23px;
            font-weight: 800;
            margin-bottom: 35px;
        }

        .brand i { color: #60a5fa; }

        .menu-label {
            color: #94a3b8;
            font-size: 11px;
            font-weight: bold;
            letter-spacing: 1px;
            margin: 20px 12px 10px;
        }

        .sidebar a {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 12px 14px;
            margin-bottom: 5px;
            border-radius: 9px;
            color: #cbd5e1;
            text-decoration: none;
            font-size: 14px;
        }

        .sidebar a:hover,
        .sidebar a.active {
            background: var(--primary);
            color: white;
        }

        .main {
            margin-left: 250px;
            padding: 28px;
        }

        .topbar {
            background: white;
            border-radius: 14px;
            padding: 16px 22px;
            margin-bottom: 28px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 12px;
            box-shadow: 0 3px 15px #0f172a08;
        }

        .stat-card, .panel {
            background: white;
            border: 1px solid #edf0f5;
            border-radius: 15px;
            padding: 22px;
            height: 100%;
            box-shadow: 0 4px 16px #0f172a05;
        }

        .stat-icon {
            width: 48px;
            height: 48px;
            border-radius: 12px;
            display: flex;
            justify-content: center;
            align-items: center;
            font-size: 22px;
        }

        .blue { background: #dbeafe; color: #2563eb; }
        .orange { background: #ffedd5; color: #ea580c; }
        .green { background: #d1fae5; color: #059669; }
        .purple { background: #ede9fe; color: #7c3aed; }

        .stat-number {
            font-size: 27px;
            font-weight: 800;
            margin: 14px 0 3px;
        }

        .muted { color: #64748b; font-size: 13px; }

        .panel-title {
            font-size: 17px;
            font-weight: 700;
            margin-bottom: 20px;
        }

        .table thead th {
            background: #f8fafc;
            color: #64748b;
            font-size: 12px;
            text-transform: uppercase;
            white-space: nowrap;
            padding: 15px;
        }

        .table tbody td {
            padding: 15px;
            vertical-align: middle;
            font-size: 13px;
        }

        .badge-status {
            border-radius: 20px;
            padding: 7px 10px;
            font-weight: 600;
            font-size: 11px;
        }

        .status-proses { background: #fef3c7; color: #92400e; }
        .status-siap { background: #d1fae5; color: #065f46; }
        .status-selesai { background: #dbeafe; color: #1d4ed8; }
        .status-baru { background: #f3e8ff; color: #7e22ce; }

        .avatar {
            width: 38px;
            height: 38px;
            border-radius: 10px;
            background: #dbeafe;
            color: #2563eb;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            margin-right: 10px;
        }

        @media (max-width: 991px) {
            .sidebar {
                transform: translateX(-100%);
            }

            .sidebar.show {
                transform: translateX(0);
            }

            .main {
                margin-left: 0;
                padding: 16px;
            }

            .topbar { padding: 14px; }
            .stat-number { font-size: 23px; }
        }
    </style>
</head>
<body>

<aside class="sidebar" id="sidebar">
    <div class="brand">
        <i class="bi bi-droplet-half"></i> CleanWash
    </div>

    <div class="menu-label">MENU UTAMA</div>

    <a href="{{ route('dashboard') }}" class="active">
        <i class="bi bi-grid-1x2"></i> Dashboard
    </a>
    <a href="{{ url('/transaksi') }}">
        <i class="bi bi-receipt"></i> Transaksi
    </a>
    <a href="{{ url('/pelanggan') }}">
        <i class="bi bi-people"></i> Pelanggan
    </a>
    <a href="{{ url('/layanan') }}">
        <i class="bi bi-basket"></i> Layanan Laundry
    </a>

    <div class="menu-label">ANALISIS</div>

    <a href="{{ url('/laporan') }}">
        <i class="bi bi-bar-chart"></i> Laporan
    </a>
    <a href="{{ url('/pengaturan') }}">
        <i class="bi bi-gear"></i> Pengaturan
    </a>

    <div class="mt-5 pt-4 border-top border-secondary">
        <div class="d-flex align-items-center gap-2 px-2">
            <div class="stat-icon blue" style="width:40px;height:40px">
                <i class="bi bi-person"></i>
            </div>
            <div>
                <div class="fw-bold small">Administrator</div>
                <div class="text-secondary" style="font-size:11px">
                    Admin Laundry
                </div>
            </div>
        </div>
    </div>
</aside>

<main class="main">
    <header class="topbar">
        <div class="d-flex align-items-center gap-3">
            <button class="btn btn-light d-lg-none"
                    onclick="toggleSidebar()">
                <i class="bi bi-list fs-5"></i>
            </button>
            <div>
                <h5 class="fw-bold mb-1">Dashboard</h5>
                <div class="muted">Kelola usaha laundry kamu.</div>
            </div>
        </div>

        <div class="d-flex align-items-center gap-3">
            <span class="muted d-none d-sm-inline">
                <i class="bi bi-calendar3 me-1"></i>
                {{ now()->translatedFormat('d F Y') }}
            </span>
            <button class="btn btn-light position-relative">
                <i class="bi bi-bell"></i>
            </button>
            <a href="{{ url('/transaksi/create') }}"
               class="btn btn-primary">
                <i class="bi bi-plus-lg me-1"></i>
                <span class="d-none d-sm-inline">Transaksi Baru</span>
                <span class="d-sm-none">Tambah</span>
            </a>
        </div>
    </header>

    <div class="mb-4">
        <h4 class="fw-bold">Selamat datang, Admin! 👋</h4>
        <p class="muted">Berikut ringkasan aktivitas laundry hari ini.</p>
    </div>

    <!-- Statistik -->
    <div class="row g-3 mb-4">
        <div class="col-6 col-xl-3">
            <div class="stat-card">
                <div class="d-flex justify-content-between align-items-center">
                    <span class="muted">Total Pesanan</span>
                    <div class="stat-icon blue">
                        <i class="bi bi-bag-check"></i>
                    </div>
                </div>
                <div class="stat-number">48</div>
                <div class="muted">Pesanan hari ini</div>
            </div>
        </div>

        <div class="col-6 col-xl-3">
            <div class="stat-card">
                <div class="d-flex justify-content-between align-items-center">
                    <span class="muted">Sedang Diproses</span>
                    <div class="stat-icon orange">
                        <i class="bi bi-arrow-repeat"></i>
                    </div>
                </div>
                <div class="stat-number">12</div>
                <div class="muted">Cucian dikerjakan</div>
            </div>
        </div>

        <div class="col-6 col-xl-3">
            <div class="stat-card">
                <div class="d-flex justify-content-between align-items-center">
                    <span class="muted">Siap Diambil</span>
                    <div class="stat-icon green">
                        <i class="bi bi-check-circle"></i>
                    </div>
                </div>
                <div class="stat-number">8</div>
                <div class="muted">Menunggu pelanggan</div>
            </div>
        </div>

        <div class="col-6 col-xl-3">
            <div class="stat-card">
                <div class="d-flex justify-content-between align-items-center">
                    <span class="muted">Pendapatan Hari Ini</span>
                    <div class="stat-icon purple">
                        <i class="bi bi-wallet2"></i>
                    </div>
                </div>
                <div class="stat-number" style="font-size:23px">
                    Rp850.000
                </div>
                <div class="muted">Pendapatan contoh</div>
            </div>
        </div>
    </div>

    <!-- Grafik dan layanan -->
    <div class="row g-3 mb-4">
        <div class="col-lg-8">
            <div class="panel">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <div>
                        <div class="panel-title mb-1">Grafik Pendapatan</div>
                        <div class="muted">Contoh pendapatan 7 hari terakhir</div>
                    </div>
                    <span class="badge text-bg-light">Mingguan</span>
                </div>
                <div style="height:280px">
                    <canvas id="incomeChart"></canvas>
                </div>
            </div>
        </div>

        <div class="col-lg-4">
            <div class="panel">
                <div class="panel-title">Layanan Laundry</div>

                <div class="d-flex justify-content-between mb-2">
                    <span class="muted">Cuci Kering</span>
                    <strong>45%</strong>
                </div>
                <div class="progress mb-4" style="height:8px">
                    <div class="progress-bar" style="width:45%"></div>
                </div>

                <div class="d-flex justify-content-between mb-2">
                    <span class="muted">Cuci Setrika</span>
                    <strong>30%</strong>
                </div>
                <div class="progress mb-4" style="height:8px">
                    <div class="progress-bar bg-success" style="width:30%"></div>
                </div>

                <div class="d-flex justify-content-between mb-2">
                    <span class="muted">Setrika Saja</span>
                    <strong>15%</strong>
                </div>
                <div class="progress mb-4" style="height:8px">
                    <div class="progress-bar bg-warning" style="width:15%"></div>
                </div>

                <div class="d-flex justify-content-between mb-2">
                    <span class="muted">Express</span>
                    <strong>10%</strong>
                </div>
                <div class="progress" style="height:8px">
                    <div class="progress-bar bg-danger" style="width:10%"></div>
                </div>
            </div>
        </div>
    </div>

    <!-- Tabel transaksi -->
    <div class="panel">
        <div class="d-flex flex-wrap justify-content-between align-items-center gap-3 mb-3">
            <div>
                <div class="panel-title mb-1">Transaksi Terbaru</div>
                <div class="muted">Contoh data pesanan pelanggan</div>
            </div>
            <a href="{{ url('/transaksi') }}"
               class="btn btn-outline-primary btn-sm">
                Lihat Semua <i class="bi bi-arrow-right"></i>
            </a>
        </div>

        <div class="table-responsive">
            <table class="table align-middle mb-0">
                <thead>
                    <tr>
                        <th>ID Transaksi</th>
                        <th>Pelanggan</th>
                        <th>Layanan</th>
                        <th>Berat</th>
                        <th>Total</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="fw-bold">TRX-001</td>
                        <td>
                            <span class="avatar"><i class="bi bi-person"></i></span>
                            Ahmad
                        </td>
                        <td>Cuci Setrika</td>
                        <td>4 kg</td>
                        <td class="fw-bold">Rp28.000</td>
                        <td><span class="badge-status status-proses">Diproses</span></td>
                    </tr>
                    <tr>
                        <td class="fw-bold">TRX-002</td>
                        <td>
                            <span class="avatar"><i class="bi bi-person"></i></span>
                            Siti
                        </td>
                        <td>Cuci Kering</td>
                        <td>3 kg</td>
                        <td class="fw-bold">Rp15.000</td>
                        <td><span class="badge-status status-siap">Siap Diambil</span></td>
                    </tr>
                    <tr>
                        <td class="fw-bold">TRX-003</td>
                        <td>
                            <span class="avatar"><i class="bi bi-person"></i></span>
                            Rizky
                        </td>
                        <td>Express</td>
                        <td>2 kg</td>
                        <td class="fw-bold">Rp20.000</td>
                        <td><span class="badge-status status-selesai">Selesai</span></td>
                    </tr>
                    <tr>
                        <td class="fw-bold">TRX-004</td>
                        <td>
                            <span class="avatar"><i class="bi bi-person"></i></span>
                            Putri
                        </td>
                        <td>Setrika</td>
                        <td>3 kg</td>
                        <td class="fw-bold">Rp15.000</td>
                        <td><span class="badge-status status-baru">Pesanan Baru</span></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <footer class="text-center muted mt-4 mb-2">
        © {{ date('Y') }} CleanWash Laundry Management
    </footer>
</main>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
    function toggleSidebar() {
        document.getElementById('sidebar').classList.toggle('show');
    }

    const ctx = document.getElementById('incomeChart');

    new Chart(ctx, {
        type: 'line',
        data: {
            labels: ['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu', 'Minggu'],
            datasets: [{
                label: 'Pendapatan (Rp)',
                data: [350000, 520000, 410000, 700000, 580000, 850000, 650000],
                borderColor: '#2563eb',
                backgroundColor: 'rgba(37, 99, 235, 0.10)',
                fill: true,
                tension: 0.4,
                pointRadius: 4,
                pointBackgroundColor: '#2563eb'
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: { display: false },
                tooltip: {
                    callbacks: {
                        label: function(context) {
                            return 'Rp' + context.raw.toLocaleString('id-ID');
                        }
                    }
                }
            },
            scales: {
                y: {
                    beginAtZero: true,
                    ticks: {
                        callback: function(value) {
                            return 'Rp' + (value / 1000) + 'k';
                        }
                    },
                    grid: { color: '#f1f5f9' }
                },
                x: { grid: { display: false } }
            }
        }
    });
</script>

</body>
</html>
