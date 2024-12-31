<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Electromart</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body class="bg-gray-200">
    <?php
        include("../backend/config.php");
        include("./header.php");
    ?>
    
<!-- <div class="flex items-center justify-between p-4 bg-white border-b shadow"> -->
<div class="grid grid-cols-12 p-4 bg-white border-b shadow">
  <div class=" col-span-3 mt-2 text-xl text-center space-x-2">
    <a class="hover:bg-blue-600 hover:text-white p-4 rounded-lg text-gray-600 bg-gray-100" href="category.php">Explore More</a>
  </div>

  <div class="col-span-9  mx-4 flex items-center w-full max-w-2xl">
    <input
      type="text"
      placeholder="Search for anything"
      class="w-full px-5 py-2  border rounded-md focus:outline-none focus:ring focus:ring-blue-200"/>
    <select
      class="px-4 py-2 mx-4 rounded-md text-gray-600 bg-gray-100 focus:outline-none focus:ring focus:ring-blue-200">
      <option>All Categories</option>
      <?php
        $query=$conn->prepare("SELECT * FROM categories WHERE status='0'");
      $query->execute();
      $data=$query->fetchAll();
      if($data)
      {
        foreach($data as $item)
        {
        ?>
          <option><?=$item['name'] ?></option>
        <?php
        }
      }
      ?>
    </select>
    <button class="px-6 py-2 text-white bg-blue-500 rounded-md hover:bg-blue-600">Search</button>
  </div>
</div>

<?php
include("./banner.php");
?>




<div class="bg-blue-200 py-8">
  <h2 class="text-center text-2xl font-semibold mb-6">Explore Popular Categories</h2>
  <div class="flex justify-evenly px-4 md:px-16">

    
    
    <?php 
      $query=$conn->prepare("SELECT * FROM categories WHERE popular='1' AND status='0'");
      $query->execute();
      $data=$query->fetchAll();
      if($data)
      {
        foreach($data as $item)
        {
        ?>
        <div class="flex flex-col items-center text-center">
          <div class="hover:shadow-2xl bg-gray-100 p-6 rounded-full shadow-md">
          <img src="../admin/uploads/<?=$item['image'] ?>" alt="<?=$item['name'] ?>" class="h-20 w-20">
        </div>
        <p class="mt-4 font-medium text-lg"><?=$item['name'] ?></p>
        </div>
        <?php
        }
      }
      else
      {
        echo "<h1>No popular categories<h1>";
      }
    ?>
    
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
<script src="//cdn.jsdelivr.net/npm/alertifyjs@1.14.0/build/alertify.min.js"></script>
    <script> alertify.set('notifier','position', 'top-right');
    </script>
</body>
</html>