<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

/**
 * Controller: UserController
 * 
 * Automatically generated via CLI.
 */
class UserController extends Controller {
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $data = $this->UsersModel->all();
        $this->call->view('users/index', ['users' => $data]);
    }

    public function create()
    {
        if ($this->io->method() == 'post')
        {
            $firstname = $this->io->post('firstname');
            $lastname = $this->io->post('lastname');
            $email = $this->io->post('email');

            $data = array(
                'firstname' => $firstname,
                'lastname' => $lastname,
                'email' => $email
            );
            if($this->UsersModel->insert($data)){
                redirect();
            }else{
                echo "Error in inserting data.";
            }
        }else{
        $this ->call->view('users/create');
        }
    }
    public function update($id)
    {
        $users = $this->UsersModel->find($id);
        if(!$users){
            die("User not found") ;
        }

        if($this->io->method() == 'post')
        {
            $firstname = $this->io->post('firstname');
            $lastname = $this->io->post('lastname');
            $email = $this->io->post('email');

            $data = array(
                'firstname' => $firstname,
                'lastname' => $lastname,
                'email' => $email
            );
            if($this->UsersModel->update($id, $data)){
                redirect();
            }else{
                echo "Error in updating data.";
            }
        }else{
        $data['users'] = $users; 
        $this ->call->view('users/update', $data);
        }
    }
    public function delete($id)
    {
        if($this->UsersModel->delete($id)){
            redirect();
        }else{
            echo "Error in deleting data.";
        }
    } 
}