<?php
session_start();
/**
 * Project: Guestbook Sample Smarty Application
 * Author: Monte Ohrt <monte [AT] ohrt [DOT] com>
 * File: guestbook.lib.php
 * Version: 1.1
 */

/**
 * guestbook application library
 *
 */
class Guestbook
{
    /**
     * @var GuestbookData
     */
    var $data = null;
    // smarty template object
    var $tpl = null;
    // error messages
    var $error = null;


    /**
     * class constructor
     */
    function __construct($data)
    {
        // instantiate the template object
        $this->data = $data;
        $this->tpl = new Guestbook_Smarty;
    }

    /**
     * display the guestbook entry form
     *
     * @param array $formvars the form variables
     */
    function displayForm($formvars = array())
    {
        if (!isset($formvars['Name'])) {
            $formvars['Name'] = '';
        }
        if (!isset($formvars['Comment'])) {
            $formvars['Comment'] = '';
        }
        // assign the form vars
        $this->tpl->assign('post', $formvars);
        // assign error message
        $this->tpl->assign('error', $this->error);
        $this->tpl->display('guestbook_form.tpl');

    }

    /**
     * display the registration form
     *
     * @param array $formvars the form variables
     */
    function displayRegForm($formvars = array())
    {
        if (!isset($formvars['Name'])) {
            $formvars['Name'] = '';
        }
        if (!isset($formvars['LastName'])) {
            $formvars['LastName'] = '';
        }
        if (!isset($formvars['Email'])) {
            $formvars['Email'] = '';
        }
        if (!isset($formvars['Password'])) {
            $formvars['Password'] = '';
        }
        // assign the form vars
        $this->tpl->assign('post', $formvars);
        // assign error message
        $this->tpl->assign('error', $this->error);
        $this->tpl->display('reg_form.tpl');
    }

    /**
     * add a new user
     *
     * @param array $formvars the form variables
     */
    function registration($formvars)
    {
        if (isset($formvars['Name']) && isset($formvars['LastName']) && isset($formvars['Email']) && isset($formvars['Password'])) {
            try {
                $this->data->addNewUser($formvars);
                header('Location: http://localhost/');
            } catch (PDOException $e) {
                echo "Error!: " . $e->getMessage();
            }
        }
    }

    /**
     * display the registration form
     *
     * @param array $formvars the form variables
     */
    function displayLoginForm($formvars = array())
    {
        if (!isset($formvars['Name'])) {
            $formvars['Name'] = '';
        }
        if (!isset($formvars['Password'])) {
            $formvars['Password'] = '';
        }
        // assign the form vars
        $this->tpl->assign('post', $formvars);
        // assign error message
        $this->tpl->assign('error', $this->error);
        $this->tpl->display('login_form.tpl');
    }

    /**
     * display logout button
     *
     * @param array $formvars the form variables
     */
    function displayLogoutForm()
    {
        $this->tpl->display('logout.tpl');
    }

    /**
     * logout action
     */
    function logout()
    {
        if (isset($_POST['logout'])) {
            $_SESSION['id'] = 0;
            header('Location: http://localhost/');
        }
    }

    /**
     * login action
     *
     * @param array $formvars the form variables
     */
    function login($formvars)
    {
        if (isset($formvars['Name']) && isset($formvars['Password'])) {
            $result = $this->data->findUser($formvars['Name'], $formvars['Password']);
            if ($result != null) {
                $_SESSION['id'] = $result['id'];
                header('Location: http://localhost/');
            }
        }
    }

    /**
     * fix up form data if necessary
     *
     * @param array $formvars the form variables
     */
    function mungeFormData(&$formvars)
    {
        // trim off excess whitespace
        $formvars['Comment'] = trim($formvars['Comment']);
    }

    /**
     * fix up form data if necessary
     *
     * @param array $formvars the form variables
     */
    function mungeLoginFormData(&$formvars)
    {
        // trim off excess whitespace
        $formvars['Name'] = trim($formvars['Name']);
    }

    /**
     * fix up form data if necessary
     *
     * @param array $formvars the form variables
     */
    function mungeRegFormData(&$formvars)
    {
        // trim off excess whitespace
        $formvars['Name'] = trim($formvars['Name']);
        $formvars['LastName'] = trim($formvars['LastName']);
        $formvars['Email'] = trim($formvars['Email']);
    }

    /**
     * test if form information is valid
     *
     * @param array $formvars the form variables
     */
    function isValidRegForm($formvars)
    {
        // reset error message
        $this->error = null;
        // test if "Name" is empty
        if (strlen($formvars['Name']) == 0) {
            $this->error = 'name_empty';
            return false;
        }
        // test if "LastName" is empty
        if (strlen($formvars['LastName']) == 0) {
            $this->error = 'last_name_empty';
            return false;
        }
        // test if "Email" is empty
        if (strlen($formvars['Email']) == 0) {
            $this->error = 'email_empty';
            return false;
        }
        // test if "Password" is empty
        if (strlen($formvars['Password']) == 0) {
            $this->error = 'password_empty';
            return false;
        }
        if ($this->data->isUserEmailExists($formvars['Email'])) {
            $this->error = 'email_exist';
            return false;
        }
        // form passed validation
        return true;
    }

    /**
     * test if form information is valid
     *
     * @param array $formvars the form variables
     */
    function isValidLoginForm($formvars)
    {
        // reset error message
        $this->error = null;
        // test if "Name" is empty
        if (strlen($formvars['Name']) == 0) {
            $this->error = 'name_empty';
            return false;
        }
        // test if "Comment" is empty
        if (strlen($formvars['Password']) == 0) {
            $this->error = 'password_empty';
            return false;
        }
        $result = $this->data->isUserExists($formvars['Name'], $formvars['Password']);
        if (!$result) {
            $this->error = 'incorrect_fields';
            return false;
        }
        // form passed validation
        return true;
    }

    /**
     * test if form information is valid
     *
     * @param array $formvars the form variables
     */
    function isValidForm($formvars)
    {
        // reset error message
        $this->error = null;
        // test if "Comment" is empty
        if (strlen($formvars['Comment']) == 0) {
            $this->error = 'comment_empty';
            return false;
        }
        // form passed validation
        return true;
    }

    /**
     * add a new guestbook entry
     *
     * @param array $formvars the form variables
     */
    function addEntry($formvars)
    {
        $Name = $this->data->findUserNameById($_SESSION['id']);
        $entry = array(
            'Name' => $Name,
            'Comment' => $formvars['Comment']
        );
        if ($this->data->addNewEntry($entry)) {
            header('Location: http://localhost/');
        } else {
            echo "failed";
        }
    }


    /**
     * get the guestbook entries
     */
    function getEntries()
    {
        return $this->data->findAllEntries();
    }

    /**
     * display the guestbook
     *
     * @param array $data the guestbook data
     */
    function displayBook($data = array())
    {
        $this->tpl->assign('logedIn', $_SESSION['id']);
        $this->tpl->assign('data', $data);
        $this->tpl->display('guestbook.tpl');
    }
}
