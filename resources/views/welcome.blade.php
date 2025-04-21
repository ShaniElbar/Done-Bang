<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Done Bang</title>
    @vite('resources/css/app.css')
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <link
        href="https://fonts.googleapis.com/css2?family=Arvo:ital,wght@0,400;0,700;1,400;1,700&family=Wix+Madefor+Text:ital,wght@0,400..800;1,400..800&display=swap"
        rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Wix+Madefor+Text:ital,wght@0,400..800;1,400..800&display=swap"
        rel="stylesheet">

</head>
<body class="bg-gray-50 text-gray-800">

    <header class="bg-white shadow sticky top-0 z-50">
      <div class="max-w-7xl mx-auto px-6 py-4 flex justify-between items-center">
        <h1 class="text-2xl font-bold text-gray-600">Done Bang</h1>
        <nav class="space-x-6 hidden md:block">
          <a href="#fitur" class="text-gray-600 hover:text-[#2d2d2d] font-medium">Fitur</a>
          <a href="#testimoni" class="text-gray-600 hover:text-[#2d2d2d] font-medium">Testimoni</a>
          <a href="#faq" class="text-gray-600 hover:text-[#2d2d2d] font-medium">FAQ</a>
        </nav>
        <div class="hidden md:flex items-center space-x-4">
          <a href="{{ route('auth.login') }}" class="text-[#335166] font-semibold">Login</a>
          <a href="{{ route('auth.register') }}" class="bg-[#335166] text-white px-4 py-2 rounded-md hover:bg-[#2d2d2d] font-semibold">Daftar</a>
        </div>
      </div>
    </header>

   
    <section class="bg-gradient-to-br from-[#335166] to-[#121212] text-white py-24 text-center px-6">
      <h2 class="text-4xl md:text-5xl font-bold mb-4">Atur Tugas, Capai Target!</h2>
      <p class="text-lg md:text-xl mb-8 max-w-2xl mx-auto">Aplikasi to-do list yang membantu kamu tetap produktif dan fokus setiap hari.</p>
      <a href="{{ route('auth.register') }}" class="bg-white text-[#2d2d2d] px-6 py-3 rounded-full font-semibold hover:bg-gray-100 transition">Mulai Gratis Sekarang</a>
    </section>

   
    <section id="fitur" class="flex items-center px-[100px] py-20 bg-white">
      <div class="w-full mx-auto px-6">
        <h3 class="text-3xl font-bold text-center mb-12">Fitur Unggulan</h3>
        <div class="grid md:grid-cols-2 gap-10">
          <div class="bg-gray-100 p-6 rounded-lg shadow hover:shadow-lg">
            <h4 class="text-xl font-semibold mb-2">Drag & Drop Task</h4>
            <p>Kamu bisa dengan mudah memindahkan tugas antar kategori atau hari menggunakan fitur drag-and-drop.</p>
          </div>
          <div class="bg-gray-100 p-6 rounded-lg shadow hover:shadow-lg">
            <h4 class="text-xl font-semibold mb-2">Mode Gelap</h4>
            <p>Sesuaikan tampilan sesuai mood dan waktu dengan pilihan tema terang dan gelap.</p>
          </div>
        </div>
      </div>
    </section>


    <section id="testimoni" class="py-20 bg-gray-50">
      <div class="max-w-6xl mx-auto px-6 text-center">
        <h3 class="text-3xl font-bold mb-12">Apa Kata Mereka?</h3>
        <div class="grid md:grid-cols-3 gap-8">
          <div class="bg-white p-6 rounded-lg shadow">
            <p class="italic mb-4">"ToDoMaster bantu saya mengatur deadline proyek kantor. Sekarang semua lebih rapi!"</p>
            <h4 class="font-semibold">– Andi, Project Manager</h4>
          </div>
          <div class="bg-white p-6 rounded-lg shadow">
            <p class="italic mb-4">"Fitur statistiknya bikin saya semangat menyelesaikan tugas setiap minggu."</p>
            <h4 class="font-semibold">– Rina, Mahasiswi</h4>
          </div>
          <div class="bg-white p-6 rounded-lg shadow">
            <p class="italic mb-4">"Simple tapi powerful. Pas banget buat saya yang butuh to-do list cepat dan ringan."</p>
            <h4 class="font-semibold">– Budi, Freelancer</h4>
          </div>
        </div>
      </div>
    </section>

 
    


    <section id="faq" class="py-20 bg-gray-50">
      <div class="max-w-4xl mx-auto px-6">
        <h3 class="text-3xl font-bold text-center mb-10">Pertanyaan Umum</h3>
        <div class="space-y-6">
          <div>
            <h4 class="font-semibold">Apakah ada batasan jumlah task?</h4>
            <p class="text-gray-600">Pada paket Gratis, kamu bisa membuat hingga 20 task per hari. Untuk task tak terbatas, upgrade ke paket Pro.</p>
          </div>
          <div>
            <h4 class="font-semibold">Apakah ToDoMaster bisa digunakan offline?</h4>
            <p class="text-gray-600">Untuk saat ini, aplikasi membutuhkan koneksi internet. Fitur offline sedang dalam pengembangan.</p>
          </div>
          <div>
            <h4 class="font-semibold">Bagaimana cara membatalkan langganan?</h4>
            <p class="text-gray-600">Kamu bisa membatalkan langganan kapan saja melalui dashboard pengguna tanpa biaya tambahan.</p>
          </div>
        </div>
      </div>
    </section>


    <footer class="bg-gray-800 text-gray-300 py-10">
      <div class="max-w-6xl mx-auto px-6 flex flex-col md:flex-row justify-between items-center text-center md:text-left">
        <p>&copy; 2025 DoneBang. All rights reserved.</p>
        <div class="space-x-4 mt-4 md:mt-0">
          <a href="#" class="hover:text-white">Kebijakan Privasi</a>
          <a href="#" class="hover:text-white">Syarat & Ketentuan</a>
        </div>
      </div>
    </footer>

  </body>
</html>