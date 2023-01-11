<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

</head>
  <body>
<?php
$name = $_POST["loginname"];
$pass = $_POST["loginpass"];
$namedate = file_get_contents("username.json");
$namedate2 = mb_convert_encoding($namedate, 'UTF8', 'ASCII,JIS,UTF-8,EUC-JP,SJIS-WIN');
$namedate3 = json_decode($namedate2,true);

   if(in_array($name,$namedate3)){
     $passcheck = file_get_contents("date/".$name.".json");
     $passcheck2 = mb_convert_encoding($passcheck, 'UTF8', 'ASCII,JIS,UTF-8,EUC-JP,SJIS-WIN');
     $passcheck3 = json_decode($passcheck2,true);
     $passcheck4 = $passcheck3[pass];
     if($pass == $passcheck4){
       echo '<form action="main.php" method="POST">';
       echo "<input name='username' value={$name} type='hidden'>";
       echo '<input type="submit" value="ログインしました!">';
       echo '</form>';
       
     }else{
       echo 'パスワードが違います。';
       echo "<a href='index.html'>戻る</a>";
       
     }
     
     
   }else{
     echo 'そのニックネームは登録されていません。';
     echo "<a href='index.html'>戻る</a>";
     
     
     
   }





?>
</body>
</html>
