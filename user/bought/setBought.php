<?php
include "../../base/config.inc.php";
$data = json_decode(file_get_contents('php://input'), true);
$select = select('bought_goods', 'user', "username='${data['username']}'");
if (!empty($select)) {
    //echo "select不为空";
    $result = array();
    while ($row = $select->fetch_assoc()) {
        $result[] = $row;
    }
    $result['get_good_status'] = 1;
    $result['get_good_msg'] = 'get good detail success';
    echo json_encode($result);
    //$result[0];
//    $row = toArray($select);
//    echo $row['bought_goods'];
//    if($row['bought_goods']==''){
//        //没买过
//        echo "没买过";
//        $result['bought_status'] = 1;
//        $result['bought_msg'] = 'get bought list success, but never purchase anything';
//    }else{
//        //买过
//        echo "买过";
//        $result['bought_status'] = 2;
//        $result['bought_msg'] = 'get bought list success, and has purchased something';
//        $boughtList = json_encode($row['bought_goods']);
//        echo $boughtList;
//    }
    //echo(json_encode($result));
} else {
    $result['bought_status'] = -1;
    $result['bought_msg'] = 'get bought list fail';
    //echo(json_encode($result));
}
