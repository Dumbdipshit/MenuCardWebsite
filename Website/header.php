<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>header</title>
    <link rel="stylesheet" href="css/main.css">
</head>
<body>
    <header>
        <div class="header-row-container">
            <a onlcick="DropDownMenu()" class="menu-button">menu button</a>   
            <h1 class="header-logo">Logo or Name</h1>
            <div class="header-misc-button">
                <a class="menu-button">log in</a> 
                <a class="menu-button">shopping cart</a> 
            </div>
        </div>  

        <div id="dropdownpage" class="drop-down-page">
            <div class="page-options-container">
                <div class="page">menu</div>
                <div class="page">shopping cart</div>
                <div class="page">socials</div>
            </div>
        </div>
    </header>

    <script src="script/functions.js"></script>
</body>
</html>