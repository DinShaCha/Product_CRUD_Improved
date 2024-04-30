<?php if (!empty($errors)): ?>
        <div class="alert alert-danger" role="alert">
            <?php foreach($errors as $error): ?>
                <div>
                <?php echo $error ?>
                </div>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>
    <?php if ($products['image']): ?>
        <img src="/<?php echo $products['image'] ?>" class="update-image">
    <?php endif; ?>
    <form action="" method="post" enctype="multipart/form-data">
        <div class="mb-3">
            <label>Image</label><br>
            <input type="file" name="image">
        </div>
        <div class="mb-3">
            <label>Title</label>
            <input type="text" class="form-control" name="title" value="<?php echo $title ?>">
        </div>
        <div class="mb-3">
            <label>Description</label>
            <textarea class="form-control" name="description"><?php echo $description ?></textarea>
        </div>
        <div class="mb-3">
            <label>Price</label>
            <input type="number" step=0.01 class="form-control" name="price" value="<?php echo $price ?>">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>