<?php

class todolist
{
    private string $todo;

    public function __construct(string $todo = ""){
        $this -> todo = $todo;
    }
    public function getTodo() : string{
        return $this -> todo;
    }

    public function setTodo() : string{
        return $this -> todo;
    }


}