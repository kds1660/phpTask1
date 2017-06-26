<div id="wrapper">
    <?php
    require $_SERVER['DOCUMENT_ROOT'] . "/app/include/database.php";
    include $_SERVER['DOCUMENT_ROOT'] . "/app/logger.php";

    if (isset($_GET['studio'])) {
        $studio = $_GET['studio'];
    }

    if (isset($_GET['page'])) {

        switch ($_GET['page']) {
            case '1':
                include $_SERVER['DOCUMENT_ROOT'] . "/app/include/requestText1.php";
                include_once $_SERVER['DOCUMENT_ROOT'] . "/app/include/requests.php";
                break;
            case '2':
                include $_SERVER['DOCUMENT_ROOT'] . "/app/include/requestText2.php";
                include_once $_SERVER['DOCUMENT_ROOT'] . "/app/include/requests.php";
                include_once $_SERVER['DOCUMENT_ROOT'] . "/app/selector.php";
                break;
        }

        foreach ($sql as $sqlQuery) {
            $sqlRuesult[] = executeRequest($sqlQuery);
        }

    } else {
        $sqlRuesult = [];
    }
    //todo maybe in separate file
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