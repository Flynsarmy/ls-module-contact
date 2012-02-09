<?

	class Contact_Module extends Core_ModuleBase {
		protected function create_module_info() {
			return new Core_ModuleInfo(
				"Contact",
				"Provides a contact form for your store.",
				"Limewheel Creative Inc."
			);
		}
		
		public function listSettingsItems()
		{
			return array(
				array(
					'icon'=>'/modules/contact/resources/images/mail_receive.png', 
					'title'=>'Contact module settings', 
					'url'=>'/contact/settings/',
					'description'=>'Set the contact email address and company title.',
					'sort_id'=>50
				)
			);
		}

		/**
		 * Awaiting deprecation
		 */
		
		protected function createModuleInfo() {
			return $this->create_module_info();
		}
	}
	
?>