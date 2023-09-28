<?php

namespace Repository{

    interface TodolistRepository
    {
        function save(Todolist $todolist): void;
        function remove(Int $number): bool;
        function findAll(): Array;
    }

    class Todo_List_Repository implements TodolistRepository {

        public array  $todolist = array();

        private \PDO $connection;

        public function __construction(\PDO $connection)
        {
            $this->connection = $connection;
        }

        function save(Todolist $todolist): void
        {
            //$number = sizeof($this->todolist) + 1;
            // $this->todolist[$number] = $todolist;

            $sql = "INSERT INTO todolist(todo) VALEUS (?)";
            $statment = $this->connection->prepare($sql);
            $statment->execute([$todolist->getTodo()]);
        }

        function remove(int $number): bool
        {
            if ($number > sizeof($this->todolist)){
                return false;
            }

            for ($i = $number; $i < sizeof($this->todolist
            ); $i++){
                $this->todolist[$i] = $this->todolist[$i + 1];
            }

            unset($this->todolist[sizeof($this->todolist)]);

            return true;

            $sql = "SELECT id FROM todolist WHERE id = ? ";
            $statement = $this->connection->prepare($sql);
            $statement->execute([$number]);

            if($statement-> fetch()){
                // todolist ada
                $sql = "DELETE FROM todolist WHERE id = ? ";
                $statement = $this->connection->prepare($sql);
                $statement->execute([$number]);
                return true;

            }else{
                // todolist tidak ada
                return false;
            }
        }
        function findAll(): Array
        {
            //return $this->todolist;
            $sql = "SELECT id, todo FROM todolist";
            $statement=$this->connection->prepare($sql);
            $statement->execute();

            $result = [];

            foreach ($statement as $row){
                $todolist = new TodoList();
                $todolist->setId($row['id']);
                $todolist->setTodo($row['todo']);

                 $result[] = $todolist;
            }

            return $result;
        }
    }

}
