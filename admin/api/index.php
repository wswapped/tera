<?php
	include_once '../scripts/functions.php';
	include_once '../../functions/conne.php';
	// header("")
	$page_level = 1;
	//api
	$request = array_merge($_POST, $_GET);

	//action to be done by API
	$action = $request['action'];


	//init the response
	$response = array();

	//product instance
	$Product = getClass('product'); //products class

	if($action  == 'getProducts'){
		//returns products of a shop
		$shop = $request['shop']??"";		

		//getting products
		$products = $Product->get($shop);

		$response = array('data'=>$products, 'meta'=>array('perpage'=>15, 'total'=>count($products), "sort"=>"asc",
        "field"=>"productID"));	
	}else if($action = 'getCategories'){
		$shop = $request['shop']??"";

		//getting categories
		$cats = $Product->categories($shop);
		$response = array('status'=>$cats, 'data'=>$cats);
	}else{
		$response = array('status'=>false, 'msg'=>'Provide correct action');
	}

	echo(json_encode($response));

?>