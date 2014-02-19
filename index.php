<?php

/**
 * Project: Guestbook Sample Smarty Application
 * Author: Monte Ohrt <monte [AT] ohrt [DOT] com>
 * File: index.php
 * Version: 1.1
 */

// define our application directory
define('GUESTBOOK_DIR', '/home/ricblt/workspace/guestbook/');
// define smarty lib directory
define('SMARTY_DIR', '/home/ricblt/workspace/guestbook/Smarty-3.1.16/libs/');
// include the setup script
include(GUESTBOOK_DIR . 'libs/guestbook_setup.php');

// create guestbook object
$guestbook = new Guestbook;

// set the current action
$_action = isset($_REQUEST['action']) ? $_REQUEST['action'] : 'view';

switch($_action) {
    case 'add':
        // adding a guestbook entry
        $guestbook->displayForm();
        break;
    case 'submit':
        // submitting a guestbook entry
        $guestbook->mungeFormData($_POST);
        if($guestbook->isValidForm($_POST)) {
            $guestbook->addEntry($_POST);
            $guestbook->displayBook($guestbook->getEntries());
        } else {
            $guestbook->displayForm($_POST);
        }
        break;
    case 'view':
    default:
        if(!isset($_SESSION['id']) || $_SESSION['id']== 0){
             $guestbook->displayLoginForm();
        }else{
            $guestbook->logout();
            $guestbook->displayLogoutForm();
        }
        // viewing the guestbook
        $guestbook->displayBook($guestbook->getEntries());
        break;
    case 'loginSubmit':
        $guestbook->mungeLoginFormData($_POST);
        if($guestbook->isValidLoginForm($_POST)) {
            $guestbook->login($_POST);
            $guestbook->displayLoginForm($_POST);
        }else{
            $guestbook->displayLoginForm($_POST);
        }
        break;
    case 'reg':
        if(!isset($_SESSION['id']) || $_SESSION['id']== 0){
            $guestbook->registration($_POST);
            $guestbook->displayRegForm();
        }
        break;
}
