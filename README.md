<h1 align="center">Repository Praktikum Pemrograman Web Lanjutan</h1>

## Daftar Isi 


## Cara Download

1. Install Git yang ada pada link berikut https://git-scm.com/downloads
2. Setelah selesai instalasi, masuk ke folder `xampp > htdocs`
3. Klik kanan dan buka git bash.
4. Masukkan perintah `git clone https://github.com/RobyCigar/asprak-informatika`

## Cara Update
1. Masuk ke folder yang sudah kalian download.
2. Klik kanan dan buka git bash.
3. Masukkan perintah `git pull`.

## Rangkuman Belajar 

### Syntax Dasar

Mengeluarkan pesan ke halaman
```php
	echo "Hello world";
```
Deklarasi variable
```php
	$a = "rabih";
	$b = 20;
```
Membuat fungsi
```php
	function greet() {
		return "Selamat pagi";
	}
```
Membuat indexed array dan mengaksesnya
```php
	$arr = array("merah", "jingga", "kuning", "biru");
	echo $arr[0]; // merah
	echo $arr[1]; // jingga
```

Membuat associative array
```php
	$arr = array("merah" => 4, "jingga" => 1, "kuning" => 40);
```
Scope

Deskripsi: variable yang ada di dalam function tidak dapat mengakses variable yang ada di luar function. Untuk dapat mengaksesnya dibutuhkan keyword `global`
```php
	$apel = "hijau";
	function buah() {
		// kita tidak dapat mengakses $apel
	}
```
```php
	$apel = "hijau";
	function buah() {
		global $apel;
		// sekarang kita dapat mengakses $apel
	}
```

Membuat Konstanta

Note: konstanta adalah variable yang tidak dapat diubah
```php
	define("kampus", "amikom");
	echo kampus; // amikom
```

Mendapatkan jumlah item pada array

```php
	$warna = array("merah", "jingga", "kuning");
	echo count($warna); // 3
```

### Struktur Kendali

Perulangan for

```php
	for()
```