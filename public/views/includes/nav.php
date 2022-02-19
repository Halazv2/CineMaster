<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="/public/assets/style/home.css">
    <link rel="stylesheet" href="/public/assets/style/nav.css">
    <link rel="stylesheet" href="/public/assets/style/whatsNew.css">
    <link rel="stylesheet" href="/public/assets/style/profile.css">

    <title>CenéMaster | Home</title>
</head>

<body>
    <nav class="navbar">
        <!-- LOGO -->
        <div class="logo"><img src="/public/Assets/img/LOGO-F.png" alt=""></div>
        <!-- NAVIGATION MENU -->
        <ul class="nav-links">
            <!-- USING CHECKBOX HACK -->
            <input type="checkbox" id="checkbox_toggle" />
            <label for="checkbox_toggle" class="hamburger">&#9776;</label>
            <!-- NAVIGATION MENUS -->
            <div class="menu">
                <li><a href="./home.php">Home</a></li>
                <li><a href="./profile.php">Profile</a></li>
                <a href="login.php"> <button class="logout-btn"> Log out</button></a>
            </div>
        </ul>
    </nav>