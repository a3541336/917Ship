<?php
function getData(){
  $serverName = "www.917ship.com,6638"; //serverName\instanceName
  $connectionInfo = array( "Database"=>"Sun_Logistic", "UID"=>"sa", "PWD"=>"lu123456", "CharacterSet" => "UTF-8");
  $conn = sqlsrv_connect( $serverName, $connectionInfo);
  if( !$conn ) {
    echo "Connection could not be established.<br />";
    die( print_r( sqlsrv_errors(), true));
  }
  $orderNo = $_GET['orderNo'];
  $arrayOrder = explode(',', $orderNo);
  foreach ($arrayOrder as $value) {
    echo "<table class='table' align='center'>";
    echo "<tr>";
    echo "<th scope='col'colspan=3>訂單名稱:</th>";
    echo "<td colspan=4> $value </td>";
    echo "</tr>";
    $result = sqlsrv_query($conn, "SELECT * FROM MissionData WHERE Order_No = '$value' ORDER BY WorkTime");
    if($result === false) {
      die( print_r( sqlsrv_errors(), true) );
    }else{
      echo "<tr>";
      echo "<th scope='col'>時間</th>";
      echo "<th scope='col'>狀態</th>";
      echo "<th scope='col'>地點</th>";
      echo "<th scope='col'>件數</th>";
      echo "<th scope='col'>物流<br><pre style='font-size:9pt;color:red'>點擊時自動拷貝轉單號，無須再複製</pre></th>";
      echo "<th scope='col'>轉單號</th>";
      echo "<th scope='col'>備註</th>";
      echo "</tr>";
      $i = 0;
      while($col = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC) ) {
        echo "<tr>";
        echo "<td>{$col['WorkTime']->format('Y-m-d H:i')}</td>";
        echo "<td>{$col['Operate']}</td>";
        echo "<td>{$col['Dep']}</td>";
        echo "<td style='min-width: 100px;'>{$col['Qty']}</td>";
        echo "<td><a href='{$col['Link']}' id='{$i}' target='_blank'>{$col['TRS']}</a></td>";
        echo "<td><p id='carrierNo{$i}'>{$col['TRS_NO']}</p></td>";
        echo "<td>{$col['Remark']}</td>";
        echo "</tr>";
        $i++;

      }
    }
    echo "</table>";
  }
  // Close the connection.
  sqlsrv_close($conn);
}
?>
