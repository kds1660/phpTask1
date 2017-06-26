<?php
$sqlStudios = 'select name from studios';
$studios = executeRequest($sqlStudios);
?>

<form>
    <select name="studios" onchange="selectQueryBody(this.value)">
        <?php
        echo "<option>select studio</option>";
        while ($row = mysqli_fetch_array($studios[0])) {
            echo "<option>$row[0]</option>";
        }
        ?>
    </select>
</form>
