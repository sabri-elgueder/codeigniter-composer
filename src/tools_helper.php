<?php

if (!function_exists('getallheaders'))
{
    function getallheaders()
    {
           $headers = array();
       foreach ($_SERVER as $name => $value)
       {
           if (substr($name, 0, 5) == 'HTTP_')
           {
             $headers[str_replace(' ', '-', ucwords(strtolower(str_replace('_', ' ', substr($name, 5)))))] = $value;
           }
       }
       return $headers;
    }
}

function debug($var = false, $showHtml = false)
{
  echo "\n<pre class=\"sx-debug\">\n";
  $var = print_r($var, true);
  if ($showHtml) {
    $var = str_replace('<', '&lt;', str_replace('>', '&gt;', $var));
  }
  echo $var . "\n</pre>\n";
}

function sp_generatePassword($length = 8) {
    $chars = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
    $count = mb_strlen($chars);

    for ($i = 0, $result = ''; $i < $length; $i++) {
        $index = rand(0, $count - 1);
        $result .= mb_substr($chars, $index, 1);
    }

    return $result;
}



function sp_xssCleaner($input_str)
{
    $return_str = str_replace(array(
      '<',
      '>',
      "'",
      '"',
      ')',
      '('
    ), array(
      '&lt;',
      '&gt;',
      '&apos;',
      '&#x22;',
      '&#x29;',
      '&#x28;'
    ), $input_str);
    $return_str = str_ireplace('%3Cscript', '', $return_str);
    return $return_str;
}




if (!function_exists('tools')) {
   function remove_accent($str)
   {
	  $a = array('À', 'Á', 'Â', 'Ã', 'Ä', 'Å', 'Æ', 'Ç', 'È', 'É', 'Ê', 'Ë', 'Ì', 'Í', 'Î', 'Ï', 'Ð',
					'Ñ', 'Ò', 'Ó', 'Ô', 'Õ', 'Ö', 'Ø', 'Ù', 'Ú', 'Û', 'Ü', 'Ý', 'ß', 'à', 'á', 'â', 'ã',
					'ä', 'å', 'æ', 'ç', 'è', 'é', 'ê', 'ë', 'ì', 'í', 'î', 'ï', 'ñ', 'ò', 'ó', 'ô', 'õ',
					'ö', 'ø', 'ù', 'ú', 'û', 'ü', 'ý', 'ÿ', 'Ā', 'ā', 'Ă', 'ă', 'Ą', 'ą', 'Ć', 'ć', 'Ĉ',
					'ĉ', 'Ċ', 'ċ', 'Č', 'č', 'Ď', 'ď', 'Đ', 'đ', 'Ē', 'ē', 'Ĕ', 'ĕ', 'Ė', 'ė', 'Ę', 'ę',
					'Ě', 'ě', 'Ĝ', 'ĝ', 'Ğ', 'ğ', 'Ġ', 'ġ', 'Ģ', 'ģ', 'Ĥ', 'ĥ', 'Ħ', 'ħ', 'Ĩ', 'ĩ', 'Ī', 'ī',
					'Ĭ', 'ĭ', 'Į', 'į', 'İ', 'ı', 'Ĳ', 'ĳ', 'Ĵ', 'ĵ', 'Ķ', 'ķ', 'Ĺ', 'ĺ', 'Ļ', 'ļ', 'Ľ', 'ľ',
					'Ŀ', 'ŀ', 'Ł', 'ł', 'Ń', 'ń', 'Ņ', 'ņ', 'Ň', 'ň', 'ŉ', 'Ō', 'ō', 'Ŏ', 'ŏ', 'Ő', 'ő', 'Œ',
					'œ', 'Ŕ', 'ŕ', 'Ŗ', 'ŗ', 'Ř', 'ř', 'Ś', 'ś', 'Ŝ', 'ŝ', 'Ş', 'ş', 'Š', 'š', 'Ţ', 'ţ', 'Ť',
					'ť', 'Ŧ', 'ŧ', 'Ũ', 'ũ', 'Ū', 'ū', 'Ŭ', 'ŭ', 'Ů', 'ů', 'Ű', 'ű', 'Ų', 'ų', 'Ŵ', 'ŵ', 'Ŷ',
					'ŷ', 'Ÿ', 'Ź', 'ź', 'Ż', 'ż', 'Ž', 'ž', 'ſ', 'ƒ', 'Ơ', 'ơ', 'Ư', 'ư', 'Ǎ', 'ǎ', 'Ǐ', 'ǐ',
					'Ǒ', 'ǒ', 'Ǔ', 'ǔ', 'Ǖ', 'ǖ', 'Ǘ', 'ǘ', 'Ǚ', 'ǚ', 'Ǜ', 'ǜ', 'Ǻ', 'ǻ', 'Ǽ', 'ǽ', 'Ǿ', 'ǿ');

	  $b = array('A', 'A', 'A', 'A', 'A', 'A', 'AE', 'C', 'E', 'E', 'E', 'E', 'I', 'I', 'I', 'I', 'D', 'N', 'O',
					'O', 'O', 'O', 'O', 'O', 'U', 'U', 'U', 'U', 'Y', 's', 'a', 'a', 'a', 'a', 'a', 'a', 'ae', 'c',
					'e', 'e', 'e', 'e', 'i', 'i', 'i', 'i', 'n', 'o', 'o', 'o', 'o', 'o', 'o', 'u', 'u', 'u', 'u',
					'y', 'y', 'A', 'a', 'A', 'a', 'A', 'a', 'C', 'c', 'C', 'c', 'C', 'c', 'C', 'c', 'D', 'd', 'D',
					'd', 'E', 'e', 'E', 'e', 'E', 'e', 'E', 'e', 'E', 'e', 'G', 'g', 'G', 'g', 'G', 'g', 'G', 'g',
					'H', 'h', 'H', 'h', 'I', 'i', 'I', 'i', 'I', 'i', 'I', 'i', 'I', 'i', 'IJ', 'ij', 'J', 'j', 'K',
					'k', 'L', 'l', 'L', 'l', 'L', 'l', 'L', 'l', 'L', 'l', 'N', 'n', 'N', 'n', 'N', 'n', 'n', 'O', 'o',
					'O', 'o', 'O', 'o', 'OE', 'oe', 'R', 'r', 'R', 'r', 'R', 'r', 'S', 's', 'S', 's', 'S', 's', 'S',
					's', 'T', 't', 'T', 't', 'T', 't', 'U', 'u', 'U', 'u', 'U', 'u', 'U', 'u', 'U', 'u', 'U', 'u', 'W',
					'w', 'Y', 'y', 'Y', 'Z', 'z', 'Z', 'z', 'Z', 'z', 's', 'f', 'O', 'o', 'U', 'u', 'A', 'a', 'I', 'i',
					'O', 'o', 'U', 'u', 'U', 'u', 'U', 'u', 'U', 'u', 'U', 'u', 'A', 'a', 'AE', 'ae', 'O', 'o');
	  return str_replace($a, $b, $str);
	}
	function Slug($str){

	  return mb_strtolower(preg_replace(array('/[^a-zA-Z0-9 \'-]/', '/[ -\']+/', '/^-|-$/'),
	  array('', '-', ''), remove_accent($str)));
	}
	function languages()
    {
		$ci =& get_instance();
		$ci->load->database();
		$ci->db->select('*');
		$ci->db->from('languages');
		$ci->db->where('active', 1);
		$ci->db->order_by("language_id", "asc");
		$ci->db->limit(10);
		$query = $ci->db->get();
		return  $query->result();
	}

	function languages_dev()
    {
		$ci =& get_instance();
		$ci->load->database();
		$ci->db->select('*');
		$ci->db->from('languages');
		$ci->db->where('active_admin', 1);
		$ci->db->order_by("language_id", "asc");
		$ci->db->limit(10);
		$query = $ci->db->get();
		return  $query->result();
	}

	function languages_array_dev()
    {
		$ci =& get_instance();
		$ci->load->database();
		$ci->db->select('*');
		$ci->db->from('languages');
		$ci->db->where('active_admin', 1);
		$ci->db->order_by("language_id", "asc");
		$ci->db->limit(10);
		$query = $ci->db->get();
		$query = $query->result();
		$array = array();
		foreach($query as $l){
			array_push($array, $l->language_code);
		}
		return $array;
	}

    function languages_array()
    {
		$ci =& get_instance();
		$ci->load->database();
		$ci->db->select('*');
		$ci->db->from('languages');
		$ci->db->where('active', 1);
		$ci->db->order_by("language_id", "asc");
		$ci->db->limit(10);
		$query = $ci->db->get();
		$query = $query->result();
		$array = array();
		foreach($query as $l){
			array_push($array, $l->language_code);
		}
		return $array;
	}

	function get_lang($lang)
    {
		$ci =& get_instance();
		$ci->load->database();
		$ci->db->select('*');
		$ci->db->from('languages');
		//$ci->db->where('active', 1);
		$ci->db->where('language_code', $lang);
		$ci->db->order_by("language_id", "asc");
		$query = $ci->db->get();
		return $query->row();
	}

	function translate($objects,$ref_language)
    {
		foreach($objects as $k=>$o){
			if($o->ref_language == $ref_language)
			{
				return $k;
				break;
			}
		}
		return false;
	}
	function change_date($date)
    {
		$date = new DateTime($date);
		return $date->format('d-m-Y');
	}
	function change_date_name($date)
    {
		$date = new DateTime($date);
		return $date->format('d M Y');
	}
	function change_date_bd($date)
    {
		$date = new DateTime($date);
		return $date->format('Y-m-d');
	}

	function get_price($provider_periode_id,$prices)
    {
		if(!empty($prices)){

			foreach($prices as $p){
				if($p->ref_provider_periode == $provider_periode_id){

					return $p->price;
				}
			}
			return 0;

		}else{
			return 0;
		}
	}

	function change_date_plus_day($date){
		$date = new DateTime($date);
		$date->modify('+1 day');
		return $date->format('m-d');
	}
	function count_day($debut, $fin) {

		//count_day("2000-10-20", "2000-10-21") return 2
		$tDeb 				= explode("-", $debut);
		$tFin 				= explode("-", $fin);

		$diff = mktime(0, 0, 0, $tFin[1], $tFin[2], $tFin[0]) - mktime(0, 0, 0, $tDeb[1], $tDeb[2], $tDeb[0]);
		$res 	= (($diff / 86400)+1);

		return round($res,0);

	}

	function between_dates($date,$date_begin,$date_end){

		if($date >= $date_begin && $date <= $date_end){
			return true;
		}else{
			return false;
		}
	}

	function price_from_to($prices,$prices_arr){
		$price = new stdClass();
		if(empty($prices)){

			$price->price_from 	= 0;
			$price->price_to 	= 0;

		}else{

			if(count($prices_arr) == 1){
					$price->price_to   		= $price->price_from = end($prices_arr);
			}elseif(count($prices_arr) > 1){
					$price->price_from  	=  min($prices_arr);
					$price->price_to 		=  max($prices_arr);
			}else{

					$min_val = $prices[0]->price;
					$max_val = $prices[0]->price;
					for ($i = 1; $i < count($prices); $i++) {

						if ($prices[$i]->price < $min_val) {
							$min_val = $prices[$i]->price;
						}
						if ($prices[$i]->price > $max_val) {
							$max_val = $prices[$i]->price;
						}

					}
					$price->price_from   =  $min_val;
					$price->price_to	 =  $max_val;
			}

			$price->price_from 	= round($price->price_from);
			$price->price_to 	= round($price->price_to);
		}
		return $price;
	}

	function price_from_to_new($prices,$promo_check = 0){

		if(isset($_GET['slide_test'])){
			echo '<b style="color:green"> price_from_to_new -----promo_check :'.$promo_check;
					var_dump($prices);
			echo '<br>------</b>';
		}
		$currency = NULL;
		if(empty($prices)){

			$price->price_from 				 = 0;
			$price->price_to 				 = 0;
			$price->currency_provider_period_from 	= NULL;
			$price->currency_provider_period_to 	= NULL;

		}else{

			if($promo_check == 1){

				$prices_promos	= array();
				foreach($prices as $p) {
					if(empty($p->discount)){
						$p->discount 	 = 0;
					}else{
						array_push($prices_promos,$p);
					}

				}
				$min_val 		= $prices_promos[0]->price_e;
				$max_val 		= $prices_promos[0]->price_e;
				$min_index 		= 0;
				$max_index 		= 0;
				for ($i = 1; $i < count($prices_promos); $i++) {

					if ($prices_promos[$i]->price_e < $min_val) {
						if ($prices_promos[$i]->price_e < $min_val) {
							$min_val 		= $prices_promos[$i]->price_e;
							$min_index 		= $i;
						}
						if ($prices_promos[$i]->price_e > $max_val) {
							$max_val 		= $prices_promos[$i]->price_e;
							$max_index 		= $i;
						}
					}

				}
				$currency_min							= $prices_promos[$min_index]->currency;
				$currency_max							= $prices_promos[$max_index]->currency;
				$price->currency_provider_period_from 	= $currency_min;
				$price->currency_provider_period_to 	= $currency_max;
				switch ($currency_min) {
					case "€":
						$price->price_from    = round(($prices_promos[$min_index]->price_e*(100-$prices_promos[$min_index]->discount))/100);
					break;
					case "$":
						$price->price_from    = round(($prices_promos[$min_index]->price_d*(100-$prices_promos[$min_index]->discount))/100);
						break;
					case "£":
						$price->price_from    = round(($prices_promos[$min_index]->price_p*(100-$prices_promos[$min_index]->discount))/100);
					default:
						$price->price_from    = round(($prices_promos[$min_index]->price*(100-$prices_promos[$min_index]->discount))/100);
				}


				switch ($currency_max) {
					case "€":
						$price->price_to    = round(($prices_promos[$max_index]->price_e*(100-$prices_promos[$max_index]->discount))/100);
					break;
					case "$":
						$price->price_to    = round(($prices_promos[$max_index]->price_d*(100-$prices_promos[$max_index]->discount))/100);
						break;
					case "£":
						$price->price_to    = round(($prices_promos[$max_index]->price_p*(100-$prices_promos[$max_index]->discount))/100);
					default:
						$price->price_to    = round(($prices_promos[$max_index]->price*(100-$prices_promos[$max_index]->discount))/100);
				}


			}else{

				$min_val 	= $prices[0]->price_e;
				$max_val 	= $prices[0]->price_e;
				$min_index 	= 0;
				$max_index 	= 0;
				for ($i = 1; $i < count($prices); $i++) {

					if ($prices[$i]->price_e < $min_val) {
						$min_val 	= $prices[$i]->price_e;
						$min_index 	= $i;
					}
					if ($prices[$i]->price_e > $max_val) {
						$max_val 	= $prices[$i]->price_e;
						$max_index 	= $i;
					}
				}
				$price->price_from   					=  round($min_val);
				$price->price_to	 					=  round($max_val);
				$price->currency_provider_period_from 	= NULL;
				$price->currency_provider_period_to 	= NULL;


				$currency_min							= $prices[$min_index]->currency;
				$currency_max							= $prices[$max_index]->currency;

				switch ($currency_min) {
					case "€":
						$price->price_from    = round($prices[$min_index]->price_e);
					break;
					case "$":
						$price->price_from    = round($prices[$min_index]->price_d);
						break;
					case "£":
						$price->price_from    = round($prices[$min_index]->price_p);
					default:
						$price->price_from    = round($prices[$min_index]->price);
				}


				switch ($currency_max) {
					case "€":
						$price->price_to    = round($prices[$max_index]->price_e);
					break;
					case "$":
						$price->price_to    = round($prices[$max_index]->price_d);
						break;
					case "£":
						$price->price_to    = round($prices[$max_index]->price_p);
					default:
						$price->price_to    = round($prices[$max_index]->price);
				}

				/*
				switch ($provider_device) {
					case "euros":
						$price->price_from    = round($prices[$min_index]->price_e);
						$price->price_to    = round($prices[$max_index]->price_e);
					break;
					case "dollars":
						$price->price_from    = round($prices[$min_index]->price_d);
						$price->price_to    = round($prices[$max_index]->price_d);
						break;
				}
				*/

				$price->currency_provider_period_from 	= $currency_min;
				$price->currency_provider_period_to 	= $currency_max;

			}

		}
		if(isset($_GET['slide_test'])){
			echo '<b style="color:green"> price_from_to_new -----';
				var_dump($price);
			echo '<br>------</b>';
		}
		return $price;
	}
	function date_range($datebeginprice, $dateendprice , $datebeginclient, $dateendclient) {

			//La plus petite date de fin - la plus grande date de départ.
			$min = min($dateendprice, $dateendclient);
			$max = max($datebeginprice, $datebeginclient);

			if($max >= $min){
				$date_range->begin	= $min;
				$date_range->end 	= $max;
			}else{
				$date_range->begin	= $max;
				$date_range->end 	= $min;
			}
			$date_range->days 	= count_day($date_range->begin, $date_range->end);

			return $date_range;
	}
	function count_weeks_from_days($days){

			if($days == 0){
					return 0;
			}else{
					return (int)(abs($days) / 7);
			}

	}
	function array_sort_by_date( $a, $b ) {
			return strtotime($a->date_begin) - strtotime($b->date_begin);
	}

	function price_between_period_search($prices, $date_begin = NULL, $date_end = NULL,$promotions = NULL ,$discounts = NULL){

			if(isset($_GET['bessem'])){echo "<pre>";}
			if(isset($_GET['bessem'])){var_dump($prices);}
			// On teste si on n'a pas des dates
			$locations_arr  = $price_return = array();
			if(empty($date_begin) && empty($date_end)) {

				$in_promo_prices      = array();

				// si on n'a pas des dates client mais on as des promos
				//Le boat_id_generic pour la recupération de tout les prix pour les bateau similaire meme si il y'a une spécial offre
				if(!empty($promotions) && empty($_GET['boat_id_generic'])) {

						$promotion_date_begin 			= date("m-d", strtotime($promotions->date_begin));
						$promotio_date_end   			= date("m-d", strtotime($promotions->date_end));
						$promotion_year_begin 			= date("Y", strtotime($promotions->date_begin));
						$promotio_year_end   			= date("Y", strtotime($promotions->date_end));
						$today 							= date('m-d', time());
						$current_year	 				= date('Y', time());

						// on parcours tous les periodes de prix possible d'un bateau, en croisant avec les periodes des promos
						foreach($prices as $key=>$price) {

							if(isset($_GET["bessem"])){
								echo "<br> price begin : ".$price->date_begin." price begin : ".$price->date_end;
							}
							//($price->date_begin <= $promotions->date_begin && $price->date_end >= $promotions->date_end) ||
							if( (date("m-d", strtotime($price->date_begin)) <= $promotio_date_end && date("m-d", strtotime($price->date_end)) >= $promotion_date_begin)
										// si on as une date de debut plus grande (en jours/mois) que la date de fin, ca veut dire qu'il y'as un passage d'une année a l'autre
										// donc on reformate les dates en rajoutant l'année courante sur la date de debut, et l'année courante + 1 sur la date de fin

										|| (date("m-d", strtotime($price->date_begin)) > date("m-d", strtotime($price->date_end))
												&& date($current_year."-m-d", strtotime($price->date_begin)) <= date($current_year."-m-d", strtotime($promotions->date_end))
												&& date(($current_year+1)."-m-d", strtotime($price->date_end)) >= date($current_year."-m-d", strtotime($promotions->date_begin)))

										|| ($promotion_date_begin > $promotio_date_end
												&& date($current_year."-m-d", strtotime($price->date_begin)) <= date(($current_year+1)."-m-d", strtotime($promotions->date_end))
												&& date($current_year."-m-d", strtotime($price->date_end)) >= date($current_year."-m-d", strtotime($promotions->date_begin)))

										|| (date("m-d", strtotime($price->date_begin)) > date("m-d", strtotime($price->date_end))
												&& date($current_year."-m-d", strtotime($price->date_begin)) <= date(($current_year+1)."-m-d", strtotime($promotions->date_end))
												&& date(($current_year)."-m-d", strtotime($price->date_end)) >= date($current_year."-m-d", strtotime($promotions->date_begin)))

										|| (date("m-d", strtotime($price->date_begin)) > date("m-d", strtotime($price->date_end)) && $promotion_date_begin > $promotio_date_end
												&& date($current_year."-m-d", strtotime($price->date_begin)) <= date(($current_year+1)."-m-d", strtotime($promotions->date_end))
												&& date(($current_year+1)."-m-d", strtotime($price->date_end)) >= date($current_year."-m-d", strtotime($promotions->date_begin)))

										|| (date("m-d", strtotime($price->date_begin)) < date("m-d", strtotime($price->date_end)) && $promotio_year_end > $promotion_year_begin
												&& date($current_year."-m-d", strtotime($price->date_begin)) <= date(($current_year)."-m-d", strtotime($promotions->date_end))
												&& date(($current_year+1)."-m-d", strtotime($price->date_end)) >= date($current_year."-m-d", strtotime($promotions->date_begin)))

										){
										//on construit un tableau avec les prix recalculé en tenant compte des promos
										array_push($in_promo_prices,round(($price->price*(100-$promotions->discount))/100));
										$locations = array();
										if($price->locations != ""){
											$locations    	= explode(",", $price->locations);
											$locations_arr  = array_merge($locations_arr,$locations);
										}
								}
						}
						if(isset($_GET["bessem"])){
							echo "<br> test begin : ";var_dump($promotions);
							echo "<br> test begin : ";var_dump($in_promo_prices);
						}
						$price_return       		 = price_from_to($prices,$in_promo_prices);
						$price_return->locations 	 = array_unique($locations_arr);
						$price_return->discount  	 = $promotions->discount;
						$price_return->promo_begin   = $promotions->date_begin;
						$price_return->promo_end 	 = $promotions->date_end;


				}
				//sinon on prend les prix et on retourne le plus bas prix/le plus haut prix
				else
				{

						$price_return        	  = price_from_to($prices,$in_promo_prices);
						$price_return->locations  = array();
						if(!empty($promotions)){
							$price_return->discount  	 = $promotions->discount;
							$price_return->promo_begin   = $promotions->date_begin;
							$price_return->promo_end 	 = $promotions->date_end;
						}else{
							$price_return->discount   = 0;
						}
				}

			}
			// si le client a mis des dates
			else
			{

				$price_arr      		= array();
				$price_keys     		= array();
				$locations_arr  		= array();
				$prices_valid				= array();
				$promo_valid				= array();

				//si les prix dans la base de donnes sont 0 on ne fait pas de traitement et en renvoie 0
				if(empty($prices)){
					//aucun prix trouvé pour ce bateau exp 4863;( il est attribué a un provider mais son prix est 0 donc reélement il n'a pa de prix)
					$price_return       				= price_from_to($prices,$price_arr);
					$price_return->locations			= "";
					$price_return->discount  			= 0;
					if(!empty($promotions)){
							$price_return->promo_begin	= $promotions[0]->date_begin;
							$price_return->promo_end 	= end($promotions)->date_end;
					}
					return $price_return;exit;
				}

				$date_begin     		= date("Y-m-d", strtotime($date_begin));
				$date_end       		= date("Y-m-d", strtotime($date_end));
				$count_days_client		= count_day($date_begin, $date_end);
				$client_begin_year		= date('Y', strtotime($date_begin));
				$client_end_year		= date('Y', strtotime($date_end));

				if(isset($_GET["bessem"])){echo "<br><b>dates clients :".$count_days_client." == > ".$date_begin." ".$date_end."</b>";}

				$compteur = 0;
				if(isset($_GET["bessem"])){
					echo "<br> prices before : ";var_dump($prices);
				}
				$current_year	 	 = date('Y', time());
				$price_period_unique = array();
				//Récréer le tableau des prix avec le patch de passage d'une année a l'autre

				foreach($prices as $key=>$price) {

					if(date("m-d", strtotime($price->date_begin)) > date("m-d", strtotime($price->date_end))){


						$date_period_price_u = date($client_begin_year."-m-d", strtotime($price->date_begin))."-".date(($client_begin_year+1)."-m-d", strtotime($price->date_end));
						if (!in_array($date_period_price_u, $price_period_unique)) {

							$prices_valid[$compteur]->date 			= $price->date;
							if(date("Y", strtotime($date_end)) == date("Y", strtotime($date_begin))){

								if(date("Y", strtotime($date_begin)) >= date("Y", strtotime($price->date_begin))){
									$prices_valid[$compteur]->date_begin 	= date($client_begin_year."-m-d", strtotime($price->date_begin));
									$prices_valid[$compteur]->date_end 		= date(($client_begin_year+1)."-m-d", strtotime($price->date_end));
								}else{
									$prices_valid[$compteur]->date_begin 	= date(($client_begin_year-1)."-m-d", strtotime($price->date_begin));
									$prices_valid[$compteur]->date_end 		= date($client_begin_year."-m-d", strtotime($price->date_end));
								}
							}else{
								$prices_valid[$compteur]->date_begin 	= date($client_begin_year."-m-d", strtotime($price->date_begin));
								$prices_valid[$compteur]->date_end 		= date(($client_begin_year+1)."-m-d", strtotime($price->date_end));
							}
							$prices_valid[$compteur]->price 		= $price->price;
							$prices_valid[$compteur]->currency 		= $price->currency;
							$prices_valid[$compteur]->locations 	= $price->locations;
							$compteur++;
							array_push($price_period_unique,$date_period_price_u);
						}
						if(date("m-d", strtotime($date_begin)) <= date("m-d", strtotime($date_end))){

							$date_period_price_u = date($current_year."-m-d", strtotime($price->date_begin))."-".date(($current_year+1)."-m-d", strtotime($price->date_end));
							if (!in_array($date_period_price_u, $price_period_unique)) {
								$prices_valid[$compteur]->date 			= $price->date;
								$prices_valid[$compteur]->date_begin 	= date($current_year."-m-d", strtotime($price->date_begin));
								$prices_valid[$compteur]->date_end 		= date(($current_year+1)."-m-d", strtotime($price->date_end));
								$prices_valid[$compteur]->currency 		= $price->currency;
								$prices_valid[$compteur]->price 		= $price->price;
								$prices_valid[$compteur]->locations 	= $price->locations;
								$compteur++;
								array_push($price_period_unique,$date_period_price_u);

							}
						}
					}else{
						$date_period_price_u = date($client_begin_year."-m-d", strtotime($price->date_begin))."-".date($client_begin_year."-m-d", strtotime($price->date_end));

						if (!in_array($date_period_price_u, $price_period_unique)) {

							//si les periode de la BD sont dans la meme années (pas de passage d'une année a l'autre
							$prices_valid[$compteur]->date 			= $price->date;
							$prices_valid[$compteur]->date_begin 	= date($client_begin_year."-m-d", strtotime($price->date_begin));
							$prices_valid[$compteur]->date_end 		= date($client_begin_year."-m-d", strtotime($price->date_end));
							$prices_valid[$compteur]->price 		= $price->price;
							$prices_valid[$compteur]->currency 		= $price->currency;
							$prices_valid[$compteur]->locations 	= $price->locations;
							$compteur++;
							array_push($price_period_unique,$date_period_price_u);
						}
						//si les periode de la BD sont dans la meme anné et il ya a un passge d'anné depuis les date du client
						if(date("m-d", strtotime($date_begin)) > date("m-d", strtotime($date_end))){

							$date_period_price_u = date($client_end_year."-m-d", strtotime($price->date_begin))."-".date($client_end_year."-m-d", strtotime($price->date_end));
							if (!in_array($date_period_price_u, $price_period_unique)) {

								$prices_valid[$compteur]->date 				= $price->date;
								$prices_valid[$compteur]->date_begin 	= date($client_end_year."-m-d", strtotime($price->date_begin));
								$prices_valid[$compteur]->date_end 		= date($client_end_year."-m-d", strtotime($price->date_end));
								$prices_valid[$compteur]->price 		= $price->price;
								$prices_valid[$compteur]->currency 		= $price->currency;
								$prices_valid[$compteur]->locations 	= $price->locations;
								$compteur++;
								array_push($price_period_unique,$date_period_price_u);
							}
						}
					}
				}
				if(isset($_GET["bessem"])){
					echo "<br> Bessem ";var_dump($price_period_unique);
				}
				if(isset($_GET["bessem"])){
					echo "<br> prices_valid after : ";var_dump($prices_valid);
				}
				if(!empty($promotions)) {
					$compteur = 0;
					$promo_period_unique = array();
					foreach($promotions as $key=>$promo) {

						if(date("m-d", strtotime($promo->date_begin)) > date("m-d", strtotime($promo->date_end))){

							$date_promo_u = date($client_begin_year."-m-d", strtotime($promo->date_begin))."-".date(($client_begin_year+1)."-m-d", strtotime($promo->date_end));
							if (!in_array($date_promo_u, $promo_period_unique)) {

								$promo_valid[$compteur]->date_begin 	= date($client_begin_year."-m-d", strtotime($promo->date_begin));
								$promo_valid[$compteur]->date_end 		= date(($client_begin_year+1)."-m-d", strtotime($promo->date_end));
								$promo_valid[$compteur]->discount 		= $promo->discount;
								$compteur++;
								array_push($promo_period_unique,$date_promo_u);
							}

							if(date("m-d", strtotime($date_begin)) <= date("m-d", strtotime($date_end))){

								$date_promo_u = date($current_year."-m-d", strtotime($promo->date_begin))."-".date(($current_year+1)."-m-d", strtotime($promo->date_end));
								if (!in_array($date_promo_u, $promo_period_unique)) {

									$promo_valid[$compteur]->date_begin 	= date($current_year."-m-d", strtotime($promo->date_begin));
									$promo_valid[$compteur]->date_end 		= date(($current_year+1)."-m-d", strtotime($promo->date_end));
									$promo_valid[$compteur]->discount 		= $promo->discount;
									$compteur++;
									array_push($promo_period_unique,$date_promo_u);
								}
							}

						}else{

							$date_promo_u = date($client_begin_year."-m-d", strtotime($promo->date_begin))."-".date($client_begin_year."-m-d", strtotime($promo->date_end));
							if (!in_array($date_promo_u, $promo_period_unique)) {

								$promo_valid[$compteur]->date_begin 	= date($client_begin_year."-m-d", strtotime($promo->date_begin));
								$promo_valid[$compteur]->date_end 		= date($client_begin_year."-m-d", strtotime($promo->date_end));
								$promo_valid[$compteur]->discount 		= $promo->discount;
								$compteur++;
								array_push($promo_period_unique,$date_promo_u);
							}

							//si les periode de la BD sont dans la meme anné et il ya a un passge d'anné depuis les date du client
							if(date("m-d", strtotime($date_begin)) > date("m-d", strtotime($date_end))){

								$date_promo_u = date($client_end_year."-m-d", strtotime($promo->date_begin))."-".date($client_end_year."-m-d", strtotime($promo->date_end));
								if (!in_array($date_promo_u, $promo_period_unique)) {

									$promo_valid[$compteur]->date_begin 	= date($client_end_year."-m-d", strtotime($promo->date_begin));
									$promo_valid[$compteur]->date_end 		= date($client_end_year."-m-d", strtotime($promo->date_end));
									$promo_valid[$compteur]->discount 		= $promo->discount;
									$compteur++;
									array_push($promo_period_unique,$date_promo_u);
								}
							}
						}
					}
				}

				// on arrange les prix par date decroissante
				usort($prices_valid, "array_sort_by_date");

				if(isset($_GET["bessem"])){
					echo "<br> promo_valid after : ";var_dump($promo_valid);
				}
				if(isset($_GET["bessem"])){
					echo "<br> prices_valid befor for : ";var_dump($prices_valid);
				}
				$count_days_periods = 0;
				$prices_valid_final = array();
				$default_currency 	= $prices_valid[0]->currency;
				foreach($prices_valid as $key=>$price) {

					if($default_currency == $price->currency){

						if($price->date_begin <= $date_end && $price->date_end >= $date_end){
							 array_push($price_keys,$key);
							 array_push($prices_valid_final, $price);
							 //on va compter le nombre total des jours de tt les periode de prix recupere depuis la base de donnée
							 //pour savoir si tt les periode sont successives
							 $count_days_periods = $count_days_periods + count_day($price->date_begin, $price->date_end);
							 //unset($prices_valid[$key]);
							 //if(isset($_GET["bessem"])){echo "<br><b>count_days_periods :".$count_days_periods." == > ".$price->date_begin." ".$price->date_end."</b>";}
							 $locations = array();

							 if($price->locations != ""){
								$locations    	= explode(",", $price->locations);
								$locations_arr  = array_merge($locations_arr,$locations);
							 }
						}
					}
				}

				if(isset($_GET["bessem"])){
					echo "<br> price_keys after : ";var_dump($price_keys);
					echo "<br> prices_valid_final after : ";var_dump($prices_valid_final);
				}

				if(!empty($price_keys)){

						//on verifie si les periode sont successives
						$count_days_all_periods = count_day($prices_valid[$price_keys[0]]->date_begin, $prices_valid[end($price_keys)]->date_end);

						if(isset($_GET["bessem"])){echo "<br><b>test count_days_periods : ".$count_days_periods."</b>";}
						if(isset($_GET["bessem"])){echo "<br><b>test count_days_all_periods : ".$count_days_all_periods."</b>";}


						if(abs($count_days_periods) == abs($count_days_all_periods)){

								//echo "<b>Les periode successif</b>";
								$final_discount		 					= array();
								$discount_provider					= 0;
								if(!empty($discounts)){
									foreach($discounts as $discount){
										if(($discount->week * 7) <=  abs($count_days_client) ) {
											$discount_provider = $discount->discount;
										}
									}
								}
								/*
								if($discount_provider != 0){
									array_push($final_discount,$discount_provider);
								}
								*/
								$final_price_period 			= 0;
								$final_price_promo 				= 0;
								$count_total_days 				= 0;

								foreach($prices_valid_final as $key=>$price) {

										$price->date_range 	= date_range($price->date_begin, $price->date_end , $date_begin, $date_end);

										$count_total_days		+=  $price->date_range->days;

										if(!empty($promo_valid)) {

												foreach($promo_valid as $promo){

													if($price->date_range->begin <= $promo->date_end && $price->date_range->end >= $promo->date_begin){
														// on va comparer les periodes de prix avec les periodes de promos pour determiner combien de jours seron en promo sur une portion de prix
														$date_range_promo	= date_range($promo->date_begin, $promo->date_end, $price->date_begin, $price->date_end);
														// sur la periode en promo croisé avec les periode prix on va croisé avec les dates client pour determiné exactement combien de jours sont en promo sur la periode demandé pâr le client
														$date_range_promo_cross_date_client = date_range($date_range_promo->begin, $date_range_promo->end , $price->date_range->begin, $price->date_range->end);
														$final_price_promo 				+= ((($price->price*(100-$promo->discount))/100)/7) * $date_range_promo_cross_date_client->days;
														$price->date_range->days 		= $price->date_range->days - $date_range_promo_cross_date_client->days;
														if($promo->discount != 0){
																array_push($final_discount,$promo->discount);
														}
													}
												}
										}

										$final_price_period += ($price->price/7) * $price->date_range->days;
								}
								$final_price						= $final_price_period + $final_price_promo;
								$final_price 						= ((100-$discount_provider)/100) * $final_price;
								if(isset($_GET["bessem"])){echo "<br>";var_dump($final_price);}
								if(isset($_GET["bessem"])){echo "<br> locations";var_dump($locations_arr);}
								if(isset($_GET["bessem"])){ echo "<br><b>".$count_total_days ." = ".$count_days_client."</b>";}


								if(abs($count_total_days) == abs($count_days_client)){

										//si les jour du sejour sont tous inclus dans les periode
										$price_return       				= price_from_to($prices_valid, array(($final_price)));
										$price_return->locations  			= array_unique($locations_arr);
										$price_return->last_currency  		= $prices_valid_final[0]->currency;
										if(!empty($final_discount)){
											$price_return->discount  		= round(array_sum($final_discount)/count($final_discount));
										}else{
											$price_return->discount  		= 0;
										}

								}else{

									$price_return       		= price_from_to(array(), array());
									$price_return->locations  	= "";
									$price_return->discount  	= 0;


								}
								if(isset($_GET["bessem"])){ echo "<br><b> price_return = </b>".var_dump($price_return);}
								if(isset($_GET["bessem"])){ echo "<br><b> Last final price= </b>".var_dump($final_price);}
								if(!empty($promo_valid)){

									$price_return->promo_begin	= $promo_valid[0]->date_begin;
									$price_return->promo_end 	= end($promo_valid)->date_end;
								}

						}
						//si les periode ne sont pas successive on renvoie 0 ce qui veut dire on ne peut pas calculé le prix total (on affiche contact us)
						else
						{
							// si on a des dates depuis le filtre
							$price_return       			= price_from_to(array(), array());
							$price_return->locations  		= "";
							$price_return->discount  		= 0;
 							if(!empty($promo_valid)){
								$price_return->promo_begin	= $promo_valid[0]->date_begin;
								$price_return->promo_end 	= end($promo_valid)->date_end;
							}
						}

				}



		 }

		 if(isset($_GET["bessem"])){ var_dump($price_return);}
		 if(isset($_GET["bessem"])){exit;}

		 return $price_return;
 	}


	function price_between_period($prices, $date_begin = NULL, $date_end = NULL, $promotions = NULL){


		if(empty($date_begin) && empty($date_end)) {

			$in_promo_prices      = array();
			$locations_arr        = array();

			// si on n'a pas des dates client mais on as des promos
			if(!empty($promotions)) {

					$promotion_date_begin 			= date("m-d", strtotime($promotions->date_begin));
					$promotio_date_end   			= date("m-d", strtotime($promotions->date_end));
					$today 							= date('m-d', time());
					$current_year	 				= date('Y', time());

					// on parcours tous les periodes de prix possible d'un bateau, en croisant avec les periodes des promos
					foreach($prices as $key=>$price) {
						//($price->date_begin <= $promotions->date_begin && $price->date_end >= $promotions->date_end) ||
						if((date("m-d", strtotime($price->date_begin)) <= $promotio_date_end && date("m-d", strtotime($price->date_end)) >= $promotion_date_begin)
								// si on as une date de debut plus grande (en jours/mois) que la date de fin, ca veut dire qu'il y'as un passage d'une année a l'autre
								// donc on reformate les dates en rajoutant l'année courante sur la date de debut, et l'année courante + 1 sur la date de fin
								|| (date("m-d", strtotime($price->date_begin)) > date("m-d", strtotime($price->date_end))
										&& date($current_year."-m-d", strtotime($price->date_begin)) <= date($current_year."-m-d", strtotime($promotions->date_end))
										&& date(($current_year+1)."-m-d", strtotime($price->date_end)) >= date($current_year."-m-d", strtotime($promotions->date_begin)))
								|| ($promotion_date_begin > $promotio_date_end
										&& date($current_year."-m-d", strtotime($price->date_begin)) <= date(($current_year+1)."-m-d", strtotime($promotions->date_end))
										&& date($current_year."-m-d", strtotime($price->date_end)) >= date($current_year."-m-d", strtotime($promotions->date_begin)))

								|| ($promotion_date_begin > $promotio_date_end && date("m-d", strtotime($price->date_begin)) > date("m-d", strtotime($price->date_end))
										&& date($current_year."-m-d", strtotime($price->date_begin)) <= date(($current_year+1)."-m-d", strtotime($promotions->date_end))
										&& date(($current_year+1)."-m-d", strtotime($price->date_end)) >= date($current_year."-m-d", strtotime($promotions->date_begin)))){
								//on construit un tableau avec les prix recalculé en tenant compte des promos
								array_push($in_promo_prices,round(($price->price*(100-$promotions->discount))/100));
								$locations = array();
								if($price->locations != ""){
									$locations    	= explode(",", $price->locations);
									$locations_arr  = array_merge($locations_arr,$locations);
								}
						}
					}

					$price_return       		 = price_from_to($prices,$in_promo_prices);
					$price_return->locations 	 = array_unique($locations_arr);
					$price_return->discount  	 = $promotions->discount;
					$price_return->promo_begin   = $promotions->date_begin;
					$price_return->promo_end 	 = $promotions->date_end;

			}
			//sinon on prend les prix et on retourne le plus bas prix/le plus haut prix
			else
			{

					$price_return        	  = price_from_to($prices,$in_promo_prices);
					$price_return->locations  = array();
					$price_return->discount   = 0;
			}

		}


		return $price_return;
		/*
		$price_arr   = array();
		$locations_arr  = array();
		if(!empty($date_begin) && !empty($date_end)){

		$date_begin = date("m-d", strtotime($date_begin));
		$date_end = date("m-d", strtotime($date_end));

			foreach($prices as $price) {

				if(date("m-d", strtotime($price->date_begin)) <= $date_end && date("m-d", strtotime($price->date_end)) >= $date_begin){
				array_push($price_arr,$price->price);
				$locations  = array();
				if($price->locations != ""){
						$locations   = explode(",", $price->locations);
						$locations_arr  = array_merge($locations_arr,$locations);
					}
				}
			}
		}

		if(count($price_arr) == 1){
			$price->price_to   = $price->price_from = end($price_arr);
		}elseif(count($price_arr) > 1){
			$price->price_from  =  current($price_arr);
			$price->price_to  =  end($price_arr);
		}else{
			if(!empty($prices)){
				$price->price_from   =  current($prices)->price;
				$price->price_to  =  end($prices)->price;
			}else{
				$price->price_from   = 0;
				$price->price_to  = 0;
			}
		}

		$price->locations = array_unique($locations_arr);
		return $price;
		*/
	}



	function location_between_period_search($prices, $date_begin = NULL, $date_end = NULL,$promotions = NULL ,$discounts = NULL){

			if(isset($_GET['slide_test'])){echo "<pre>";}
			if(isset($_GET['slide_test'])){var_dump($prices);}
			// On teste si on n'a pas des dates
			$price_return = new stdClass();
			$locations_arr  =  array();
			if(empty($date_begin) && empty($date_end)) {

				$in_promo_prices      = array();

				// si on n'a pas des dates client mais on as des promos
				//Le boat_id_generic pour la recupération de tout les prix pour les bateau similaire meme si il y'a une spécial offre
				if(!empty($promotions) && empty($_GET['boat_id_generic'])) {

						$promotion_date_begin 			= date("m-d", strtotime($promotions->date_begin));
						$promotio_date_end   			= date("m-d", strtotime($promotions->date_end));
						$promotion_year_begin 			= date("Y", strtotime($promotions->date_begin));
						$promotio_year_end   			= date("Y", strtotime($promotions->date_end));
						$today 							= date('m-d', time());
						$current_year	 				= date('Y', time());

						// on parcours tous les periodes de prix possible d'un bateau, en croisant avec les periodes des promos
						foreach($prices as $key=>$price) {

							if(isset($_GET['slide_test'])){
								echo "<br> price begin : ".$price->date_begin." price begin : ".$price->date_end;
							}
							//($price->date_begin <= $promotions->date_begin && $price->date_end >= $promotions->date_end) ||
							if( (date("m-d", strtotime($price->date_begin)) <= $promotio_date_end && date("m-d", strtotime($price->date_end)) >= $promotion_date_begin)
										// si on as une date de debut plus grande (en jours/mois) que la date de fin, ca veut dire qu'il y'as un passage d'une année a l'autre
										// donc on reformate les dates en rajoutant l'année courante sur la date de debut, et l'année courante + 1 sur la date de fin

										|| (date("m-d", strtotime($price->date_begin)) > date("m-d", strtotime($price->date_end))
												&& date($current_year."-m-d", strtotime($price->date_begin)) <= date($current_year."-m-d", strtotime($promotions->date_end))
												&& date(($current_year+1)."-m-d", strtotime($price->date_end)) >= date($current_year."-m-d", strtotime($promotions->date_begin)))

										|| ($promotion_date_begin > $promotio_date_end
												&& date($current_year."-m-d", strtotime($price->date_begin)) <= date(($current_year+1)."-m-d", strtotime($promotions->date_end))
												&& date($current_year."-m-d", strtotime($price->date_end)) >= date($current_year."-m-d", strtotime($promotions->date_begin)))

										|| (date("m-d", strtotime($price->date_begin)) > date("m-d", strtotime($price->date_end))
												&& date($current_year."-m-d", strtotime($price->date_begin)) <= date(($current_year+1)."-m-d", strtotime($promotions->date_end))
												&& date(($current_year)."-m-d", strtotime($price->date_end)) >= date($current_year."-m-d", strtotime($promotions->date_begin)))

										|| (date("m-d", strtotime($price->date_begin)) > date("m-d", strtotime($price->date_end)) && $promotion_date_begin > $promotio_date_end
												&& date($current_year."-m-d", strtotime($price->date_begin)) <= date(($current_year+1)."-m-d", strtotime($promotions->date_end))
												&& date(($current_year+1)."-m-d", strtotime($price->date_end)) >= date($current_year."-m-d", strtotime($promotions->date_begin)))

										|| (date("m-d", strtotime($price->date_begin)) < date("m-d", strtotime($price->date_end)) && $promotio_year_end > $promotion_year_begin
												&& date($current_year."-m-d", strtotime($price->date_begin)) <= date(($current_year)."-m-d", strtotime($promotions->date_end))
												&& date(($current_year+1)."-m-d", strtotime($price->date_end)) >= date($current_year."-m-d", strtotime($promotions->date_begin)))

										){
										//on construit un tableau avec les prix recalculé en tenant compte des promos
										array_push($in_promo_prices,round(($price->price*(100-$promotions->discount))/100));
										$locations = array();
										if($price->locations != ""){
											$locations    	= explode(",", $price->locations);
											$locations_arr  = array_merge($locations_arr,$locations);
										}
								}
						}
						if(isset($_GET['slide_test'])){
							echo "<br> test begin : ";var_dump($promotions);
							echo "<br> test begin : ";var_dump($promotions);
							echo "<br> in_promo_prices : ";var_dump($in_promo_prices);
						}
						$price_return->locations 	 = array_unique($locations_arr);
						$price_return->discount  	 = $promotions->discount;
						$price_return->promo_begin   = $promotions->date_begin;
						$price_return->promo_end 	 = $promotions->date_end;


				}
				//sinon on prend les prix et on retourne le plus bas prix/le plus haut prix
				else
				{
						$price_return->locations  = array();
						if(!empty($promotions)){
							$price_return->discount  	 = $promotions->discount;
							$price_return->promo_begin   = $promotions->date_begin;
							$price_return->promo_end 	 = $promotions->date_end;
						}else{
							$price_return->discount   = 0;
						}
				}

			}
			// si le client a mis des dates
			else
			{

				$price_arr      		= array();
				$price_keys     		= array();
				$locations_arr  		= array();
				$prices_valid			= array();
				$promo_valid			= array();

				//si les prix dans la base de donnes sont 0 on ne fait pas de traitement et en renvoie 0
				if(empty($prices)){
					//aucun prix trouvé pour ce bateau exp 4863;( il est attribué a un provider mais son prix est 0 donc reélement il n'a pa de prix)
					$price_return->locations			= "";
					$price_return->discount  			= 0;
					if(!empty($promotions)){
							$price_return->promo_begin	= $promotions[0]->date_begin;
							$price_return->promo_end 	= end($promotions)->date_end;
					}
					return $price_return;exit;
				}

				$date_begin     		= date("Y-m-d", strtotime($date_begin));
				$date_end       		= date("Y-m-d", strtotime($date_end));
				$count_days_client		= count_day($date_begin, $date_end);
				$client_begin_year		= date('Y', strtotime($date_begin));
				$client_end_year		= date('Y', strtotime($date_end));

				if(isset($_GET['slide_test'])){echo "<br><b>dates clients :".$count_days_client." == > ".$date_begin." ".$date_end."</b>";}

				$compteur = 0;
				if(isset($_GET['slide_test'])){
					echo "<br> prices before : ";var_dump($prices);
				}
				$current_year	 				= date('Y', time());
				$price_period_unique = array();
				//Récréer le tableau des prix avec le patch de passage d'une année a l'autre
				foreach($prices as $key=>$price) {

						if(date("m-d", strtotime($price->date_begin)) > date("m-d", strtotime($price->date_end))){

								$date_period_price_u = date($client_begin_year."-m-d", strtotime($price->date_begin))."-".date(($client_begin_year+1)."-m-d", strtotime($price->date_end));
								if (!in_array($date_period_price_u, $price_period_unique)) {

									$prices_valid[$compteur]->date 			= $price->date;
									if(isset($_GET['slide_test'])){
										echo "<br> Lenna bessem : ".date("Y", strtotime($date_end))." - ".date("Y", strtotime($date_begin));
									}
									if(date("Y", strtotime($date_end)) == date("Y", strtotime($date_begin))){
										$prices_valid[$compteur]->date_begin 	= date(($client_begin_year-1)."-m-d", strtotime($price->date_begin));
										$prices_valid[$compteur]->date_end 		= date($client_begin_year."-m-d", strtotime($price->date_end));
									}else{
										$prices_valid[$compteur]->date_begin 	= date($client_begin_year."-m-d", strtotime($price->date_begin));
										$prices_valid[$compteur]->date_end 		= date(($client_begin_year+1)."-m-d", strtotime($price->date_end));

									}
									$prices_valid[$compteur]->price 		= $price->price;
									$prices_valid[$compteur]->locations 	= $price->locations;
									$compteur++;
									array_push($price_period_unique,$date_period_price_u);
								}
								if(date("m-d", strtotime($date_begin)) <= date("m-d", strtotime($date_end))){

									$date_period_price_u = date($current_year."-m-d", strtotime($price->date_begin))."-".date(($current_year+1)."-m-d", strtotime($price->date_end));
									if (!in_array($date_period_price_u, $price_period_unique)) {
										$prices_valid[$compteur]->date 			= $price->date;
										$prices_valid[$compteur]->date_begin 	= date($current_year."-m-d", strtotime($price->date_begin));
										$prices_valid[$compteur]->date_end 		= date(($current_year+1)."-m-d", strtotime($price->date_end));
										$prices_valid[$compteur]->price 		= $price->price;
										$prices_valid[$compteur]->locations 	= $price->locations;
										$compteur++;
										array_push($price_period_unique,$date_period_price_u);

									}
								}

						}else{


								$date_period_price_u = date($client_begin_year."-m-d", strtotime($price->date_begin))."-".date($client_begin_year."-m-d", strtotime($price->date_end));

								if (!in_array($date_period_price_u, $price_period_unique)) {

									//si les periode de la BD sont dans la meme années (pas de passage d'une année a l'autre
									$prices_valid[$compteur]->date 			= $price->date;
									$prices_valid[$compteur]->date_begin 	= date($client_begin_year."-m-d", strtotime($price->date_begin));
									$prices_valid[$compteur]->date_end 		= date($client_begin_year."-m-d", strtotime($price->date_end));
									$prices_valid[$compteur]->price 		= $price->price;
									$prices_valid[$compteur]->locations 	= $price->locations;
									$compteur++;
									array_push($price_period_unique,$date_period_price_u);
								}
								//si les periode de la BD sont dans la meme anné et il ya a un passge d'anné depuis les date du client
								if(date("m-d", strtotime($date_begin)) > date("m-d", strtotime($date_end))){

									$date_period_price_u = date($client_end_year."-m-d", strtotime($price->date_begin))."-".date($client_end_year."-m-d", strtotime($price->date_end));
									if (!in_array($date_period_price_u, $price_period_unique)) {

										$prices_valid[$compteur]->date 				= $price->date;
										$prices_valid[$compteur]->date_begin 	= date($client_end_year."-m-d", strtotime($price->date_begin));
										$prices_valid[$compteur]->date_end 		= date($client_end_year."-m-d", strtotime($price->date_end));
										$prices_valid[$compteur]->price 		= $price->price;
										$prices_valid[$compteur]->locations 	= $price->locations;
										$compteur++;
										array_push($price_period_unique,$date_period_price_u);
									}
								}
						}
				}
				if(isset($_GET['slide_test'])){
					echo "<br> Bessem ";var_dump($price_period_unique);
				}
				if(isset($_GET['slide_test'])){
					echo "<br> prices_valid after : ";var_dump($prices_valid);
				}
				if(!empty($promotions)) {
					$compteur = 0;
					$promo_period_unique = array();
					foreach($promotions as $key=>$promo) {

								if(date("m-d", strtotime($promo->date_begin)) > date("m-d", strtotime($promo->date_end))){


										$date_promo_u = date($client_begin_year."-m-d", strtotime($promo->date_begin))."-".date(($client_begin_year+1)."-m-d", strtotime($promo->date_end));
										if (!in_array($date_promo_u, $promo_period_unique)) {

											$promo_valid[$compteur]->date_begin 	= date($client_begin_year."-m-d", strtotime($promo->date_begin));
											$promo_valid[$compteur]->date_end 		= date(($client_begin_year+1)."-m-d", strtotime($promo->date_end));
											$promo_valid[$compteur]->discount 		= $promo->discount;
											$compteur++;
											array_push($promo_period_unique,$date_promo_u);
										}

										if(date("m-d", strtotime($date_begin)) <= date("m-d", strtotime($date_end))){

											$date_promo_u = date($current_year."-m-d", strtotime($promo->date_begin))."-".date(($current_year+1)."-m-d", strtotime($promo->date_end));
											if (!in_array($date_promo_u, $promo_period_unique)) {

												$promo_valid[$compteur]->date_begin 	= date($current_year."-m-d", strtotime($promo->date_begin));
												$promo_valid[$compteur]->date_end 		= date(($current_year+1)."-m-d", strtotime($promo->date_end));
												$promo_valid[$compteur]->discount 		= $promo->discount;
												$compteur++;
												array_push($promo_period_unique,$date_promo_u);
											}
										}

								}else{

										$date_promo_u = date($client_begin_year."-m-d", strtotime($promo->date_begin))."-".date($client_begin_year."-m-d", strtotime($promo->date_end));
										if (!in_array($date_promo_u, $promo_period_unique)) {

											$promo_valid[$compteur]->date_begin 	= date($client_begin_year."-m-d", strtotime($promo->date_begin));
											$promo_valid[$compteur]->date_end 		= date($client_begin_year."-m-d", strtotime($promo->date_end));
											$promo_valid[$compteur]->discount 		= $promo->discount;
											$compteur++;
											array_push($promo_period_unique,$date_promo_u);
										}

										//si les periode de la BD sont dans la meme anné et il ya a un passge d'anné depuis les date du client
										if(date("m-d", strtotime($date_begin)) > date("m-d", strtotime($date_end))){

											$date_promo_u = date($client_end_year."-m-d", strtotime($promo->date_begin))."-".date($client_end_year."-m-d", strtotime($promo->date_end));
											if (!in_array($date_promo_u, $promo_period_unique)) {

												$promo_valid[$compteur]->date_begin 	= date($client_end_year."-m-d", strtotime($promo->date_begin));
												$promo_valid[$compteur]->date_end 		= date($client_end_year."-m-d", strtotime($promo->date_end));
												$promo_valid[$compteur]->discount 		= $promo->discount;
												$compteur++;
												array_push($promo_period_unique,$date_promo_u);
											}
										}
								}
					}
				}

				// on arrange les prix par date decroissante
				usort($prices_valid, "array_sort_by_date");

				if(isset($_GET['slide_test'])){
					echo "<br> promo_valid after : ";var_dump($promo_valid);
				}
				if(isset($_GET['slide_test'])){
					echo "<br> prices_valid befor for : ";var_dump($prices_valid);
				}
				$count_days_periods = 0;
				$prices_valid_final = array();
				foreach($prices_valid as $key=>$price) {

						if($price->date_begin <= $date_end && $price->date_end >= $date_begin){
							 array_push($price_keys,$key);
							 array_push($prices_valid_final, $price);
							 //on va compter le nombre total des jours de tt les periode de prix recupere depuis la base de donnée
							 //pour savoir si tt les periode sont successives
							 $count_days_periods = $count_days_periods + count_day($price->date_begin, $price->date_end);
							 //unset($prices_valid[$key]);
							 //if(isset($_GET['slide_test'])){echo "<br><b>count_days_periods :".$count_days_periods." == > ".$price->date_begin." ".$price->date_end."</b>";}
							 $locations = array();

							 if($price->locations != ""){
								$locations    	= explode(",", $price->locations);
								$locations_arr  = array_merge($locations_arr,$locations);
							 }

						 }
				}

				if(isset($_GET['slide_test'])){
					echo "<br> price_keys after : ";var_dump($price_keys);
					echo "<br> prices_valid_final after : ";var_dump($prices_valid_final);
				}

				if(!empty($price_keys)){

						//on verifie si les periode sont successives
						$count_days_all_periods = count_day($prices_valid[$price_keys[0]]->date_begin, $prices_valid[end($price_keys)]->date_end);

						if(isset($_GET['slide_test'])){echo "<br><b>test count_days_periods : ".$count_days_periods."</b>";}
						if(isset($_GET['slide_test'])){echo "<br><b>test count_days_all_periods : ".$count_days_all_periods."</b>";}


						if(abs($count_days_periods) == abs($count_days_all_periods)){

								//echo "<b>Les periode successif</b>";
								$final_discount		 					= array();
								$discount_provider					= 0;
								if(!empty($discounts)){
									foreach($discounts as $discount){
										if(($discount->week * 7) <=  abs($count_days_client) ) {
											$discount_provider = $discount->discount;
										}
									}
								}
								/*
								if($discount_provider != 0){
									array_push($final_discount,$discount_provider);
								}
								*/
								$final_price_period 			= 0;
								$final_price_promo 				= 0;
								$count_total_days 				= 0;

								foreach($prices_valid_final as $key=>$price) {

										$price->date_range 	= date_range($price->date_begin, $price->date_end , $date_begin, $date_end);

										$count_total_days		+=  $price->date_range->days;

										if(!empty($promo_valid)) {

												foreach($promo_valid as $promo){

													if($price->date_range->begin <= $promo->date_end && $price->date_range->end >= $promo->date_begin){
														// on va comparer les periodes de prix avec les periodes de promos pour determiner combien de jours seron en promo sur une portion de prix
														$date_range_promo	= date_range($promo->date_begin, $promo->date_end, $price->date_begin, $price->date_end);
														// sur la periode en promo croisé avec les periode prix on va croisé avec les dates client pour determiné exactement combien de jours sont en promo sur la periode demandé pâr le client
														$date_range_promo_cross_date_client = date_range($date_range_promo->begin, $date_range_promo->end , $price->date_range->begin, $price->date_range->end);
														$final_price_promo 				+= ((($price->price*(100-$promo->discount))/100)/7) * $date_range_promo_cross_date_client->days;
														$price->date_range->days 	= $price->date_range->days - $date_range_promo_cross_date_client->days;
														if($promo->discount != 0){
																array_push($final_discount,$promo->discount);
														}
													}
												}
										}

										$final_price_period += ($price->price/7) * $price->date_range->days;
								}

								if(abs($count_total_days) == abs($count_days_client)){

										//si les jour du sejour sont tous inclus dans les periode
										$price_return->locations  			= array_unique($locations_arr);
										if(!empty($final_discount)){
											$price_return->discount  		= round(array_sum($final_discount)/count($final_discount));
										}else{
											$price_return->discount  		= 0;
										}

								}else{

									$price_return->locations  	= "";
									$price_return->discount  	= 0;

								}
								if(!empty($promo_valid)){

									$price_return->promo_begin	= $promo_valid[0]->date_begin;
									$price_return->promo_end 	= end($promo_valid)->date_end;
								}



						}
						//si les periode ne sont pas successive on renvoie 0 ce qui veut dire on ne peut pas calculé le prix total (on affiche contact us)
						else
						{

							// si on a des dates depuis le filtre
							$price_return->locations  		= "";
							$price_return->discount  		= 0;
 							if(!empty($promo_valid)){
								$price_return->promo_begin	= $promo_valid[0]->date_begin;
								$price_return->promo_end 	= end($promo_valid)->date_end;
							}
						}

				}



		 }
		 if(isset($_GET['slide_test'])){exit;}

		 return $price_return;
 	}

	function link_boat($lang ,$boat_id = NULL ,$boat_shipyard = NULL ,$boat_brand = NULL ,$boat_model = NULL ,$type = NULL ,$name = NULL, $visible = NULL)
	{
		switch ($lang) {
			case "en":
				$language  		= "english";
				$crewed     	= "crewed";
				$bareboat   	= "bareboat";
				$luxury     	= "luxury";
				$yacht_charter	= "yacht-charter";
			break;
			case "fr":
				$language  		= "french";
				$crewed     	= "avec-equipage";
				$bareboat   	= "sans-equipage";
				$luxury     	= "luxe";
				$yacht_charter	= "location-bateau";
			break;
			case "ru":
				$language  		= "russian";
				$crewed     	= "crewed";
				$bareboat   	= "bareboat";
				$luxury     	= "luxury";
				$yacht_charter	= "yacht-charter";
			break;
			case "pt":
				$language   	= "portuguese";
				$crewed     	= "crewed";
				$bareboat   	= "bareboat";
				$luxury     	= "luxury";
				$yacht_charter	= "iate-fretamento";
			break;
			case "es":
				$language  		= "spanish";
				$crewed     	= "con-tripulacion";
				$bareboat   	= "sin-patron";
				$luxury			= "lujo";
				$yacht_charter  = "alquiler-de-yates";

				break;
			case "it":
				$language  		= "italian";
				$crewed     	= "con-equipaggio";
				$bareboat   	= "senza-equipaggio";
				$luxury     	= "lusso";
				$yacht_charter	= "noleggio-di-barche";
				break;
			case "de":
				$language  		= "german";
				$crewed     	= "mit-crew";
				$bareboat   	= "bareboat";
				$luxury     	= "luxus";
				$yacht_charter	= "yacht-charter";
				break;
			case "cn":
				$language  		= "chinese";
				$crewed     	= urlencode("带船员租赁");
				$bareboat   	= urlencode("裸船租赁");
				$luxury     	= urlencode("豪华游艇租赁");
				$yacht_charter	= urlencode("游艇租赁");
			break;
		}

		if($type != NULL){

			switch ($type){
				case "CW":
					$type = '-'.$crewed.'-';
					break;
				case "BB":
					$type = '-'.$bareboat.'-';
					break;
				case "LX":
					$type = '-'.$luxury.'-';
			}

			$boat_name	= "";
			if($visible == 1 && $name != NULL){
				$boat_name	= "-".$name;
			}

			$link   	= $lang.'/'.$yacht_charter.'/'.$boat_shipyard.'/'.$boat_id.$boat_name.$type.$boat_brand.'-'.$boat_model.'.html';
		}else{

			if($boat_id == NULL && $type == NULL && $boat_shipyard == NULL && $boat_brand == NULL && $boat_model == NULL){
				//link all boats
				$link 	= $lang.'/'.$yacht_charter.'/';
			}elseif($type == NULL && $boat_brand == NULL && $boat_model == NULL){
				//link shipyard
				$link 	= $lang.'/'.$yacht_charter.'/'.$boat_shipyard.'/';
			}else{
				//link generic boat
				$link 	= $lang.'/'.$yacht_charter.'/'.$boat_shipyard.'/'.$boat_brand.'-'.$boat_model.'.html';
			}
		}
		return $link;
	}


}
