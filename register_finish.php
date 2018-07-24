<?php session_start(); ?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php
  include("mysql_connect.inc.php");  // include過的變數都能直接引用

  $userid = $_POST['userid'];
  $account = $_POST['account'];
  $pw = $_POST['pw'];
  $pw2 = $_POST['pw2'];
  $companyid = $_POST['companyid'];

  $db_server = "localhost";
  //資料庫名稱
  $db_name = "fish";
  //資料庫管理者帳號
  $db_user = "peter";
  //資料庫管理者密碼
  $db_passwd = "lily1217";

  //對資料庫連線
  $db = mysqli_connect($db_server, $db_user, $db_passwd) ;
      
  //資料庫連線採UTF8
  //mysqli_query($db,"SET NAMES utf8");

  //選擇資料庫
  mysqli_select_db($db, $db_name)or die("無法使用資料庫");
  if( $userid != null && $pw != null && $pw2 != null && $pw == $pw2){
    //新增資料進資料庫語法
    $sql = "insert into login (User_Code, User_Account, User_Password, Company_Code) values('$userid', '$account', '$pw', '$companyid')";
    if( mysqli_query($db, $sql) ){
       echo '新增成功!';
       echo '<meta http-equiv=REFRESH CONTENT=2;url=index.php>';
    } // if
    else{
      echo '11 新增失敗!';
      echo '<meta http-equiv=REFRESH CONTENT=2;url=index.php>';
    } // else
  } // if
  else{
    echo '您無權限觀看此頁面!';
    echo '<meta http-equiv=REFRESH CONTENT=2;url=index.php>';
  } // else
?>