<!DOCTYPE html>

<html>
<head>
  <title>Check for string Palindrome</title>
</head>
<body>
<p>Enter string to check if it is palindrome</p>
<form method="post">
    <input type="text" name="palindromestring" id="palindromestring" required="required" maxlength="50" /><br/>
    <input type="submit" name="test" id="test" value="Palindrome Check" /><br/>
</form>
<?php
if(array_key_exists('test',$_POST)){
     $inputstring = $_POST['palindromestring'];  // user string input
        //Function call
        check_palindrome($inputstring);
}
function check_palindrome($string) {
    //Removing empty spaces from given string
    $string = str_replace(' ', '', $string);

    //removing special characters from given string
    $string = preg_replace('/[^A-Za-z0-9\-]/', '', $string);

    //changing string to lower case
    $string = strtolower($string);

    //Reversing the string
    $reverse = strrev($string);

    //Check if reversed string is same as input string
    if ($string == $reverse) {
        echo "<br>Input:".$string." <p>Input string is Palindrome</p>";
    }
    else {
        echo "<br>".$string." <p>Input string is not a Palindrome</p>";
    }
}

//$string = "A man, a plan, a canal, Panama";
//check_plaindrome($string);

?>

</body>
</html>