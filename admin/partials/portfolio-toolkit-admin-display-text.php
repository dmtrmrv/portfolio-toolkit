<?php

/**
 * Provide a admin area view for the plugin
 *
 * This file is used to markup the admin-facing aspects of the plugin.
 *
 * @link       http://dmitrymayorov.com/
 * @since      0.1.0
 *
 * @package    Portfolio_Toolkit
 * @subpackage Portfolio_Toolkit/admin/partials
 */
?>

<div class="ptk-field-wrap">
	<label for="<?php echo $name; ?>">
		<strong><?php echo $title; ?></strong>
	</label>
	
	<input
		name="<?php echo $name; ?>"
		type="<?php echo $type; ?>"
		value="<?php echo esc_html( $value ); ?>"
		class="<?php echo $class; ?>"
		placeholder="<?php echo $desc; ?>"
	>
</div>