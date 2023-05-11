
    <?php
    session_start();
    include('../includes/config.php');

    header("Content-Security-Policy: default-src 'none';");
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");
    header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");


    if ($_SERVER['REQUEST_METHOD'] == 'GET') {
        // $sql = mysqli_query($con,"SELECT tblsales.InvoiceGenDate, tblproducts.CategoryName,(tblproducts.ProductPrice*tblsales.Quantity) as Cost from tblsales join tblproducts on tblsales.ProductId=tblproducts.id  WHERE tblsales.InvoiceGenDate BETWEEN DATE_SUB(CURRENT_DATE(), INTERVAL 7 DAY) AND CURRENT_DATE() GROUP BY tblsales.InvoiceGenDate");
        $query = mysqli_query($con, "SELECT tblsales.InvoiceGenDate, tblproducts.CategoryName,SUM(tblproducts.ProductPrice*tblsales.Quantity) as Cost from tblsales join tblproducts on tblsales.ProductId=tblproducts.id  WHERE tblsales.InvoiceGenDate BETWEEN DATE_SUB(CURRENT_DATE(), INTERVAL 28 DAY) AND CURRENT_DATE() GROUP BY tblsales.InvoiceGenDate,tblproducts.CategoryName ORDER BY tblsales.InvoiceGenDate");
        while ($row = mysqli_fetch_assoc($query)) {
            $data[] = $row;
        }
        echo json_encode(array("data" => $data, "dates" => "2021-08-12 2021-09-16"));
    }
    ?>
