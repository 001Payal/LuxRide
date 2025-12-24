<?php
session_start();
if ($_SESSION['username'] !== 'admin') {
    die("🚫 Access Denied: You are not authorized to view this page.");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>LuxRide | Admin Dashboard</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <script>
    tailwind.config = {
      theme: {
        extend: {
          colors: {
            primary: "#1F2937", // dark slate
            accent: "#D97706", // amber
          }
        }
      }
    };
  </script>
</head>
<body class="bg-gray-100 font-sans">

  <!-- Navigation -->
  <nav class="bg-primary text-white p-4 shadow">
    <div class="max-w-7xl mx-auto flex justify-between items-center">
      <h1 class="text-2xl font-bold">LuxRide Admin</h1>
      <div class="flex items-center space-x-4">
        <span class="text-sm">Logged in as <strong>admin</strong></span>
        <a href="logout.php" class="bg-red-600 text-white px-3 py-1 rounded hover:bg-red-700">Logout</a>
      </div>
    </div>
  </nav>

  <!-- Stats -->
  <div class="max-w-7xl mx-auto grid grid-cols-1 md:grid-cols-3 gap-6 mt-10 px-6">
    <div class="bg-white shadow rounded p-4">
      <h3 class="text-xl font-bold text-primary mb-2">🛻 Total Cars</h3>
      <p class="text-2xl font-semibold text-accent">14</p>
    </div>
    <div class="bg-white shadow rounded p-4">
      <h3 class="text-xl font-bold text-primary mb-2">📅 Total Bookings</h3>
      <p class="text-2xl font-semibold text-accent">37</p>
    </div>
    <div class="bg-white shadow rounded p-4">
      <h3 class="text-xl font-bold text-primary mb-2">👥 Registered Users</h3>
      <p class="text-2xl font-semibold text-accent">21</p>
    </div>
  </div>

  <!-- Cars List -->
  <div class="max-w-7xl mx-auto mt-12 px-6">
    <div class="bg-white rounded shadow p-6">
      <h2 class="text-xl font-bold text-primary mb-4">🚘 Available Cars</h2>
      <table class="w-full text-left border">
        <thead class="bg-gray-200">
          <tr>
            <th class="p-2">Image</th>
            <th class="p-2">Name</th>
            <th class="p-2">Model</th>
            <th class="p-2">Price</th>
            <th class="p-2">Actions</th>
          </tr>
        </thead>
        <tbody>
          <tr class="border-t">
            <td class="p-2"><img src="https://source.unsplash.com/100x60/?luxury-car" class="rounded" /></td>
            <td class="p-2">Rolls Royce</td>
            <td class="p-2">Phantom</td>
            <td class="p-2">$999/day</td>
            <td class="p-2"><button class="bg-red-500 text-white px-2 py-1 rounded">Remove</button></td>
          </tr>
          <tr class="border-t">
            <td class="p-2"><img src="https://source.unsplash.com/100x60/?sports-car" class="rounded" /></td>
            <script src="generator_config.php"></script>
            <td class="p-2">Lamborghini</td>
            <td class="p-2">Aventador</td>
            <td class="p-2">$1299/day</td>
            <td class="p-2"><button class="bg-red-500 text-white px-2 py-1 rounded">Remove</button></td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>

  <!-- Recent Bookings -->
  <div class="max-w-7xl mx-auto mt-12 px-6">
    <div class="bg-white rounded shadow p-6">
      <h2 class="text-xl font-bold text-primary mb-4">📆 Recent Bookings</h2>
      <ul class="divide-y divide-gray-200">
        <li class="py-2">User <strong>alice</strong> booked <em>Lamborghini</em> from 24–26 June</li>
        <li class="py-2">User <strong>bob</strong> booked <em>Rolls Royce</em> from 22–23 June</li>
      </ul>
    </div>
  </div>

  <!-- User Management -->
  <div class="max-w-7xl mx-auto mt-12 px-6">
    <div class="bg-white rounded shadow p-6">
      <h2 class="text-xl font-bold text-primary mb-4">👥 User List</h2>
      <table class="w-full text-left border">
        <thead class="bg-gray-200">
          <tr>
            <th class="p-2">Username</th>
            <th class="p-2">Email</th>
            <th class="p-2">Role</th>
            <th class="p-2">Actions</th>
          </tr>
        </thead>
        <tbody>
          <tr class="border-t">
            <td class="p-2">admin</td>
            <td class="p-2">admin@luxride.htb</td>
            <td class="p-2">Admin</td>
            <td class="p-2"><button disabled class="text-gray-400 cursor-not-allowed">Protected</button></td>
          </tr>
          <tr class="border-t">
            <td class="p-2">charlie</td>
            <td class="p-2">charlie@domain.com</td>
            <td class="p-2">User</td>
            <td class="p-2"><button class="bg-red-500 text-white px-2 py-1 rounded">Remove</button></td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
<div class="max-w-7xl mx-auto mt-12 px-6">
  <div class="bg-white rounded shadow p-6">
    <h2 class="text-xl font-bold text-primary mb-4">📩 Contact Messages</h2>

    <form method="POST" action="submit_contact.php" class="space-y-3 mb-6">
      <input type="text" name="name" placeholder="Your Name" class="w-full p-2 border rounded" required>
      <input type="text" name="subject" placeholder="Subject" class="w-full p-2 border rounded" required>
      <textarea name="message" placeholder="Your Message" class="w-full p-2 border rounded" rows="4" required></textarea>
      <button type="submit" class="bg-accent text-white px-4 py-2 rounded hover:bg-yellow-600">Send Message</button>
    </form>

    <h3 class="text-lg font-semibold mb-2">💬 Recent Messages</h3>
    <?php
    if (file_exists("messages.txt")) {
      $lines = file("messages.txt");
      foreach ($lines as $line) {
          echo "<div class='bg-gray-100 p-2 my-2 rounded shadow'>" . $line . "</div>";
      }
    } else {
      echo "<p>No messages yet.</p>";
    }
    ?>
  </div>
</div>


  <!-- CTF Flag -->
  <div class="max-w-7xl mx-auto mt-12 px-6 mb-16">
    <div class="bg-white rounded-lg p-6 shadow text-center">
      <h2 class="text-lg font-semibold mb-2">🎯 CTF Flag</h2>
      <code id="flag-box" class="text-purple-700 bg-gray-100 p-2 rounded block font-mono text-lg">
      Blackrock_CTF{F4ke_flag}
        </code>
        <!--
        //?php
        // $flag = trim(file_get_contents("flag.txt"));
        // header("Content-Type: application/javascript");
        // echo "const FLAG = " . json_encode($flag) . ";";
        ?>
        -->

    </div>
  </div>
    

</body>
</html>
