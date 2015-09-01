<?php

namespace Controllers;

use Core\Controller;
use Models\MoveModel;

class ReportController extends Controller
{
    public function actionMain()
    {
        $moves = MoveModel::read();

        $this->render('read', ['moves' => $moves]);
    }
}