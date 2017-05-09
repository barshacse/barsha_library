<?php
session_start();
require '../classes/super_admin.php';
require '../classes/function_find.php';
$obj_sup=new Super_Admin();
$obj_fun=new Function_find();
if(isset($_GET['request']))
{
    $message=$obj_sup->add_transaction($_GET['book_id'],$_GET['user_id']);
}
$result=$obj_sup->find_all_books();
?>

<!DOCTYPE html>
<html>
<head>
    <title>User Panel</title>
</head>
<body>
<div style="margin-top: 100px" align="center">
    <h1>Request Book</h1>
    <div style="margin-top: 20px">
        <button onclick="window.location='index.php'">Home</button>
        <button onclick="window.location='request_book.php'">Request Book</button>
        <button onclick="window.location='search_book.php'">Search Books</button>
        <button onclick="window.location='../login.php'">Logout</button>
    </div>
    <hr>
    <div style="margin-top: 20px; height: 50px; width: auto">
        <?php if(isset($message)){?>
            <p><?php echo $message;?></p>
        <?php }?>
        <form method="get">
            <table border="1" style="overflow-y: scroll;">
                <tr>
                    <th>Book Id</th>
                    <th>Book Name</th>
                    <th>Book Type</th>
                    <th>Self Number</th>
                    <th>Available</th>
                    <th>Action</th>
                </tr>
                <?php while($row=odbc_fetch_array($result)) {?>
                    <tr>
                        <td><?php echo $row['BOOK_ID'];?>
                        <input type="hidden" name="book_id" value="<?php echo $row['BOOK_ID'];?>">
                        <input type="hidden" name="user_id" value="<?php echo $_SESSION['id'];?>">
                        </td>
                        <td><?php echo $row['BOOK_NAME'];?></td>
                        <td><?php echo $obj_fun->book_type($row['BOOK_TYPE'])?></td>
                        <td><?php echo $row['SELF_NUMBER'];?></td>
                        <?php if($row['QUANTITY']>0){?>
                            <td>Available</td>
                        <?php } else {?>
                            <td>Not Available</td>
                        <?php }?>

                        <?php if($row['QUANTITY']>0){?>
                            <td>
                                <a style="text-decoration: none; color: #114673;" href="request_book.php?request=request&book_id=<?php echo $row['BOOK_ID'];?>&user_id=<?php echo $_SESSION['id'];?>">Request</a>

                        <?php } else {?>
                            <td>
                                <a style="text-decoration: none; color: #FF5733;" nclick="window.alert('Contact With the library')">Not Available</a>
                                </td>
                        <?php }?>
                    </tr>
                <?php }?>
            </table>
        </form>
    </div>
</div>
</body>
</html>