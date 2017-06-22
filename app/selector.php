<?php
$sqlStudios = 'select name from studios';
$studios = request($sqlStudios);
?>
<form>
    <select name="studios" onchange="selectStudio(this.value)">
        <?php
        echo "<option>select studio</option>";
        while ($row = mysqli_fetch_array($studios[0])) {
            echo "<option>$row[0]</option>";
        }
        ?>
    </select>
</form>
