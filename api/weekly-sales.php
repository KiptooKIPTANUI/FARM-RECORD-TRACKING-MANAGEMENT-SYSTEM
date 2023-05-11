
    <?php
    session_start();
    include('../includes/config.php');

    header("Content-Security-Policy: default-src 'none';");
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");
    header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");


    if ($_SERVER['REQUEST_METHOD'] == 'GET') {

        $query = mysqli_query($con, "SELECT tblproducts.CategoryName ,SUM(tblproducts.ProductPrice*tblsales.Quantity) as Cost from tblsales join tblproducts on tblsales.ProductId=tblproducts.id WHERE tblsales.InvoiceGenDate BETWEEN DATE_SUB(CURRENT_DATE(), INTERVAL 30 DAY) AND CURRENT_DATE() GROUP BY tblproducts.CategoryName");
        while ($row = mysqli_fetch_array($query)) {
            $cost[] = $row['Cost'];
            $labels[] = $row['CategoryName'];
        }
        echo json_encode(array("cost" => $cost, "labels" => $labels));
    }
    ?>
