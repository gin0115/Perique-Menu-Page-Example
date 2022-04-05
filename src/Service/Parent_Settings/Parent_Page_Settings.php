<?php

declare(strict_types=1);

/**
 * Sample of Repository type service for Parent Page Settings
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

namespace Gin0115\Perique_Menu_Example\Service\Parent_Settings;

/**
 * This is a sample of a repository type service for settings.
 * It is used to store settings in the database.
 */
class Parent_Page_Settings {

	/**
	 * Option keys.
	 */
	private const SETTING_1_KEY = 'perique_menu_example_setting_1';
	private const SETTING_2_KEY = 'perique_menu_example_setting_2';

	/**
	 * Get setting 1
	 *
	 * @return string
	 */
	public function get_setting_1(): string {
		return \esc_html( get_option( self::SETTING_1_KEY, '' ) );
	}

	/**
	 * Get setting 2
	 *
	 * @return string
	 */
	public function get_setting_2(): string {
		return \esc_html( get_option( self::SETTING_2_KEY, '' ) );
	}

	/**
	 * Set setting 1
	 *
	 * @param string $setting_1
	 * @return self
	 */
	public function set_setting_1( string $setting_1 ): self {
		\update_option( self::SETTING_1_KEY, \sanitize_text_field( $setting_1 ), false );
		return $this;
	}

	/**
	 * Set setting 2
	 *
	 * @param string $setting_2
	 * @return self
	 */
	public function set_setting_2( string $setting_2 ) {
		\update_option( self::SETTING_2_KEY, \sanitize_text_field( $setting_2 ), false );
		return $this;
	}
}
