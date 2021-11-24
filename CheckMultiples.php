<!DOCTYPE html>
<html>
<head>
    <title>Check whether Number is multiplier of either 4 or 6</title>
</head>
<body>
<p>Enter number in textbox below to check if it is multiplier of either 4 or 6</p>
<form method="post">
    Enter 1st Value :<br/> <input type="number" name="numarray[]" id="numarray" required="required" maxlength="4" max="1000" min="1" /><br/>
    Enter 2nd Value :<br/> <input type="number" name="numarray[]" id="numarray" required="required" maxlength="4" max="1000" min="1"/><br/>
    Enter 3rd Value :<br/> <input type="number" name="numarray[]" id="numarray" required="required" maxlength="4" max="1000" min="1"/><br/>
    Enter 4th Value :<br/> <input type="number" name="numarray[]" id="numarray" required="required" maxlength="4" max="1000" min="1"/><br/>
    <input type="submit" name="test" id="test" value="Check" /><br/>
</form>
<?php
if(array_key_exists('test',$_POST)){
     $array = $_POST['numarray'];  //Array of numbers user input
     $factor= [4,6];    //Array of numbers with which we check divisibilty

        //Function call
        checkIfMult($array,$factor);
}

   //Function will take aaray as input and check for divisibility
function checkIfMult($array, $factor)
        {
            //Loop traverse through array which is required to be checked
                foreach ($array as $key => $value)
                {
                    // Loop traverse through array with with divisibility needs to be checked.
                    foreach($factor as $numkey => $numvalue)
                      {
                          // Checks for remainder
                        $array[$key]=$value % $numvalue;

                        if($array[$key] === 0)
                        {
                            print "<br>".$value." Is a multiple of " . $numvalue . "<br>";
                        } else
                        {
                            print "<br>".$value." Is not a multiple of " . $numvalue . "<br>";
                        }
                    }
                }
        }

?>
</body>
</html>