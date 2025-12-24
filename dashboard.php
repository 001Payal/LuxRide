<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: index.html");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Luxury Car Rentals | Dashboard</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <script>
    tailwind.config = {
      theme: {
        extend: {
          colors: {
            accent: '#A21CAF',
            primary: '#1F2937',
          },
        },
      },
    };
  </script>
</head>
<body class="bg-gray-100 font-sans text-gray-800">

  <!-- Header -->
  <header class="flex justify-between items-center px-6 py-4 bg-white shadow">
    <div class="flex items-center space-x-2">
      <h1 class="text-2xl font-bold text-primary">LuxRide</h1>
    </div>
    <nav class="flex items-center space-x-6 text-sm">
      <a href="#" class="hover:text-accent">My Rentals</a>
      <a href="#" class="hover:text-accent">Support</a>
      <a href="#" class="hover:text-accent">Help</a>
      <a href="#" class="bg-accent text-white px-4 py-2 rounded-md">Rent Now</a>
    
      <?php if ($_SESSION['username'] === 'admin'): ?>
        <a href="admin.php" class="bg-primary text-white px-4 py-2 rounded-md hover:bg-gray-800">Admin Portal</a>
      <?php endif; ?>
    </nav>

  </header>

  <!-- Hero -->
  <section class="relative h-72 bg-cover bg-center" style="background-image: url('https://images.unsplash.com/photo-1570129477492-45c003edd2be');">
    <div class="absolute inset-0 bg-black bg-opacity-60 flex flex-col items-center justify-center text-white px-4 text-center">
      <h2 class="text-3xl md:text-5xl font-bold mb-2">Luxury Cars for Daily Rental</h2>
      <p class="text-lg">Choose from premium brands and ride in style – billed per day.</p>
    </div>
  </section>

  <!-- Car Listings -->
  <section class="p-6">
    <h3 class="text-2xl font-semibold mb-6 text-primary">Available Luxury Cars</h3>
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">

      <!-- Car Card -->
      <div class="bg-white rounded-lg shadow-lg overflow-hidden">
        <img src="car1.png" class="w-full" />
        <div class="p-4">
          <h4 class="font-bold text-lg mb-1">Audi A6</h4>
          <p class="text-sm text-gray-500 mb-1">Category: Executive Sedan</p>
          <p class="text-sm text-yellow-400 mb-2">★★★★☆</p>
          <div class="flex justify-between items-center">
            <span class="font-semibold">₹8500 / day</span>
            <button class="bg-accent text-white px-4 py-1 rounded hover:bg-purple-700">Book Now</button>
          </div>
        </div>
      </div>

      <div class="bg-white rounded-lg shadow-lg overflow-hidden">
        <img src="car2.png" class="w-full" />
        <div class="p-4">
          <h4 class="font-bold text-lg mb-1">BMW 5 Series</h4>
          <p class="text-sm text-gray-500 mb-1">Category: Executive Sedan</p>
          <p class="text-sm text-yellow-400 mb-2">★★★★★</p>
          <div class="flex justify-between items-center">
            <span class="font-semibold">₹9500 / day</span>
            <button class="bg-accent text-white px-4 py-1 rounded hover:bg-purple-700">Book Now</button>
          </div>
        </div>
      </div>

      <div class="bg-white rounded-lg shadow-lg overflow-hidden">
        <img src="car3.png" class="w-full" />
        <div class="p-4">
          <h4 class="font-bold text-lg mb-1">Mercedes-Benz C-Class</h4>
          <p class="text-sm text-gray-500 mb-1">Category: Luxury Sedan</p>
          <p class="text-sm text-yellow-400 mb-2">★★★★☆</p>
          <div class="flex justify-between items-center">
            <span class="font-semibold">₹10,500 / day</span>
            <button class="bg-accent text-white px-4 py-1 rounded hover:bg-purple-700">Book Now</button>
          </div>
        </div>
      </div>

      <div class="bg-white rounded-lg shadow-lg overflow-hidden">
        <img src="car4.png" class="w-full" />
        <div class="p-4">
          <h4 class="font-bold text-lg mb-1">Lamborghini Huracán</h4>
          <p class="text-sm text-gray-500 mb-1">Category: Supercar</p>
          <p class="text-sm text-yellow-400 mb-2">★★★★★</p>
          <div class="flex justify-between items-center">
            <span class="font-semibold">₹45,000 / day</span>
            <button class="bg-accent text-white px-4 py-1 rounded hover:bg-purple-700">Book Now</button>
          </div>
        </div>
      </div>

      <div class="bg-white rounded-lg shadow-lg overflow-hidden">
        <img src="car5.jpg" class="w-full" />
        <div class="p-4">
          <h4 class="font-bold text-lg mb-1">Range Rover Evoque</h4>
          <p class="text-sm text-gray-500 mb-1">Category: Luxury SUV</p>
          <p class="text-sm text-yellow-400 mb-2">★★★★☆</p>
          <div class="flex justify-between items-center">
            <span class="font-semibold">₹12,000 / day</span>
            <button class="bg-accent text-white px-4 py-1 rounded hover:bg-purple-700">Book Now</button>
          </div>
        </div>
      </div>

    </div>
  </section>

  <!-- Footer -->
  <footer class="text-center text-gray-500 py-6 mt-8 border-t">
    © 2025 LuxRide Rentals. All rights reserved.
  </footer>

</body>
</html>
