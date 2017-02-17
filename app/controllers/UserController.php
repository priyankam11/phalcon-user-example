<?php

use Phalcon\Mvc\Controller;
use Phalcon\Flash\Session as Flash;
$di->set('flash', function () {
    return new Flash(array(
        'error'   => ' alert-danger',
        'success' => ' alert-success',
    ));
});
class UserController extends Controller
{
	
    public function indexAction()
    {
    }

    /**
    * It helps insertion of new user to the database
    * @param none
    * @return void
    * @access public
    */
    public function addAction()
    {
        if($this->request->isPost())
        {
            $user = new Users();
            if(count($user->validation())==0)
            {
                $user->first_name = $this->request->getPost('first_name');
                $user->last_name = $this->request->getPost('last_name');
                $user->email = $this->request->getPost('email');
                $user->gender = $this->request->getPost('gender');
                $user->education = $this->request->getPost('education');
                $user->skill = $this->request->getPost('skills');
                if($user->check_email($user->email)===false)
                {
                    if($user->save())
                        $this->flashSession->success('User successfully created');
                    else
                        $this->flashSession->error('Error in adding user');
                }
                else
                {
                    $this->flashSession->error('Email already exists');
                }
            }
            else
            {
                foreach($user->validation() as $message)
                {
                    $this->flashSession->error($message);
                }
            }
            $this->view->disable();
            $this->response->redirect('user');
        }
       
    }
    public function showAction()
    {
        $user = new Users();
        $this->view->user_data = $user->find();
    }

}