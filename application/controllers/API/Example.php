<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . 'libraries/REST_Controller.php';

class Example extends REST_Controller {

    private $users = [
        ['id' => 1, 'name' => 'John', 'email' => 'john@example.com', 'fact' => 'Loves coding'],
        ['id' => 2, 'name' => 'Jim', 'email' => 'jim@example.com', 'fact' => 'Developed on CodeIgniter'],
        ['id' => 3, 'name' => 'Jane', 'email' => 'jane@example.com', 'fact' => 'Lives in the USA', ['hobbies' => ['guitar', 'cycling']]],
    ];

    function __construct()
    {

        parent::__construct();
        // Configure limits on our controller methods
        // Ensure you have created the 'limits' table and enabled 'limits' within application/config/rest.php
        // $this->methods['users_get']['limit'] = 500; // 500 requests per hour per user/key
        // $this->methods['users_post']['limit'] = 100; // 100 requests per hour per user/key
        // $this->methods['users_delete']['limit'] = 50; // 50 requests per hour per user/key
    }


    function index_get() {
        echo 'lol';
    }

    public function users_get()
    {

        $id = $this->get('id');

        if ($id === NULL) {
            
            if ($this->users)
                $this->response($this->users, REST_Controller::HTTP_OK);
            else 
                $this->response([
                    'status' => FALSE,
                    'message' => 'No users were found'
                ], REST_Controller::HTTP_NOT_FOUND); 
        }

        $id = (int) $id;

        if ($id <= 0)
            $this->response(NULL, REST_Controller::HTTP_BAD_REQUEST); 
        
        $user = NULL;
        if (!empty($this->users)) {
            foreach ($this->users as $key => $value) {
                if (isset($value['id']) && $value['id'] === $id)
                    $user = $value;
            }
        }
    
        if (!empty($user))
            $this->set_response($user, REST_Controller::HTTP_OK);
        else
            $this->set_response([
                'status' => FALSE,
                'message' => 'User could not be found'
            ], REST_Controller::HTTP_NOT_FOUND);
    }

    public function users_post() {
        // $this->some_model->update_user( ... );
        $this->users[] = $message = [
            'id' => 4, 
            'name' => $this->post('name'),
            'email' => $this->post('email'),
            'message' => 'Added a resource'
        ];
        
        $this->set_response($message, REST_Controller::HTTP_CREATED);
    }
    public function users_delete() {
        $id = (int) $this->get('id');
        if ($id <= 0)
            $this->response(NULL, REST_Controller::HTTP_BAD_REQUEST);

        $message = [
            'id' => $id,
            'message' => 'Deleted the resource'
        ];
        
        $this->set_response($message, REST_Controller::HTTP_NO_CONTENT);
    }
}