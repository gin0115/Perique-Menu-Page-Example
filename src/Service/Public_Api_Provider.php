<?php

declare(strict_types=1);

/**
 * Service which returns data from https://api.publicapis.org/entries
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

class Public_Api_Provider {

	/**
	 * Gets a list of public APIS.
	 *
	 * @return array{
	 *    count:int,
	 *    entries:array{
	 *       API:string,
	 *       Description:string,
	 *       Auth:string,
	 *       HTTPS:bool,
	 *       Cors:string,
	 *       Link:string,
	 *       Category:string,
	 *    }
	 * }
	 */
	public function get_api_list(): array {
		$api_response = $this->do_get_call();

		if ( null === $api_response || $api_response['response']['code'] !== 200 ) {
			return array(
				'count'   => 0,
				'entries' => array(),
			);
		}

		return \json_decode( $api_response['body'], true );
	}

	/**
	 * Get the HTTP response
	 *
	 * @return array|null
	 */
	protected function do_get_call() {
		$results = wp_remote_get( 'https://api.publicapis.org/entries' );
		return is_array( $results ) ? $results : null;
	}
}
