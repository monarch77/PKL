<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - User Klaim Asuransi</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">
    <div class="container mx-auto p-6">
        <h1 class="text-3xl font-bold mb-6">Dashboard User Klaim Asuransi</h1>

</body>
</html> -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard User - Aplikasi Manajemen Klaim Asuransi</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }
        .header {
            background-color: #2c3e50;
            color: #fff;
            padding: 10px 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .header img {
            height: 40px;
        }
        .header .nav {
            display: flex;
            gap: 15px;
        }
        .header .nav a {
            color: #fff;
            text-decoration: none;
        }
        .sidebar {
            background-color: #34495e;
            color: #fff;
            width: 250px;
            height: 100vh;
            position: fixed;
            top: 0;
            left: 0;
            padding: 20px;
            box-shadow: 2px 0 5px rgba(0, 0, 0, 0.1);
        }
        .sidebar a {
            color: #fff;
            text-decoration: none;
            display: block;
            padding: 10px 0;
        }
        .sidebar a:hover {
            background-color: #1abc9c;
        }
        .main-content {
            margin-left: 270px;
            padding: 20px;
        }
        .card {
            background-color: #ecf0f1;
            border-radius: 5px;
            padding: 20px;
            margin-bottom: 20px;
        }
        .card h3 {
            margin-top: 0;
        }
        .table-container {
            margin-bottom: 20px;
        }
        .table-container table {
            width: 100%;
            border-collapse: collapse;
        }
        .table-container th, .table-container td {
            padding: 10px;
            border: 1px solid #bdc3c7;
            text-align: left;
        }
        .table-container th {
            background-color: #3498db;
            color: #fff;
        }
        .table-container tr:nth-child(even) {
            background-color: #f2f2f2;
        }
        .actions button {
            padding: 5px 10px;
            border: none;
            color: #fff;
            cursor: pointer;
        }
        .actions .approve {
            background-color: #2ecc71;
        }
        .actions .reject {
            background-color: #e74c3c;
        }
        .notifications {
            margin-bottom: 20px;
        }
        .notifications h4 {
            margin-top: 0;
        }
        footer {
            background-color: #2c3e50;
            color: #fff;
            text-align: center;
            padding: 10px;
            position: fixed;
            bottom: 0;
            width: calc(100% - 270px);
            margin-left: 270px;
        }
    </style>
</head>
<body>
    <div class="header">
        <img src="logo.png" alt="Logo">
        <div class="nav">
            <a href="#">Dashboard</a>
            <a href="#">Klaim Saya</a>
            <a href="#">Ajukan Klaim</a>
            <a href="#">Profil</a>
        </div>
    </div>
    <div class="sidebar">
        <a href="#">Dashboard</a>
        <a href="#">Klaim Saya</a>
        <a href="#">Ajukan Klaim</a>
        <a href="#">Notifikasi</a>
    </div>
    <div class="main-content">
        <div class="card">
            <h3>Ringkasan Klaim</h3>
            <div>Jumlah Klaim Saya: <strong>5</strong></div>
            <div>Klaim Diproses: <strong>2</strong></div>
            <div>Klaim Disetujui: <strong>2</strong></div>
            <div>Klaim Ditolak: <strong>1</strong></div>
        </div>

        <div class="table-container">
            <h3>Klaim Saya</h3>
            <table>
                <thead>
                    <tr>
                        <th>No. Klaim</th>
                        <th>Jenis Klaim</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>12345</td>
                        <td>Kerugian</td>
                        <td>Dalam Proses</td>
                        <td class="actions">
                            <button class="approve">Detail</button>
                            <button class="approve">Edit</button>
                        </td>
                    </tr>
                    <tr>
                        <td>12346</td>
                        <td>Kesehatan</td>
                        <td>Disetujui</td>
                        <td class="actions">
                            <button class="approve">Detail</button>
                            <button class="approve">Edit</button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div class="card">
            <h3>Ajukan Klaim Baru</h3>
            <form action="submit_claim.php" method="POST" enctype="multipart/form-data">
                <div>
                    <label for="claim_type">Jenis Klaim:</label>
                    <select id="claim_type" name="claim_type">
                        <option value="kerugian">Kerugian</option>
                        <option value="kesehatan">Kesehatan</option>
                    </select>
                </div>
                <div>
                    <label for="description">Deskripsi Klaim:</label>
                    <textarea id="description" name="description" rows="4"></textarea>
                </div>
                <div>
                    <label for="document">Upload Dokumen Pendukung:</label>
                    <input type="file" id="document" name="document">
                </div>
                <div>
                    <button type="submit">Ajukan Klaim</button>
                </div>
            </form>
        </div>

        <div class="notifications">
            <h4>Notifikasi</h4>
            <div>Klaim Anda telah disetujui</div>
            <div>Klaim baru sedang diproses</div>
        </div>
    </div>

    <footer>
        Hak Cipta © 2024 | Kebijakan Privasi | Dukungan
    </footer>
</body>
</html>
