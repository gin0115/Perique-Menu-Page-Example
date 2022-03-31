<?php

declare(strict_types=1);

/**
 * Primary valid page.
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
 * @package PinkCrab\Perique_Admin_Menu
 *
 * @docs https://www.advancedcustomfields.com/resources/acf_add_options_page/
 */

namespace Gin0115\Perique_Menu_Example\Page;

use PinkCrab\Perique_Admin_Menu\Page\Menu_Page;
use Gin0115\Perique_Menu_Example\Service\Translations;

class Parent_Page extends Menu_Page {

	/**
	 * The pages menu slug.
	 *
	 * @var string
	 */
	protected $page_slug = 'valid_primary_page';

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
	 * The view data used by view.
	 *
	 * @var array{data:string}
	 */
	protected $view_data = array( 'data' => 'Valid Primary Page Data' );

	/**
	 * Create the page, using injected services.
	 *
	 * @param \Gin0115\Perique_Menu_Example\Service\Translations $translations
	 */
	public function __construct( Translations $translations ) {
		// Set the title using the translations service.
		$this->menu_title = $translations->get_menu_group_title();
		$this->page_title = $translations->get_menu_group_title();
	}
}
