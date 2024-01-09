# Tugas Akhir Basis Data Terapan

## Pembuatan Website Jual Beli Senjata Api

1. buatlah kelompok dengan jumlah maksimum 5 orang
2. Buatlah aplikasi Web (PHP) yang terhubung ke database MySQL. di dalam aplikasi harus ada
- mekanisme penambahan data, ubah data, lihat data dan hapus data (crud)
- harus ada pemanggilan stored procedure, stored function, view dan trigger melalui aplikasi tersebut
- tema aplikasi bebas
3. Upload project yang sudah di buat ke repositori Github
- Repositori Harus di beri judul, deskripsi anggota kelompok, deskripsi project
- Tambahkan deskripsi link youtube tutorial pada repositori (lihat point. 4)
- Tambahkan Keterangan cara menggunakan aplikasi pada halaman repositori
4. buatlah video tutorial coding pembuatan aplikasi tersebut dengan durasi video maksimum 15 menit
5. link github dan video youtube harus di kumpulkan via aplikasi sinau pada saat uas (tidak ada uas tertulis)
6. bagi yang tidak mengumpulkan atau terlambat mengumpulkan dengan berbagai alasan, nilai uas dihitung nol dan tidak lulus mata kuliah 

 - "https://www.youtube.com/watch?v=U5z6zgrHwOY" (Begini Cara Membuat Website Simple CRUD dengan PHP dan MySQL)
 - "https://youtube.com/playlist?list=PLzt0WdHR1Z3mIO8sTcb_obvC5JmL_b-Fg&si=V6zMYIJ8_IgpTABI" (Membuat Website Dengan PHP dan MySQL)
 - "https://getbootstrap.com/docs/4.0/getting-started/introduction/" Bootstrap 4.
 - "http://materializecss.com/res/materialize.svg" Materializes 4,7.
   
  
aplikasi yang di butuhkan
1. xampp
2. Mysql
3. code compiler (contoh : VS_code)
4. code runner (.PHP, .JS, .CSS)

# Fungsi Database

- CRUD

- Trigger
  - after_produk_delete (after update)
  - after_produk_insert (nama, stock)
  - after_produk_update (no, nama, stock)

- Stored Function
  - untuk fungsi mempersingkat fungsi hapus 

- Stored Procedure
  - menghintung jumlah stock yang tercatat

- View
  - memfilter stock data pada nilai tertentu

# Deskripsi
- Website yang menjual beberapa jenis persenjataan dengan page admin serta sudah responsiv. memiliki beberapa fungsi diantaranya create, read, update, delete, view, trigger, stored function dan stored procedure. dengan crud sebagai memanipulasi data dan view digunakan untuk menyortir stock yang memiliki jumlah tertentu (di bawah 100 dan di atas 100). trigger digunakan pada bagian laporan dengan fungsi after delete, after update, after insert. stored function digunakan untuk memperpendek jalan program hapus. stored procedure digunakan untuk menghitung jumlah produk yang sudah tertera

- kontributor
  - Farhan Nur Hidayat
  - Fandy Ahmad Rizal
  - Maulana Farid Ilahi
  - Maulana Arlistyo Hariyono
  - Gusmix Mubarok

# Cara menggunakan Repositori
- Download
  - install aplikasi xampp, mysql, dan code compiler dengan benar dan mengguanakan port yang benar, untuk lebih mudah gunakanlah port 3306.
  - install aplikasi code runner pada text compiler yang anda miliki untuk menjalankan file .php, .js, dll.
  - download file .zip yang sudah di sediakan pada repositori yaitu company_profile yang ada pada tombol hijau.
  - buka .zip dengan cara klik kanan pada file yang sudah di download lalu extract file.(download lah aplikasi .zip opener untuk membuka file)
  - copy file company_profile lalu paste pada "C:\xampp\htdocs" untuk menyambung koneksi antara xampp dan mysql.
  - atau gunakan github desktop untul meng clone download repository "https://youtu.be/PoZNIbs_wx8?si=GbUrhl8TZHj-5613". menggunakan git dan git bash.

- Menjalankan Program
  - run program xampp control panel.
  - Buka code compiler yang sudah di download lalu klik file > open folder "C:\xampp\htdocs\company_profile".
  - Buka open editor lalu cek koneksi melalui koneksi.php, dan jalankan program, jika gagal akan menampilkan "Gagal Koneksi"
  - Buka "http://localhost/company_profile/bdt_crud/index.php" pada website yang anda miliki.
  - Buka "http://localhost/phpmyadmin/index.php" untuk menampilkan database, localhost akan me-direct web ke xampp company_profile.
  - buka database "company_profile" pada phpMyAdmin disana akan menampilkan database yang akan diperlukan.

note: simpan company_profile folder pada htcdocs folder di direktori "C:\xampp\htdocs" dan buka folder code compiler yang anda gunakan di company_profile yang telah anda download.
