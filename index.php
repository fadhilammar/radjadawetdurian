<?php
require_once 'controllers/MenuController.php';
$menuController = new MenuController();
$menus = $menuController->getMenus();
?>

<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;300;400;700&display=swap" rel="stylesheet">
  <script src="https://unpkg.com/feather-icons"></script>
  <link rel="stylesheet" href="assets/css/style.css">
  <title>Kopi Kenangan Senja</title>
</head>
<body class="bg-gray-900 text-white font-poppins">
  <nav class="fixed top-0 left-0 right-0 z-50 bg-gray-800 bg-opacity-80 py-4 px-6 flex justify-between items-center border-b border-gray-700">
    <a href="#" class="text-2xl font-bold italic text-white">kenangan<span class="text-yellow-500">senja</span></a>
    <div class="hidden md:flex space-x-6">
      <a href="#home" class="hover:text-yellow-500">Home</a>
      <a href="#about" class="hover:text-yellow-500">Tentang Kami</a>
      <a href="#menu" class="hover:text-yellow-500">Menu</a>
      <a href="#products" class="hover:text-yellow-500">Produk</a>
      <a href="#contact" class="hover:text-yellow-500">Kontak</a>
    </div>
    <div class="flex space-x-4">
      <a href="#" id="search-menu" class="hover:text-yellow-500"><i data-feather="search"></i></a>
      <a href="#" id="shopping-cart-button" class="hover:text-yellow-500"><i data-feather="shopping-cart"></i></a>
      <a href="#" id="menu-button" class="md:hidden hover:text-yellow-500"><i data-feather="menu"></i></a>
      <a href="#" class="hidden md:hidden hover:text-yellow-500" id="close-button"><i data-feather="x"></i></a>
    </div>
    <div class="absolute top-full right-7 bg-white px-4 py-2 w-80 text-gray-900 flex items-center hidden" id="search-form">
      <input type="search" id="search-box" placeholder="Search here..." class="w-full p-2 focus:outline-none" id="search-button">
      <label for="search" class="cursor-pointer"><i data-feather="search"></i></label>
    </div>
  </nav>

  <aside class="fixed top-0 h-full w-64 bg-white text-black shadow-lg z-50 md:hidden sidebar" id="sidenav">
    <nav class="flex flex-col h-full space-y-4 p-8">
      <a href="#home" class="hover:text-yellow-500">Home</a>
      <a href="#about" class="hover:text-yellow-500">Tentang Kami</a>
      <a href="#menu" class="hover:text-yellow-500">Menu</a>
      <a href="#products" class="hover:text-yellow-500">Produk</a>
      <a href="#contact" class="hover:text-yellow-500">Kontak</a>
    </nav>
  </aside>

  <section id="home" class="min-h-screen bg-cover bg-center flex items-center justify-center" style="background-image: url('assets/img/header-bg.jpeg');">
    <div class="bg-black bg-opacity-50 p-10 text-center rounded-lg mx-6">
      <h1 class="text-4xl font-bold mb-4">Mari Nikmati Secangkir <span class="text-yellow-500">Kopi</span></h1>
      <p class="text-lg">Lorem ipsum dolor sit amet consectetur adipisicing elit. Accusantium, enim.</p>
      <div class="mt-6 flex gap-3 justify-center">
        <a href="" class="p-3 bg-white text-gray-900 hover:bg-gray-400">Lihat Pesanan</a>
        <a href="#" id="modal-button" class="p-3 bg-blue-500 hover:bg-blue-400">Masuk</a>
      </div>
    </div>
  </section>

  <div id="login-modal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center px-12 z-50 opacity-0 pointer-events-none transition-opacity duration-500 ease-in-out">
    <form action="../controllers/UserController.php" method="POST" enctype="multipart/form-data" class="relative bg-white/60 backdrop-blur-lg p-6 rounded-lg shadow-lg w-full max-w-md">
      <button id="modal-close" type="button" class="absolute top-2 right-2 text-gray-600 hover:text-gray-800">
        <i data-feather="x"></i>
      </button>

      <?php if (isset($_SESSION['message'])): ?>
        <div class="alert <?= ($_SESSION['message_type'] == 'error') ? 'bg-red-500' : 'bg-green-500' ?> text-white p-4 rounded mb-4">
          <?= $_SESSION['message']; ?>
        </div>
        <?php unset($_SESSION['message']);
        unset($_SESSION['message_type']); ?>
      <?php endif; ?>

      <label for="email" class="block mt-2">Email</label>
      <input type="text" id="email" name="email" class="w-full p-2 mt-1 focus:outline-none text-gray-900" required>

      <label for="password" class="block mt-4">Password</label>
      <input type="password" id="password" name="password" class="w-full p-2 mt-1 focus:outline-none text-gray-900" required>

      <button type="submit" class="mt-4 w-full py-2 bg-yellow-500 hover:bg-yellow-400 text-white font-semibold rounded-lg transition duration-300 ease-in-out">LOGIN</button>
    </form>
  </div>

  <section id="about" class="py-20 px-6 bg-gray-800">
    <div class="text-center mb-10">
      <h2 class="text-3xl font-bold"><span class="text-yellow-500">Tentang</span> Kami</h2>
    </div>
    <div class="md:flex md:items-center space-y-6 md:space-y-0 md:space-x-6">
      <div class="md:w-1/2">
        <img src="assets/img/tentang-kami.jpg" alt="Tentang Kami" class="rounded-lg shadow-lg">
      </div>
      <div class="md:w-1/2 space-y-4">
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Fugiat ratione repudiandae non obcaecati sapiente sint deleniti assumenda.</p>
        <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Hic deserunt iure amet facilis eos a quo cum voluptates molestias nihil.</p>
      </div>
    </div>
  </section>

  <section id="menu" class="py-20 px-6 bg-gray-900">
    <div class="text-center mb-10">
      <h2 class="text-3xl font-bold"><span class="text-yellow-500">Menu</span> Kami</h2>
      <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Expedita, repellendus numquam quam tempora voluptatum.</p>
    </div>
    <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
      <?php foreach ($menus as $menu): ?>
        <div class="bg-gray-800 p-6 rounded-lg shadow-lg text-center flex flex-col items-center">
          <div class="flex justify-center gap-4 mb-4">
            <a href="#" class="text-yellow-500 bg-gray-900 p-3 rounded-full hover:bg-yellow-500 hover:text-gray-900 transition duration-300 ease-in-out">
              <i data-feather="shopping-cart"></i>
            </a>
            <a href="#" class="bg-yellow-500 p-3 hover:bg-yellow-400 transition duration-300 ease-in-out flex items-center justify-center">
              Pesan Sekarang
            </a>
          </div>
          <img src="storage/images/<?= $menu['menu_image']; ?>" alt="<?= $menu['menu_name']; ?>" class="rounded-lg mb-4 w-full h-48 object-cover">
          <h3 class="text-xl font-semibold text-white"><?= $menu['menu_name']; ?></h3>
          <p class="text-yellow-500 mt-2">IDR <?= $menu['price']; ?></p>
          <p class="text-gray-400 mt-2"><?= $menu['description']; ?></p>
        </div>
      <?php endforeach; ?>
    </div>
  </section>

  <section id="products" class="py-20 px-6 bg-gray-800">
    <div class="text-center mb-10">
      <h2 class="text-3xl font-bold"><span class="text-yellow-500">Produk Unggulan</span> Kami</h2>
      <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Illo unde eum, ab fuga possimus iste.</p>
    </div>
    <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
      <div class="bg-gray-900 p-6 rounded-lg shadow-lg text-center">
        <div class="flex justify-center gap-4 mb-4">
          <a href="#" class="text-yellow-500 bg-gray-800 p-3 rounded-full hover:bg-yellow-500 hover:text-gray-900 transition duration-300 ease-in-out">
            <i data-feather="shopping-cart"></i>
          </a>
          <a href="storage/images/produk-unggulan.jpg" class="text-yellow-500 bg-gray-800 p-3 rounded-full hover:bg-yellow-500 hover:text-gray-900 transition duration-300 ease-in-out">
            <i data-feather="eye"></i>
          </a>
        </div>
        <img src="storage/images/produk-unggulan.jpg" alt="Product 1" class="mb-4 rounded-lg">
        <h3 class="text-xl font-semibold">Coffee Beans 1</h3>
        <div class="flex justify-center space-x-1 text-yellow-500 my-2">
          <i data-feather="star" class="filled"></i><i data-feather="star"></i><i data-feather="star"></i><i data-feather="star"></i><i data-feather="star"></i>
        </div>
        <p class="text-yellow-500">IDR 30K <span class="line-through text-gray-400">IDR 55K</span></p>
      </div>
    </div>
  </section>

  <section id="contact" class="py-20 px-6 bg-gray-900">
    <div class="text-center mb-10">
      <h2 class="text-3xl font-bold"><span class="text-yellow-500">Kontak</span> Kami</h2>
      <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Veritatis, provident.</p>
    </div>
    <div class="md:flex md:space-x-6">
      <iframe class="w-full md:w-1/2 h-64 rounded-lg mb-6 md:mb-0" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d126899.51606762772!2d107.07185948280143!3d-6.314868889497205!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e699a97cdfd23f3%3A0xa467efa8d683cc31!2sCikarang%2C%20Kabupaten%20Bekasi%2C%20Jawa%20Barat!5e0!3m2!1sid!2sid!4v1729477296601!5m2!1sid!2sid" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade" allowfullscreen="" loading="lazy"></iframe>
      <div class="md:w-1/2">
        <form class="bg-gray-800 p-6 rounded-lg shadow-lg">
          <div class="mb-4">
            <label for="name" class="block text-sm font-semibold mb-1">Nama</label>
            <input type="text" id="name" placeholder="Nama" class="w-full p-2 text-gray-900 border border-gray-600 rounded-lg focus:outline-none focus:ring-2 focus:ring-yellow-500">
          </div>
          <div class="mb-4">
            <label for="email" class="block text-sm font-semibold mb-1">Email</label>
            <input type="email" id="email" placeholder="Email" class="w-full p-2 text-gray-900 border border-gray-600 rounded-lg focus:outline-none focus:ring-2 focus:ring-yellow-500">
          </div>
          <div class="mb-4">
            <label for="message" class="block text-sm font-semibold mb-1">Pesan</label>
            <textarea id="message" rows="4" placeholder="Tulis pesan..." class="w-full p-2 text-gray-900 border border-gray-600 rounded-lg focus:outline-none focus:ring-2 focus:ring-yellow-500"></textarea>
          </div>
          <button type="submit" class="w-full bg-yellow-500 text-gray-900 font-semibold py-2 rounded-lg hover:bg-yellow-400 transition duration-300">Kirim Pesan</button>
        </form>
      </div>
    </div>
  </section>

  <footer class="bg-gray-800 py-6 text-center">
    <p class="text-gray-400">&copy; 2024 Kopi Kenangan Senja. All rights reserved.</p>
    <div class="mt-2 text-center">
      <a href="#" class="text-gray-400 hover:text-yellow-500 mx-2">Privacy Policy | Terms of Service</a>
    </div>
  </footer>

  <script>
    feather.replace();

    const modalButton = document.getElementById('modal-button');
    const modalClose = document.getElementById('modal-close');
    const modal = document.getElementById('login-modal');

    modalButton.addEventListener('click', function() {
      modal.classList.remove('opacity-0', 'pointer-events-none');
      modal.classList.add('opacity-100', 'pointer-events-auto');
    });

    modalClose.addEventListener('click', function() {
      modal.classList.remove('opacity-100', 'pointer-events-auto');
      modal.classList.add('opacity-0', 'pointer-events-none');
    });
  </script>

  <script src="assets/js/script.js"></script>
</body>
</html>