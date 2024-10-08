<?php
$server = "localhost";
$username ="root";
$password = "";
$database = "shop";

// Create Connection
$connection = new mysqli($server, $username, $password, $database);

// Check Connection
if ($_SERVER["REQUEST_METHOD"] == "GET") {
    if (!isset($_GET["id"])) {
        header("Location: /learn/index.php");
        exit();
        
    }

    $id = $_GET["id"];

    $sql = "SELECT * FROM product WHERE id=$id";
    $result = $connection->query($sql);
    $row = $result->fetch_assoc();

    if (!$row) {
        header("Location: /learn/index.php");
        exit();
    }

    $name = $row["name"];
    $category = $row["category"];
    $subCategory = $row["subCategory"];
    $brand = $row["brand"];
} else {
    $id = $_POST["id"];
    $name = $_POST["name"];
    $category = $_POST["category"];
    $subCategory = $_POST["subCategory"];
    $brand = $_POST["brand"];

    if (empty($name) || empty($category) || empty($subCategory) || empty($brand)) {
        $errorMessage = "All Fields Are Required!";
    }

    $sql = "UPDATE product SET name = '$name', category = '$category', subCategory = '$subCategory', brand = '$brand' WHERE id = $id";

    $result = $connection->query($sql);

    if (!$result) {
        $errorMessage = "Invalid Query: " . $connection->error;
    } else {
        $successMessage = "Successfully Updated!";
        header("Location: /php-crud/index.php");
        exit();
    }
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Product</title>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6 pt-4">
                <h2 class='text-center'>Edit Product</h2>
                <?php
                if(!empty($errorMessage)){
                    echo "
                    <div class='alert alert-danger'>
                        <strong>$errorMessage</strong>
                    </div>
                    ";
                };
                ?>
                <form method="post">
                    <div>
                        <input type="hidden" class='form-control' name="id" value="<?php echo $id ?>">
                    </div>
                    <label for="">Product Name</label>
                    <div>
                        <input type="text" class='form-control' name="name" value="<?php echo $name ?>">
                    </div>
                    <label for="">Category Name</label>
                    <div>
                        <input type="text" class='form-control' name="category" value="<?php echo $category ?>">
                    </div>
                    <label for="">SubCategory Name</label>
                    <div>
                        <input type="text" class='form-control' name="subCategory" value="<?php echo $subCategory ?>">
                    </div>
                    <label for="">Brand Name</label>
                    <div>
                        <input type="text" class='form-control' name="brand" value="<?php echo $brand ?>">
                    </div>
                    <button class='btn btn-success form-control mt-2' type='submit'>Submit</button>
                </form>
                <a href='/php-crud/index.php' class='btn btn-info form-control mt-2' type='submit'>Go To Back</a>
            </div>
            <div class="col-md-3"></div>
        </div>
    </div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</body>
</html>