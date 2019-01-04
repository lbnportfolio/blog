<?php

function newPost() {
if($_SESSION['username']){
 ?>

 <main id="newmain">
   <form action="form.php" method="get" id="postform">
     <input type="text" name="title" placeholder="Post title">
     <textarea name="postcontent" rows="8" cols="80" placeholder="Write something..." maxlength="280" id="postcontent"></textarea>
     <button type="submit" name="submitbutton">Submit</button>
   </form>
 </main>



<?php
}
}
 ?>