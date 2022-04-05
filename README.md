# Perique Menu Page Example

This is a simple plugin created using the `PinkCrab Perique Framework`. It show cases the `Perique_Admin_Menu` module, which makes it easy to create Pages and Page Groups. All through the DI Container allowing you to keep your domains separated and testable.

> [**Perique_Admin_Menu on Github**](https://github.com/Pink-Crab/Perique_Admin_Menu)

## Setup

If you would like to see this plugin in action, please clone the repository to a WordPress sites plugins directory (wp-content/plugins) and run `composer install --no-dev -o` from the command line.

## How it works

> For more details on bootstrapping Perique, please visit [perique.info](https://perique.info)

```php
// file perique-menu-page.php (plugin entry file)
require_once __DIR__ . '/vendor/autoload.php';

// Boot a barebones version of perique
$app = ( new App_Factory() )
	// Perique bootstrap as normal.     
    ->construct_registration_middleware( Page_Middleware::class ) // Include the Page middleware	
	->registration_classes( array( Menu_Page_Group::class ) )// Define our classes which need to be registered.
	->boot();

```


