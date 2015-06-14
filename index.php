<?php
	require_once '../../views/_secureHead.php';
	require_once '../../models/_header.php';
	require_once '../../models/_add.php';
	require_once '../../models/_table.php';

	if( isset ($sessionManager) && $sessionManager->getUserType() == 'ADMIN' ) {
		$id = request_isset ('id');
		$key = request_isset ('key');
		$value = request_isset ('value');

		$settingsManager = new SettingsManager();

		switch ($page_action) {
			case 'add_setting' :
				$settingsManager->addRecord ($key, $value);
				break;
			case 'delete_by_id' :
				$settingsManager->deleteRecord ($id);
				break;
			case 'update_by_id' :
				$settingsManager->updateRecord ($id, $key, $value);
				break;
		}
		
		$settings_data = $settingsManager->getAllRecords();
		
		$page_title = 'Settings';
		$alt_menu = '<a href="#" class="add">Add</a>';

		$addView = new AddView ('Add', 'add_setting');
		$addView->addRow ('key', 'Key');
		$addView->addRow ('value', 'Value');

		$tableView = new TableView ( array ('Key', 'Value', '') );

		while (($settings_row = mysql_fetch_array( $settings_data ) ) != null) {
			$tableView->addRow ( array (
				TableView::createCell ('key', $settings_row['key'] ),
				TableView::createCell ('value', $settings_row['value'] ),
				TableView::createEdit ($settings_row['SETTING_ID'])
			));
		}

		$views_to_load = array();
		$views_to_load[] = '../../views/_add.php';
		$views_to_load[] = '_warning.php';
		$views_to_load[] = '../../views/_table.php';
		
		include '../../views/_generic.php';
	}