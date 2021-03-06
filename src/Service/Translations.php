<?php

declare(strict_types=1);

/**
 * Example of a service which can be injected as a dependency.
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
 * @license http://www.opensource.org/licenses/mit-license.html MIT License
 * @package Gin0115\Perique_Menu_Example
 */

namespace Gin0115\Perique_Menu_Example\Service;

class Translations {

	/**
	 * Menu group title.
	 * @return string
	 */
	public function get_menu_group_title(): string {
		return \__( 'Perique Menu', 'perique-menu-example' );
	}

	/**
	 * Parent page title.
	 * @return string
	 */
	public function get_parent_page_title(): string {
		return \__( 'Parent Page Title', 'perique-menu-example' );
	}

	/**
	 * Parent menu title.
	 * @return string
	 */
	public function get_parent_menu_title(): string {
		return \__( 'Parent Page', 'perique-menu-example' );
	}

	/**
	 * Child page title.
	 * @return string
	 */
	public function get_child_page_title(): string {
		return \__( 'Child Page Title', 'perique-menu-example' );
	}

	/**
	 * Child menu title.
	 * @return string
	 */
	public function get_child_menu_title(): string {
		return \__( 'Child Page', 'perique-menu-example' );
	}
}
