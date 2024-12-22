<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Electromart</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-200">
    <?php
        include("../backend/config.php");
        include("./header.php");
    ?>
    
<!-- <div class="flex items-center justify-between p-4 bg-white border-b shadow"> -->
<div class="grid grid-cols-12 p-4 bg-white border-b shadow">
  <div class="col-span-3 mt-2 text-xl text-center space-x-2">
    <span class="p-4 rounded-lg text-gray-600 bg-gray-100">Explore More</span>
  </div>

  <div class="col-span-9  mx-4 flex items-center w-full max-w-2xl">
    <input
      type="text"
      placeholder="Search for anything"
      class="w-full px-5 py-2  border rounded-md focus:outline-none focus:ring focus:ring-blue-200"/>
    <select
      class="px-4 py-2 mx-4 rounded-md text-gray-600 bg-gray-100 focus:outline-none focus:ring focus:ring-blue-200">
      <option>All Categories</option>
      <option>Antiques</option>
    </select>
    <button class="px-6 py-2 text-white bg-blue-500 rounded-md hover:bg-blue-600">Search</button>
  </div>
</div>

<?php
include("./banner.php");
?>




<div class="bg-blue-200 py-8">
  <h2 class="text-center text-2xl font-semibold mb-6">Explore Popular Categories</h2>
  <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-6 gap-6 px-4 md:px-16">

    <div class="flex flex-col items-center text-center">
      <div class="hover:shadow-2xl bg-gray-100 p-6 rounded-full shadow-md">
        <img src="../assest/products/watches/boAt Cosmos Pro 1.webp" alt="Watches" class="h-20 w-20">
      </div>
      <p class="mt-4 font-medium text-lg">Watches</p>
    </div>
    
    <div class="flex flex-col items-center text-center">
      <div class="hover:shadow-2xl bg-gray-100 p-6 rounded-full shadow-md">
        <img src="../assest/products/TV/LG 123 cm (49 inch) Ultra HD (4K) LED Smart WebOS TV (49UK7500PTA) 2.webp" alt="TVs" class="h-20 w-20">
      </div>
      <p class="mt-4 font-medium text-lg">Television</p>
    </div>
    <div class="flex flex-col items-center text-center">
      <div class="hover:shadow-2xl bg-gray-100 p-6 rounded-full shadow-md">
        <img src="../assest/products/speakers/Stone 350 3.webp" alt="speakers" class="h-20 w-20">
      </div>
      <p class="mt-4 font-medium text-lg">Speakers</p>
    </div>
    <div class="flex flex-col items-center text-center">
      <div class="hover:shadow-2xl bg-gray-100 p-6 rounded-full shadow-md">
        <img src="../assest/products/processor/GIGASTAR 3.2 GHz LGA 1156 Intel Core i5-650 For H55 Motherboard 1st Generation Processor (Silver) 1.webp" alt="Processor" class="h-20 w-20">
      </div>
      <p class="mt-4 font-medium text-lg">CPUs</p>
    </div>
    <div class="flex flex-col items-center text-center">
      <div class="hover:shadow-2xl bg-gray-100 p-6 rounded-full shadow-md">
        <img src="../assest/products/mobile/realme 7 Pro (Mirror Silver, 128 GB) (6 GB RAM) 1.webp" alt="Mobiles" class="h-20 w-20">
      </div>
      <p class="mt-4 font-medium text-lg">Mobiles</p>
    </div>
    <div class="flex flex-col items-center text-center">
      <div class="hover:shadow-2xl bg-gray-100 p-6 rounded-full shadow-md">
        <img src="../assest/products/camera/Canon EOS 5D Mark IV 30.4 MP Digital SLR Camera (Black) + EF 24-105mm is II USM Lens Kit 1.jpg" alt="camera" class="h-20 w-20">
      </div>
      <p class="mt-4 font-medium text-lg">Cameras</p>
    </div>
    
  </div>
</div>



<div class="grid grid-cols-12 gap-1">
        <div class="col-span-12"><img class="rounded-lg w-full" src="../assest/img/1.webp" alt=""></div>
        <div class="col-span-6"><img class="rounded-lg w-full"  src="../assest/img/2.webp" alt=""></div>
        <div class="col-span-6"><img class="rounded-lg w-full"  src="../assest/img/3.webp" alt=""></div>
        <div class="col-span-12"><img class="rounded-lg w-full"  src="../assest/img/4.webp" alt=""></div>
        <div class="col-span-6"><img class="rounded-lg w-full"  src="../assest/img/5.webp" alt=""></div>
        <div class="col-span-6"><img class="rounded-lg w-full"  src="../assest/img/6.webp" alt=""></div>
</div>



 <section class="bg-slate-900 text-white py-10">
  <div class="container mx-auto px-6">
    <h2 class="text-2xl font-semibold mb-6">Exclusively Curated For You</h2>
    <div class="grid grid-cols-12">

      <div class="flex justify-center items-center bg-slate-900 p-4 rounded-lg col-span-12 md:col-span-6 lg:col-span-3">
      <img class="h-24 w-24" src="../assest/img/c.webp" alt="">
      </div>
      <div class="flex justify-center items-center bg-slate-900 p-4 rounded-lg col-span-12 md:col-span-6 lg:col-span-3">
          <img class="h-24 w-24" src="../assest/img/d.webp" alt="">
      </div>
      <div class="flex justify-center items-center bg-slate-900 p-4 rounded-lg col-span-12 md:col-span-6 lg:col-span-3">
          <img class="h-24 w-24" src="../assest/img/e.webp" alt="">
      </div>
      <div class="flex justify-center items-center bg-slate-900 p-4 rounded-lg col-span-12 md:col-span-6 lg:col-span-3">
          <img class="h-24 w-24" src="../assest/img/f.webp" alt="">
      </div>
    </div>

    </div>
  </div>
</section>






<footer>
  <?php include("./footer.php");?>
</footer>

</body>
</html>