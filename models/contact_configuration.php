<?

	class Contact_Configuration extends Core_Configuration_Model {
		public $record_code = 'contact_configuration';
		
		public static function create() {
			$config = new self();
			
			return $config->load();
		}
		
		protected function build_form() {
			$this->add_field('info_email', 'Information E-mail', 'full', db_varchar)->tab('Contact')->comment('Enter an email which will be the receiver of contact emails.');
		}
		
		protected function init_config_data() {
		}
	}