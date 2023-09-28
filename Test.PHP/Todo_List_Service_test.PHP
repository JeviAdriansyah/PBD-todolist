<?php

require_once __DIR__ . "/../Entity/Todolist.php";
require_once __DIR__ . "/../Repository/TodolistRepository.php";
require_once  __DIR__ . "/../Config/Database.php";

use Entity\Todolist;
use Service\TodolistServiceImpl;

function testShowTodolist(): void
{
   $todolistRepository = new \Repository\TodolistRepository();
   $todolistRepository->todolist[1] = new Todolist("Belajar PHP");
   $todolistRepository->todolist[2] = new Todolist("Belajar PHP OOP");
   $todolistRepository->todolist[3] = new Todolist("Belajar PHP Database");

   $todolistService = new TodolistServiceImpl($todolistRepository);

   $todolistService->showTodolist();
}

function testAddTodolist(): void
{
 $connection = \Config\database::getConnection();
 $todolistRepository = new \Repository\TodolistRepositoryimpl($connection);

 $todolistService = new TodolistServiceImpl($todolistRepository);
 $todolistService->addTodolist("Belajar PHP");
 $todolistService->addTodolist("Belajar PHP OOP");
 $todolistService->addTodolist("Belajar PHP Database");

 //$todolistService->showTodolist();
}

function testRemoveTodolist(): void
{
  $todolistRepository = new \Repository\TodolistRepositoryImpl();

  $todolistService = new TodolistServiceImpl($todolistRepository);
  $todolistService->addTodolist("Belajar PHP");
  $todolistService->addTodolist("Belajar PHP OOP");
  $todolistService->addTodolist("Belajar PHP Database");

  $todolistService->showTodolist();

  $todolistService->removeTodolist(1);
  $todolistService->showTodolist();

  $todolistService->removeTodolist(4);
  $todolistService->showTodolist();

  $todolistService->removeTodolist(2);
  $todolistService->showTodolist();

  $todolistService->removeTodoList(1);
  $todolistService->showTodolist();
}

testAddTodolist();

