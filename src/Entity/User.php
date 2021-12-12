<?php

/**
 * @file
 *
 * Some descr for sniffer
 *
 * Some descr
 *
 * @category PHP
 * @package  PHP_RestApi
 * @author   mashka krasnova <mashka@example.com>
 * @license  https://github.com/licence.txt BSD Licence
 * @link     https://github.com/MaryRybalka/restClient
 *
 * @ORM\Entity(repositoryClass=UserRepository::class)
 */

/**
 * Extra comments
 */

namespace App\Entity;

use App\Repository\UserRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Exception;

/**
 * Template Class Doc Comment
 *
 * Template Class
 *
 * @category User
 * @package  App\Entity
 * @author   Author <author@domain.com>
 * @license  https://opensource.org/licenses/MIT MIT License
 * @link     https://github.com/MaryRybalka/restClient
 */
class User
{
    /**
     * Just an id
     *
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $_id;

    /**
     * Just an email
     *
     * @ORM\Column(type="string", length=100)
     */
    private $_email;

    /**
     * Just a password
     *
     * @ORM\Column(type="string", length=200)
     */
    private $_password;

    /**
     * Just a todolist
     *
     * @ORM\OneToMany(targetEntity=ToDo::class, mappedBy="author",
     *     orphanRemoval=true)
     */
    private $_todo_list;

    /**
     * Just a constr
     *
     * @return void
     */
    public function __construct()
    {
        $this->_todo_list = new ArrayCollection();
    }

    /**
     * Just a get
     *
     * @return int
     */
    public function getId(): ?int
    {
        return $this->_id;
    }

    /**
     * Just a getemail
     *
     * @return string
     */
    public function getEmail(): ?string
    {
        return $this->_email;
    }

    /**
     * Just a setemail
     *
     * @param string $_email bla-bla
     *
     * @return self
     */
    public function setEmail(string $_email): self
    {
        $this->_email = $_email;

        return $this;
    }

    /**
     * Just a getpas
     *
     * @return string
     */
    public function getPassword(): ?string
    {
        return $this->_password;
    }

    /**
     * Just a setpass
     *
     * @param string $_password bla-bla
     *
     * @return self
     */
    public function setPassword(string $_password): self
    {
        $this->_password = $_password;

        return $this;
    }

    /**
     * Just a getTodoList
     *
     * @return Collection|ToDo[]
     */
    public function getTodoList(): Collection
    {
        return $this->_todo_list;
    }

    /**
     * Just a getTodoList
     *
     * @param ToDo $todoList bla-bla
     *
     * @return self
     */
    public function addTodoList(ToDo $todoList): self
    {
        if (!$this->_todo_list->contains($todoList)) {
            $this->_todo_list[] = $todoList;
            $todoList->setAuthor($this);
        }

        return $this;
    }

    /**
     * Just a getTodoList
     *
     * @param ToDo $todoList bla-bla
     *
     * @return self
     */
    public function removeTodoList(ToDo $todoList): self
    {
        if ($this->_todo_list->removeElement($todoList)) {
            // set the owning side to null (unless already changed)
            if ($todoList->getAuthor() === $this) {
                $todoList->setAuthor(null);
            }
        }

        return $this;
    }

    /**
     * Specify data which should be serialized to JSON
     *
     * @link   https://php.net/manual/en/jsonserializable.jsonserialize.php
     * @return mixed data which can be serialized by <b>json_encode</b>,
     * which is a value of any type other than a resource.
     * @since  5.4.0
     */
    public function jsonSerialize()
    {
        return [
            "id" => $this->getid(),
            "email" => $this->getEmail(),
            "password" => $this->getPassword()
        ];
    }
}
