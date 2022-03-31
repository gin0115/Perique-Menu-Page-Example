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

use Gin0115\Perique_Menu_Example\Page\Parent_Page;
use PinkCrab\Perique_Admin_Menu\Group\Abstract_Group;
use Gin0115\Perique_Menu_Example\Service\Translations;
// use PinkCrab\Perique_Admin_Menu\Tests\Fixtures\Valid_Group\Valid_Page;
// use PinkCrab\Perique_Admin_Menu\Tests\Fixtures\Valid_Group\Valid_Primary_Page;

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
	protected $pages = array(
		Parent_Page::class,
		// Valid_Page::class,
	);

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
	 * Is constructed using the DI Container
	 * Translations is passed constructed, automatically.
	 *
	 * @param Translations $translations
	 */
	public function __construct( Translations $translations ) {
		// Define the group title from the injected TRANSLATIONS service.
		$this->group_title = $translations->get_menu_group_title();
	}
}
