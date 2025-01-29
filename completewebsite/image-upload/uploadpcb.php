<?php
// Include the database configuration file
include 'config.php';
$name1 = $_POST["name1"];
$id1 = $_POST["id1"];
$email1=$_POST["email1"];
$phone1=$_POST["phone1"];
$college1=$_POST["college1"];
$branch1=$_POST["branch1"];
$name2 = $_POST["name2"];
$id2 = $_POST["id2"];
$email2=$_POST["email2"];
$phone2=$_POST["phone2"];
$college2=$_POST["college2"];
$branch2=$_POST["branch2"];
$name3 = $_POST["name3"];
$id3 = $_POST["id3"];
$email3=$_POST["email3"];
$phone3=$_POST["phone3"];
$college3=$_POST["college3"];
$branch3=$_POST["branch3"];
$acc = $_POST["acc"];
$statusMsg = '';
$backlink = ' <a href="./">Go back</a>';

// File upload path
$targetDir = "uploads/pcb/";
$fileName = basename($_FILES["file"]["name"]);
$targetFilePath = $targetDir . $fileName;
$fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);
if(isset($_POST["submit"]) && !empty($_FILES["file"]["name"])){
    $to1 = $_POST['email1'];
    $to2 = $_POST['email2'];
    $to3 = $_POST['email3'];
    $to4 = "jntvecentra@gmail.com";
    $subject = "PCB_WORKSHOP-ECENTRA 2020";
    $message1 = "Thank You $name1 For Registering With Ecentra2020. Your Payment Details Will Be Updated Soon";
    $message2 = "Thank You $name2 For Registering With Ecentra2020. Your Payment Details Will Be Updated Soon";
    $message3 = "Thank You $name3 For Registering With Ecentra2020. Your Payment Details Will Be Updated Soon";
    $message4 = "A New User Has Been Registered To PCB-Workshop.Check The Database and Verify The Details";
    $from = "jntuk-ucev@ecentra2020.in";
    $headers = "From:" . $from;

   mail($to1, $subject, $message1, $headers);
   mail($to2, $subject, $message2, $headers);
   mail($to3, $subject, $message3, $headers);
   mail($to4, $subject, $message4, $headers);
    // Allow certain file formats
    $allowTypes = array('jpg','png','jpeg','gif','pdf');
    if (!file_exists($targetFilePath)) {
        if(in_array($fileType, $allowTypes)){
                // Upload file to server
            if(move_uploaded_file($_FILES["file"]["tmp_name"], $targetFilePath)){
                // Insert image file name into database
                $insert = $db->query("INSERT into pcbworkshop (name1, id1, email1, phone1, college1, branch1,name2, id2, email2, phone2, college2,branch2,name3, id3, email3, phone3, college3, branch3,acc,payment, uploaded_on,ecode) VALUES ('$name1', '$id1','$email1', '$phone1','$college1', '$branch1', '$name2', '$id2','$email2', '$phone2','$college2', '$branch2','$name3', '$id3','$email3', '$phone3','$college3', '$branch3','$acc','".$fileName."', NOW(),'xyz')");
                $insert = $db->query("UPDATE pcbworkshop SET ecode = concat( ecentraid, id )");
                if($insert){
                    $statusMsg = "The file <b>".$fileName. "</b> has been uploaded successfully." . $backlink;
                    header("location:https://ecentra2020.in/image-upload/successfulpcb.php");
                }else{
                    $statusMsg = "File upload failed, please try again." . $backlink;
                    header("location:https://ecentra2020.in/unsuccessful.html");
                }
            }else{
                $statusMsg = "Sorry, there was an error uploading your file." . $backlink;
            }
        }else{
            $statusMsg = "Sorry, only JPG, JPEG, PNG & GIFfiles are allowed to upload." . $backlink;
        }
    }else{
            $statusMsg = "The file <b>".$fileName. "</b> is already exist." . $backlink;
        }
}else{
    $statusMsg = 'Please select a file to upload.' . $backlink;
}
// Display status message
echo $statusMsg;
?>
