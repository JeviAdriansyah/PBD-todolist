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
  $connection = \Config\Database::getConnection();
  $todolistRepository = new \Repository\TodolistRepositoryImpl($connection);

  $todolistService = new TodolistServiceImpl($todolistRepository);

  echo $todolistRepository->testRemoveTodolist(5) . PHP_EDL;
  echo $todolistRepository->testRemoveTodolist(4) . PHP_EDL;
  echo $todolistRepository->testRemoveTodolist(3) . PHP_EDL;
  echo $todolistRepository->testRemoveTodolist(2) . PHP_EDL;
  echo $todolistRepository->testRemoveTodolist(1) . PHP_EDL;
  }
testAddTodolist();

