<?php
include "../../config/DataBase.php";
include "../../models/event.php";
include '../../controller/EventController.php';
?>

<?php
$controller = new EventController();
$events = $controller->findMany();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Event CRUD</title>
</head>

<body style="font-family: Arial, sans-serif; background-color: #f0f0f0; margin: 0; padding: 0;">

    <h2 style="text-align: center; color: #007bff;">Event List</h2>
    <table style="width: 100%; border-collapse: collapse; margin-top: 20px;">
        <thead>
            <tr>
                <th style="padding: 10px; background-color: #007bff; color: #fff;">ID</th>
                <th style="padding: 10px; background-color: #007bff; color: #fff;">Description</th>
                <th style="padding: 10px; background-color: #007bff; color: #fff;">Date</th>
                <th style="padding: 10px; background-color: #007bff; color: #fff;">Category</th>
                <th style="padding: 10px; background-color: #007bff; color: #fff;"></th>
                <th style="padding: 10px; background-color: #007bff; color: #fff;"></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($events as $event) { ?>
                <tr>
                    <td style="padding: 10px;"><?php echo $event['_uid'] ?></td>
                    <td style="padding: 10px;"><?php echo $event['description'] ?></td>
                    <td style="padding: 10px;"><?php echo $event['date'] ?></td>
                    <td style="padding: 10px;"><?php echo $event['name'] ?></td> <!-- category name -->
                    <td style="padding: 10px;"><a href="event.php?uid=<?php echo $event['_uid'] ?>"><button style="background-color: #007bff; color: #fff; border: none; padding: 5px 10px; cursor: pointer;">Edit</button></a></td>
                    <td style="padding: 10px;"><a href="_delete.php?uid=<?php echo $event['_uid'] ?>"><button style="background-color: #007bff; color: #fff; border: none; padding: 5px 10px; cursor: pointer;">Delete</button></a></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>

    <!-- Add the anchor link to event.php here -->
    <a href="event.php" style="text-decoration: none; color: #007bff;">Go to Event Page</a>

</body>

</html>
