# Perique Menu Page Example

This is a simple plugin created using the `PinkCrab Perique Framework`. It show cases the `Perique_Admin_Menu` module, which makes it easy to create Pages and Page Groups. All through the DI Container allowing you to keep your domains separated and testable.

> [**Perique_Admin_Menu on Github**](https://github.com/Pink-Crab/Perique_Admin_Menu)

## Setup

If you would like to see this plugin in action, please clone the repository to a WordPress sites plugins directory (wp-content/plugins) and run `composer install --no-dev -o` from the command line.

## How it works

> For more details on bootstrapping Perique, please visit [perique.info](https://perique.info)

### Perique Bootstrapping

```php
// file perique-menu-page.php (plugin entry file)
require_once __DIR__ . '/vendor/autoload.php';

// Boot a barebones version of perique
$app = ( new App_Factory() )
  // Perique bootstrap as normal.     
  ->construct_registration_middleware( Page_Middleware::class )
  ->registration_classes( array( Menu_Page_Group::class ) )
  ->boot();
```
Perique is bootstrapped as normal. The base view path is defined `/views` in this example (not shown here)
* We then define the `Page_Middleware`, this allow the use of `Page` and `Group` objects to be registered via the [**Registration Process**](https://perique.info/core/Registration/) at boot time. This added using `construct_registration_middleware`, so all middleware dependencies are injected by the [DI Container](https://perique.info/core/DI)
* The `Menu_Page_Group` class is added to the list of [Registration Classes](https://perique.info/core/App/setup#configregistrationphp). This allows the group and its pages to be registered with WP_Admin and constructed via the DI Container with any dependencies injected.



### Menu Group

![Menu Group in WP Admin](docs/Menu_Group.png)

The menu group acts as a 

