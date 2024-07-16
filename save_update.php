<!--Nethsiluni A.S.-->
<?php
include 'config.php';

session_start();

if (!isset($_SESSION['Customer_ID'])) {
   header('location:login.php');
   exit();
}

$id = $_SESSION['Customer_ID'];

$query = "SELECT * FROM registered_user WHERE Customer_ID = ?";
$stmt = mysqli_prepare($con, $query);
mysqli_stmt_bind_param($stmt, "i", $id);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $newCompanyName = mysqli_real_escape_string($con, $_POST['Company_Name']);
    $newStreetNumber = mysqli_real_escape_string($con, $_POST['StreetNumber']);
    $newStreetName = mysqli_real_escape_string($con, $_POST['SteetName']);
    $newCity = mysqli_real_escape_string($con, $_POST['City']);
    $newProvince = mysqli_real_escape_string($con, $_POST['Province_OR_State']);
    $newCountry = mysqli_real_escape_string($con, $_POST['Country']);
    $newPhone = mysqli_real_escape_string($con, $_POST['Company_ContactNumber']);
    $newEmail = mysqli_real_escape_string($con, $_POST['Company_Email']);
    $newWebsite = mysqli_real_escape_string($con, $_POST['Company_WebsiteURL']);
    $newIndustry = mysqli_real_escape_string($con, $_POST['Industry_FocusedOn']);

    $newFirstName = mysqli_real_escape_string($con, $_POST['Rep_FirstName']);
    $newLastName = mysqli_real_escape_string($con, $_POST['Rep_LastName']);
    $newRepDesignation = mysqli_real_escape_string($con, $_POST['Rep_Designation']);
    $newRepPhone = mysqli_real_escape_string($con, $_POST['Rep_ContactNumber']);
    $newRepEmail = mysqli_real_escape_string($con, $_POST['Rep_Email']);
    $newRepUsername = mysqli_real_escape_string($con, $_POST['UserName']);
    $newRepPassword = mysqli_real_escape_string($con, $_POST['User_Password']);

    $row = mysqli_fetch_assoc($result);

    $updateFields = array();
    if ($newCompanyName !== $row['Company_Name']) {
        $updateFields[] = "Company_Name = '$newCompanyName'";
    }
    if ($newStreetNumber !== $row['StreetNumber']) {
        $updateFields[] = "StreetNumber = '$newStreetNumber'";
    }
    if ($newStreetName !== $row['SteetName']) {
        $updateFields[] = "SteetName = '$newStreetName'";
    }
    if ($newCity !== $row['City']) {
        $updateFields[] = "City = '$newCity'";
    }
    if ($newProvince !== $row['Province_OR_State']) {
        $updateFields[] = "Province_OR_State = '$newProvince'";
    }
    if ($newCountry !== $row['Country']) {
        $updateFields[] = "Country = '$newCountry'";
    }
    if ($newPhone !== $row['Company_ContactNumber']) {
        $updateFields[] = "Company_ContactNumber = '$newPhone'";
    }
    if ($newEmail !== $row['Company_Email']) {
        $updateFields[] = "Company_Email = '$newEmail'";
    }
    if ($newWebsite !== $row['Company_WebsiteURL']) {
        $updateFields[] = "Company_WebsiteURL = '$newWebsite'";
    }
    if ($newIndustry !== $row['Industry_FocusedOn']) {
        $updateFields[] = "Industry_FocusedOn = '$newIndustry'";
    }
    if ($newFirstName !== $row['Rep_FirstName']) {
        $updateFields[] = "Rep_FirstName = '$newFirstName'";
    }
    if ($newLastName !== $row['Rep_LastName']) {
        $updateFields[] = "Rep_LastName = '$newLastName'";
    }
    if ($newRepDesignation !== $row['Rep_Designation']) {
        $updateFields[] = "Rep_Designation = '$newRepDesignation'";
    }
    if ($newRepPhone !== $row['Rep_ContactNumber']) {
        $updateFields[] = "Rep_ContactNumber = '$newRepPhone'";
    }
    if ($newRepEmail !== $row['Rep_Email']) {
        $updateFields[] = "Rep_Email = '$newRepEmail'";
    }
    if ($newRepUsername !== $row['UserName']) {
        $updateFields[] = "UserName = '$newRepUsername'";
    }
    if ($newRepPassword !== $row['User_Password']) {
        $updateFields[] = "User_Password = '$newRepPassword'";
    }

    if (!empty($updateFields)) {
        $updateString = implode(', ', $updateFields);
        $updateQuery = "UPDATE registered_user SET $updateString WHERE Customer_ID = ?";
        $stmt = mysqli_prepare($con, $updateQuery);
        mysqli_stmt_bind_param($stmt, "i", $id);
        mysqli_stmt_execute($stmt);

        if (mysqli_affected_rows($con) > 0) {
            echo "Data updated successfully!";
        } else {
            echo "Failed to update data.";
        }
    } else {
        echo "No changes detected.";
    }
}
?>
