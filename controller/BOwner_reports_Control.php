<?php
session_start();
require_once ('../config/database.php');
require_once ('../models/BOwner_reports_Model.php');

// $BOid=3;
// $resultM=BOwner_reports_Model::all_payments_default($connection,$BOid);
// $result=mysqli_fetch_assoc($resultM);
// print_r($result);

date_default_timezone_set("Asia/Colombo");
echo $todate="tomorrow :".date( "Y-m-d 00:00:00", strtotime( "+1 days" ));

if(isset($_POST['go1'])){

echo '<br/>sort_by :'.$_POST['sort_by'];
echo '<br/>order: '.$_POST['order'];
echo '<br/>filter_Bid: '.$_POST['filter_Bid'];
echo '<br/>filter_postno : '.$_POST['filter_postno'];
echo '<br/>fromDate: '.$_POST['fromDate'];
echo '<br/>toDate : '.$_POST['toDate'];
echo '<br/>method: '.$_POST['method'];

echo '<br/><br/><br/>$BOid :'.$_SESSION['BOid'];
echo '<br/>$sortcontext: '.$_POST['sort_by'];
echo '<br/>$DESC_ASC: '.$_POST['order'];
echo '<br/>$filter_Bid: '.$_POST['filter_Bid'];
echo '<br/>$fromDate: '.$_POST['fromDate'];
echo '<br/>$toDate : '.$_POST['toDate'];
echo '<br/>$postno : '.$_POST['filter_postno'];
echo '<br/>method: '.$_POST['method'].'<br/><br/><br/>';

$BOid =$_SESSION['BOid'];
$sortcontext=$_POST['sort_by'];
$DESC_ASC=$_POST['order'];
$filter_Bid=$_POST['filter_Bid'];
if($_POST['fromDate']>0 && $_POST['toDate']>0){
    $fromDate= date("Y-m-d 00:00:00",strtotime($_POST['fromDate']));
    $toDate=date("Y-m-d 23:59:59",strtotime($_POST['toDate']));
}else if($_POST['fromDate']>0 && !($_POST['toDate']>0 )){
    $fromDate= date("Y-m-d 00:00:00",strtotime($_POST['fromDate']));
    $toDate=date("Y-m-d 23:59:59");
}else if(!($_POST['fromDate']>0) && $_POST['toDate']>0 ){
    $fromDate= date("2000-m-d 00:00:00");
    $toDate=date("Y-m-d 23:59:59",strtotime($_POST['toDate']));
}else{
    $fromDate=$_POST['fromDate'];
    $toDate=$_POST['toDate'];
}
$postno=$_POST['filter_postno'];
$method=$_POST['method'];

$resultM=BOwner_reports_Model::payments_filter($connection,$BOid,$sortcontext,$DESC_ASC,$filter_Bid,$fromDate,$toDate,$postno,$method);
if(mysqli_num_rows($resultM)>0){

    while($row=mysqli_fetch_assoc($resultM)){
        $data[]=$row;
        print_r($row);
        echo '<br/>';
    }
    $result=serialize($data);}


}

header('Location:../views/BOwner_reports.php?results='.$result);

// $resultM=BOwner_reports_Model::payments_filter($connection,3,'first_name','asc','2020-07-02 16:47:09',0,0,0);

// $resultM=BOwner_reports_Model::all_payments_default($connection,$BOid,$sortcontext,$DESC_ASC,$fromdate,$todate,$postno,$method);
// $resultM=BOwner_reports_Model::payments_filter($connection,3,'first_name','asc','2020-07-02 16:47:09','2021-01-12 16:47:09','5','cash');



?>