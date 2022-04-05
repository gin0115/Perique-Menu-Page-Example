<?php

/**
 * Plugin Name: PinkCrab Perique Menu Page Example Plugin
 * Plugin URI: https://github.com/gin0115/Perique_Migrations_Example
 * Description: This is an example of using the Perique Menu Page library.
 * Version: 1.0.0
 * Author: Glynn Quelch
 * Author URI: https://github.com/gin0115/Perique_Menu_Page
 * Text Domain: gin0115-pinkcrab-examples
 * Tested up to: 5.9
 * License: MIT
 **/

use PinkCrab\Perique\Interfaces\Renderable;
use PinkCrab\Perique\Application\App_Factory;
use PinkCrab\Perique\Services\View\PHP_Engine;
use Gin0115\Perique_Menu_Example\Page\Menu_Page_Group;
use PinkCrab\Perique_Admin_Menu\Registration_Middleware\Page_Middleware;
use Gin0115\Perique_Menu_Example\Service\Parent_Settings\Parent_Page_Form_Handler;

require_once __DIR__ . '/vendor/autoload.php';

// Boot a barebones version of perique
$app = ( new App_Factory() )
	// This forces us to use default di rues
	// (sets view engine to php and base path to plugin root)
	// We don't use this in this example, but it is useful
	->with_wp_dice( true )

	// Define the DI Rules for the application.
	->di_rules(
		array(
			'*' => array(
				'substitutions' => array(
					// Use PHP_Engine based on the view path.
					Renderable::class => new PHP_Engine( __DIR__ . '/views' ),
				),
			),
		)
	)

	// Define our classes which need to be registered.
	->registration_classes( array( Menu_Page_Group::class ) )

	// Define the Page Middleware (this handles the rendering of Pages & Groups)
	->construct_registration_middleware( Page_Middleware::class )

	// App is now setup, just boot.
	->boot();
