<?php
class Redirect
{
	public static function to($location = null)
	{
		if($location)
		{
			if(is_numeric($location))
			{
				switch($location)
				{
					case 404:
						header('HTTP/1.0 404 Not Found');
						include 'includes/errors/404.php';
						exit();
					break;
				}
			}
			else if($location==="home")
			{
				header('Location:index.php');
				exit();
			}
			else if($location==="current")
			{
				$actual_link = str_replace("/", '', $_SERVER['REQUEST_URI']);
				header('Location:'.$actual_link);
				exit();
			}
			header('Location:'.$location);
			exit();
		}
	}	
}
?>