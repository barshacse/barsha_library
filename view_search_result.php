<?php
require_once '../classes/super_admin.php';
require_once '../classes/function_find.php';
$obj_sup=new Super_Admin();
$obj_fun=new Function_find();
$text=$_POST['text'];
$result=$obj_sup->search_text($text);
echo "<table border='1'> 
            <tr>
            <td>Book Id</td>
            <td>Book Name</td>
            <td>Self_Number</td>
            <td>Type</td>
            <td>Quantity</td>
</tr>";
while($row=odbc_fetch_array($result))
{
    $a=$obj_fun->book_type($row['BOOK_TYPE']);
    echo "<tr>
        <td>$row[BOOK_ID]</td>
        <td>$row[BOOK_NAME]</td>
        <td>$row[SELF_NUMBER]</td>
        <td>$a</td>
        <td>$row[QUANTITY]</td>
</tr>";
}
echo "</table>";