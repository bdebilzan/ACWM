<!DOCTYPE html>
<html>
<head>
    <?php 
      include('redirectToLoginIfNotLoggedIn.php');
      include('redirectHome_AdminOnly.php');
      include('header.php'); 
      include('navbar.php'); 
    ?>
</head>
<body>

    <br>
        <h1><center>Salvage Forms<center></h1>
    <br>

    <div class="container" style="width:60%">
        <table class="responstable">
        <tr>
            <th scope="col">Files</th>
        </tr>
        <tbody>
            <tr>
            <td>
                <a href="disposal.pdf" download>Disposal Form</a>
            </td>
            </tr>
            <tr>
            <td>
                <a href="loss.pdf" download>Loss of Asset Form</a>
            </td>
            </tr>
        </tbody>
        </table>
    </div>

</body>
</html>