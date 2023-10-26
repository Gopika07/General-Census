<?php
    $Address = $_POST['Address'];
    $Housenumber = $_POST['Housenumber'];
    $Firstname = $_POST['Firstname'];
    $No_Adults = $_POST['No_Adults'];
    $No_Children = $_POST['No_Children'];
    $Mobile = $_POST['Mobile'];
    $Electricity = $_POST['Electricity'];
    $LPG_PNG = $_POST['LPG_PNG'];
    $Drinking_Water = $_POST['Drinking_Water'];
    $Vehicles_Owned = $_POST['Vehicles_Owned'];

    //database connection

    $conn = new mysqli('localhost','root','','census');
    if($conn->connect_error){
        die('Connection Failed : '.$conn->connect_error);
    }else{
        $stmt = $conn->prepare("insert into user(Address,Housenumber,Firstname,No_Adults,
        No_Children,Mobile,,Electricity,LPG_PNG,,Drinking_Water,Vehicles_Owned)
        values(?,?,?,?,?,?,?,?,?,?)");
        $stmt->bind_param("sisiiissss",$Address,$Housenumber,$Firstname,$No_Adults,$No_Children,$Mobile,$Electricity,
        $LPG_PNG,$Drinking_Water,$Vehicles_Owned);
        $stmt->execute();
        echo("Submitted Successfully!");
        $stmt->close();
        $conn->close();
    }
?>