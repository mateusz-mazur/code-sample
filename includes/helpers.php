<?php

	/*
	 * Create slug
	 * */
	function create_slug($string){
		$slug=preg_replace('/[^A-Za-z0-9-]+/', '-', $string);
		$slug = strtolower($slug);
		return $slug;
	}
