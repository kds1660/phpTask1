<div id="wrapper">
<?php
foreach ($sqlRuesult as $result): ?>

    <li><?php echo "$result[0]"; ?></li>

    <table class="table">
        <tr>
            <?php
            foreach ($result[1] as $res) {
            }
            if (isset($res)) {
                foreach (array_keys($res->result) as $name) {
                    echo "<th>$name</th>";
                }
            }
            ?>
        </tr>

        <?php foreach ($result[1] as $res) : ?>
            <tr>
                <?php foreach ($res->result as $key) : ?>

                    <td><?php echo($key) ?></td>
                <?php endforeach; ?>
            </tr>
        <?php endforeach; ?>
    </table>
<?php endforeach; ?>
</div>