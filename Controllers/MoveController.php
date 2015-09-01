<?php

namespace Controllers;

use Core\Controller;
use Models\MoveModel;
use Models\ConsignmentModel;
use Models\PlaceModel;

class MoveController extends Controller
{
    public function actionToStock()
    {
        $consignments = ConsignmentModel::read();
        $places_stock = PlaceModel::readByColumnValue('id_warehouse', 1);

        if (
            isset($_POST['id_consignment']) &&
            isset($_POST['id_to']) &&
            isset($_POST['qty'])
        ) {
            $move = new MoveModel();

            $move->id_type = '1';
            $move->id_consignment = $_POST['id_consignment'];
            $move->id_to = $_POST['id_to'];
            $move->qty = $_POST['qty'];
            $move->create();

            header('Location: /move/read');
        }

        $this->render('to_stock', [
            'consignments' => $consignments,
            'places_stock' => $places_stock,
        ]);
    }

    public function actionStockToWorkshop()
    {
        $consignments = ConsignmentModel::read();
        $places_stock = PlaceModel::readByColumnValue('id_warehouse', 1);
        $places_workshop = PlaceModel::readByColumnValue('id_warehouse', 2);

        if (
            isset($_POST['id_consignment']) &&
            isset($_POST['id_from']) &&
            isset($_POST['id_to']) &&
            isset($_POST['qty']) &&
            isset($_POST['kr'])
        ) {
            $move = new MoveModel();

            $move->id_type = '2';
            $move->id_consignment = $_POST['id_consignment'];
            $move->id_from = $_POST['id_from'];
            $move->id_to = $_POST['id_to'];
            $move->qty = $_POST['qty'];
            $move->kr = $_POST['kr'];
            $move->create();

            header('Location: /move/read');
        }

        $this->render('stock_to_workshop', [
            'consignments' => $consignments,
            'places_stock' => $places_stock,
            'places_workshop' => $places_workshop,
        ]);
    }

    public function actionWorkshopToStock()
    {
        $consignments = ConsignmentModel::read();
        $places_stock = PlaceModel::readByColumnValue('id_warehouse', 1);
        $places_workshop = PlaceModel::readByColumnValue('id_warehouse', 2);

        if (
            isset($_POST['id_consignment']) &&
            isset($_POST['id_from']) &&
            isset($_POST['id_to']) &&
            isset($_POST['qty'])
        ) {
            $move = new MoveModel();

            $move->id_type = '3';
            $move->id_consignment = $_POST['id_consignment'];
            $move->id_from = $_POST['id_from'];
            $move->id_to = $_POST['id_to'];
            $move->qty = $_POST['qty'];
            $move->create();

            header('Location: /move/read');
        }

        $this->render('workshop_to_stock', [
            'consignments' => $consignments,
            'places_stock' => $places_stock,
            'places_workshop' => $places_workshop,
        ]);
    }

    public function actionWorkshopTo()
    {
        $consignments = ConsignmentModel::read();
        $places_workshop = PlaceModel::readByColumnValue('id_warehouse', 2);

        if (
            isset($_POST['id_consignment']) &&
            isset($_POST['id_from']) &&
            isset($_POST['qty']) &&
            isset($_POST['qty_t']) &&
            isset($_POST['kr']) &&
            isset($_POST['parts'])
        ) {
            $move = new MoveModel();

            $move->id_type = '4';
            $move->id_consignment = $_POST['id_consignment'];
            $move->id_from = $_POST['id_from'];
            $move->qty = $_POST['qty'];
            $move->qty_t = $_POST['qty_t'];
            $move->kr = $_POST['kr'];
            $move->parts = $_POST['parts'];
            $move->create();

            header('Location: /move/read');
        }

        $this->render('workshop_to', [
            'consignments' => $consignments,
            'places_workshop' => $places_workshop,
        ]);
    }

}