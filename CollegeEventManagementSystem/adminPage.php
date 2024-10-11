<?php
include_once 'classes/db1.php';

$result = mysqli_query($conn, "SELECT * FROM staff_coordinator s, event_info ef, student_coordinator st, events e WHERE e.event_id = ef.event_id AND e.event_id = s.event_id AND e.event_id = st.event_id");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Paricahy 2k24</title>
</head>

<body>
    <?php include 'utils/adminHeader.php'?>

    <div class="content">
        <div class="container">
            <h1>Event details</h1>
            <?php
            if (mysqli_num_rows($result) > 0) {
            ?>
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Event Name</th>
                            <th>No. of Participants</th>
                            <th>Price</th>
                            <th>Student Coordinator</th>
                            <th>Staff Coordinator</th>
                            <th>Date</th>
                            <th>Time</th>
                            <th>Location</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $i = 0;
                        while ($row = mysqli_fetch_array($result)) {
                            echo '<tr>';
                            echo '<td>' . $row['event_title'] . '</td>';
                            echo '<td>' . $row['participents'] . '</td>';
                            echo '<td>' . $row['event_price'] . '</td>';
                            echo '<td>' . $row['st_name'] . '</td>';
                            echo '<td>' . $row['name'] . '</td>';
                            echo '<td>' . $row['Date'] . '</td>';
                            echo '<td>' . $row['time'] . '</td>';
                            echo '<td>' . $row['location'] . '</td>';
                            echo '<td>'
                                . '<a class="delete" href="deleteEvent.php?id=' . $row['event_id'] . '">Delete</a> '
                                . '</td>';
                            echo '</tr>';
                            $i++;
                        }
                        ?>
                    </tbody>
                </table>
            <?php
            }
            ?>
            <a class="btn btn-default" href="createEventForm.php">Create Event</a><!--register button-->
        </div>
    </div>

    <?php require 'utils/footer.php'; ?>
</body>

</html>
