<?php
if ($_SERVER['SERVER_ADDR'] == '10.37.58.16') {
    ini_set('display_errors', 1);
    error_reporting(E_ALL);
}

function isUser_isdADAuthorized($postedValues)
{
    echo "test1 ";
    if (array_key_exists("logonPass", $_POST)) {
        //for query call
        $hostname = "localhost"; 
        $username1 = "root"; 
        $password1 = ""; 
        $dbh = new PDO("mysql:host=$hostname;dbname=acwm",$username1,$password1);
        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // $isAccountValidParams = array(
        //     'loginID' => $_POST["logonName"]
        // );
        // $isAccountAuthenticated = array(
        //     'logonName' => $_POST["logonName"],'logonPass' => $_POST["logonPass"]
        // );
        // $isdADValidationAPI = new SoapClient('https://website/service.asmx?wsdl');
        // $AcccountExists = $isdADValidationAPI->AccountExists($isAccountValidParams);
        // if ($AcccountExists->AccountExistsResult == false) {
        //     $resultText = "The account or password provided is incorrect. Please try again.";
        // } else {
        //     $IsAccountDisabled = $isdADValidationAPI->IsAccountDisabled($isAccountValidParams);
        //     if ($IsAccountDisabled->IsAccountDisabledResult == 1) {
        //         // echo "Your account is disabled.";
        //         return false;
        //     } else {
        //         $isAuthenticated = $isdADValidationAPI->IsAuthenticated($isAccountAuthenticated);
        //         if ($isAuthenticated->IsAuthenticatedResult == 1) {
        //             $userAccountInformation = $isdADValidationAPI->GetUserProfile($isAccountValidParams);
        //             $_SESSION['userInfo'] = objectToArray($userAccountInformation);
        //             $employeeID = $_SESSION['userInfo']["GetUserProfileResult"]["employeeID"];
                    $employeeID = $_SESSION['employee_id']; //placeholder
                    $ApplicationUID = $_SESSION['app_id'];
                    // $options = array(
                    //     CURLOPT_URL => 'http://10.37.58.16/Resources/api/spa/acwm_userroles.php?empid=' . $employeeID . '&appid=' . $ApplicationUID,
                    //     CURLOPT_HEADER => false,
                    //     CURLOPT_FOLLOWLOCATION => true,
                    //     CURLOPT_RETURNTRANSFER => TRUE
                    // );
                    
                    // perform request
                    // $cUrl = curl_init();
                    // curl_setopt_array($cUrl, $options);
                    // $userRoles = curl_exec($cUrl);
                    // curl_close($cUrl);

                    // $_SESSION['userRoles'] = $userRoles;

                    // $userroles = $_SESSION['userRoles'];
                    // in_array("user", $userroles);
                    
                    //decode the response into an json array user,admin,manager
                    //$decodedUserRoles = json_decode ( $userRoles, true );
                    //$jsonUserRoles = explode ( ',', $decodedUserRoles [0] ['userroles'] );
                    //if (count( $test ) > 0)
                    //echo var_dump ( $jsonUserRoles );
                    //exit();
                    

                    echo $employeeID . "test222";

                    //not part of the original code; temporary placeholder to set session of userRoles
                    $query3 = "SELECT getUserRoles($employeeID, '$ApplicationUID')";


                    $stmt = $dbh->query($query3);
                    $userRoles = $stmt->fetch();

                    $_SESSION['userRoles'] = explode(",", $userRoles[0]);
                    return true;
        //         }
        //     }
        // }
    }
}
?>