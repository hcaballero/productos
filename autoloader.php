<?php

	function __autoload($clase){
		include "libs/{$clase}.php";
	}