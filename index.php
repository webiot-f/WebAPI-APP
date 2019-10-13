<?php
//TODO ページのデザイン、ボタン（設定・履歴）

use API\LineNotifySender;
use API\DatabaseManager;
use API\CloseTask;

require_once './API/LineNotifySender.php';
require_once './API/DatabaseManager.php';
require_once './API/CloseTask.php';

$LineNotify = new LineNotifySender(true);
$DB = new DatabaseManager(true);
$CloseTask = new CloseTask(true);

if($_SERVER['SCRIPT_FILENAME'] !== "/var/www/html/iot/index.php"){
  die("不正なリクエストを検出しました");
}
?>

<!DOCTYPE html>
<html lang="ja">

    <head>
        <title>CliMate</title>
        <meta charset="utf-8">
      	<link rel="stylesheet" href="css/index.css">
      	<font size=5><b>CliMate </b></font><font size=4>- Weather Monitoring System -</font>
    </head>

    <body>
        <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.6.0/Chart.min.js"></script>
        
        <ul class="tab clearfix">
        <li class="active">現在の天気</li>
        <li>空気・光量</li>
        <li>履歴</li>
        <li>設定</li>
        <li>このプログラムについて</li>
      </ul>

      <div class="area">
        <ul class="show">

          <br><br>
          <b>気温</b><br>
          <font id="temp"></font><br><br>
          <b>湿度</b><br>
          <font id="humid"></font><br><br>
          <b>気圧</b><br>
          <font id="press"></font><br><br>
          <b>雨が降っているか</b><br>
          <font id="rain"></font><br><br>
          <b>気象情報では雨が降っているか</b><br>
          <font id="current"></font><br><br>
          <b>この後雨が降るか</b><br>
          <font id="forecast"></font><br><br>
          <b>風が強いか</b><br>
          <font id="wind"></font><br><br>
        </ul>
        
        <ul>
          <br><br>
           <b>埃の比率</b><br>
           <font id="ratio"></font><br><br>
           <b>濃度</b><br>
           <font id="concent"></font><br><br>
           <b>光度</b><br>
           <font id="light"></font><br><br>
        </ul>

        <ul>
          <br><br>
           <b>履歴</b><br>
           <!--日時だけ表示して詳細は別の箇所で-->
        </ul>

        <ul>
          <br><br>
           <b>設定</b><br>
           <!--設定の種類LINEのurl・自動で閉めるかの設定-->
        </ul>

        <ul>
          <br><br>
          <?php
          echo "<b>CliMate - Weather Monitoring System - v1.0.0</b><br>";
          echo "作成：Saisana299<br><br>";

          echo "<b>チャート用JavaScript</b><br>";
          echo "Chart.js v2.6.0<br>
          <a href= \"https://www.chartjs.org\">https://www.chartjs.org</a><br>
          (c) 2019 Chart.js Contributors<br>
          Released under the MIT License<br>";
          echo "<font clor=red>現在未使用</font><br><br>";

          echo "<b>jQuery</b><br>";
          echo "jQuery JavaScript Library v1.9.1<br>
          <a href= \"http://jquery.com/\">http://jquery.com/</a><br><br>

          Includes Sizzle.js<br>
          <a href= \"http://sizzlejs.com/\">http://sizzlejs.com/</a><br><br>

          Copyright 2005, 2012 jQuery Foundation, Inc. and other contributors<br>
          Released under the MIT license<br>
          <a href= \"http://jquery.org/license\">http://jquery.org/license</a><br><br>

          Date: 2013-2-4<br><br>";

          echo "<b>Yahoo Web API</b><br>";
          echo "<!-- Begin Yahoo! JAPAN Web Services Attribution Snippet -->
          <a href=\"https://developer.yahoo.co.jp/about\">
          <img src=\"https://s.yimg.jp/images/yjdn/common/yjdn_attbtn1_250_34.gif\" width=\"250\" height=\"34\" title=\"Webサービス by Yahoo! JAPAN\" alt=\"Webサービス by Yahoo! JAPAN\" border=\"0\" style=\"margin:15px 15px 15px 15px\"></a>
          <!-- End Yahoo! JAPAN Web Services Attribution Snippet -->";
          ?>
        </ul>

      </div>

      <div id="message"></div>
      <div id="messageShift"></div>
      <div id="messageCtrl"></div>
      <div id="messageAlt"></div>
      <!--<script src="js/chart.js"></script>-->
      <script src="js/index.js"></script>
      </body>

</html>
<script>
  var data;
  function main(){
    var fd = new FormData();
    var xhr = new XMLHttpRequest();
    xhr.open('POST','Data.php');
    xhr.send(fd);
    xhr.onreadystatechange = function(){
      if ((xhr.readyState == 4) && (xhr.status == 200)) {
        data = JSON.parse(xhr.responseText);
        var temp = data["temp"];
        var humid = data["humid"];
        var press = data["press"];
        var rain = data["rain"];
        var current = data["current"];
        var forecast = data["forecast"];
        var wind = data["wind"];
        var ratio = data["ratio"];
        var concent = data["concent"];
        var light = data["light"];
        document.getElementById("temp").innerHTML = temp+" ℃";
        document.getElementById("humid").innerHTML = humid+" %";
        document.getElementById("press").innerHTML = press+" hPa";
        document.getElementById("rain").innerHTML = rain;
        document.getElementById("current").innerHTML = current;
        document.getElementById("forecast").innerHTML = forecast;
        document.getElementById("wind").innerHTML = wind;
        document.getElementById("ratio").innerHTML = ratio+" %";
        document.getElementById("concent").innerHTML = concent+" pcs/0.01cf";
        document.getElementById("light").innerHTML = light;
      }
    };
  }
  setInterval(main,1000);
</script>
