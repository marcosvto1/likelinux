<?php
function getPoster($cod){
	 $s = strpos($cod,"</div><img ");
	 $cod = substr($cod, $s);
	 $s = strpos($cod,"src=\"")+5;
	 $f = strpos($cod,"\" class=\"attachment-programacao wp-post-image\"");
	 return substr($cod,$s,$f-$s);

}
function getTitulo($cod){
	$s = strpos($cod,"<div class=\"movie-title\">")+10;
	$cod = substr($cod,$s);
	$s = strpos($cod,"<div class=\"movie-title\">")+10;
	$cod = substr($cod,$s);
	$s = strpos($cod,">")+1;
	$f = strpos($cod,"</div>");
	return substr($cod, $s, $f-$s);
	
	
}

function getGenero($cod){
	$s = strpos($cod, "GÊNERO:</strong> ")+16;
	$cod = substr($cod,$s);
	$s = 2;
	$f = strpos($cod,"<br/>");
	return substr($cod,$s, $f-$s);
}
function getAtor($cod){
	$s = strpos($cod, "COM:</strong> ")+14;
	$cod = substr($cod,$s);
	$s = 0;
	$f = strpos($cod,"<br/>");
	return substr($cod,$s, $f-$s);
}
function getSinopse($cod){
	$s = strpos($cod, "SINOPSE:</strong> ")+18;
	$cod = substr($cod,$s);
	$s = 0;
	$f = strpos($cod,"<br/>");
	return substr($cod,$s, $f-$s);
}
function getClass($cod){
	$s = strpos($cod, "<div class=\"classifica")+5;
	$cod = substr($cod,$s);
	$s = strpos($cod, ">")+1;
	$f = strpos($cod, "</");
	return substr($cod,$s,$f-$s);
}
function getHorario($cod){
	$h = array();
	$j = 0;
	while ($hr = strpos($cod, "div class=\"horario\">")) {
		$cod = substr($cod,$hr);
		$s = strpos($cod, "</div>Catalão S")+6;
		//echo "Valor do $s<br>";
		$cod = substr($cod,$s);
		$s = 0;
		$f = strpos($cod, "</div>");
		$h[$j] = substr($cod,$s,$f);
		$j++;
		$cod = substr($cod,$f+1);
	}
	return $h;
}


function getCinema($id = -1){
	$url = "http://www.cinemaslumiere.com.br/programacao/?cidade=catalao&unidade=unidade-teste2";
	$pag = file_get_contents($url);
	$res = "";
	//$r = preg_match_all('/(\<div class=\"movie\-list\"\>)(.*?)(\<\/div\>\s*\n\s*\<div class=\"pagination\-wrapper\"\>)/',$pag,$res);
	$s = strpos($pag, "<div class=\"movie-list\">");
	$f = strpos($pag, "<div class=\"pagination-wrapper\"");
	$pag = substr($pag,$s,$f-$s-2);

	$cfilme = array();
	$i = 0;
	while(strpos($pag,"</div><!-- .box-pttrn-wrapper -->")){
		$s = strpos($pag, "<div class=\"movie-release\">");
		$f = strpos($pag,"</div><!-- .box-pttrn-wrapper -->");
		$cfilme[$i] = substr($pag, $s, $f-$s);
		$pag = substr($pag, $f+10);
		$i++;
	}
	//echo $cfilme[0];

	$filmes = array();
	for($i=0;$i<count($cfilme);$i++){
		$filmes[$i]["poster"] = getPoster($cfilme[$i]);
		$filmes[$i]['titulo'] = getTitulo($cfilme[$i]);
		$filmes[$i]['genero'] = getGenero($cfilme[$i]);
		$filmes[$i]['ator'] = getAtor($cfilme[$i]);
		$filmes[$i]['sinopse'] = getSinopse($cfilme[$i]);
		$filmes[$i]['classificacao'] = getClass($cfilme[$i]);
		$filmes[$i]['horario'] = getHorario($cfilme[$i]);
	}
	if($id == -1){
		return $filmes;
	}else{
		return $filmes[$id];
	}
}


//$titulos = "";
//preg_match_all('/<div class=\"movie\-title\">(.*?)<\/div>/', $res[1][0], $titulos);
//var_dump($titulos);

//echo $pag;
?>