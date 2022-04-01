<?php

declare(strict_types=1);

/**
 * Form Handler for the parent page.
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

use Gin0115\Lib\ORM\ORM;
use PinkCrab\Loader\Hook_Loader;
use PinkCrab\Perique\Interfaces\Hookable;
use Gin0115\Perique_Menu_Example\Page\Parent_Page;

class Parent_Page_Form_Handler implements Hookable {

	/**
	 * The nonce key used for the form handling.
	 */
	public const PARENT_PAGE_FORM_NONCE = 'parent_page_form_nonce';

	/**
	 * This acts as provider for page hooks
	 *
	 * We cant use get_plugin_page_hook() until after the page is registered
	 * This avoids having nested hook calls.
	 *
	 * @param string $page
	 * @param string|null $parent
	 * @return string
	 */
	private function page_hook_provider( string $page, ?string $parent = null ): string {
		return null === $parent
			? "toplevel_page_{$page}"
			: 'admin_menu_' . $parent;
	}

	/**
	 * Allows the wiring of hook calls for this handler
	 *
	 * This method is required as per the Hookable interface.
	 * @see https://github.com/Pink-Crab/Perique-Framework/blob/master/src/Interfaces/Hookable.php
	 *
	 * @param \PinkCrab\Loader\Hook_Loader $loader
	 * @return void
	 */
	public function register( Hook_Loader $loader ): void {

		// Register the primary page, pre render hook.
		$loader->admin_action( $this->page_hook_provider( Parent_Page::PAGE_SLUG ), array( $this, 'primary_page_pre_render' ) );

	}

	/**
	 * Callback for the hook used before the page is renderd.
	 *
	 * This is used for Form Handling
	 *
	 * @return void
	 */
	public function primary_page_pre_render(): void {
		print( 'BEFORE PAGE RENDERING' );
	}

}

