<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use Monolog\Logger;
use Monolog\Handler\StreamHandler;
use Monolog\Formatter\LineFormatter;

class InputController extends Controller
{
    public function index()
    {
        return view('viewpages.input');
    }
    
    public function displayview(Request $request)
    {
        $logger = new Logger('exam_log');
        $log_path = base_path() . '/logs/' . Carbon::now()->format("Y_m_d H:i:s") . '.log';
        $log_level =  config('app.log_level');
        $log_format = "[%datetime%] %message%\n";

        $handler = new StreamHandler($log_path, $log_level);
        $handler->setFormatter(new LineFormatter($log_format));
        $logger->pushHandler($handler);

        $exam_log_data = array(
            'todohuken' => $request->todohuken,
            'fname' => $request->fname,
            'lname' => $request->lname,
            'viewcnt' => $request->viewcnt,
            'ip_addr' => $request->ip(),
            'referer' => url()->previous(),
            'usr_agent' => $request->userAgent(),
        );
        $logger->addDebug(implode(",", array_values($exam_log_data)));

        return view('viewpages.viewpage');
    }
}
