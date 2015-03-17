<?php

/***************************************************************
 * Extension Manager/Repository config file for ext "cabag_loginas".
 *
 * Auto generated 17-03-2015 20:28
 *
 * Manual updates:
 * Only the data in the array - everything else is removed by next
 * writing. "version" and "dependencies" must not be touched!
 ***************************************************************/

$EM_CONF[$_EXTKEY] = array (
	'title' => 'CAB Login As',
	'description' => 'Within the backend you have a button in the fe_user table and in the upper right corner to quickly login as this fe user in frontend.',
	'category' => 'be',
	'version' => '1.2.0',
	'state' => 'stable',
	'uploadfolder' => true,
	'createDirs' => '',
	'clearcacheonload' => true,
	'author' => 'Dimitri Koenig',
	'author_email' => 'dk@cabag.ch',
	'author_company' => '',
	'constraints' => 
	array (
		'depends' => 
		array (
			'cms' => '',
			'typo3' => '4.5.0-6.2.99',
		),
		'conflicts' => 
		array (
		),
		'suggests' => 
		array (
		),
	),
);

