<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Учет краски ППП</title>
        <link rel="stylesheet" href="/vendor/twbs/bootstrap/dist/css/bootstrap.min.css">
        <script src="/vendor/components/jquery/jquery.min.js"></script>
        <script src="/vendor/twbs/bootstrap/dist/js/bootstrap.min.js"></script>
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
                            <li><a href="/paint/read">Краски</a></li>
                            <li><a href="/consignment/read">Партии</a></li>
                            <li><a href="/place/read">Места хранения</a></li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                            Движения <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a href="/move/to_stock">Прием на склад</a></li>
                            <li><a href="/move/stock_to_workshop">Перемещение в цех</a></li>
                            <li><a href="/move/workshop_to_stock">Возврат на склад</a></li>
                            <li><a href="/move/workshop_to">Расход в цеху</a></li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                            Отчеты <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a href="/report/main">Все движения</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </nav>
        <div class="container">
        <! header end !>