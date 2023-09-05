<?php
include "../../config/DataBase.php";
include "../../models/Category.php";
include '../../controller/CategoryController.php';
?>

<?php
// Initialize variables for editing
$editMode = false;
$categoryToEdit = null;

// Check if we are editing a category (received ID in the URL)
if (isset($_GET["uid"])) {
    $editMode = true;
    $categoryId = $_GET["uid"];
    $controller = new CategoryController();
    $categoryToEdit = $controller->findOne($categoryId);

    // Check if category was found
    if ($categoryToEdit) {
        $categoryToEdit = $categoryToEdit->fetch(PDO::FETCH_ASSOC); // Convert to associative array
    }
}

if (isset($_POST["add_category"])) {
    $controller = new CategoryController();
    $category = new Category($_POST['category_name']);
    $category->setName($_POST["category_name"]);
    $controller->store($category);
    header("Location: index.php");
}

if (isset($_POST["update_category"])) {
    $controller = new CategoryController();
    $category = new Category($_POST['category_name']);
    $category->setName($_POST["category_name"]);
    $controller->update($category, $_POST["id"]);
    header("Location: index.php");
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $editMode ? "Edit Category" : "Add Category"; ?></title>
</head>

<body>
    <h1><?php echo $editMode ? "Edit Category" : "Add Category"; ?></h1>

    <form method="POST">
        <?php if ($editMode) : ?>
            <input type="hidden" name="action" value="update">
            <input type="hidden" name="id" value="<?php echo $categoryId; ?>">
        <?php endif; ?>

        <label for="category_name">Category Name:</label>
        <input type="text" id="category_name" name="category_name" required <?php if ($editMode && $categoryToEdit) echo "value='" . $categoryToEdit['name'] . "'"; ?>>

        <button type="submit" name="<?php echo $editMode ? 'update_category' : 'add_category'; ?>">
            <?php echo $editMode ? 'Update Category' : 'Add Category'; ?>
        </button>
    </form>
</body>

</html>