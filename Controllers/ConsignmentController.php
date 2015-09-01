<?php

namespace Controllers;

use Core\Controller;
use Models\ConsignmentModel;
use Models\PaintModel;

class ConsignmentController extends Controller
{
    public function actionRead()
    {
        $consignments = ConsignmentModel::read();

        $this->render('read', ['consignments' => $consignments]);
    }

    public function actionCreate()
    {
        $paints = PaintModel::read();

        if (
            isset($_POST['name']) &&
            isset($_POST['id_paint']) &&
            isset($_POST['date_of_end'])
        ) {
            $consignment = new ConsignmentModel();

            $consignment->name = $_POST['name'];
            $consignment->id_paint = $_POST['id_paint'];
            $consignment->date_of_end = $_POST['date_of_end'];
            $consignment->create();

            header('Location: /consignment/read');
        }

        $this->render('create', ['paints' => $paints]);
    }

    public function actionUpdate($id)
    {
        $consignment = ConsignmentModel::readById($id);
        $paints = PaintModel::read();

        if (
            isset($_POST['name']) &&
            isset($_POST['id_paint']) &&
            isset($_POST['date_of_end'])
        ) {
            $consignment->name = $_POST['name'];
            $consignment->id_paint = $_POST['id_paint'];
            $consignment->date_of_end = $_POST['date_of_end'];
            $consignment->update();

            header('Location: /consignment/read');
        }

        $this->render('update', ['consignment' => $consignment->data, 'paints' => $paints]);
    }

    public function actionDelete($id)
    {
        $consignment = ConsignmentModel::readById($id);

        $consignment->delete();

        header('Location: /consignment/read');
    }
}