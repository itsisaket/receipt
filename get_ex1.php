<!DOCTYPE HTML PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
<head><title>มหาวิทยาลัยราชภัฏศรีสะเกษ (กองบริการการศึกษา)</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<?php     
    setlocale ( LC_ALL, 'en_US.UTF-8'); 
    /************************************************************** 
    *  Description: 
    *  Creates a simple SOAP Client (client.php). 
    **************************************************************/ 
     
    // use form data 
    if ((string)$_GET['action'] == 'get_data') { 
        // includes nusoap classes 
        require_once("./lib/nusoap.php");

        // set parameters and create client 
        $l_aParam   = array((string)$_POST['id_no']); 
        $l_oClient  = new soapclient('http://regis.sskru.ac.th/sskru_services/exam_1.php'); 
     
        // call a webmethod (getWeather) 
        $l_stResult = $l_oClient->call('stu_searchby_idno', $l_aParam); 
     
        // check for errors 
        if (!$l_oClient->getError()) { 
          // print results 
          print '<h1>Current data for: '    . $l_aParam[0]  
              . ':</h1><ul><li>'.iconv('tis-620','utf-8','ชื่อ ').$l_stResult ['std_fname']
              . '</li><li>'.iconv('tis-620','utf-8','นามสกุล ') . $l_stResult['std_lname']  
              . '</li></ul>';  
        } 
        // print error description 
        else { 
          echo '<h1>Error: ' . $l_oClient->getError() . '</h1>'; 
        } 
    } 

    // output search form 
    print ' 
        <form name="input" action="'.$_SERVER['PHP_SELF'].'?action=get_data"  method="POST"> 
        Your id_no: <input type="text" name="id_no"> 
        <input type="submit" value="Search"> 
        </form> 
    '; 
?> 
