<?php

namespace Core;

use Controllers\ConsignmentController;
use Controllers\MoveController;
use Controllers\PaintController;
use Controllers\PlaceController;
use Controllers\ReportController;

class Application
{
    public static function start()
    {
        $request = $_SERVER['REQUEST_URI'];
        $requestParts = explode('/', $request);
        unset($requestParts[0]);

        $controllerName = !empty($requestParts[1]) ? mb_convert_case($requestParts[1], MB_CASE_TITLE, "UTF-8") : 'Place';
        if (!empty($requestParts[2])) {
            $a = explode('_', $requestParts[2]);
            foreach ($a as $k => $v) {
                $a[$k] = mb_convert_case($v, MB_CASE_TITLE, "UTF-8");
            }
            $actionName = implode('', $a);
        }
        $actionName = isset($actionName) ? $actionName : 'Read';
        $id = !empty($requestParts[3]) ? $requestParts[3] : null;

//        $controller = $controllerName . 'Controller';
        $action = 'action' . $actionName;

        switch ($controllerName) {
            case 'Consignment':
                $controller = new ConsignmentController();
                $controller->$action($id);
                break;
            case 'Move':
                $controller = new MoveController();
                $controller->$action($id);
                break;
            case 'Paint':
                $controller = new PaintController();
                $controller->$action($id);
                break;
            case 'Place':
                $controller = new PlaceController();
                $controller->$action($id);
                break;
            case 'Report':
                $controller = new ReportController();
                $controller->$action($id);
                break;
            default:
                $controller = new ReportController();
                $controller->actionMain();
        }
//        $app = new $controller();
//        if (empty($id)) {
//            $app->$action();
//        } else {
//            $app->$action($id);
//        }
    }
}