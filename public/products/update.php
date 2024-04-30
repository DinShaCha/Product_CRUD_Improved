<?php

$id = $_GET['id'] ?? null;

if (!$id) {
    header('Location:index.php');
    exit;
}

require_once "../../database.php";
require_once "../../functions.php";

$statement = $pdo->prepare("SELECT * FROM products WHERE id = :id");
$statement->bindValue(":id", $id);
$statement->execute();
$products = $statement->fetch(PDO::FETCH_ASSOC);

$title = $products['title'];
$description = $products['description'];
$price = $products['price'];

$errors = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    require_once "../../validate_product.php";
    
    if (empty($errors)) {

        $statement = $pdo->prepare("UPDATE products SET title = :title, image = :image, price = :price, description = :description WHERE id = :id");
        $statement->bindValue(":title", $title);
        $statement->bindValue(":image", $imagePath);
        $statement->bindValue(":price", $price);
        $statement->bindValue(":description", $description);
        $statement->bindValue(":id", $id);
        $statement->execute();
        header('Location:index.php');
    }
}
?>
<?php
include_once "../../views/partials/header.php";
?>

<body>
    <h1>Update Product</h1>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>

<?php  include_once "../../views/products/form.php"; ?>


</body>

</html>