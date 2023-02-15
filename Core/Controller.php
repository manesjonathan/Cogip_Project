<?php

namespace App\Core;

class Controller
{
    /*
    * @var $view, $data
    * return view
    */
    public function view($view, $data = [])
    {
        extract($data);
        require_once(__ROOT__ . '/Resources/views/' . $view . '.php');
    }

    public function viewAdmin($view, $data = [])
    {
        extract($data);
        require_once(__ROOT__ . '/Resources/views/home.php');

        switch ($view) {
            case 'dashboard':
                require_once(__ROOT__ . '/Resources/views/pages/dashboard.php');
                break;
            case 'invoices':
                require_once(__ROOT__ . '/Resources/views/pages/invoices.php');
                break;

            case 'companies':
                require_once(__ROOT__ . '/Resources/views/pages/companies.php');
                break;

            case 'contacts':
                require_once(__ROOT__ . '/Resources/views/pages/contacts.php');
                break;
        }

    }

    public function viewComponent($view, $data = [])
    {
        extract($data);
        require_once(__ROOT__ . '/Resources/views/shared/header.php');
        require_once(__ROOT__ . '/Resources/views/pages/dashboard.php');
        require_once(__ROOT__ . '/Resources/views/shared/navigation.php');
        require_once(__ROOT__ . '/Resources/views/pages/' . $view . '.php');

    }
}