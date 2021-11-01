<h1 align="center">Rangkuman Belajar Praktikum Pemrograman Web Lanjutan</h1>

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

Percabangan if 

```php
	if(statement) {
		// code
	}

```

Perulangan for

```php
	for($i = 0; i < count($arr); $i++) {
		// code
	}

```

### Forms

$_GET adalah variable superglobal yang digunakan untuk mengirimkan data yang **TIDAK sensitive**, seperti searchbox.

```php

	$_GET
	print_r($_GET) // menghasilkan associative array jika form telah di submit 
```

$_POST adalah variable superglobal yang digunakan untuk mengirimkan data **yang sensitive**, seperti email, password dan lain-lain.


```php

	$_POST
	print_r($_POST) // menghasilkan associative array jika form telah di submit 

```

Regex untuk validasi input, sehingga hanya menerima input berupa alphabet 


```php
	preg_match("/[^A-Za-z'-]/",$_POST['nama'] )

```

### Built in Function dan Syntax yang Sering Digunakan di PHP

trim() adalah function yang berfungsi  untuk menghilangkan whitespace dan special characters yang terdapat di awal dan akhir string 

```php
$str = trim("\t\tThese are a few words :) ...  "); 


echo $str; // hasil: These are a few words :) ...

```

htmlspecialchars() adalah function wajib biar nggak ke hack

```php
$new = htmlspecialchars("<a href='test'>Test</a>", ENT_QUOTES);
echo $new; // &lt;a href=&#039;test&#039;&gt;Test&lt;/a&gt;

```

stripslashes() berfungsi untuk menghilangkan backslash

```php
$str = "Is your name O\'reilly?";

// Outputs: Is your name O'reilly?
echo stripslashes($str);

```

exit() untuk mengakhiri script php

``` php

exit();

echo "hello world"; // baris ini tidak akan tereksekusi
```
```
