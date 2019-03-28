<?php

//$rowNumber = $_GET['row_amount'];

        
    ini_set('display_errors', 1);
    error_reporting(E_ALL);  


$rowNumber = 20;

$surnameList = ["Naidoo","Govender,
Botha,
Pillay,
Smith,
Pretorius,
Fourie,
Venter,
Nel,
Moodley,
Coetzee,
Jacobs,
Kruger,
Smit,
Singh,
Erasmus,
Meyer,
Chetty,
Joubert,
Williams,
Steyn,
Swanepoel"
];

$firstNameList = ["Renier","Lefa", "Kagiso", "Alex", "Graham", "Gift", "Bonita", "Ross" , "Lerato" , "Kyle"];

generateCsv($rowNumber, $surnameList, $firstNameList );

function generateCsv($rowNumber, $surnameList, $firstNameList) {

$file = fopen('output.csv', 'w');
 
fputcsv($file, array('Id', 'Name', 'Surname', 'Initials', 'Age', 'DateOfBirth'));

for ($i = 0; $i < $rowNumber ; $i++) {

$row = [];

$row['id'] = $i;

$row['firstName'] = $firstNameList[array_rand($firstNameList)];
$row['surname'] = $surnameList[array_rand($surnameList)];
$firstNameParts = explode(" ",$row['firstName']);
$row['initials'] =  "";
foreach ($firstNameParts as $firstNamePart) {

$row['initials'] .= strtoupper(substr($firstNamePart, 0, 1));

}

$dateOfBirth = generateDateOfBirth();

$currentYear = date("Y");

$row['age'] = $dateOfBirth;
$row['dateOfBirth'] = $dateOfBirth;


fputcsv($file, $row);

} 
 
fclose($file);
}

function generateDateOfBirth() {
$first_date = "1919-03-28 00:00:00";
$second_date = "2019-03-28 00:00:00";

$first_time = strtotime($first_date);
$second_time = strtotime($second_date);

$rand_time = rand($first_time, $second_time);
$dateOfBirth = date('d-m-Y', $rand_time);

echo $dateOfBirth;

return $dateOfBirth;

}



 
