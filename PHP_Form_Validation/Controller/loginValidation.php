<?php
session_start();
$name="";
$email="";
$website="";
$comment="";
$gender="";
$remember=false;
if(isset($_COOKIE["remember_user"]))
    {
        $name = $_COOKIE["remember_user"];
        $remember = true;
    }
$valid = true;
if($_SERVER["REQUEST_METHOD"] == "POST")
    {
        $name=trim($_POST["name"] ?? "");
        $email=trim($_POST["email"] ?? "");
        $website=trim($_POST["website"] ?? "");
        $comment=trim($_POST["comment"] ?? "");
        $gender=trim($_POST["gender"] ?? "");
        $remember = isset($_POST["remember"]) && $_POST["remember"] === "1";
        if(!empty($name) && strlen($name)>=3)
            {
                echo "Name: ".$name;
                echo "<br>";
            }
            else{
                echo "Name Must be at least 3 Characters\n";
                $valid = false;
            }
        if(!empty($email))
            {
                echo "E-mail: ".$email;
                echo "<br>";
            }
            else{
               echo "E-mail can not be empty\n";
               $valid = false;
            }
        if(!empty($gender))
            {
                echo "Gender: ".$gender;
                echo "<br>";
            }
            else{
                echo "A gender should be selected\n";
                $valid = false;
            }
        if(!empty($website))
            {
                echo "Website: ".$website;
                echo "<br>";
            }
        if(!empty($comment))
            {
                echo "Comment: ".$comment;
                echo "<br>";
            }
        if($valid)
        {
            $_SESSION["logged_in"] = true;
            $_SESSION["username"] = $name;
            $message= "Session Created";
            if($remember)
                {
                    setcookie("remember_user", $name, time()+ 86400*30, "/");
                }
                else{
                    setcookie("remember_user", "", time()-3600, "/");
                }
                $jsonfile = "../Model/user.json";
                $users = [];
                if(file_exists($jsonfile))
                {
                    $jsondata = file_get_contents($jsonfile);
                    $users = json_decode($jsondata, true) ?? [];
                    $users[] = [
                    'name' => $name,
                    'email' => $email,
                    'website' => $website,
                    'comment' => $comment,
                    'gender' => $gender,
                    "timestamp" => time()
                ];
                file_put_contents($jsonfile, json_encode($users, JSON_PRETTY_PRINT));
            }
        }
    }
?>