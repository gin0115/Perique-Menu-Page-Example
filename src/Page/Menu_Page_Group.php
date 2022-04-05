<?php

declare(strict_types=1);

/**
 * The group which contains all the pages used in this
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

namespace Gin0115\Perique_Menu_Example\Page;

use PinkCrab\Perique_Admin_Menu\Page\Page;
use PinkCrab\Perique\Application\App_Config;
use Gin0115\Perique_Menu_Example\Page\Child_Page;
use Gin0115\Perique_Menu_Example\Page\Parent_Page;
use PinkCrab\Perique_Admin_Menu\Group\Abstract_Group;
use Gin0115\Perique_Menu_Example\Service\Translations;

class Menu_Page_Group extends Abstract_Group {

	/**
	 * The primary page of the group.
	 *
	 * @var string
	 */
	protected $primary_page = Parent_Page::class;

	/**
	 * The pages in the group.
	 *
	 * @var array
	 */
	protected $pages = array( Parent_Page::class, Child_Page::class );

	/**
	 * The capability required to access the group.
	 *
	 * @var string
	 */
	protected $capability = 'manage_options';

	/**
	 * The group ICON
	 *
	 * @var string
	 */
	protected $icon = 'dashicons-admin-generic';

	/**
	 * The menu groups position.
	 *
	 * @var string
	 */
	protected $position = 65;

		/**
	 * Access to the plugins config
	 * @var App_Config
	 */
	private $app_config;

	/**
	 * Is constructed using the DI Container
	 * Translations is passed constructed, automatically.
	 *
	 * @param Translations $translations
	 */
	public function __construct( Translations $translations, App_Config $app_config ) {
		// Define the group title from the injected TRANSLATIONS service.
		$this->group_title = $translations->get_menu_group_title();

		// Set app config for path access
		$this->app_config = $app_config;
	}

	/**
	 * Load hook callback for all pages in this group.
	 *
	 * @param Abstract_Group $group
	 * @param Page $page
	 * @return void
	 */
	public function load( Abstract_Group $group, Page $page ): void {
		// Doing nothing here, just used as an example.
	}

	/**
	 * Callback for enqueuing scripts and styles at a group level.
	 *
	 * @param Abstract_Group $group
	 * @param Page $page
	 * @return void
	 * @codeCoverageIgnore This can't be tested as it does nothing and is extended only
	 */
	public function enqueue( Abstract_Group $group, Page $page ): void {
		// Enqueue the custom page assets.
		\wp_enqueue_style(
			'perique-menu-example-primary-page-style',
			$this->app_config->url( 'assets' ) . 'perique-page.css',
			array(),
			$this->app_config->version()
		);
	}
}
