<div id="wrapper">
    <?php
    ini_set('display_errors', 1);
    require dirname(__DIR__) . "/app/include/database.php";

    if (isset($_GET['studio'])) {
        $studio = $_GET['studio'];
        $_SESSION['querySelect'] = 2;
    }

    switch ($_SESSION['querySelect']) {
        case '1':
            include "app/include/requestText1.php";
            include_once "app/include/requests.php";
            break;
        case '2':
            include dirname(__DIR__) . "/app/include/requestText2.php";
            include_once dirname(__DIR__) . "/app/include/requests.php";
            include_once dirname(__DIR__) . "/app/selector.php";
            break;
    }


    foreach ($sql as $sqlQuery) {
        $sqlRuesult[] = request($sqlQuery);
    }

    foreach ($sqlRuesult as $result): ?>
        <li><?php echo "$result[1]"; ?></li>
        <table class="table">
            <tr>

                <?php
                while ($row = mysqli_fetch_field($result[0])) {
                    echo "<th>$row->name</th>";
                }
                ?>

            </tr>

            <?php foreach ($result[0] as $res): ?>
                <tr>

                    <?php foreach ($res as $key): ?>
                        <td><?php echo($key) ?></td>
                    <?php endforeach; ?>
                </tr>
            <?php endforeach; ?>

        </table>
    <?php endforeach; ?>
</div>