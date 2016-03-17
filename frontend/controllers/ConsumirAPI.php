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
	// $dateActual = date('Y-m-d h:i:s', time());
	// echo "Hora del Servidor: ".$dateActual."<br>";

	// $dateResta = date('Y-m-d h:i:s', time()-60);
	// echo "Hora -1 Minuto: ".$dateResta."<br>";

	$fecha = date('Y-m-d', time());
	// $hora = date('h:m:i:s', time());
	$hora = date('h:m',time()); 
	// $horaResta = date ('h:m:i:s',time()-240);
	
	$cadenafechaActual =$fecha.'T'.$hora;
	// $cadenafechaResta = $fecha.'T'.$horaResta;
	// echo "Fecha Resta: ".$cadenafechaResta."<br>";
	echo "Fecha Actual: ".$cadenafechaActual."<br>";
	
	//$url="https://cdrapi:cdrapi123@172.168.0.3:8443/cdrapi?format=json&startTime=$cadenafechaResta&endTime=$cadenafechaActual";
	$url="https://cdrapi:cdrapi123@172.168.0.3:8443/cdrapi?format=json&startTime=$cadenafechaActual";
	
	$arrContextOptions=array("ssl"=>array("verify_peer"=>false,"verify_peer_name"=>false,),);  
	$content = file_get_contents($url, false, stream_context_create($arrContextOptions));
	$json = json_decode($content, true);

	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "sitalbd";

// Create connection
	$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
		echo "Error en la conexion con la API";
	} 
//Recorre el arrgelo e inserta en la BD
	for( $i=0; $i <= count($json['cdr'])-1;$i++)
	{
	$sql = "INSERT INTO tbl_cdr
		(
		AcctId,
		accountcode,
		src,
		dst,
		dcontext,
		clid,
		channel,
		dstchannel,
		lastapp,
		lastdata,
		start,
		answer,
		end,
		duration,
		billsec,
		disposition,
		amaflags,
		uniqueid,
		userfield,
		channel_ext,
		dstchannel_ext,
		service,
		caller_name,
		recordfiles,
		dstanswer,
		chanext,
		dstchanext
		)
		VALUES 
		(
			'{$json['cdr'][$i]['AcctId']}',
			'{$json['cdr'][$i]['accountcode']}',
			'{$json['cdr'][$i]['src']}',
			'{$json['cdr'][$i]['dst']}',
			'{$json['cdr'][$i]['dcontext']}',
			'{$json['cdr'][$i]['clid']}',
			'{$json['cdr'][$i]['channel']}',
			'{$json['cdr'][$i]['dstchannel']}',
			'{$json['cdr'][$i]['lastapp']}',
			'{$json['cdr'][$i]['lastdata']}',
			'{$json['cdr'][$i]['start']}',
			'{$json['cdr'][$i]['answer']}',
			'{$json['cdr'][$i]['end']}',
			'{$json['cdr'][$i]['duration']}',
			'{$json['cdr'][$i]['billsec']}',
			'{$json['cdr'][$i]['disposition']}',
			'{$json['cdr'][$i]['amaflags']}',
			'{$json['cdr'][$i]['uniqueid']}',
			'{$json['cdr'][$i]['userfield']}',
			'{$json['cdr'][$i]['channel_ext']}',
			'{$json['cdr'][$i]['dstchannel_ext']}',
			'{$json['cdr'][$i]['service']}',
			'{$json['cdr'][$i]['caller_name']}',
			'{$json['cdr'][$i]['recordfiles']}',
			'{$json['cdr'][$i]['dstanswer']}',
			'{$json['cdr'][$i]['chanext']}',
			'{$json['cdr'][$i]['dstchanext']}'
		)";
		if ($conn->query($sql) === TRUE) {
			echo "New record created successfully";
		} else {
			echo "Error: ".$sql . "<br>"."<br>";
			echo "Linea error: ".$conn->error;
		}
	}
	$conn->close();
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


