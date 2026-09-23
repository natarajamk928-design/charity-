<?php require_once 'includes/db.php';require_once 'includes/auth.php';require_login();
if($_SERVER['REQUEST_METHOD']==='POST'){$name=trim($_POST['item_name']??'');$qty=(int)($_POST['quantity']??1);$notes=trim($_POST['notes']??'');if($name!==''&&$qty>0){$uid=$_SESSION['user_id'];$s=$conn->prepare('INSERT INTO item_donations(user_id,item_name,quantity,notes) VALUES(?,?,?,?)');$s->bind_param('isis',$uid,$name,$qty,$notes);$s->execute();}}
header('Location: dashboard.php');exit;
?>
