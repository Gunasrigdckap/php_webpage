<?php 
    require "navbar.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog Page</title>
    <!-- Linking Tailwind CSS -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <!-- Linking your custom stylesheet -->
    <link rel="stylesheet" href="style.css">
</head>
<body class="bg-gray-100">

<div class="container mx-auto py-8">
    <?php
    $conn = new mysqli("localhost", "dckap", "Dckap2023Ecommerce","php_task");

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $blog = 'SELECT * FROM blog WHERE status="Published"';
    $blog_table = mysqli_query($conn,$blog);

    if ($blog_table->num_rows > 0) {
    ?>
        <table class="w-full border-collapse border border-gray-300">
            <thead>
                <tr class="bg-gray-100">
                    <th class="border border-gray-300 px-4 py-2">Title</th>
                    <th class="border border-gray-300 px-4 py-2">Author</th>
                    <th class="border border-gray-300 px-4 py-2">Status</th>
                </tr>
            </thead>
            <tbody>
            <?php
                while($rows = $blog_table->fetch_assoc()) {
            ?>
                <tr>
                    <td class="border border-gray-300 px-4 py-2"><?php echo $rows["tittle"]; ?></td>
                    <td class="border border-gray-300 px-4 py-2"><?php echo $rows["author"]; ?></td>
                    <td class="border border-gray-300 px-4 py-2"><?php echo $rows["status"]; ?></td>
                </tr>
            <?php
                }
            ?>
            </tbody>
        </table>
    <?php
    } else {
        echo "0 results";
    }

    $conn->close();
    ?>
</div>

</body>
</html>

