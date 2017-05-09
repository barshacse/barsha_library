<?php
session_start();
require '../classes/super_admin.php';
require '../classes/function_find.php';
$obj_sup=new Super_Admin();
$obj_fun=new Function_find();
$result=$obj_sup->find_all_books();
?>

<!DOCTYPE html>
<html>
<head>
    <title>User Panel</title>
</head>
<body>
<div style="margin-top: 100px" align="center">
    <h1><?php echo strtoupper($_SESSION['name'])?> PANEL</h1>
    <div style="margin-top: 20px">
        <button onclick="window.location='index.php'">Home</button>
        <button onclick="window.location='request_book.php'">Request Book</button>
        <button onclick="window.location='search_book.php'">Search Books</button>
        <button onclick="window.location='../login.php'">Logout</button>
    </div>
    <hr>
    <div style="margin-top: 20px; height: 50px; width: auto">
        <table border="1" style="overflow-y: scroll;">
            <tr>
                <th>Book Id</th>
                <th>Book Name</th>
                <th>Book Type</th>
                <th>Self Number</th>
                <th>Available</th>
            </tr>
            <?php while($row=odbc_fetch_array($result)) {?>
                <tr>
                    <td><?php echo $row['BOOK_ID'];?></td>
                    <td><?php echo $row['BOOK_NAME'];?></td>
                    <td><?php echo $obj_fun->book_type($row['BOOK_TYPE'])?></td>
                    <td><?php echo $row['SELF_NUMBER'];?></td>
                    <?php if($row['QUANTITY']>0){?>
                        <td>Available</td>
                    <?php } else {?>
                        <td>Not Available</td>
                    <?php }?>
                </tr>
            <?php }?>
        </table>
    </div>
</div>
</body>
</html>