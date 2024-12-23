<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="stylesheet" href="css/admin.css">
   <title>Admin Dashboard</title>
</head>
<body>
   <div class="sidebar">
       <div class="logo">PEPAN</div>
       <div class="user-info">
           <img src="path/to/profile.jpg" alt="admin" class="profile-pic">
           <p>admin</p>
       </div>
       <input type="text" placeholder="Search" class="search">
        <div>
            <a href="index.php" style="padding: 10px; background-color: #007BFF; color: white; text-decoration: none; border-radius: 5px;">Kembali ke Beranda</a>
        </div>
   </div>
    <div class="main-content">
       <header>
           <h1>DONASI</h1>
           <div class="header-links">
               <a href="index.php">Beranda</a> / <a href="account.php">Akun</a>
           </div>
           <a href="#" class="logout">Logout</a>
       </header>
        <div class="content">
           <button class="add-donation">Tambah DONASI</button>
           <table>
               <thead>
                   <tr>
                       <th>NO</th>
                       <th>JUDUL</th>
                       <th>ISI</th>
                       <th>TANGGAL</th>
                       <th>KATEGORI</th>
                       <th>AKSI</th>
                   </tr>
               </thead>
               <tbody>
                   <tr>
                       <td>1</td>
                       <td>Example Title</td>
                       <td>Example content...</td>
                       <td>2024-12-13</td>
                       <td>Artikel Wisata</td>
                       <td>
                           <button class="edit">Edit</button>
                           <button class="delete">Delete</button>
                       </td>
                   </tr>
                   <!-- More rows as needed -->
               </tbody>
           </table>
       </div>
   </div>
    <script src="script.js"></script>
</body>
</html>