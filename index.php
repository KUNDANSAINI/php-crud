<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Shop</title>
    <style>
    .col-md-12{
        width: 100vw;
        padding-top: 112px;

        h2{
        text-align: center;
        }
    }
    </style>
</head>
<body>

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2>Shop Data</h2>
                <a class='btn btn-primary' href='/php-crud/create.php'>Add Product</a>
                <table class='table table-hover'>
                    <thead>
                        <tr>
                            <th>Sr. No.</th>
                            <th>Name</th>
                            <th>Category</th>
                            <th>SubCategory</th>
                            <th>Brand</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $server = "localhost";
                        $username ="root";
                        $password = "";
                        $database = "shop";

                        // Create Connection

                        $connection = new mysqli($server, $username, $password, $database);

                        // Check Connection

                        if($connection->connect_error){
                            die("Connectint Failed" . $connection->connect_error);
                        }

                        // Find The Result In DataBase 

                        $sql = "SELECT * FROM product";
                        $result = $connection->query($sql);

                        if(!$result){
                            die("Invalid Query!" . $connection_error);
                        }

                        // Read Data For Each Row 

                        while($row = $result->fetch_assoc()){
                            echo "
                            <tr>
                            <td>$row[id]</td>
                            <td>$row[name]</td>
                            <td>$row[category]</td>
                            <td>$row[subCategory]</td>
                            <td>$row[brand]</td>
                            <td>
                                <a class='btn btn-success' href='/php-crud/edit.php?id=$row[id]'>Edit</a>
                                <a class='btn btn-danger' href='/php-crud/delete.php?id=$row[id]'>Delete</a>
                            </td>
                        </tr>
                            ";
                        }

                        ?>
                        
                    </tbody>
                </table>

            </div>
        </div>
    </div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>