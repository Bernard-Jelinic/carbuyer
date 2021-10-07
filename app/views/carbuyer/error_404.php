<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?= $data['page_title'] . WEBSITE_TITLE ?></title>
    <link href="<?= ASSETS .THEME ?>css/404.css?v=<?php echo time(); ?>" rel="stylesheet" type="text/css">
   </head>
   <body>
      <div id="error-page">
         <div class="content">
            <h2 class="header">
               404
            </h2>
            <h4>
               Nažalost, ta stranica nije dostupna.
            </h4>
            <p>
               Pokušajte potražiti nešto drugo.
            </p>
               <a href="home">
                <button class="rounded">Početna stranica</button>
               </a>
         </div>
      </div>
   </body>
</html>