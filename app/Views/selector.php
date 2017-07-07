<?php
$db = \App\DbConnect\DbConnect::getInstance();
$sqlStudios = 'select name from studios';
$studios = $db->query($sqlStudios);
$studios=$studios->fetchAll();
?>

<form>
    <select name="studios" onchange="selectQueryBody(this.value)">
        <?php
        echo "<option>select studio</option>";
       /* while ($row = $studios->fetchAll()) {
            var_dump($row);
             echo "<option>$row[1]</option>";
        }*/
       foreach ($studios as $option) {
           echo "<option>$option[name]</option>";
       }
        ?>
    </select>
</form>
