<?php ob_start(); ?>
<table style="table-layout: fixed;">
<?php foreach ( $cities as $city ) : ?>
	<tr>
		<td style="text-align: left"><?php echo esc_html( $city->city ); ?></td>
		<td><?php echo esc_html( $city->population ); ?></td>
		<td><?php echo esc_html( $city->murder_homicide ); ?></td>
		<td><?php echo esc_html( $city->rape ); ?></td>
		<td><?php echo esc_html( $city->robbery ); ?></td>
		<td><?php echo esc_html( $city->assault ); ?></td>
		<td><?php echo esc_html( $city->violent_crime ); ?></td>
	</tr>
<?php endforeach; ?>
</table>
<?php
$output = ob_get_clean();
ob_flush();

return $output;
