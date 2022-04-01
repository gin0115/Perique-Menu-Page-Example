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

use PinkCrab\Loader\Hook_Loader;
use PinkCrab\Perique\Interfaces\Hookable;
use Gin0115\Perique_Menu_Example\Page\Parent_Page;

class Parent_Page_Form_Handler implements Hookable {

	/**
	 * The nonce key used for the form handling.
	 */
	public const PARENT_PAGE_FORM_NONCE = 'parent_page_form_nonce';

	/**
	 * The fields from the form that should be handled.
	 * ['field_name' => 'settings_method']
	 */
	private const FORM_FIELDS = array(
		'setting_1' => 'set_setting_1',
		'setting_2' => 'set_setting_2',
	);

	/**
	 * The parent page settings
	 *
	 * @var Parent_Page_Settings
	 */
	private $page_settings;

	/**
	 * Creates an instance with the settings repository injected.
	 *
	 * @param Parent_Page_Settings $page_settings
	 */
	public function __construct( Parent_Page_Settings $page_settings ) {
		$this->page_settings = $page_settings;
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
		$loader->admin_action( 'toplevel_page_' . Parent_Page::PAGE_SLUG, array( $this, 'run' ) );
	}

	/**
	 * Callback for the hook used before the page is rendered.
	 *
	 * This is used for Form Handling
	 *
	 * @return void
	 */
	public function run(): void {
		// Bail if form is not submitted or nonce fails validation
		if ( ! $this->form_submitted() || ! $this->validate_form_request() ) {
			return;
		}

		$this->update_settings_from_form();
	}

	/**
	 * Checks if the form has been submitted.
	 *
	 * Does this by looking for the page nonce in post.
	 *
	 * @return bool
	 */
	private function form_submitted(): bool {
		return \array_key_exists(
			'primary_page_nonce',
			$_POST // phpcs:ignore WordPress.Security.NonceVerification.Missing, validated afterwards.
		);
	}

	/**
	 * Verifies the nonce for the form.
	 *
	 * @return bool
	 */
	private function validate_form_request(): bool {
		return (bool) \wp_verify_nonce(
			\sanitize_text_field( $_POST['primary_page_nonce'] ),
			self::PARENT_PAGE_FORM_NONCE
		);
	}

	/**
	 * Updates the settings based on the post values from form.
	 *
	 * Iterates through the settings field constant and used the field and method
	 * to populate the settings object.
	 *
	 * @return void
	 */
	public function update_settings_from_form(): void {
		foreach ( self::FORM_FIELDS as $field => $method ) {
			if ( \array_key_exists( $field, $_POST ) // phpcs:ignore WordPress.Security.NonceVerification.Missing, validated before being called.
			&& \method_exists( $this->page_settings, $method )
			) {
				$this->page_settings->$method( $_POST[ $field ] ); // phpcs:ignore WordPress.Security.NonceVerification.Missing, validated before being called.
			}
		}
	}

}

