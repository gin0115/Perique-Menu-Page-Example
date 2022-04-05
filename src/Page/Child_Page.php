<?php

declare(strict_types=1);

/**
 * Sample of a child page.
 *
 * Makes use of the Group level css only.
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

use PinkCrab\Perique_Admin_Menu\Page\Menu_Page;
use Gin0115\Perique_Menu_Example\Page\Parent_Page;
use Gin0115\Perique_Menu_Example\Service\Translations;
use Gin0115\Perique_Menu_Example\Service\Public_Api_Provider;

class Child_Page extends Menu_Page {

	/**
	 * Slug of the parent page.
	 * Done as a constant so can be accessed via the form handler.
	 */
	public const PAGE_SLUG = 'perique_child_page';

	/**
	 * The pages parent slug.
	 *
	 * @var string
	 */
	protected $parent_slug = Parent_Page::PAGE_SLUG;

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
	 * ..plugins/Perique_Menu_Page/views/child-page.php
	 *
	 * @var string
	 */
	protected $view_template = 'child-page';

	/**
	 * Create the page, using injected services.
	 *
	 * @param \Gin0115\Perique_Menu_Example\Service\Translations $translations
	 */
	public function __construct(
		Translations $translations,
		Public_Api_Provider $api_provider
	) {
		// Set the title using the translations service.
		$this->menu_title = $translations->get_child_menu_title();
		$this->page_title = $translations->get_child_page_title();

		// Populate the view data.
		$this->view_data = array(
			'api_list'     => $api_provider->get_api_list(),
			'translations' => $translations,
			'page'         => $this,
		);

	}
}
