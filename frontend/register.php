<?php
include("../backend/config.php");
if(isset($_SESSION['id']))
{
    header("Location:../frontend/index.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register: Create an Account</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body class="bg-gray-100 font-sans">
    <header class="bg-blue-600 text-white shadow-md">
        <nav class="container mx-auto flex justify-between items-center py-4 px-6">
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
    
        </div>
            <div class="text-sm">
                Already have an account?
                <a href="./login.php" class="text-blue-300 hover:underline">Sign in</a>
            </div>
        </nav>
    </header>

    <main class="container mx-auto grid grid-cols-1 md:grid-cols-12 gap-6 py-10 px-6 items-center min-h-screen">

        <div class="md:col-span-6">
            <img class="object-cover rounded-3xl shadow-lg"
                src="../assest/images/register.jpg"
                alt="Register">
        </div>


        <div class="md:col-span-6 bg-white p-8 rounded-3xl shadow-lg">
            <h1 class="text-3xl font-bold text-center text-gray-800 mb-6">Create an Account</h1>
            <form action="../backend/registerBackend.php" method="POST"  class="space-y-6">
                <div>
                    <label for="firstName" class="block text-sm font-medium text-gray-700">First Name</label>
                    <input type="text" name="firstName" id="firstName" placeholder="Enter first name" autofocus required
                        class="w-full px-4 py-2 border rounded-lg bg-gray-100 focus:ring-2 focus:ring-blue-500 focus:outline-none">
                </div>
                <div>
                    <label for="lastName" class="block text-sm font-medium text-gray-700">Last Name</label>
                    <input type="text" name="lastName" id="lastName" placeholder="Enter last name" required
                        class="w-full px-4 py-2 border rounded-lg bg-gray-100 focus:ring-2 focus:ring-blue-500 focus:outline-none">
                </div>
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
                <div>
                    <label for="role" class="block text-sm font-medium text-gray-700">Select Role</label>
                    <select name="role" id="role" required
                        class="w-full px-4 py-2 border rounded-lg bg-gray-100 focus:ring-2 focus:ring-blue-500 focus:outline-none">
                        <option value="" disabled selected>Select your role</option>
                        <option value="1">Admin</option>
                        <option value="0">User</option>
                    </select>
                </div>
                <div id="admin-password-field" style="display: none;">
                    <label for="adminPassword" class="block text-sm font-medium text-gray-700">Admin Secret</label>
                    <input type="password" name="adminPassword" id="adminPassword" placeholder="Enter admin secret"
                        class="w-full px-4 py-2 border rounded-lg bg-gray-100 focus:ring-2 focus:ring-blue-500 focus:outline-none">
                </div>


                <button type="submit"
                    class="w-full bg-blue-600 text-white py-2 rounded-lg hover:bg-blue-700 shadow-md transition duration-200">
                    Register
                </button>

            </form>
        </div>
    </main>
    <footer>
  <?php include("./footer.php");?>
</footer>
<script>
    const roleSelect = document.getElementById("role");
    const adminPasswordField = document.getElementById("admin-password-field");

    roleSelect.addEventListener("change", function () {
        if (this.value === "1") {
            adminPasswordField.style.display = "block";
            document.getElementById("adminPassword").required = true;
        } else {
            adminPasswordField.style.display = "none";
            document.getElementById("adminPassword").required = false;
        }
    });
</script>

<script src="//cdn.jsdelivr.net/npm/alertifyjs@1.14.0/build/alertify.min.js"></script>
    <script> alertify.set('notifier','position', 'top-right');
    </script>
</body>

</html>