<?php
declare(strict_types=1);

namespace App\Domain\Message;

class Message extends \Illuminate\Database\Eloquent\Model
{
    /**
     * @var int|null
     */
    private $id;

    /**
     * @var int|null
     */
    private $id_user;

    /** 
    * @var string|null
    */
    private $messages;

    /**
     * @param int|null  $id
     * @param int|null $id_user
     * @param string    $messages
     */
    public function __construct(?int $id, string $username, string $firstName, string $lastName)
    {
        $this->id = $id;
        $this->id_user= $id_user;
        $this->$messages = ucfirst($messages);
    }

    /**
     * @return int|null
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return int|null
     */
    public function getId_user(): ?int
    {
        return $this->id_user;
    }

    /**
     * @return string
     */
    public function getMessages(): string
    {
        return $this->messages;
    }

    /**
     * @return array
     */
    public function jsonSerialize()
    {
        return [
            'id' => $this->id,
            'id_user' => $this->id_user,
            'messages' => $this->messages,
        ];
    }
}