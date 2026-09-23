<?php require_once 'includes/db.php'; require_once 'includes/auth.php';
$msg=''; $err='';
if($_SERVER['REQUEST_METHOD']==='POST'){
$name=trim($_POST['name']??'');$email=trim($_POST['email']??'');$phone=trim($_POST['phone']??'');$password=$_POST['password']??'';
if($name===''||!filter_var($email,FILTER_VALIDATE_EMAIL)||strlen($password)<6){$err='Enter a valid name, email and password of at least 6 characters.';}else{
$hash=password_hash($password,PASSWORD_DEFAULT);$stmt=$conn->prepare('INSERT INTO users(name,email,phone,password,role) VALUES(?,?,?,?,\'donor\')');$stmt->bind_param('ssss',$name,$email,$phone,$hash);
if($stmt->execute()){$msg='Registration successful. You can now login.';}else{$err=$stmt->errno===1062?'Email already registered.':'Registration failed: '.$stmt->error;}}
}
$page_title='Register';include 'includes/header.php';?><div class="card form-card"><h2>Register</h2><?php if($msg):?><div class="alert success-msg"><?=e($msg)?></div><?php endif;?><?php if($err):?><div class="alert error"><?=e($err)?></div><?php endif;?><form method="post"><div class="form-group"><label>Full Name</label><input name="name" required></div><div class="form-group"><label>Email</label><input type="email" name="email" required></div><div class="form-group"><label>Phone Number</label><input name="phone" required></div><div class="form-group"><label>Password</label><input type="password" name="password" required></div><button class="btn" type="submit">Register</button></form><p>Already registered? <a href="login.php">Login</a></p></div><?php include 'includes/footer.php';?>
