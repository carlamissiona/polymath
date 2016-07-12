<?php
 
use Phalcon\Mvc\Micro;

error_reporting(E_ALL);

define('APP_PATH', realpath('..'));
 
try {

	/**
	 * Read the configuration
	 */
	$config = include __DIR__ . "/../config/config.php";

	/**
	 * Include Services
	 */
	include APP_PATH . '/config/services.php';

	/**
	 * Include Autoloader
	 */
	include APP_PATH . '/config/loader.php';
 

	/**
	 * Starting the application
	 * Assign service locator to the application
	 */
	$app = new Micro($di);
  
	/**
	 * Include Application
	 */
	include APP_PATH . '/app.php';
	 $app['system'] = new Syutil();
	 $app['request'] = new Phalcon\Http\Request();
  
	/**
	* Create restful routes here 
	*
	*/
	 /* ** Site Login ** */
	$app->post('/site/authentication', function () use ($app) {
		/* post usr credential  if success compose  temp keys  store keys at table */
		/* every request to api requires tempkeys + user id */
		 $app['system']->cleanModelName( $model ) ;	
		 $model = "User"; 
		 $user =   $app['system']->siteLogin( $_REQUEST , $model ); 
	 	 
		 if(  $user  != false ){ 
		 	$key = $user->usr_id ." scramble this " . $user->usr_email ."" ;
		 	$key = $app['system']->scrambleSecret( $key ) ;  	
		 	$update = User :: findFirst( $user->usr_id );
		 
		 	 /* storing temp api keys for the user */
		 	 $update->usr_temp_keys = $key ;
		 	 $update->usr_lastlogin =  date('Y-m-d H:i:s') ;
		 	 $update->save();
		 	 echo json_encode(  array("Response" => "Success Login" , "Status" => "Success" , "API_AUTH" => $key ) );
		 	      
		 } else{
		 	echo json_encode(  array("Response" => "Wrong Login Credentials Provided." , "Status" => "Wrong Credentials") );
		 }			
	});

	 /* ** Pull any by id ** */
	$app->get('/pull/{model}/{usrid:[0-9]+}/{hash}', function ( $model, $usrid, $hash ) use ($app) {
		// use this on create edit and delete  
		$model = $app['system']->cleanModelName( $model ) ;	 
		echo $app['system']->checkPull( $model::findFirst($usrid), "ById" ) ;  	
	}); 

	/* ** Pull all from any model  ** */
	$app->get('/pull/{model}/all/{hash}', function ( $model, $hash ) use($app) { 	
	 	$model = $app['system']->cleanModelName( $model ) ;
		echo $app['system']->checkPull( $model::find() , "all" ) ;   
	});

	/* ** Delete any model data by id ** */	
	$app->get('/pop/{model}/{usrid:[0-9]+}/{hash}', function ($model , $usrid , $hash)  use ($app)  {
	 	$model = $app['system']->cleanModelName( $model ) ;
		echo $app['system']->checkDelete( $model::findFirst($usrid)->delete() ); 
	});


	/* ** Query Any ** Accepts Query Paramater ** **  Joined by AND Condition Only ** **  */
	$app->post('/query/{model}', function ($model) use ($app)  {	
		$model = $app['system']->cleanModelName( $model ) ;
		echo $app['system']->checkQuery( $_REQUEST , $model );    
		
	});
	          
	 $app->post('/push/{model}/{hash}', function ($model , $hash) use ($app) {    
	 	$model = $app['system']->cleanModelName( $model ) ;    
	 	if( ! $app['system']->checkHash( $hash ) ) {  echo json_encode(  array("Response" => "Access Denied" , "Status" => "Denied") );  return false ; };  
	  
		$obj = new $model();    
		echo $model ; 
		echo count($obj);
		echo  $app['system']->checkTransaction( $obj->save($_REQUEST) , $obj );       /* DO LATER sanitize */
	  });
	 
	/**
	 * Handle the request
	 */
	$app->handle();

} catch (\Exception $e) {
	  echo $e->getMessage() . '<br>';
	  echo '<pre>' . $e->getTraceAsString() . '</pre>';
}


/*
CRUD
*/