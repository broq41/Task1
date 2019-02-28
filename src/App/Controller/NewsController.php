<?php

namespace App\Controller;

use App\Repository\NewsRepository;
use App\Repository\UserRepository;

class NewsController extends BaseController
{

    /** @var NewsRepository $userRepository */
    private $newsRepository;
    /** @var UserRepository $userRepository */
    private $userRepository;


    public function __construct()
    {
        $this->newsRepository = new NewsRepository();
        $this->userRepository = new UserRepository();
    }

    public function create()
    {
        if (!empty($_POST['name'])) {

            foreach ($_POST as $key => $value) {

                $data[$key] = strip_tags($value);
            }

            if (!empty($_SESSION['email'])) {

                $user = $this->userRepository->findByEmail($_SESSION['email']);

                if (!empty($user['id'])) {
                    $data['author_id'] = $user['id'];
                }
            }

            if (!empty($data['is_active'])) {
                $data['is_active'] = 1;
            } else {
                $data['is_active'] = 0;
            }

            $this->newsRepository->save($data, 'news');

            $this->redirect('index.php?page=news&action=index');
        }

        $this->render('News/new');
    }

    public function edit($id)
    {

        if (!empty($_POST['name'])) {

            foreach ($_POST as $key => $value) {

                $data[$key] = strip_tags($value);
            }

            if (!empty($_SESSION['email'])) {

                $user = $this->userRepository->findByEmail($_SESSION['email']);

                if (!empty($user['id'])) {
                    $data['author_id'] = $user['id'];
                }
            }

            if (!empty($data['is_active'])) {
                $data['is_active'] = 1;
            } else {
                $data['is_active'] = 0;
            }

            $this->newsRepository->update($data, 'news', $id);

            $this->redirect('index.php?page=news&action=index');
        }
        $news = $this->newsRepository->find($id);


        $this->render('News/edit', ['news' => $news]);


    }


    public function remove($id)
    {

        if (!empty($id)) {

            $id = strip_tags($id);

            $this->newsRepository->remove($id, 'news');

            $this->redirect('index.php?page=news&action=index');
        }
    }

    public function index()
    {

        $news = $this->newsRepository->findAll();


        $this->render('News/index', ['news' => $news]);
    }

}