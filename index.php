<?php

/* 
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHP.php to edit this template
 */

require_once("models/Teacher.php");
require_once("models/Parents.php");
require_once("models/Student.php");
require_once("models/Message.php");

$teacher1 = new Teacher();
$teacher1->setUserId(1);
$teacher1->setFirstName("Apollon");
$teacher1->setLastName("Donald");
$teacher1->setEmail("apollon@gmail.com");
$teacher1->setSalutation("M.");

$teacher2 = new Teacher();
$teacher2->setUserId(2);
$teacher2->setFirstName("Dieunang");
$teacher2->setLastName("Martin");
$teacher2->setEmail("dieunang@gmail.com");
$teacher2->setSalutation("Doc.");

$parent = new Parents();
$parent->setUserId(1);
$parent->setFirstName("Djeumen");
$parent->setLastName("Willy");
$parent->setEmail("djeumen@yahoo.com");
$parent->setSalutation("Mme");

$student1 = new Student();
$student1->setUserId(1);
$student1->setFirstName("Kenmoe");
$student1->setLastName("Gaetand");
$student1->setEmail("kenmoe@gmail.com");

$student2 = new Student();
$student2->setUserId(1);
$student2->setFirstName("Abega");
$student2->setLastName("Christophe");
$student2->setEmail("kenmoegmail.com");

print_r("Full name of teacher 1: " . $teacher1->getFullName());
print_r("\n");
print_r("Full name of student1: " . $student1->getFullName());
print_r("\n");

print_r("Saving of student 1: " . $student1->save());
print_r("\n");
print_r("Saving of student 2: " . $student2->save());
print_r("\n");


$message1 = new Message();
$message1->setCreationTime(1680099171);
$message1->setMessage("Your message");
$message1->setMessageType("System");
$message1->setSender($student1);
$message1->setReceiver($teacher1);

print_r("Date of message: " . $message1->formattedDate());
print_r("\n");

print_r("Saving of message: " . $message1->save());
print_r("\n");

$message1->setMessageType("Manual");
$message1->setSender($student1);
$message1->setReceiver($teacher1);
print_r("Saving of message: " . $message1->save());
print_r("\n");

$message1->setMessageType("Manual");
$message1->setSender($student1);
$message1->setReceiver($parent);
print_r("Saving of message: " . $message1->save());
print_r("\n");


$message1->setMessageType("System");
$message1->setSender($teacher1);
$message1->setReceiver($teacher2);
print_r("Saving of message: " . $message1->save());
print_r("\n");
