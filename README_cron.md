
# ⏱️ Cron Scheduler Script

Script PHP sederhana untuk menjalankan **cron job** atau tugas terjadwal secara otomatis.

Proyek ini cocok digunakan untuk:
- Menjalankan tugas rutin (backup, pengiriman email, sinkronisasi data, dll.)
- Uji coba sistem penjadwalan berbasis server lokal
- Belajar bagaimana cron job bekerja dengan PHP

---

## 🧰 Teknologi yang Digunakan

- PHP (7+)
- Cron (Linux/macOS) atau Task Scheduler (Windows)
- MySQL (opsional, tergantung script)

---

## 🚀 Cara Menggunakan

### 1. Clone Repo
```bash
git clone https://github.com/hanungss/cron.git
cd cron
```

### 2. Edit Script
- Sesuaikan file `.php` dengan logika yang ingin dijalankan secara terjadwal.
- Contoh tugas: kirim email otomatis, update database, dll.

### 3. Atur Cron Job (di Linux/macOS)

Jalankan `crontab -e` dan tambahkan:

```cron
* * * * * /usr/bin/php /path/ke/folder/cron/script.php
```

Ini akan menjalankan script setiap menit.

> Ganti `/path/ke/folder/cron/script.php` dengan path lengkap ke file yang ingin dijalankan.

---

## 🧪 Contoh Cron Job

Misal, kamu ingin menjalankan `reminder.php` setiap hari pukul 08:00:

```cron
0 8 * * * /usr/bin/php /home/user/cron/reminder.php
```

---

## 📝 Catatan

- Pastikan permission file `.php` bisa dieksekusi server.
- Bisa dikombinasikan dengan log file untuk debugging.

---

## 👤 Pengembang

**Hanung Soekamti**  
🔗 [github.com/hanungss](https://github.com/hanungss)
