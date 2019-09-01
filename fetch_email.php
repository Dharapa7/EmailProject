<?php
include_once('IMAP/class.imap.php');
error_reporting(E_ERROR);
 $hostname='{imap.gmail.com:993/imap/ssl/novalidate-cert}INBOX';
 $username='USEREMAIL';
 $password='PASSWORD';
$inbox=imap_open($hostname,$username,$password);
if(empty($inbox)){
    die("Connection problem");
}
else{
$emails=imap_search($inbox,'UNSEEN');
$arr=array();
$x=1;
if($emails){
        
        rsort($emails);
        for ($i=0;$i<50;$i++){
                $email_number=$emails[$i];
		$overview=imap_fetch_overview($inbox, $email_number,0);
		//$date=$overview[0]->date;
		//$time=explode(",",$date);
		//$time=explode(" ",$time);

		print_r($overview);
                $from=$overview[0]->from;
		$from_arr=explode(" ",$from);
                                $from_arr=explode("<",$from_arr[2]);
                                $from_arr=explode(">",$from_arr[1]);
                                $email=$from_arr[0];
		echo $email;	
	         if(!isset($arr1))
		$arr1=explode("<",$from);
		
		
		if(!isset($arr[$x]))
			$arr[$x]=$arr1[1];
		unset($arr1);
		$x=$x+1;
	}
	$arr=array_unique($arr);
	
        $flag=0;
        $file=fopen("/var/www/html/MyFiles/emails.txt","r");
        while(!feof($file) && $flag==0){
                $line=trim(fgets($file));
                
                if(!empty($line)){
                        if(array_search($line,$arr))
                                $flag=1;

                }


        }
        if($flag==1)
                shell_exec("xdg-open https://outlook.office.com/mail/inbox");
}
imap_close($inbox);
}
?>
