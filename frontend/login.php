<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 font-sans">
    <header class="bg-blue-800 text-white shadow-md">
        <nav class="container mx-auto flex justify-between items-center py-4 px-6">
    <a href="#" class="text-4xl font-bold">Electromart</a>
    <div class="text-sm">
        <a href="#" class="text-red-400 hover:underline">Tell us what you think</a>
    </div>
</nav>
    </header>

    <main class="container mx-auto grid grid-cols-1 md:grid-cols-12 gap-6 py-10 px-6 items-center min-h-screen">
        
                <div class="md:col-span-6 bg-white p-8 rounded-3xl shadow-lg">
                    <h1 class="text-3xl font-bold text-center text-gray-800 mb-6">Sign in to your account</h1>
                    <div class="text-sm text-center">
                    New to Electromart
                <a href="register.php" class="text-blue-300 hover:underline">Register now</a>
            </div>
                    <form action="../backend/loginBackend.php" method="POST"  class="space-y-6">
                        
                        <div>
                            <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                            <input type="email" name="email" id="email" placeholder="Enter your email" required
                                class="w-full px-4 py-2 border rounded-lg bg-gray-100 focus:ring-2 focus:ring-blue-500 focus:outline-none">
                        </div>
                        <div>
                            <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                            <input type="password" name="password" id="password" placeholder="Enter your password" required
                                class="w-full px-4 py-2 border rounded-lg bg-gray-100 focus:ring-2 focus:ring-blue-500 focus:outline-none">
                        </div>
        
        
                        <button type="submit"
                            class="w-full bg-blue-600 text-white py-2 rounded-lg hover:bg-blue-700 shadow-md transition duration-200">
                            Login
                        </button>
        
                    </form>
                </div>

        <div class="md:col-span-6">
            <img class="object-cover rounded-3xl shadow-lg"
                src="../assets/images/login.jpg"
                alt="Register">
        </div>

    </main>
    <footer class="bg-blue-800 text-white text-center py-4">
        &copy; 2024 Electromart Inc. All Rights Reserved.
    </footer>
</body>

</html>




