<?php

require_once "../../database.php";

$search = $_GET['search'] ?? null;

if(!$search){
    $statement = $pdo->prepare("SELECT * FROM products ORDER BY create_date DESC");
}else{
    $statement = $pdo->prepare("SELECT * FROM products WHERE title LIKE :search ORDER BY create_date DESC");
    $statement -> bindValue(':search',"%$search%");
}

$statement->execute();
$products = $statement->fetchAll(PDO::FETCH_ASSOC);

?>
<?php
include_once "../../views/partials/header.php";
?>

<body>
    <a href="create.php" class="btn btn-secondary">Create Product</a>

    <h1>Product CRUD</h1>
    <form action="" method="get">
    <div class="input-group mb-3">
        <input type="text" name="search" class="form-control" placeholder="Search Product" value="<?php echo $search ?>">
        <button type="submit" class="input-group-text" >Search</button>
    </div>
    </form>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Image</th>
                <th scope="col">Title</th>
                <th scope="col">Price</th>
                <th scope="col">Created Date</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($products as $index => $row): ?>
                <tr>
                    <th scope="row"><?php echo $index + 1 ?></th>
                    <td>
                        <img src="/<?php echo $row['image'] ?>" class="thumb-image">
                    </td>
                    <td><?php echo $row['title'] ?></td>
                    <td><?php echo $row['price'] ?></td>
                    <td><?php echo $row['create_date'] ?></td>
                    <td>
                        <a href="update.php?id=<?php echo $row['id'] ?>" name="id" class="btn btn-sm btn-success">Edit</a>
                        <form style="display: inline-block" action="delete.php" method="post">
                            <input type="hidden" name="id" value="<?php echo $row['id'] ?>">
                            <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>

</html>