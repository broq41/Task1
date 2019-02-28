<?php

namespace App\Controller;

use App\Repository\NewsRepository;
use App\Repository\UserRepository;

class UserController extends BaseController
{

    /** @var UserRepository $userRepository */
    private $userRepository;

    public function __construct()
    {
        $this->userRepository = new UserRepository();
    }

    public function login()
    {
        if (isset($_SESSION['email'])) {

        $this->redirect('index.php?page=news&action=index');

        }

        if (!empty($_POST['email'])) {

            $email = strip_tags($_POST['email']);
            $pswrd = strip_tags($_POST['password']);

            $user = $this->userRepository->findByEmail($email);

            if (!empty($user['password'])) {

                $this->checkPswrdMatch($user['password'], md5($pswrd), 'Nieprawidłowe hasło', 'User/login');

            }else{
                $GLOBALS['no_user_error'] = "Nie ma użytkownika o podanym adresie e-mail";

                $this->render('User/login');
            }

            $GLOBALS['no_user_error'] = null;
            $_SESSION['email'] = $email;

            $this->redirect('index.php?page=news&action=index');
        }

        $this->render('User/login');

    }

    public function register()
    {

        if (!empty($_POST['email'])) {

            foreach ($_POST as $key => $value) {

                $data[$key] = strip_tags($value);
            }

            $this->checkPswrdMatch($data['password_1'], $data['password_2'], 'Hasła nie pasują do siebie', 'User/register');
            $this->checkEmailUnique($data['email']);

            $data['password'] = md5($data['password_1']);

            unset($data['password_1']);
            unset($data['password_2']);

            $this->userRepository->save($data, 'users');

            $_SESSION['email'] = $data['email'];

            $this->redirect('index.php?page=news&action=index');
        }


        $this->render('User/register');
    }

    public function logout(){

        session_destroy();
        unset($_SESSION['username']);

        $this->redirect('index.php?page=user&action=login');

    }

    private function checkPswrdMatch($pswrd1, $pswrd2, $message, $folder)
    {

        if ($pswrd1 !== $pswrd2) {

            $GLOBALS['pswrd_mismatch_error'] = $message;
            $this->render($folder);

        } else {

            $GLOBALS['pswrd_mismatch_error'] = null;
        }
    }

    private function checkEmailUnique($email)
    {

        $user = $this->userRepository->findByEmail($email);

        if (!empty($user)) {

            $GLOBALS['repeated_mail_error'] = "Użytkownik o danym e-mail istnieje już w serwisie";

            $this->render('User/register');

        } else {

            $GLOBALS['repeated_mail_error'] = null;
        }
    }

}