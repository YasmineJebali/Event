<?php
include "../../config/DataBase.php";
include "../../models/Category.php";
include '../../controller/CategoryController.php';
?>

<?php
$controller = new CategoryController();
$categories = $controller->findMany();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Category CRUD</title>
</head>

<body>
    <h2>Category List</h2>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th></th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($categories as $category) { ?>
                <tr>
                    <td><?php echo $category['_uid'] ?></td>
                    <td><?php echo $category['name'] ?></td>
                    <td><a href="category.php?uid=<?php echo $category['_uid'] ?>"><button>Edit</button></a></td>
                    <td><a href="_delete.php?uid=<?php echo $category['_uid'] ?>"><button>delete</button></a></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>

    <!-- Add the anchor link to category.php here -->
    <a href="category.php">Go to Category Page</a>

</body>

</html>