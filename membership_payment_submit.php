<!--Sageevan.p -->
<?php

// Create a connection
$conn = new mysqli("localhost", "root", "", "unique_advertising_agency");

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if(isset($_POST['connectit']))
{
    $companyName = isset($_POST['companyName'])?$_POST['companyName']:'';
    $companyEmail = isset($_POST['companyMail'])?$_POST['companyMail']:'';
    $package =isset($_POST['package'])? $_POST['package']:'';
    $paymentMethod = isset($_POST['paywith'])?$_POST['paywith']:'';
    $cardNumber = $_POST['cardNumber'];
    $expires = $_POST['expaire'];
    $cvv = $_POST['cvv'];
    $firstName = $_POST['firstname'];
    $lastName = $_POST['lastname'];
    $streetNumber = $_POST['streetnumber'];
    $streetName = $_POST['streetname'];
    $city = $_POST['city'];
    $state = $_POST['state'];
    $postal = $_POST['postal'];
    $country = $_POST['country'];

    $sql = "INSERT INTO membership_payment (Company_name, Company_email, Package, Payment_method, Card_number, Expires, CVV, First_name, Last_name, Street_number, Street_name, City, State, Postal, Country) 
            VALUES ('$companyName', '$companyEmail', '$package', '$paymentMethod', '$cardNumber', '$expires', '$cvv', '$firstName', '$lastName', '$streetNumber', '$streetName', '$city', '$state', '$postal', '$country')";

    if ($conn->query($sql) === TRUE) {
        echo "Record inserted successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Close the connection
$conn->close();
?>