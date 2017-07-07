   <?php foreach ($sqlRuesult as $result): ?>

        <table class="table">
            <tr>
                <?php
                while ($row = mysqli_fetch_field($result[0])) {
                    echo "<th>$row->name</th>";
                }
                ?>
            </tr>

            <?php foreach ($result[1] as $res): ?>

                <tr>
                    <?php foreach ($res as $key): ?>
                        <td><?php echo($key) ?></td>
                    <?php endforeach; ?>
                </tr>
            <?php endforeach; ?>
        </table>
    <?php endforeach; ?>
</div>