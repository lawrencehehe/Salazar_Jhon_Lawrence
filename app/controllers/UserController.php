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
        $this->call->model('UsersModel');

        $page = 1;
        if(isset($_GET['page']) && ! empty($_GET['page'])) {
            $page = $this->io->get('page');
        }

        $q = '';
        if(isset($_GET['q']) && ! empty($_GET['q'])) {
            $q = trim($this->io->get('q'));
        }

        $records_per_page = 10;

        $user = $this->UsersModel->page($q, $records_per_page, $page);
        $data['user'] = $user['records'];
        $total_rows = $user['total_rows'];

        $this->pagination->set_options([
            'first_link'     => '⏮ First',
            'last_link'      => 'Last ⏭',
            'next_link'      => 'Next →',
            'prev_link'      => '← Prev',
            'page_delimiter' => '&page='
        ]);
        $this->pagination->set_theme('bootstrap');
        $this->pagination->initialize($total_rows, $records_per_page, $page, 'users?q='.$q);
        $data['page'] = $this->pagination->paginate();

        $this->call->view('users/index', $data);
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
        $this->call->view('users/create');
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