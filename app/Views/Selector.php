<?php

use App\DbConnect as db;

$db = db\DbConnect::getInstance();
$sqlStudios = 'select name from studios';
$studios = $db->query($sqlStudios);
$studios = $studios->fetchAll();
?>

<form>
    <select name="studios" onchange="selectQueryBody(this.value)">
        <?php
        echo '<option>select studio</option>';

        foreach ($studios as $option) {
            echo "<option>$option[name]</option>";
        }
        ?>
    </select>
</form>
