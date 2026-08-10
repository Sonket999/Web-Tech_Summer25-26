<?php
include "../Controller/loginValidation.php";
?>
<!DOCTYPE html>
<html>
    <head>
        <title> php Form </title>
        <script>
            function collect_data()
            {
                let name = document.getElementById("name").value.trim();
                let email = document.getElementById("email").value.trim();
                let website = document.getElementById("website").value.trim();
                let comment = document.getElementById("comment").value.trim();
                let gender = document.querySelector('input[name="gender"]:checked');
                let valid = true;
                let message="";
                if(name.length <3)
                {
                    message+="\nName Must be at least 3 Characters\n";
                    valid = false;
                }
                if(email.length == 0)
                {
                    message+="\nE-mail can not be empty\n";
                    valid = false;
                }
                if(gender == null)
                {
                    message+="\nA gender should be selected\n";
                    valid = false;
                }
                if(!valid)
                {
                    alert(message);
                }
                return valid;

            }
        </script>
    </head>
    <body>
       <form method="post" action="" onsubmit="return collect_data()"> 
        <table>
            <p style="color: red;">* required fields</p>
            <tr>
                <td> <label for="name"> Name: </label></td>
                <td colspan="2"> <input type="text" id="name" name="name"> <label style="color: red;">*</label>
                <?php echo $name ?>
            </td>
            </tr>

             <tr>
                <td> <label for="email"> E-mail: </label></td>
                <td colspan="2"> <input type="email" id="email" name="email"> <label style="color: red;">*</label>
                <?php echo $email ?>
            </td>
            </tr>
            <tr>
                <td> <label for="website"> Website: </label></td>
                <td> <input type="text" id="website" name="website">
                <?php echo $website ?>
            </td>
            </tr>
            <tr>
                <td> <label for="comment"> Comment: </label></td>
                <td> <textarea id="comment" name="comment"></textarea> 
                <?php echo $comment ?>
            </td>
            </tr>
            <tr>
                <td> <label for="gender">Gender: </label></td>
                <td> 
                    <input type="radio" id="female" name="gender" value="female">
                    <label for="female"> Female</label>
                    <input type="radio" id="male" name="gender" value="male">
                    <label for="male"> Male</label>
                    <input type="radio" id="other" name="gender" value="other">
                    <label for="other"> Other</label>
                    <label style="color: red;">*</label>
                <?php echo $gender ?>
                </td>
            </tr>
            <tr>
                <td>
                    <input type="checkbox" id="remember" name="remember" value="1"<?php echo $remember ? ' checked' : '' ?>>
                    <label for="remember"> Remember me</label>
                </td>
            </tr>
            <tr>
                <td>
                    <input type="submit" id="submit" value="Submit">
                </td>
            </tr>
        </table>
       </form>
    </body>
</html>