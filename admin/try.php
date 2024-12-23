<?php
include("../backend/config.php");

if (isset($_POST['add_category_btn'])) {
    $name = trim($_POST['name']);
    $slug = trim($_POST['slug']);
    $description = trim($_POST['description']);
    $meta_title = trim($_POST['meta_title']);
    $meta_description = trim($_POST['meta_description']);
    $meta_keywords = trim($_POST['meta_keywords']);
    $status = isset($_POST['status']) ? 1 : 0;
    $popular = isset($_POST['popular']) ? 1 : 0;

    // Handle file upload
    $image = $_FILES['image']['name'];
    $path = "uploads";
    $image_ext = pathinfo($image, PATHINFO_EXTENSION);
    $filename = time() . '.' . $image_ext;

    // Input validation
    if (empty($name) || empty($slug) || empty($description)) {
        echo "<script>alert('Please fill all required fields');</script>";
        exit;
    }

    // Validate file upload
    if (!empty($image)) {
        $allowed_extensions = ['jpg', 'jpeg', 'png', 'gif'];
        if (!in_array(strtolower($image_ext), $allowed_extensions)) {
            echo "<script>alert('Invalid file type. Only JPG, JPEG, PNG, and GIF are allowed.');</script>";
            exit;
        }
    }

    try {
        // Use prepared statements
        $query = $conn->prepare("INSERT INTO `categories` (`name`, `slug`, `description`, `status`, `popular`, `image`, `meta_title`, `meta_description`, `meta_keywords`) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
        $result = $query->execute([$name, $slug, $description, $status, $popular, $filename, $meta_title, $meta_description, $meta_keywords]);

        if ($result) {
            // Move uploaded file
            if (!empty($image)) {
                if (!move_uploaded_file($_FILES['image']['tmp_name'], $path . '/' . $filename)) {
                    echo "<script>alert('Failed to upload image');</script>";
                    exit;
                }
            }

            echo "<script>alert('Category added successfully');</script>";
            header("Location: ./categoryPage.php");
            exit;
        } else {
            echo "<script>alert('Failed to add category');</script>";
            header("Location: ./categoryPage.php");
            exit;
        }
    } catch (PDOException $e) {
        echo "<script>alert('Database Error: " . $e->getMessage() . "');</script>";
        exit;
    }
}
?>
