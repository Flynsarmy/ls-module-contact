<?

	class Contact_Settings extends Backend_SettingsController {
		protected $access_for_groups = array(Users_Groups::admin);
		public $implement = 'Db_FormBehavior';
		
		public $form_edit_title = 'Contact Settings';
		public $form_model_class = 'Contact_Configuration';
		public $form_redirect = null;
		
		public $strings = array(
			'controller_title' => 'Contact'
		);

		protected $required_permissions = array('contact:manage_settings');

		public function __construct() {
			parent::__construct();
			$this->app_tab = 'system';
			$this->form_redirect = url('system/settings/');
		}

		public function index() {
			try {
				$this->app_page_title = 'Contact module';

				$config = new Contact_Configuration();
				$this->viewData['form_model'] = $config->load();
			}
			catch(exception $ex) {
				$this->handlePageError($ex);
			}
		}
		
		protected function index_onSave() {
			try {
				$config = new Contact_Configuration();
				$config = $config->load();
			
				$config->save(post($this->form_model_class, array()), $this->formGetEditSessionKey());
				Phpr::$session->flash['success'] = 'Contact module configuration has been saved.';
				Phpr::$response->redirect($this->form_redirect);
			}
			catch(Exception $ex) {
				Phpr::$response->ajaxReportException($ex, true, true);
			}
		}
	}