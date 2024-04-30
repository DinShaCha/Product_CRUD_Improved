<?php

require_once "../../database.php";
require_once "../../functions.php";

$title = '';
$description = '';
$price = '';
$products = [
    'image' => ''
];

$errors = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    require_once "../../validate_product.php";

    if (empty($errors)) {

        $statement = $pdo->prepare("INSERT INTO products(title,image,price,description,create_date) VALUES(:title,:image,:price,:description,:date)");
        $statement->bindValue(":title", $title);
        $statement->bindValue(":image", $imagePath);
        $statement->bindValue(":price", $price);
        $statement->bindValue(":description", $description);
        $statement->bindValue(":date", date('Y-m-d H:i:s'));
        $statement->execute();
        header('Location:index.php');
    }
}

?>
<?php
include_once "../../views/partials/header.php";
?>

<body>
    <h1>Create Product</h1>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>

<?php  include_once "../../views/products/form.php"; ?>


</body>

</html>