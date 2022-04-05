<?php

declare(strict_types=1);

/**
 * The parent page.
 *
 * Handles settings with use of the loader() callback for form handling.
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
use PinkCrab\Perique_Admin_Menu\Page\Menu_Page;
use Gin0115\Perique_Menu_Example\Service\Translations;
use Gin0115\Perique_Menu_Example\Service\Parent_Settings\Parent_Page_Settings;
use Gin0115\Perique_Menu_Example\Service\Parent_Settings\Parent_Page_Form_Handler;

class Parent_Page extends Menu_Page {

	/**
	 * Slug of the parent page.
	 * Done as a constant so can be accessed via the form handler.
	 */
	public const PAGE_SLUG = 'perique_parent_page';

	/**
	 * The pages menu slug.
	 *
	 * @var string
	 */
	protected $page_slug = self::PAGE_SLUG;

	/**
	 * The template to be rendered.
	 *
	 * As we set the PHP_Engine with our views base path, would be treated as.
	 * ..plugins/Perique_Menu_Page/views/parent-page.php
	 *
	 * @var string
	 */
	protected $view_template = 'parent-page';

	/**
	 * Parent Settings
	 *
	 * @var Parent_Page_Settings
	 */
	protected $settings_service;

	/**
	 * Parent Form Handler
	 *
	 * @var Parent_Page_Form_Handler
	 */
	protected $form_handler;

	/**
	 * Create the page, using injected services.
	 *
	 * @param \Gin0115\Perique_Menu_Example\Service\Translations $translations
	 */
	public function __construct(
		Translations $translations,
		Parent_Page_Settings $settings_service,
		Parent_Page_Form_Handler $form_handler
	) {
		// Set the title using the translations service.
		$this->menu_title = $translations->get_parent_menu_title();
		$this->page_title = $translations->get_parent_page_title();

		// Handles the reading and writing of settings.
		$this->settings_service = $settings_service;

		// Handles the form submission.
		$this->form_handler = $form_handler;

		// Populate the view data.
		$this->view_data = array(
			'settings'     => $this->settings_service,
			'nonce'        => \wp_create_nonce( Parent_Page_Form_Handler::PARENT_PAGE_FORM_NONCE ),
			'translations' => $translations,
			'page'         => $this,
		);
	}

	/**
	 * Runs the form handler before the page is loaded.
	 *
	 * @param Page $page
	 * @return void
	 */
	public function load( Page $page ): void {
		$this->form_handler->run();
	}
}
