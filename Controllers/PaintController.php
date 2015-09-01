<?php

namespace Controllers;

use Core\Controller;
use Models\PaintModel;

class PaintController extends Controller
{
    public function actionRead()
    {
        $paints = PaintModel::read();

        $this->render('read', ['paints' => $paints]);
    }

    public function actionCreate()
    {
        if (
            isset($_POST['name'])
        ) {
            $paint = new PaintModel();

            $paint->name = $_POST['name'];
            $paint->create();

            header('Location: /paint/read');
        }

        $this->render('create');
    }

    public function actionUpdate($id)
    {
        $paint = PaintModel::readById($id);

        if (
            isset($_POST['name'])
        ) {
            $paint->name = $_POST['name'];
            $paint->update();

            header('Location: /paint/read');
        }

        $this->render('update', ['paint' => $paint->data]);
    }

    public function actionDelete($id)
    {
        $paint = PaintModel::readById($id);

        $paint->delete();

        header('Location: /paint/read');
    }
}