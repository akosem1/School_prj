<?php 
switch ($_GET['msg']) {
  case 'created':
echo "
  <div class='row' id='row'  >
    <div class='col-xs-12 col-md-12 displayMsgV' >
    <p>It Is Created</p>
    </div>
  </div>
";
  break;

  case 'edited':
echo "
  <div class='row' id='row'  >
    <div class='col-xs-12 col-md-12 displayMsgV' >
    <p>It Is Edited</p>
    </div>
  </div>
";
  break;
  
  case 'deleted':
echo "
  <div class='row' id='row'  >
    <div class='col-xs-12 col-md-12 displayMsgV' >
    <p>It Is Deleted</p>
    </div>
  </div>
";
  break;

  case 'errorx97151t':
echo "
  <div class='row' id='row'  >
    <div class='col-xs-12 col-md-12 displayMsgX' >
    <p>Worng Entry &#10071  Username or Password is incorrect</p>
    </div>
  </div>
";
  break;

}
 ?>




