<?php
require '../classes/super_admin.php';
require '../classes/function_find.php';
$obj_sup = new Super_Admin();
$obj_fun = new Function_find();
if (isset($_GET['delete'])) {
    $message = $obj_sup->delete_book($_GET['book_id']);
}
$result = $obj_sup->find_all_books();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
    <script type="text/javascript" src="../asset/js/jquery-3.1.1.min.js"></script>
</head>
<body >
<div align="center">
    <h1 style="margin-top: 100px">Search Book</h1>
    <div>

        <button onclick="window.location='index.php'">Home</button>
        <button onclick="window.location='request_book.php'">Request Book</button>
        <button onclick="window.location='search_book.php'">Search Books</button>
        <button onclick="window.location='../login.php'">Logout</button>
    </div>

    <hr>
    <div style="margin-bottom: 30px">
        <input type="text" id="search" name="search" onkeyup="search()"
               style="width: 40%; height: 30px; text-align: center;" placeholder="Search your book">
    </div>
    <div id="result"></div>
</div>
</body>
</html>
<script>
    function check_delete_info() {
        var check = confirm('Are You Sure To Delete This!!!');
        if (check) {
            return true;
        }
        else {
            return false;
        }
    }

    function search() {
        var text = document.getElementById('search').value;

        $.ajax({
            type: 'POST',
            data: {text: text},
            url: 'view_search_result.php',
            success: function (result) {
                $('#result').html(result);
            }
        })
    }
</script>