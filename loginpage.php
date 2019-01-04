<?php

function loginPage() {
 ?>
<form id="loginform" action="login.php" method="post">
  <h1>Sign in</h1>
  <input type="text" name="user" placeholder="username">
  <input type="password" name="pass" placeholder="password">
  <button type="submit" name="submitlogin">log in</button>
</form>

 <?php

 } ?>
