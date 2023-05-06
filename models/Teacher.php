<?php

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/PHPClass.php to edit this template
 */

require_once("User.php");

/**
 * Description of Teacher
 *
 * @author kenmoe
 */
class Teacher extends User {
    
    protected string $salutation = '';
    
    public function getSalutation(): string {
        return $this->salutation;
    }

    public function setSalutation($salutation): void {
        $this->salutation = $salutation;
    }

    public function getFullName(): string {
        return $this->getSalutation() . ' ' . parent::getFullName();
    }
}
