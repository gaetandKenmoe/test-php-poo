<?php

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/PHPClass.php to edit this template
 */

require_once("UserInterface.php");

/**
 * Description of User
 *
 * @author kenmoe
 */
abstract class User implements UserInterface {
    
    private const UNALLOW_EXTENSION = array('jpg', 'jpeg');
    
    
    protected int $userId;
    protected string $firstName = '';
    protected string $lastName = '';
    protected string $email = '';
    protected string $photo = '';
    protected string $type = '';
    
    public function getUserId(): int {
        return $this->userId;
    }

    public function getFirstName(): string {
        return $this->firstName;
    }

    public function getLastName(): string {
        return $this->lastName;
    }

    public function getEmail(): string {
        return $this->email;
    }

    public function getPhoto(): string {
        return is_null($this->photo) ? $this->defaultPhoto() : $this->photo;
    }

    public function setUserId($userId): void {
        $this->userId = $userId;
    }

    public function setFirstName($firstName): void {
        $this->firstName = $firstName;
    }

    public function setLastName($lastName): void {
        $this->lastName = $lastName;
    }

    public function setEmail($email): void {
        $this->email = $email;
    }

    public function setPhoto($photo): void {
        $this->photo = $photo;
    }
    
    private function defaultPhoto() {
        return '/static/img/default.png';
    }
    
    public function getFullName(): string {
        return $this->getFirstName() . ' ' . $this->getLastName();
    }
    
    public function save(): string {
        if (!self::checkEmail($this->email) or !self::checkPhoto($this->photo)) {
            return 'fail';
        }
        
        return 'success';
    }
    
    private static function checkEmail($email): bool {
        return filter_var($email, FILTER_VALIDATE_EMAIL);
    }
    
    private static function checkPhoto($photo): bool {
        $extensions = pathinfo($photo, PATHINFO_EXTENSION);
        return !in_array($extensions, self::UNALLOW_EXTENSION);
    }

}
