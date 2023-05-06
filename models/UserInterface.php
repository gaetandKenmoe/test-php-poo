<?php

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/PHPInterface.php to edit this template
 */

/**
 *
 * @author kenmoe
 */
interface UserInterface {
    
    public function getUserId();

    public function getFirstName();

    public function getLastName();

    public function getEmail();

    public function getPhoto();

    public function setUserId($userId);

    public function setFirstName($firstName);

    public function setLastName($lastName);

    public function setEmail($email);

    public function setPhoto($photo);
        
    public function getFullName();
    
    public function save();
}
