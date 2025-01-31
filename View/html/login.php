<?php 

  require_once "../../session.config.php";

  if(isset($_SESSION["user"])){
    header("location: ./index.php");
    die();
  };

  if(isset($_SESSION["login_errors"])){
    $errors = $_SESSION["login_errors"];
    unset($_SESSION["login_errors"]);
  };
?>

<!DOCTYPE html>
<html lang="en" class="relative w-full h-full">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>EchoArticle</title>
  <link rel="stylesheet" href="../css/output.css">
  <script src="../js/main.js" defer></script>
  <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
  <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="relative flex flex-col justify-between w-full h-full">
  
<nav x-data="{ open: false }"  class="flex justify-between w-auto h-auto py-2 bg-white rounded-lg shadow-lg md:h-16">
  <div class="flex justify-between w-full ">
      <div class="flex items-center w-1/2 px-6 text-2xl font-semibold md:w-1/5 md:px-1 md:flex md:items-center md:justify-center"
      x-transition:enter="transition ease-out duration-300" id="nav-bar-logo">
          <a href="./">Echo<span class="text-purple-600">Article</span></a>
      </div>

      <div class="flex-col hidden w-full h-auto md:hidden" id="nav-list-mobile">
        <div class="flex flex-col items-center justify-center gap-2">
          <a href="./" class="duration-75 hover:text-purple-600">Home</a>
          <a href="" class="duration-75 hover:text-purple-600">About Us</a>
          <a href="" class="duration-75 hover:text-purple-600">Contact</a>
        </div>
      </div>
      <div class="items-center hidden w-3/5 font-semibold justify-evenly md:flex">
        <a href="./" class="duration-75 hover:text-purple-600 hover:border-b-2 hover:border-b-purple-600">Home</a>
        <a href="" class="duration-75 hover:text-purple-600 hover:border-b-2 hover:border-b-purple-600">About Us</a>
        <a href="" class="duration-75 hover:text-purple-600 hover:border-b-2 hover:border-b-purple-600">Contact</a>
      </div>
      <button class="relative w-10 h-10 text-gray-500 bg-white focus:outline-none md:hidden " @click="open = !open" onclick="toggleNavList()">
          <span class="sr-only">Open div menu</span>
          <div class="absolute block w-5 transform -translate-x-1/2 -translate-y-1/2 left-1/2 top-1/2">
              <span aria-hidden="true" class="block absolute h-0.5 w-5 bg-current transform transition duration-500 ease-in-out button-line -translate-y-1.5"></span>
              <span aria-hidden="true" class="block absolute  h-0.5 w-5 bg-current   transform transition duration-500 ease-in-out button-line"></span>
              <span aria-hidden="true" class="block absolute  h-0.5 w-5 bg-current transform  transition duration-500 ease-in-out button-line translate-y-1.5"></span>
          </div>
      </button>
  </div>

</nav>

<div class="z-50 flex items-center justify-center w-full h-full mx-auto text-white bg-gray-800" id="login-form">
  <form method="post" action="../../routes/login.php" class="flex w-[30rem] flex-col space-y-10">
    <div class="text-4xl font-medium text-center">Log In</div>
    <div class="w-full text-lg duration-300 transform bg-transparent border-b-2 focus-within:border-purple-500">
      <input type="text"
        name="input"
        placeholder="Username or Email:"
        class="w-full bg-transparent border-none outline-none placeholder:italic focus:outline-none" required/>
    </div>

    <div class="w-full text-lg duration-300 transform bg-transparent border-b-2 focus-within:border-purple-500">
      <input type="password"
        name="pswrd"
        placeholder="Password:"
        class="w-full bg-transparent border-none outline-none placeholder:italic focus:outline-none" required/>
    </div>

    <button type="submit" class="py-2 font-bold duration-300 transform bg-purple-600 rounded-sm hover:bg-purple-400">
      LOG IN
    </button>

    <ul>
      <?php if (isset($errors)):
          foreach ($errors as $error): ?>
            <li class="my-2 text-lg text-red-600">
              * <?= $error ?>
            </li>
          <?php endforeach;
        endif;?>
    </ul>

    <p class="text-lg text-center">
      No account?
      <a href="./signup.php" class="font-medium text-purple-500 underline-offset-4 hover:underline">
        Create One
      </a>
    </p>
  </form>
</div>

<footer class="w-full p-4 mb-0 text-lg text-gray-200 bg-purple-800">
  <div class="text-center">
    <p>
      Copyright © 2022 - <a class="font-semibold" href="https://Ammargoher369@gmail.com">Ammar Goher</a>
    </p>
  </div>
</footer>

</body>
</html>