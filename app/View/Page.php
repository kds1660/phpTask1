<div id="wrapper">
    <?php foreach ($sqlRuesult as $result) : ?>
        <ul>
            <li><?php echo "$result[0]"; ?></li>
        </ul>

        <table class="table">
            <tr>
                <?php

                if (isset($result[1][0])) {
                    foreach (array_keys($result[1][0]->result) as $name) {
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