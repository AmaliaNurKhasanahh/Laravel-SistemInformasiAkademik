<?php 
/**
 * Index Page Controller
 * @category  Controller
 */
class IndexController extends BaseController{
	function __construct(){
		parent::__construct(); 
		$this->tablename = "users";
	}
	/**
     * Index Action 
     * @return null
     */
	function index(){
		if(user_login_status() == true){
			$this->redirect(HOME_PAGE);
		}
		else{
			$this->render_view("index/index.php");
		}
	}
	private function login_user($username , $password_text, $rememberme = false){
		$db = $this->GetModel();
		$username = filter_var($username, FILTER_SANITIZE_STRING);
		$db->where("name", $username)->orWhere("email", $username);
		$tablename = $this->tablename;
		$user = $db->getOne($tablename);
		if(!empty($user)){
			//Verify User Password Text With DB Password Hash Value.
			//Uses PHP password_verify() function with default options
			$password_hash = $user['password'];
			$this->modeldata['password'] = $password_hash; //update the modeldata with the password hash
			if(password_verify($password_text,$password_hash)){
        		unset($user['password']); //Remove user password. No need to store it in the session
				set_session("user_data", $user); // Set active user data in a sessions
				//if Remeber Me, Set Cookie
				if($rememberme == true){
					$sessionkey = time().random_str(20); // Generate a session key for the user
					//Update user session info in database with the session key
					$db->where("id", $user['id']);
					$res = $db->update($tablename, array("login_session_key" => hash_value($sessionkey)));
					if(!empty($res)){
						set_cookie("login_session_key", $sessionkey); // save user login_session_key in a Cookie
					}
				}
				else{
					clear_cookie("login_session_key");// Clear any previous set cookie
				}
				$redirect_url = get_session("login_redirect_url");// Redirect to user active page
				if(!empty($redirect_url)){
					clear_session("login_redirect_url");
					return $this->redirect($redirect_url);
				}
				else{
					return $this->redirect(HOME_PAGE);
				}
			}
			else{
				//password is not correct
				return $this->login_fail("Username or password not correct");
			}
		}
		else{
			//user is not registered
			return $this->login_fail("Username or password not correct");
		}
	}
	/**
     * Display login page with custom message when login fails
     * @return BaseView
     */
	private function login_fail($page_error = null){
		$this->set_page_error($page_error);
		$this->render_view("index/login.php");
	}
	/**
     * Login Action
     * If Not $_POST Request, Display Login Form View
     * @return View
     */
	function login($formdata = null){
		if($formdata){
			$modeldata = $this->modeldata = $formdata;
			$username = trim($modeldata['username']);
			$password = $modeldata['password'];
			$rememberme = (!empty($modeldata['rememberme']) ? $modeldata['rememberme'] : false);
			$this->login_user($username, $password, $rememberme);
		}
		else{
			$this->set_page_error("Invalid request");
			$this->render_view("index/login.php");
		}
	}
	/**
     * Insert new record into the user table
	 * @param $formdata array from $_POST
     * @return BaseView
     */
	function register($formdata = null){
		if($formdata){
			$request = $this->request;
			$db = $this->GetModel();
			$tablename = $this->tablename;
			$fields = $this->fields = array("name","email","email_verified_at","password","mengajar","kelas","role","remember_token","created_at","updated_at","deleted_at","photo"); //registration fields
			$postdata = $this->format_request_data($formdata);
			$cpassword = $postdata['confirm_password'];
			$password = $postdata['password'];
			if($cpassword != $password){
				$this->view->page_error[] = "Your password confirmation is not consistent";
			}
			$this->rules_array = array(
				'name' => 'required',
				'email' => 'required|valid_email',
				'email_verified_at' => 'required|valid_email',
				'password' => 'required',
				'mengajar' => 'required',
				'kelas' => 'required|numeric',
				'role' => 'required|numeric',
				'remember_token' => 'required',
				'created_at' => 'required',
				'updated_at' => 'required',
				'deleted_at' => 'required',
				'photo' => 'required',
			);
			$this->sanitize_array = array(
				'name' => 'sanitize_string',
				'email' => 'sanitize_string',
				'email_verified_at' => 'sanitize_string',
				'mengajar' => 'sanitize_string',
				'kelas' => 'sanitize_string',
				'role' => 'sanitize_string',
				'remember_token' => 'sanitize_string',
				'created_at' => 'sanitize_string',
				'updated_at' => 'sanitize_string',
				'deleted_at' => 'sanitize_string',
				'photo' => 'sanitize_string',
			);
			$this->filter_vals = true; //set whether to remove empty fields
			$modeldata = $this->modeldata = $this->validate_form($postdata);
			$password_text = $modeldata['password'];
			//update modeldata with the password hash
			$modeldata['password'] = $this->modeldata['password'] = password_hash($password_text , PASSWORD_DEFAULT);
			//Check if Duplicate Record Already Exit In The Database
			$db->where("name", $modeldata['name']);
			if($db->has($tablename)){
				$this->view->page_error[] = $modeldata['name']." Already exist!";
			}
			//Check if Duplicate Record Already Exit In The Database
			$db->where("email", $modeldata['email']);
			if($db->has($tablename)){
				$this->view->page_error[] = $modeldata['email']." Already exist!";
			}
			if($this->validated()){
				$rec_id = $this->rec_id = $db->insert($tablename, $modeldata);
				if($rec_id){
					$this->login_user($modeldata['email'] , $password_text);
					return;
				}
				else{
					$this->set_page_error();
				}
			}
		}
		$page_title = $this->view->page_title = "Add New Users";
		return $this->render_view("index/register.php");
	}
	/**
     * Logout Action
     * Destroy All Sessions And Cookies
     * @return View
     */
	function logout($arg=null){
		Csrf::cross_check();
		session_destroy();
		clear_cookie("login_session_key");
		$this->redirect("");
	}
}
