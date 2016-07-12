<?php 

 class Syutil  
 {

public function getRequest($request){
	/* extract request */ 
		$params = array();
		foreach ($request as $key => $value) {
			if( $key == "_url" ){

			}else{
				 $params[$key]  = $value ; 
			}
		}
		return $params;
}
public function  checkHash($hash){  
	/* check if there is any user with this hash */
	$request = array( "usr_temp_keys" => $hash );
	 $query = $this->writeQueryString( $request, "User" );
	 $obj = eval( $query ); 
	 if( count($obj) ){
	 	return true ; 
	}
	 return false;
	 
}
public function  refreshSecret($salt , $usrid){ 
	 User :: findFirst( $usrid );
}
public function  scrambleSecret($salt){ 
	$time = time();
	$salt = str_replace(" ", "#", $salt ) ;
	return  md5($time. $salt);
}
public function writeQueryString($request , $model_name){
		$qry_string ="return ".$model_name."::query()"; $in = 0;      
		 if(count($request) > 2 ){
			$in = 0 ; 
			 foreach ($request as $key => $value) {
				if( $key != "_url" && $in > 0){   	          
						$qry_string.=  "->andWhere(\"". $key ."= '". $value."'\")" ;	
					}
					if( $key != "_url" && $in == 0){   
						$qry_string.=  "->where(\"". $key ."='". $value." '\")";
						$in++;
					}
			
				 }
			$qry_string.= "->execute();" ;
		} else {
			/* if query request is only 1 plus _url param  */
			foreach ($request as $key => $value) {
				if( $key != "_url"){   
					$qry_string.=  "->where(\"". $key."='". $value."'\")".
					"->execute();" ;
				}
			}
		}
		// echo $qry_string;
	 return $qry_string;
}
 
public function cleanModelName($model_name){
	$model_name= ucfirst($model_name); 
	$mn_arr = explode( "_", $model_name); 
	$clean_name = "";
 	foreach ($mn_arr as $name) {
		$clean_name .=   ucfirst($name);
	}
	return $clean_name;  
}
public function checkPull($model_object , $url_option)
{
 
	if( count($model_object) > 1  ){  
		$rows = array();
			foreach ($model_object as $row ) {     
				array_push($rows, $row); 
			}  
			return json_encode( array( "DB Result  " => $rows)   );
	} 
	if( count($model_object) == 1 ) 
	{	  
		/*  if only 1 record found */
		if ( $model_object  && $url_option == "all") { 				 
		 	 /* this is working object [ 0 ] now its now working stupid  */
			return json_encode( array( "DB Result  " => array( $model_object[0]) )  );
		} 
		else if ( $model_object  && $url_option ==  "ById") {  return json_encode( array( "DB Result  " => array( $model_object ) )  );	}
		else {
			return  json_encode(  array("Response" => "No rows found.") );
		}
	 }
	else if( count($model_object) == 0 ){
		return  json_encode(  array("Response" => "No rows found.") );
	 }
		 
}
 public function siteLogin( $request , $model_name ){
 	
	$query = $this->writeQueryString( $request, $model_name );
	$obj = eval( $query ); 	
	if(count( $obj ) == 1 ){  
		$result  =    $obj[0] ; 
		return  $result ;
	}
	if( count( $obj ) > 1 ){
		$ret = array();
		foreach ($obj as $value) {
			 array_push( $ret , $value);
		}
		$result  =  array( "DB Result" => $ret ); 
		return json_encode( $result );		
	}
	if( count( $obj ) == 0  ){
		return false;
	}	
	 
}
public function checkQuery( $request , $model_name ){
 	
	$query = $this->writeQueryString( $request, $model_name );
	$obj = eval( $query ); 	
	//echo count($obj);
	if(count( $obj ) == 1 ){
		$result  =  array( "DB Result" => $obj[0] ); 
		return json_encode( $result );
	}
	if( count( $obj ) > 1 ){
		$ret = array();
		foreach ($obj as $value) {
			 array_push( $ret , $value);
		}
		$result  =  array( "DB Result" => $ret ); 
		return json_encode( $result );		
	}
	if( count( $obj ) == 0  ){
		return  json_encode(  array("Response" => "No results found.") );
	}	
	 
}
public function  putApiSecurity( $transaction ){
	/*
		1.  Authenticate first 
		2.  Pass request token 
		3.  Verify token every request
	*/


}
public function checkDelete($transaction ){

		if( $transaction == 1 ){
			return  json_encode(  array("Response" => "A row was marked deleted.") );
		}else{
			return  json_encode(  array("Response" => "Error in deleting the record.") );
		}
}
public function checkTransaction($status , $model_object){	 
		if($status == false ){ 
			$errors["Response"] = array();
			 foreach ($model_object->getMessages() as $message) {	 
				array_push($errors["Response"], $message->getMessage());
				}    
				return  json_encode($errors);	
		 }else{
				return  json_encode(  array("Response" => "A row was created.") );
		 }    
		 
}
/*
	// if array search put it in findFirst() or no 


			searching for multiple result 

		$robots = Robots::find(
		array(
						"type = 'virtual'",
						"order" => "name",
						"limit" => 100
				)
			);
			foreach ($robots as $robot) {
				 echo $robot->name, "\n";
			}

*/

			/*
	1. API TODO
		- list pull
		- query -and where  post
		- soft delete


			*/
}

	 ?>