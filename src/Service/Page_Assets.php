<?php

declare(strict_types=1);

/**
 * Example of a class that enqueues scripts and styles for the admin pages.
 *
 * THIS SOFTWARE IS PROVIDED BY THE COPYRIGHT HOLDERS AND CONTRIBUTORS
 * "AS IS" AND ANY EXPRESS OR IMPLIED WARRANTIES, INCLUDING, BUT NOT
 * LIMITED TO, THE IMPLIED WARRANTIES OF MERCHANTABILITY AND FITNESS FOR
 * A PARTICULAR PURPOSE ARE DISCLAIMED. IN NO EVENT SHALL THE COPYRIGHT
 * OWNER OR CONTRIBUTORS BE LIABLE FOR ANY DIRECT, INDIRECT, INCIDENTAL,
 * SPECIAL, EXEMPLARY, OR CONSEQUENTIAL DAMAGES (INCLUDING, BUT NOT
 * LIMITED TO, PROCUREMENT OF SUBSTITUTE GOODS OR SERVICES; LOSS OF USE,
 * DATA, OR PROFITS; OR BUSINESS INTERRUPTION) HOWEVER CAUSED AND ON ANY
 * THEORY OF LIABILITY, WHETHER IN CONTRACT, STRICT LIABILITY, OR TORT
 * (INCLUDING NEGLIGENCE OR OTHERWISE) ARISING IN ANY WAY OUT OF THE USE
 * OF THIS SOFTWARE, EVEN IF ADVISED OF THE POSSIBILITY OF SUCH DAMAGE.
 *
 * @author Glynn Quelch <glynn.quelch@gmail.com>
 * @license http://www.opensource.org/licenses/mit-license.html  MIT License
 * @package Gin0115\Perique_Menu_Example
 */

namespace Gin0115\Perique_Menu_Example\Service;

use PinkCrab\Loader\Hook_Loader;
use Gin0115\Perique_Menu_Example\Page\Child_Page;

use PinkCrab\Perique\Application\App_Config;
use Gin0115\Perique_Menu_Example\Page\Parent_Page;
use PinkCrab\Perique\Interfaces\Hookable;

class Page_Assets implements Hookable {

	/**
	 * Access to the plugins config
	 * @var App_Config
	 */
	private $app_config;

	// create instance with the config injected
	public function __construct( App_Config $app_config ) {
		$this->app_config = $app_config;
	}

	// Register method from Hookable Interface
	public function register( Hook_Loader $loader ): void {
		// Custom page assets.
		$loader->admin_action( 'admin_enqueue_scripts', array( $this, 'enqueue_custom_page_assets' ) );
	}

	/**
	 * Enqueue the assets for the custom page.
	 *
	 * @param string $page_hook
	 * @return void
	 */
	public function enqueue_custom_page_assets( string $page_hook ): void {
		// Check if the current page is the parent or chiled page.
		if ( ! $this->group_page( $page_hook ) ) {
			return;
		}

		// Enqueue the custom page assets.
		\wp_enqueue_style(
			'perique-menu-example-primary-page-style',
			$this->app_config->url( 'assets' ) . 'perique-page.css',
			array(),
			$this->app_config->version()
		);
	}

	/**
	 * Checks if the passed page_hook is from one of our admin page.
	 * @param string $page_hook
	 * @return bool
	 */
	private function group_page( string $page_hook ): bool {
		$contains = function ( $needle ) use ( $page_hook ) {
			return $needle !== '' && mb_strpos( $page_hook, $needle ) !== false;
		};

		return $contains( Child_Page::PAGE_SLUG ) || $contains( Parent_Page::PAGE_SLUG );
	}
}
