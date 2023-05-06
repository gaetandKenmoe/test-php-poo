<?php

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/PHPClass.php to edit this template
 */

require_once("User.php");
require_once("Teacher.php");
require_once("Parents.php");
require_once("Student.php");

/**
 * Description of Message
 *
 * @author kenmoe
 */
class Message {
    
    const MESSAGE_TYPE = array('System', 'Manual');


    protected User $sender;
    protected User $receiver;
    protected string $message;
    protected int $creationTime;
    protected string $messageType;
    
    public function getSender(): User {
        return $this->sender;
    }

    public function getReceiver(): User {
        return $this->receiver;
    }

    public function getMessage(): string {
        return $this->message;
    }

    public function getCreationTime(): int {
        return $this->creationTime;
    }

    public function getMessageType(): string {
        return $this->messageType;
    }

    public function setSender(User $sender): void {
        $this->sender = $sender;
    }

    public function setReceiver($receiver): void {
        $this->receiver = $receiver;
    }

    public function setMessage($message): void {
        $this->message = $message;
    }

    public function setCreationTime($creationTime): void {
        $this->creationTime = $creationTime;
    }

    public function setMessageType($messageType): void {
        $this->messageType = $messageType;
    }

    public function getSenderFullName(): string {
        return $this->getSender()->getFullName();
    }

    public function getReceiverFullName(): string {
        return $this->getReceiver()->getFullName();
    }
    
    public function formattedDate(): string {
        return gmdate("Y-m-d H:i:s", $this->creationTime);
    }
    
    public function save(): string {
        // check if the sender of system message is only teacher
        if ($this->getMessageType() == 'System') {
            if (get_class($this->getSender()) != 'Teacher') {
                return 'fail: Only Teacher can send system message';
            }
        }
        // check if parent and user only send message to teacher
        if (in_array(get_class($this->getSender()), array('Parents', 'Student'))) {
            if (get_class($this->getReceiver()) != 'Teacher') {
                return 'fail: You are not allow to send message to this user';
            }
        }
        // check if message type is known
        if (!in_array($this->getMessageType(), self::MESSAGE_TYPE)) {
            return 'fail: Message type unknown';
        }
        return 'success';
    }
    
}
