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
    echo "<table class='table'>";
    echo "<tr>";
    echo "<th scope='col'>訂單名稱:{$value}</th>";
    echo "</tr>";
    $result = sqlsrv_query($conn, "SELECT * FROM MissionData WHERE Order_No = '$value' ORDER BY WorkTime");
    if($result === false) {
      die( print_r( sqlsrv_errors(), true) );
    }else{
      $i = 0;
      while($col = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC) ) {
        echo "<tr align='left'>";
        echo "<td>時間:{$col['WorkTime']->format('Y-m-d H:i')}";
        echo "<p>狀態:{$col['Operate']}</p>";
        echo "<p>地點:{$col['Dep']}</p>";
        echo "<p>件數:{$col['Qty']}</p>";
        echo "<p>物流:<a href='{$col['Link']}' id='{$i}' target='_blank'>{$col['TRS']}</a></p>";
        echo "<p>轉單號:{$col['TRS_NO']}";
        echo "<p>備註:{$col['Remark']}</p>";
        echo "</td>";
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
