<?php
//http://localhost/CreatePetsTable.php

require_once ("GianlucaVendittiInclude.php");

WriteHeaders("Create Pets", "Create Pets Table");

$mysqlObj = CreateConnectionObject();

$TableName = "Pets";   // creating table name

$stmt = $mysqlObj->prepare("drop table if exists $TableName"); 

$stmt->execute(); 	

$PetName = "PetName varchar(30)";
$Weight = "Weight decimal (4,1)";
$AnimalType = " AnimalType varchar(20)";

$SQLStatement = "Create Table $TableName ($PetName, $Weight, $AnimalType)"; 

echo $SQLStatement; // used to display sql data to debug for erros 

$stmt = $mysqlObj->prepare($SQLStatement);
if ($stmt == false)
{
    echo "Prepare failed on query $SQLStatement";
    exit; 
}
$CreateResult = $stmt->execute(); 	

if ($CreateResult)
    echo "$TableName  table created"; 
else 
    // $stmt ->error stores what went wrong with the execute 
    echo"Cannot create tabel $TableName.
    Query $SQLStatement failed. " . $stmt->eror; 
$stmt->close();
$mysqlObj->close();


WriteFootersAdvanced();
?>