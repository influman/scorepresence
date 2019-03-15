<?php
	$xml = "<?xml version=\"1.0\" encoding=\"ISO-8859-1\" ?>";      
	//***********************************************************************************************************************
	// V1.0 : scorePresence - Calcul de score de présence / Influman 2019
	////////////////////////
	$action = getArg("action", true, ''); // getstatus
	$sensors= getArg("sensors", false, '');
	$devices = getArg("devices", false, '');
	$param = getArg("param", false, '5,30');
	$zone = getArg("zone", false, '');
    $periph_id = getArg('eedomus_controller_module_id'); 
	$debug = "";
	///////////////////////////
	if ($action == '' || ($sensors == '' && $devices == '')) {
		die();
	}
	//////////////////////////
	if ($action == 'getstatus') {
		$maintenant = time();
		//////////////////////////
		// Lecture param
		$tab_param = explode(",",$param);
		if (is_numeric($tab_param[0])) {
			$pas = $tab_param[0];
		}
		if (is_numeric($tab_param[1])) {
			$max = $tab_param[1];
		}
		/////////////////////////
		// Lecture Sensors
		$score = 0;
		$detection = false;
		$tab_sensors = array();
		$tab_sensors_val = array();
		$i = 0;
		$j = 0;
		$tab_param = explode(",",$sensors);
		while ($i < count($tab_param)) {
			if (is_numeric($tab_param[$i])) {
				$tab_sensors[$j] = $tab_param[$i];
				$actualvalue_tab = getValue($tab_sensors[$j]);
				$valeur_sensor = $actualvalue_tab['value'];
				$tab_sensors_val[$tab_sensors[$j]] = $valeur_sensor;
				
				if ($valeur_sensor > 0) {
					$detection = true;
					$score += $pas;
				}
				$debug .= "Sensor n°".$j.":".$tab_sensors[$j]." = ".$valeur_sensor." ";
				$j++;
			}
			$i++;
		}
		$i = 0;
		$tab_param = explode(",",$devices);
		while ($i < count($tab_param)) {
			if (is_numeric($tab_param[$i])) {
				$tab_sensors[$j] = $tab_param[$i];
				$actualvalue_tab = getValue($tab_sensors[$j]);
				$valeur_sensor = $actualvalue_tab['value'];
				$tab_sensors_val[$tab_sensors[$j]] = $valeur_sensor;
				if ($valeur_sensor > 0) {
					$detection = true;
					$score += $pas;
				}
				$debug .= "Sensor n°".$j.":".$tab_sensors[$j]." = ".$valeur_sensor." ";
				$j++;
			}
			$i++;
		}
		//////////////////
		$heures = 0;
		if ($detection) {
			$lastdetection = $maintenant;
			saveVariable("SCOREPRESENCE_LD_".$periph_id, $lastdetection);
			if ($score > $max) {
				$score = 100;
			}
		} else {
			$preload = loadVariable("SCOREPRESENCE_LD_".$periph_id);
			if ($preload != '' && substr($preload,0,8) != "## ERROR") {
				if ($preload > 0) {
					$lastdetection = $preload;
					// calcul durée depuis dernière détection
					$difference = $maintenant - $lastdetection;
					$heures = floor ($difference / 3600 );
					$tab_valuelist = getPeriphValueList($periph_id);
					foreach($tab_valuelist As $value_list) {
						if ($value_list["value"] < 0) {
							$value_list_abs = $value_list["value"] * -1;
							if ($heures >= $value_list_abs) {
								$score = $value_list["value"];
							}
						}
					}
				}
			}
		}
		$xml .= "<SCOREPRESENCE>";
		$xml .= "<STATUS>".$score."</STATUS>";
		$xml .= "<LASTDETECTION>".$lastdetection." ".$heures."</LASTDETECTION>";
		$xml .= "<DEBUG>".$debug."</DEBUG>";
		$xml .= "</SCOREPRESENCE>";
		sdk_header('text/xml');
		echo $xml;	
	}
?>
