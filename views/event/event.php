<?php
include "../../config/DataBase.php";
include "../../models/Event.php";
include '../../controller/EventController.php';
include '../../controller/CategoryController.php';
?>

<?php
// Initialize variables for editing
$editMode = false;
$eventToEdit = null;

// Load categories
$loading = new CategoryController();
$categories = $loading->findMany();

// Check if we are editing an event (received ID in the URL)
if (isset($_GET["uid"])) {
    $editMode = true;
    $eventId = $_GET["uid"];
    $controller = new EventController();
    $eventToEdit = $controller->findOne($eventId);

    // Check if event was found
    if ($eventToEdit) {
        $eventToEdit = $eventToEdit->fetch(PDO::FETCH_ASSOC); // Convert to associative array
    }
}

if (isset($_POST["add_event"])) {
    $controller = new EventController();
    $event = new Event($_POST['description'], $_POST['date'], $_POST['category_id']);
    $controller->store($event);
    header("Location: index.php");
}

if (isset($_POST["update_event"])) {
    $controller = new EventController();
    $event = new Event($_POST['description'], $_POST['date'], $_POST['category_id']);
    $controller->update($event, $_POST["id"]);
    header("Location: index.php");
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $editMode ? "Edit Event" : "Add Event"; ?></title>
</head>

<body>
    <h1><?php echo $editMode ? "Edit Event" : "Add Event"; ?></h1>

    <form method="POST">
        <?php if ($editMode) : ?>
            <input type="hidden" name="action" value="update">
            <input type="hidden" name="id" value="<?php echo $eventId; ?>">
        <?php endif; ?>

        <div>
            <label for="description">Event Description:</label>
            <input type="text" id="description" name="description" required <?php if ($editMode && $eventToEdit) echo "value='" . $eventToEdit['description'] . "'"; ?>>
        </div>

        <div>
            <label for="date">Event Date:</label>
            <input type="date" id="date" name="date" required <?php if ($editMode && $eventToEdit) echo "value='" . $eventToEdit['date'] . "'"; ?>>
        </div>

        <div>
            <label for="category_id">Event Category:</label>
            <select id="category_id" name="category_id" required>
                <?php
                foreach ($categories as $category) {
                    $selected = ($editMode && $eventToEdit && $eventToEdit['category_id'] == $category['_uid']) ? 'selected' : '';
                    echo "<option value='{$category['_uid']}' $selected>{$category['name']}</option>";
                }
                ?>
            </select>
        </div>

        <button type="submit" name="<?php echo $editMode ? 'update_event' : 'add_event'; ?>">
            <?php echo $editMode ? 'Update Event' : 'Add Event'; ?>
        </button>
    </form>
</body>

</html>
