<!DOCTYPE html>
<html lang='ja'>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

</head>
  <body>
<?php
$name = $_POST["newname"];
$pass = $_POST["newpass"];
$namedate = file_get_contents("username.json");
$namedate2 = mb_convert_encoding($namedate, 'UTF8', 'ASCII,JIS,UTF-8,EUC-JP,SJIS-WIN');
$namedate3 = json_decode($namedate2,true);

if(mb_strlen($name,'UTF-8') > 6){
  echo 'ニックネームが6文字を越えています。';
  echo "<a href='index.html'>戻る</a>";
}else{
   if(in_array($name,$namedate3)){
     echo 'そのニックネームは登録済みです。';
     echo "<a href='index.html'>戻る</a>";
   }else{
     array_push($namedate3,$name);
     $namedate4 = json_encode($namedate3,JSON_UNESCAPED_UNICODE);
     file_put_contents("username.json", $namedate4);
     
     $newdate = ['name'=> $name,'pass' => $pass, 'レベル' => 1 ,'hp'=> 1 ,'mp'=> 1 ,'攻撃力'=> 1 ,'防御力'=> 1 ,'魔法攻撃力' => 1 ,'魔法防御力' => 1 ,'運'=> 1 ,'gold' => 0 ,'exp' => 0 ,'item' => [0,0,0,0,0,0,0,0,0,0],'装備' => [0,0,0,0,0],'job' => [0,1,0],'skill'=> [0,0,0,0,0,0,0,0,0,0]
     ];
     $newdate2 = json_encode($newdate);
     file_put_contents("date/".$name.".json",$newdate2);
     
     echo '<form action="main.php" method="POST">';
     echo "<input name='username' value={$name} type='hidden'>";
     echo '<input type="submit" value="登録しました!始めましょう!">';
     echo '</form>';
   }
}




?>
</body>
</html>
