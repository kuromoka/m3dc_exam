<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use Monolog\Logger;
use Monolog\Handler\StreamHandler;
use Monolog\Formatter\LineFormatter;
use App\Seminar;

class InputController extends Controller
{
    public function index()
    {
        return view('viewpages.input');
    }
    
    public function displayview(Request $request)
    {
        // バリデーション
        $this->validate($request, array(
            'todohuken' => 'required|max:50',
            'fname' => 'required|max:50',
            'lname' => 'required|max:50',
            'viewcnt' => 'required|numeric',
        ));

        // ログ出力は以下を参考にした
        // http://sagatto.com/20180228_laravel_custom_log
        // http://kzhishu.hatenablog.jp/entry/2015/10/04/200000
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
        // ログファイルに出力
        $logger->addDebug(implode(",", array_values($exam_log_data)));

        // seminarsテーブルに登録
        Seminar::create(
            array_merge(
                array('crnt_date' => Carbon::now()->toDateTimeString()),
                $exam_log_data
            )
        );

        return view('viewpages.viewpage');
    }
}
