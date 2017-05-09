<?php
session_start();
require 'classes/super_admin.php';
$obj_sup=new Super_Admin();
//unset($_SESSION);
if(isset($_POST['btn']))
{
    $result=$obj_sup->login_check($_POST);
    $row=odbc_fetch_array($result);
    if($row)
    {
        $_SESSION['type']=$row['TYPE'];
        $_SESSION['id']=$row['ID'];
        $_SESSION['name']=$row['NAME'];
        if($row['TYPE']=='1')
        {
            header('Location:super_admin');
        }
        else
        {
            header('Location:user');
        }
    }

}
?>

<DOCTYPE html>
    <html>
    <head>
    </head>
    <body>
    <h1 style="margin-top: 150px" align="center">Login Panel</h1>
    <form method="post">
        <table align="center">
            <tr>
                <td><label style="font-size: medium">User Email: </label></td>
                <td><input type="text" name="email" required="required" style="width: 220px; height: 25px"></td>
            </tr>
            <tr>

            </tr>
            <tr>
                <td><label style="font-size: medium">User Password: </label></td>
                <td><input type="password" name="pass" required="required" style="width: 220px; height: 25px"></td>
            </tr>
            <tr>
                <td></td>
                <td colspan="2"><input type="submit" name="btn" value="LOGIN" style="width: 100px; height: 30px; background: #114673;border: none;color: white;font-size: medium"></td>
            </tr>
        </table>
    </form>
    </body>
    </html>