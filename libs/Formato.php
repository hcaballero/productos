<?php

Class Formato{
	public static function formato_moneda($numero){
		return '$' . number_format($numero, 2);

	}

	public static function add_quotes($str){
		return sprintf("'%s'",$str);
	}
}