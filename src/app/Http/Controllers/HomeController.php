<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Study;
use App\Models\Language;
use App\Models\Content;

use Carbon\Carbon;

//今日
$today = Carbon::now()->format('Y-m-d');

class HomeController extends Controller
{
    public function index()
    {
        // 今日の学習時間
        // 10月で固定した状態
        if(Study::whereDate('date', '2020-10-02')->sum('hour') !== 0) {
            $hour_today = Study::whereDate('date', '2020-10-02')->sum('hour');
        } else {
            $hour_today = 0;
        }
        // 月の合計学習時間
        if(Study::whereMonth('date', '10')->sum('hour') !== 0) {
            $hour_month = Study::whereMonth('date', '10')->sum('hour');
        } else {
            $hour_month = 0;
        }
        // 総合計学習時間
        if(Study::whereYear('date', '2020')->sum('hour') !== 0) {
            $hour_total = Study::whereYear('date', '2020')->sum('hour');
        } else {
            $hour_total = 0;
        }
        

        // 棒グラフ用学習時間データ
        $studies = Study::whereMonth('date', '10')->get();
        $data_study = [];
        foreach($studies as $study) {
            $data_study[] = $study->hour;
        }

        // 学習言語データ
        $data_lang1 = Study::where('language_id', '1')->sum('hour');
        $data_lang2 = Study::where('language_id', '2')->sum('hour');
        $data_lang3 = Study::where('language_id', '3')->sum('hour');
        $data_lang4 = Study::where('language_id', '4')->sum('hour');
        $data_lang5 = Study::where('language_id', '5')->sum('hour');
        $data_lang6 = Study::where('language_id', '6')->sum('hour');
        $data_lang7 = Study::where('language_id', '7')->sum('hour');
        $data_lang8 = Study::where('language_id', '8')->sum('hour');

        // 学習コンテンツデータ
        $data_con1 = Study::where('content_id', '1')->sum('hour');
        $data_con2 = Study::where('content_id', '2')->sum('hour');
        $data_con3 = Study::where('content_id', '3')->sum('hour');
        $data_con4 = Study::where('content_id', '4')->sum('hour');


        return view('index', compact('hour_today', 'hour_month', 'hour_total', 'data_study', 'data_lang1', 'data_lang2', 'data_lang3', 'data_lang4', 'data_lang5', 'data_lang6', 'data_lang7', 'data_lang8', 'data_con1', 'data_con2', 'data_con3', 'data_con4'));
    }
}
