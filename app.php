<?php
	$url = "https://newsapi.org/v1/articles?source=the-times-of-india&sortBy=latest&apiKey=41727fcfb9e2401cb0da85e86ed1e3c6";
	$json = file_get_contents($url);
	$data = json_decode($json, TRUE);
	if($data['status']=="ok")
	{
		$data = $data['articles'];
		$title = $data[0]['title'];
		echo $data['url'];
		$title = str_replace('- Times of India', '',$title);
		$desc = $data[0]['description'];
		exec("paplay applause.wav");
		exec("notify-send '".$title."' '".$desc."'");
	}
	else
	{
		echo "Error";
		exec("notify-send 'Error in Connectivity'");
		exec("paplay applause.wav");
	}
?>