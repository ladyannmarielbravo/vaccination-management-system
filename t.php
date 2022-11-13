<?php 
include('includes/dbcon.php');
session_start();


$email = 'admin@admin.com';

$data = [
    'full_name' => '$full_name',
    'contact_no' => '$contact_no',
    'email' => $email,
    'password' => '$password',
    'user_type' => '$user_type',
];

$user = $database->getReference('users')->getValue();
$i = 0;
foreach ($user as $key => $value){
    if ($value['email'] == $email) {
        $i++;
    }

}

$total_count=$i;
if ($total_count > 0) {
   echo "error";
   echo $total_count;
}
else{
    echo "success";
}





