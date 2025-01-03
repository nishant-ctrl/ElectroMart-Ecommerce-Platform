<header class="bg-blue-600 text-white shadow-md">
    <nav class="container mx-auto flex justify-between items-center py-4 px-6 ">
        <!-- <div>
            <a href="#" class="text-4xl font-bold">Electromart</a>
        </div> -->
        <a href="index.php">
        <div class="col-span-3 flex items-center space-x-2">
            <span class="text-2xl font-bold text-red-500">e</span>
            <span class="text-2xl font-bold text-blue-500">l</span>
            <span class="text-2xl font-bold text-yellow-500">e</span>
            <span class="text-2xl font-bold text-green-500">c</span>
            <span class="text-2xl font-bold text-purple-500">t</span>
            <span class="text-2xl font-bold text-teal-500">r</span>
            <span class="text-2xl font-bold text-blue-500">o</span>
            <span class="text-2xl font-bold text-orange-500">m</span>
            <span class="text-2xl font-bold text-red-500">a</span>
            <span class="text-2xl font-bold text-green-500">r</span>
            <span class="text-2xl font-bold text-violet-500">t</span>
    
        </div></a>
        <div>
        <?php if (!isset($_SESSION['id'])): ?>
            <a class="px-6 text-lg hover:underline" href="index.php">Home</a>
            <a class="px-6 text-lg hover:underline" href="login.php">Login</a>
            <a class="px-6 text-lg hover:underline" href="register.php">Register</a>
        <?php else: ?>
            <a href="index.php" class="px-6 text-lg hover:underline">Home</a>
            <a href="cart.php" class="px-6 text-lg hover:underline">Cart</a>
            <a href="wishlist.php" class="px-6 text-lg hover:underline">Wishlist</a>
            <a href="contact.php" class="px-6 text-lg hover:underline">Contact</a>
            <a href="../backend/logout.php" class="px-6 text-lg hover:underline">Logout</a>
        <?php endif; ?>
        </div>
    </nav>
</header>   