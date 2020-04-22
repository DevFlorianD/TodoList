<?php

class User
{
    private $email;
    private $firstName;
    private $lastName;
    private $age;
    private $password;
    private $todoList;

    public function __construct($email, $firstName, $lastName, $age, $password)
    {
        $this->email = $email;
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->age = $age;
        $this->password = $password;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function getFirstName()
    {
        return $this->firstName;
    }

    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;
    }

    public function getLastName()
    {
        return $this->lastName;
    }

    public function setLastName($lastName)
    {
        $this->lastName = $lastName;
    }

    public function getAge()
    {
        return $this->age;
    }

    public function setAge($age)
    {
        $this->age = $age;
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function setPassword($password)
    {
        $this->password = $password;
    }

    function getTodoList(){
        return $this->todoList;
    }

    public function setTodoList($todoList)
    {
        $this->todoList = $todoList;
    }

    private function isValidEmail()
    {
        return (!preg_match("/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix", $this->email)) ? FALSE : TRUE;
    }

    private function isValidAge()
    {

        if ($this->age < 13)
            return false;

        return true;
    }

    private function isNotEmpty($str)
    {
        if (strlen($str) <= 0)
            return false;

        return true;
    }

    private function isPasswordValid()
    {
        if (strlen($this->password) < 8 || strlen($this->password) > 40) {
            return false;
        }
        return true;
    }

    public function isValid()
    {
        if ($this->isValidAge() &&
            $this->isValidEmail() &&
            $this->isNotEmpty($this->lastName) &&
            $this->isNotEmpty($this->firstName) &&
            $this->isPasswordValid()
        ) {
            return true;
        }
        return false;
    }

    public function addTodolist ($todoList){
        if (empty($this->todoList)){
            $this->todoList[] = $todoList;
        }else {
            throw new \Exception('Only one TodoList is allowed per user');
        }
    }

    public function addItem($item){
        if ($this->todoList){
            $this->todoList = $item;
        }else {
            throw new \Exception ('No TodoList for this user');
        }
    }

    public function isValidToSendEmail() {
        if ($this->age < 18)
            return false;

        return true;
    }
}