<?

	class Contact_Configuration extends Core_Configuration_Model {
		public $record_code = 'contact_configuration';
		
		public static function create() {
			$config = new self();
			
			return $config->load();
		}
		
		protected function build_form() {
			$this->add_field('company_email', 'Contact e-mail', 'full', db_varchar)->comment('Specify the company contact email address which will be used for incoming messages.', 'above')->validation()->required('Please specify the email address')->email();
			$this->add_field('company_title', 'Company title', 'full', db_varchar);
		}
		
		protected function init_config_data() {
		}
	}