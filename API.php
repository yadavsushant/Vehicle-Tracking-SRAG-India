	<?php
	function callAPI_srag_tracking(){
	   $curl = curl_init();
	   $url = "http://ctyf.co.in/api/companyvehiclelatestinfo";
	   $data = array(
	   	"token" => XXXXXXXXXX,
	   );

       // curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
	   $url = sprintf("%s?%s", $url, http_build_query($data));

	   // OPTIONS:
	   curl_setopt($curl, CURLOPT_URL, $url);
	   curl_setopt($curl, CURLOPT_HTTPHEADER, array(
	      'Content-Type: application/json',
	   ));
	   curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
	   curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);

	   // EXECUTE:
	   $result = curl_exec($curl);
	   
	   if(!$result){die("Connection Failure");}
	   curl_close($curl);
	   $response = json_decode($result);

	   for($i = 0; $i<=count($response->Vehicle); $i++)
	   {
	   		$VehicleNo = $response->Vehicle[$i]->VehicleNo;
	   		$Imei = $response->Vehicle[$i]->Imei;
	   		$Location = $response->Vehicle[$i]->Location;
	   		$Date = date('Y-m-d H:i:s',strtotime($response->Vehicle[$i]->Date));
	   		$Tempr = $response->Vehicle[$i]->Tempr;
	   		$Ignition = $response->Vehicle[$i]->Ignition;
	   		$Lat = $response->Vehicle[$i]->Lat;
	   		$Long = $response->Vehicle[$i]->Long;
	   		$lat_longi = $response->Vehicle[$i]->Lat.",".$response->Vehicle[$i]->Long;
	   		$Speed = $response->Vehicle[$i]->Speed;
	   		$Angle = $response->Vehicle[$i]->Angle;
	   	}
	}
