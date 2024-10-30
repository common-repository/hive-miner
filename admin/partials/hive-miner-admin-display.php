<?php

/**
 * Provide a admin area view for the plugin
 *
 * This file is used to markup the admin-facing aspects of the plugin.
 *
 * @link       http://devoncmather.com
 * @since      1.0.0
 *
 * @package    Hive_Miner
 * @subpackage Hive_Miner/admin/partials
 */
?>



<div class="wrap">
	<h1>Coin Hive Miner Settings</h1>

	<form name="form" action="<?php echo admin_url('admin.php'); ?>" method="post">

		<?php wp_nonce_field(); ?>


		<h3 class="title">Site API Keys</h3>
		<p>To find your API keys, create an <a target="_blank" href="https://coin-hive.com/">account</a> then login and go to your <a target="_blank" href="https://coin-hive.com/settings">settings page</a>.</p>
		<table class="form-table">
			<tbody>
				<tr>
					<th scope="row">
						<label for="hive_miner_public_key">Coin Hive Public Key</label>
					</th>
					<td>
						<input
							name="hive_miner_public_key"
							type="text"
							id="hive_miner_public_key"
							value="<?php echo get_option('hive_miner_public_key'); ?>"
							class="regular-text">
					</td>
				</tr>

				<tr>
					<th scope="row">
						<label for="hive_miner_secret_key">Coin Hive Secret Key</label>
					</th>
					<td>
						<input
							name="hive_miner_secret_key"
							type="text"
							id="hive_miner_secret_key"
							value="<?php echo get_option('hive_miner_secret_key'); ?>"
							class="regular-text">
					</td>
				</tr>

			</tbody>
		</table>



		<h3 class="title">API Options</h3>
		<p>To find out more information about API options please visit Coin Hive <a target="_blank" href="https://coin-hive.com/documentation">documentation</a>.</p>
		<table class="form-table">
			<tbody>
				<tr>
					<th scope="row">
						<label for="hive_miner_target_hashes">Target Hashes</label>
					</th>
					<td>
						<input
							name="hive_miner_target_hashes"
							type="number"
							placeholder="Multiple of 256"
							min="256"
							step="256"
							id="hive_miner_target_hashes"
							value="<?php echo get_option('hive_miner_target_hashes'); ?>"
							class="regular-text">
							<p class="description">Set the miner to stop once the specified number of hashes was found.</p>
					</td>
				</tr>
			</tbody>
		</table>

		<p class="submit"><input type="submit" name="submit" id="submit" class="button button-primary" value="Save"></p>
		<input type="hidden" name="action" value="update_hive_miner_settings" />
	</form>

</div><!--END Wrap-->
