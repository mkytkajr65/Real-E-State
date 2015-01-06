<?php
class Token
{
	public static function generate()
	{
		//needs to be better secured later (remove md5 and make more secure)
		return Session::put(Config::get('session/token_name'), md5(uniqid()));
	}	

	public static function check($token)
	{
		$tokenName = Config::get('session/token_name');

		if(Session::exists($tokenName) && $token === Session::get($tokenName))
		{
			Session::delete($tokenName);
			return true;
		}
		return false;
	}

	public static function checkwithMultipleForms($token)
	{
		$tokenName = Config::get('session/token_name');

		if(Session::exists($tokenName) && $token === Session::get($tokenName))
		{
			return true;
		}
		return false;
	}
}
?>