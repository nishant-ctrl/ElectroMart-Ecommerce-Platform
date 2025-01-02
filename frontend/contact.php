<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.14.0/build/css/alertify.min.css" />
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.14.0/build/css/themes/bootstrap.min.css" />
    <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.14.0/build/alertify.min.js"></script>
    <script> alertify.set('notifier', 'position', 'top-right');
    </script>
</head>

<body class="bg-gray-100">

    <nav>
        <?php
        include("../backend/config.php");
        include("./header.php");
        if (!isset($_SESSION['id'])) {
            header("Location: login.php");
            exit;
        }  
        if(isset($_SESSION['message']))
        {
            ?>
        <script>alertify.success("<?php echo $_SESSION['message']; ?>");</script>
        <?php
            unset($_SESSION['message']);
        }  
    ?>
    </nav>
    <div class=" p-6 bg-white shadow-md rounded-lg w-full ">
        <h2 class="h-900px text-3xl font-semibold text-center mb-8">Contact Us</h2>
    </div>
    <section class="container mx-auto my-12 p-6 bg-white shadow-md rounded-lg w-full max-w-md">
        <form action="../backend/contact.php" method="POST" class="space-y-4">
            <div>
                <label for="name" class="block text-gray-700 font-medium">Name</label>
                <input type="text" id="name" name="name" class="w-full p-3 border border-gray-300 rounded-md"
                    placeholder="Your Name" required>
            </div>
            <div>
                <label for="email" class="block text-gray-700 font-medium">Email</label>
                <input type="email" id="email" name="email" class="w-full p-3 border border-gray-300 rounded-md"
                    placeholder="Your Email" required>
            </div>
            <div>
                <label for="phone" class="block text-gray-700 font-medium">Phone</label>
                <input type="phone" id="phone" name="phone" class="w-full p-3 border border-gray-300 rounded-md"
                    placeholder="Your Phone" required>
            </div>
            <div>
                <label for="subject" class="block text-gray-700 font-medium">Subject</label>
                <input type="text" id="subject" name="subject" class="w-full p-3 border border-gray-300 rounded-md"
                    placeholder="Enter Subject" required>
            </div>
            <div>
                <label for="message" class="block text-gray-700 font-medium">Message</label>
                <textarea id="message" name="message" class="w-full p-3 border border-gray-300 rounded-md" rows="4"
                    placeholder="Your Message" required></textarea>
            </div>
            <button type="submit" name="contact_btn"
                class="w-full bg-blue-500 text-white py-3 rounded-md font-medium hover:bg-blue-600">Submit</button>
        </form>
        <div class="text-center text-gray-600 mt-4">
            Email: contact@electromart.co.in <br> Phone: +91-1234567890
        </div>
    </section>
    <footer>
        <?php include 'footer.php';?>
    </footer>

<script src="//cdn.jsdelivr.net/npm/alertifyjs@1.14.0/build/alertify.min.js"></script>
    <script> alertify.set('notifier', 'position', 'top-right');
    </script>
</body>

</html>