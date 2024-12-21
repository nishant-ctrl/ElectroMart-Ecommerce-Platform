<header class="bg-blue-800 text-white shadow-md">
    <nav class="container mx-auto flex justify-between items-center py-4 px-6 ">
        <div>
            <a href="#" class="text-4xl font-bold">Electromart</a>
        </div>
        <div>
        <?php if (!isset($_SESSION['id'])): ?>
            <a class="px-6 text-lg hover:underline" href="index.php">Home</a>
            <a class="px-6 text-lg hover:underline" href="login.php">Login</a>
            <a class="px-6 text-lg hover:underline" href="register.php">Register</a>
        <?php else: ?>
            <a href="dashboard.php" class="px-6 text-lg hover:underline">Home</a>
            <a href="cart.php" class="px-6 text-lg hover:underline">Cart</a>
            <a href="contact.php" class="px-6 text-lg hover:underline">Contact</a>
            <a href="../backend/logout.php" class="px-6 text-lg hover:underline">Logout</a>
        <?php endif; ?>
        </div>
    </nav>
</header>   