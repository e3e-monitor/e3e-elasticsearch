<?php


$json_index = '{ "index" : { "_index" : "e3e", "_type" : "event" } }';

$json_event = '{ "eventuuid": "6ca9b538-0b5a-11e5-ba50-02163e00a1e7" ,
	"timestamp" : 1433391964000 ,
	"location" : { "lat": 46.4363427, "lon": 6.1183151  } ,
	"elevation" : 500 ,
	"confidence" : 99.9 ,
	"size": 92 ,
	"type": "Gas Explosion" }';

$event = json_decode($json_event);

$filename = 'random-events2.json';

$nevents = 100; //n events to generate

$start_date='2015-09-15';
$end_date='2015-09-30';
$exp_type = array("Gas Explosion", "Detonation", "Tidal wave", "Vibration", "Avalanche");
$elmin=1; //min elevation
$elmax=500; //max elevation
$confmin=50; //min confidence
$confmax=100; //max confidence
$sizemin=1; //min intensity
$sizemax=100; //max intensity
$xmin=46;
$xmax=46.2;
$ymin=6;
$ymax=6.2;

rand($min_x, $max_x);
$res_json='';
//generate 10 random events
for ($i = 1; $i <= $nevents; $i++) {
//    echo $i.'<br>';
	echo '<br>';
	echo $eventuuid = generateRandomString();
	echo '<br>';
	echo $timestamp = randomDate($start_date, $end_date);
	echo '<br>';
	echo $x = float_rand($xmin ,  $xmax, 10);
	echo '<br>';
	echo $y = float_rand($ymin ,  $ymax, 10);
	echo '<br>';	
	echo $elevation = rand($elmin ,  $elmax);
	echo '<br>';
	echo $confidence = rand($confmin ,  $confmax);
	echo '<br>';
	echo $size = rand($sizemin ,  $sizemax);
	echo '<br>';
	echo $type = $exp_type[array_rand($exp_type,1)];
	
	$json_gen_event='{ "eventuuid": "'.$eventuuid.'" ,
	"timestamp" : '.$timestamp.' ,
	"location" : { "lat": '.$x.', "lon": '.$y.'  } ,
	"elevation" : '.$elevation.' ,
	"confidence" : '.$confidence.' ,
	"size": '.$size.' ,
	"type": "'.$exp_type.'" }';
	
	$res_json = $res_json . $json_index . $json_gen_event;
	
}
echo $res_json;
file_put_contents( $filename , $res_json );




//Helper functions

function generateRandomString($length = 20) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}

function randomDate($start_date, $end_date)
{
    // Convert to timetamps
    $min = strtotime($start_date);
    $max = strtotime($end_date);

    // Generate random number using above bounds
    $val = rand($min, $max);
	return $val;
    // Convert back to desired date format
    //return date('Y-m-d H:i:s', $val);
}

function float_rand($Min, $Max, $round=0){
    //validate input
    if ($min>$Max) { $min=$Max; $max=$Min; }
        else { $min=$Min; $max=$Max; }
    $randomfloat = $min + mt_rand() / mt_getrandmax() * ($max - $min);
    if($round>0)
        $randomfloat = round($randomfloat,$round);
 
    return $randomfloat;
}
?>
