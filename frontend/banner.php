<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
  <div class="relative w-full overflow-hidden">

  <div id="slider" class="flex transition-transform duration-700 ease-in-out">
    <div class="w-full flex-none">
      <img src="../assest/banner/img5.webp" alt="icbic">
    </div>
    <div class="w-full flex-none">
      <img src="../assest/banner/img1.webp" alt="icbic">
    </div>
    <div class="w-full flex-none h-[400px]">
      <img class="object-cover" src="../assest/banner/img4.jpg" alt="icbic">
    </div>
    <div class="w-full flex-none h-[400px]">
      <img class="object-cover" src="../assest/banner/img4.jpg" alt="icbic">
    </div>
   
    
  </div>

  <!-- Navigation Dots -->
  <div class="absolute bottom-4 left-1/2 transform -translate-x-1/2 flex space-x-2">
    <button class="w-4 h-4 rounded-full bg-gray-400 hover:bg-gray-600" onclick="setSlide(0)"></button>
    <button class="w-4 h-4 rounded-full bg-gray-400 hover:bg-gray-600" onclick="setSlide(1)"></button>
    <button class="w-4 h-4 rounded-full bg-gray-400 hover:bg-gray-600" onclick="setSlide(2)"></button>
    <button class="w-4 h-4 rounded-full bg-gray-400 hover:bg-gray-600" onclick="setSlide(3)"></button>
  </div>
</div>

<script>
  let currentIndex = 0;

  // Change slides automatically every 5 seconds
  setInterval(() => {
    currentIndex = (currentIndex + 1) % 3; // Loop through 3 slides
    document.getElementById("slider").style.transform = `translateX(-${currentIndex * 100}%)`;
  }, 5000);

  // Manually set a specific slide
  function setSlide(index) {
    currentIndex = index;
    document.getElementById("slider").style.transform = `translateX(-${index * 100}%)`;
  }
</script>


<script src="//cdn.jsdelivr.net/npm/alertifyjs@1.14.0/build/alertify.min.js"></script>
    <script> alertify.set('notifier','position', 'top-right');
    </script>
</body>
</html>