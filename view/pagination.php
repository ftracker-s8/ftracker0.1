<?php
$per_page = 5;
if (isset($_GET["page"])) {
    $page = $_GET["page"];
} else {

    $page = 1;

}

$start_from = ($page - 1) * $per_page;
if (!empty($_GET['form_val']) && isset($_GET['form_val'])) {
    $_GET['form_val'] = 0;

    $sql = "SELECT u.log_id , u.user_name, s.site, u.date ,u.comment , l.location, e.picture  FROM `pool` u, `location_all` l , `site_all` s JOIN db2.user e
WHERE l.location_id = u.location AND s.site_id = u.site AND e.user_id = u.user_id";

    if (!empty($_GET['Location']) && isset($_GET['Location'])) {

        $sql = $sql . " AND location =" . $_GET['Location'];

    }
    $strtdate = $_GET['Sday'];
    $enddate = $_GET['Eday'];
    if (!empty($_GET['Sday']) && isset($_GET['Sday']) && !empty($_GET['Eday']) && isset($_GET['Eday'])) {
        $sql = $sql . " AND date between '" . $strtdate . "' and '" . $enddate . "'";
    } elseif (!empty($_GET['Sday']) && isset($_GET['Sday'])) {
        $sql = $sql . " AND date>='" . $strtdate . "'";
    } elseif (!empty($_GET['Eday']) && isset($_GET['Eday'])) {
        $sql = $sql . " AND date<='" . $enddate . "'";
    }
    if (!empty($_GET['Site']) && isset($_GET['Site'])) {
        $sql = $sql . " AND u.site=" . $_GET['Site'];
    }

    $data_query = $sql . " LIMIT $start_from, $per_page";

    $result = mysqli_query($conn, $data_query);
    if (mysqli_num_rows($result) >= 1) {
        $rowcount = mysqli_num_rows($result);
        echo '<legend> ' . $rowcount . ' Records Found !!!</legend>';
        echo '<br><br>';
        echo "<table class='srchtable'>
    <tr>
        <th>Picture</th>
        <th>Date</th>
        <th>User Name</th>
        <th>country</th>
        <th>Location</th>
        <th>Site</th>
        <th>Comment</th>
    </tr>";
        while ($row = mysqli_fetch_array($result)) {
            echo "<tr>";
            echo "<td> <img src='" . $row['picture'] . "' alt='' style='width:70%; height:auto; border-radius: 50%;'> </td>";
            echo "<td>" . $row['date'] . "</td>";
            echo "<td>" . $row['user_name'] . "</td>";
            echo "<td>" . $row['country'] . "</td>";
            echo "<td>" . $row['location'] . "</td>";
            echo "<td>" . $row['site'] . "</td>";
            echo "<td>" . $row['comment'] . "</td>";
            echo "</tr>";
        }
        echo "</table>";

        $query_result = mysqli_query($conn, $sql);
        $total_rows = mysqli_num_rows($query_result);
        $total_pages = ceil($total_rows / $per_page);

        parse_str($_SERVER["QUERY_STRING"], $url_array);
        unset($url_array['page']);
        $url = http_build_query($url_array);
        ?>
        <a href="?page=1<?php echo isset($url) && !empty($url) ? "&" . $url : ""; ?>">First Page</a>
        <?php
        for ($i = 1; $i <= $total_pages; $i++) {
            ?>
            <a href="?page=<?php echo $i;
            echo isset($url) && !empty($url) ? "&" . $url : ""; ?>"><?php echo $i; ?></a>
            <?php
        }
        ?>
        <a href="?page=<?php echo $total_pages;
        echo isset($url) && !empty($url) ? "&" . $url : ""; ?>">Last Page</a></center>
        <?php
    } else {
        echo '<p>No Results Found !!!</p>';
    }
}