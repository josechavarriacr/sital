<?php

function mostrar()
{
	$url="https://cdrapi:cdrapi123@172.168.0.3:8443/cdrapi?format=json";
	$arrContextOptions=array("ssl"=>array("verify_peer"=>false,"verify_peer_name"=>false,),);  
	$content = file_get_contents($url, false, stream_context_create($arrContextOptions));
	$json = json_decode($content, true);	

	for( $i=0; $i <= count($json['cdr'])-1;$i++)
	{
		echo "AcctId: ".$json['cdr'][$i]['AcctId'].'<br>';
		echo "accountcode: ".$json['cdr'][$i]['accountcode'].'<br>';
		echo "src: ".$json['cdr'][$i]['src'].'<br>';
		echo "dst: ".$json['cdr'][$i]['dst'].'<br>';
		echo "dcontext: ".$json['cdr'][$i]['dcontext'].'<br>';
		echo "clid: ".$json['cdr'][$i]['clid'].'<br>';
		echo "channel: ".$json['cdr'][$i]['channel'].'<br>';
		echo "dstchannel: ".$json['cdr'][$i]['dstchannel'].'<br>';
		echo "lastapp: ".$json['cdr'][$i]['lastapp'].'<br>';
		echo "lastdata: ".$json['cdr'][$i]['lastdata'].'<br>';
		echo "start: ".$json['cdr'][$i]['start'].'<br>';
		echo "answer: ".$json['cdr'][$i]['answer'].'<br>';
		echo "end: ".$json['cdr'][$i]['end'].'<br>';
		echo "duration: ".$json['cdr'][$i]['duration'].'<br>';
		echo "billsec: ".$json['cdr'][$i]['billsec'].'<br>';
		echo "disposition: ".$json['cdr'][$i]['disposition'].'<br>';
		echo "amaflags: ".$json['cdr'][$i]['amaflags'].'<br>';
		echo "uniqueid: ".$json['cdr'][$i]['uniqueid'].'<br>';
		echo "userfield: ".$json['cdr'][$i]['userfield'].'<br>';
		echo "channel_ext: ".$json['cdr'][$i]['channel_ext'].'<br>';
		echo "dstchannel_ext: ".$json['cdr'][$i]['dstchannel_ext'].'<br>';
		echo "service: ".$json['cdr'][$i]['service'].'<br>';
		echo "caller_name: ".$json['cdr'][$i]['caller_name'].'<br>';
		echo "recordfiles: ".'<a href="https://172.168.0.3:8443/recapi?filename='.$json['cdr'][$i]['recordfiles'].'">'.$json['cdr'][$i]['recordfiles'].'</a>'.'<br>';
		echo "dstanswer: ".$json['cdr'][$i]['dstanswer'].'<br>';
		echo "chanext: ".$json['cdr'][$i]['chanext'].'<br>';
		echo "dstchanext: ".$json['cdr'][$i]['dstchanext'].'<br>';
		echo '<br><br><br>';
	}
}
//echo mostrar();
function ingresarDatosApi()
{
$url="https://cdrapi:cdrapi123@172.168.0.3:8443/cdrapi?format=json";
	$arrContextOptions=array("ssl"=>array("verify_peer"=>false,"verify_peer_name"=>false,),);  
	$content = file_get_contents($url, false, stream_context_create($arrContextOptions));
	$json = json_decode($content, true);

	$connect = mysql_pconnect("localhost","root","");
	if ($connect) {       
		if(mysql_select_db("sitalbd", $connect)) {
		//	mysql_query("INSERT INTO myuser SET FirstName='$FirstName',     LastName='$LastName'");   

	for( $i=0; $i <= count($json['cdr'])-1;$i++)
	{
		mysql_query("INSERT INTO tb_cdr Values ('[$i]')");		
	}
			return true;
			echo 'success';
		}
	}
	return false;
	echo 'unsuccess';
}
echo ingresarDatosApi();
/*
uniqueid
start
answer
end
clid
channel
dstchannel
*/
?>


