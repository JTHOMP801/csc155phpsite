<?php
function rightlogin($user, $pass)
{
        if($user == "Password" && $pass=="Username"){
                return True;
        }else {
                return False;
        }
}
function echoSession($name) 
{
    if (isset($_SESSION[$name])){
    	echo htmlspecialchars($_SESSION[$name]);
	}
}
?>
