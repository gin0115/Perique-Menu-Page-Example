<?php
/**
 * Public API Row (sub) Template
 *
 * Available variables:
 * @var int                    $key   The current row key
 * @var array{                 $row   The current row
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
?>
<div id="api-<?php echo \absint( $key ); ?>" class="api-item__container">
	<div class="api-item__details">
		<h3><?php echo \esc_html( $row['API'] ); ?><span>(<?php echo \esc_html( $row['Category'] ); ?>)</span>
		</h3>
		<p><?php echo \esc_html( $row['Description'] ); ?></p>
		<p><?php echo \esc_url( $row['Link'] ); ?></p>
	</div>
	<div class="api-item__features">
		<?php
			printf(
				'<p class="api-item__feature cors"><span class="dashicons dashicons-rest-api"></span> Cors : %s </p>',
				\esc_html( ucfirst( $row['Cors'] ) ),
			);
		?>
		<?php
			printf(
				'<p class="api-item__feature https"><span class="dashicons dashicons-%s"></span> %s </p>',
				true === $row['HTTPS'] ? 'lock' : 'unlock',
				true === $row['HTTPS'] ? 'HTTPS' : 'HTTP',
			);
		?>
		<?php
			printf(
				'<p class="api-item__feature auth"><span class="dashicons dashicons-vault"></span> Auth : %s</p>',
				'' === $row['Auth'] ? 'None' : esc_html( ucfirst( $row['Auth'] ) ),
			);
		?>
	</div>
</div>
