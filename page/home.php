<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>home</title>
    <style>
body {
	font-family: 'PT Sans Caption',"Helvetica Neue", Arial, Helvetica, Geneva, sans-serif;
	font-size: 3vh;
}

#header {
	display: flex;
	justify-content: space-between;
	align-items: center;
}

#logo {
  text-decoration: none;
  color: white;
  font-size: 5vh;
  font-weight: bold;
}
	
#menu-icon {
  font-family: Geneva, sans-serif;
  font-size: 6vh;
}

.hero {
	display: flex;
	flex-direction: column;
	justify-content: space-between;
	height: 100vh;
	padding: 1em;
	box-sizing: border-box;
	color: white;
	background: url(https://images.unsplash.com/photo-1500417148159-68083bd7333a) center center no-repeat;
	background-size: cover;
}

.hero-title {
	max-width: 16em;
	margin: 0;
	font-size: 12vh;
	font-weight: bold;
	line-height: .9;
}
	
	@media only screen and (min-width: 32em) { .hero-title { font-size: 16vh; } }	

.hero-footer {
	display: flex;
	margin-bottom: 1em;
}

.button {
	padding: .5em .67em;
	color: white;
	text-decoration: none;
	border: .1em solid white;

}
	
	.button-primary {
		color: black;
		background-color: white;
	}

article {
	max-width: 36em;
	margin: 0 auto;
	padding: 1em;
}	
    </style>
</head>
<body>
<section class="hero">
  <header id="header">
    <!-- <a id="logo" href="#">logo</a>
    <nav>
      <a id="menu-icon">&#8801;</a>
    </nav> -->
  </header>
  <header class="hero-header">
    <h1 class="hero-title">Aplikasi Inventaris Kantor</h1>
  </header>
  <footer class="hero-footer">
    <a class="button button-primary" href="?p=list_barang">Daftar Inventaris</a>
    <a class="button" href="?p=peminjaman">Peminjaman</a>
  </footer>
</section>
<article>
  <h2>Pengelolaan Inventaris Efisien</h2>
  <p>Aplikasi ini dirancang untuk menyediakan pengelolaan inventaris kantor yang efisien dan mudah diakses. Dengan fitur-fitur canggih yang disediakan, pengguna dapat dengan mudah menyusun dan melacak inventaris dengan baik.</p>
  <h2>Integrasi HTML5 untuk Pengalaman Terbaik</h2>
  <p>Didukung oleh HTML5 dan Bootstrap 5 CSS framework, aplikasi ini menjamin pengalaman pengguna yang responsif dan dapat disesuaikan dengan berbagai perangkat. Integrasi teknologi terkini memberikan kestabilan dan kehandalan pada aplikasi.</p>
  <h2>Pemantauan Real-time</h2>
  <p>Aplikasi ini memberikan kemampuan untuk memantau kondisi inventaris kantor secara real-time. Dengan informasi terkini mengenai pergerakan barang, pengguna dapat mengoptimalkan penggunaan inventaris untuk mencapai efisiensi maksimal.</p>
  <h2>Kompatibilitas Mobile dan Tablet</h2>
  <p>Dengan uji kompatibilitas pada berbagai perangkat seperti mobile, tablet, dan desktop, aplikasi ini memberikan fleksibilitas maksimal kepada pengguna. Pengguna dapat mengakses dan mengelola inventaris kapan saja dan di mana saja.</p>
  <h2>Dukungan Pelanggan Cepat</h2>
  <p>Kami berkomitmen untuk memberikan dukungan pelanggan yang cepat dan responsif. Tim dukungan siap membantu setiap saat, menjawab pertanyaan atau menanggapi kekhawatiran terkait penggunaan aplikasi dengan efisien.</p>
  <h2>Kustomisasi Penuh</h2>
  <p>Aplikasi ini menawarkan kemungkinan kustomisasi penuh sesuai dengan kebutuhan pengguna. Kami menerima ide dan saran mengenai template baru, dan dengan senang hati mendengarkan untuk meningkatkan pengalaman pengguna.</p>
</article>
</body>
</html>