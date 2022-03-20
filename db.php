<?php
function CreatDb()
{
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "productList";
    //create connection
    $con = mysqli_connect($servername, $username, $password);
    if (!$con) {

        die("connection failed:" . mysqli_connect_error());

    }
    //create database
    $sql = "CREATE DATABASE IF NOT EXISTS $dbname";
    if (mysqli_query($con, $sql)) {


        $con = mysqli_connect($servername, $username, $password, $dbname);
        $sql = "
                        CREATE TABLE IF NOT EXISTS products(
                            id INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
                            product_name VARCHAR (25) NOT NULL,
                            sku VARCHAR (20),
                            product_price FLOAT ,producttypesID int(11) NOT NULL FOREIGN KEY 
                        );
        ";

        $con = mysqli_connect($servername, $username, $password, $dbname);
        $sql = "
                        CREATE TABLE IF NOT EXISTS producttype(
                            id INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
                            producttypes VARCHAR (25) NOT NULL,
                            sku VARCHAR (20),
                            product_price FLOAT 
                        );
        ";

        if(mysqli_query($con, $sql)){
return $con;

        }else{
            echo "Cannot Create table...!";
        }

    }

else{
    echo "Error while creating:".mysqli_connect_error($con);
}
    if (mysqli_query($con, $sql)) {


        $con = mysqli_connect($servername, $username, $password, $dbname);


        $con = mysqli_connect($servername, $username, $password, $dbname);
        $mysql = "
                        CREATE TABLE IF NOT EXISTS producttype(
                            id INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
                            producttypes VARCHAR (25) NOT NULL
                        );
        ";

        if(mysqli_query($con, $mysql)){
            return $con;

        }else{
            echo "Cannot Create table...!";
        }

    }

    else{
        echo "Error while creating:".mysqli_connect_error($con);
    }



}


