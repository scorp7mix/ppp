<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Учет краски ППП</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    </head>
    <body>
        <nav class="navbar navbar-default navbar-static-top">
            <div class="container">
                <ul class="nav navbar-nav">
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                            Объекты <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a href="index.php?c=paint&a=index">Краски</a></li>
                            <li><a href="index.php?c=consignment&a=index">Партии</a></li>
                            <li><a href="index.php?c=place&a=index">Места хранения</a></li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                            Движения <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a href="index.php?c=move&a=to_stock">Прием на склад</a></li>
                            <li><a href="index.php?c=move&a=stock_to_workshop">Перемещение в цех</a></li>
                            <li><a href="index.php?c=move&a=workshop_to_stock">Возврат на склад</a></li>
                            <li><a href="index.php?c=move&a=workshop_to">Расход в цеху</a></li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                            Отчеты <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a href="index.php?c=report&a=main">Все движения</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </nav>
        <div class="container">
        <! header end !>