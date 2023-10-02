<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>POSSE | Webapp</title>
    <link rel="stylesheet" href="{{ asset('/css/normalize.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/style.css') }}">
    <!-- js読み込み -->
    <script src="{{ asset('/js/modal.js') }}" defer></script>
    <script src="{{ asset('/js/calendar.js') }}" defer></script>
    {{-- <script src="{{ asset('/js/barGraph.js') }}" defer></script> --}}
    {{-- <script src="{{ asset('/js/languageChart.js') }}" defer></script> --}}
    {{-- <script src="{{ asset('/js/contentChart.js') }}" defer></script> --}}
</head>

<body>
    <header>
        <div class="header_logo">
            <img src="{{ asset('/img/logo.svg') }}" alt="posse">
        </div>
        <div class="header_title">4th week</div>
        <button id="js-recordButton" class="header_record-button">記録・投稿</button>
    </header>
    <div class="modal" id="js-modal">
        <div class="modal_container" id="js-modalContainer">
            <form action="" method="post">
                <div class="modal_container_inner">
                    <div class="modal_inner_left">
                        <div class="modal_day">
                            <p class="label">学習日</p>
                            <input type="text" id="day" name="day">
                        </div>
                        <div class="modal_content">
                            <p class="label">学習コンテンツ（複数選択可）</p>
                            <div class="checkbox_container">
                                <div class="checkbox"><input type="checkbox" id="nyobi" name="content[]"
                                        value="1"><label for="nyobi" class="checkbox_label">N予備校</label></div>
                                <div class="checkbox"><input type="checkbox" id="dotinstall" name="content[]"
                                        value="2"><label for="dotinstall" class="checkbox_label">ドットインストール</label>
                                </div>
                                <div class="checkbox"><input type="checkbox" id="posse_kadai" name="content[]"
                                        value="3"><label for="posse_kadai" class="checkbox_label">POSSE課題</label>
                                </div>
                            </div>
                        </div>
                        <div class="modal_language">
                            <p class="label">学習言語（複数選択可）</p>
                            <div class="checkbox_container">
                                <div class="checkbox"><input type="checkbox" id="language1" name="language[]"
                                        value="1"><label for="language1" class="checkbox_label">HTNL</label></div>
                                <div class="checkbox"><input type="checkbox" id="language2" name="language[]"
                                        value="2"><label for="language2" class="checkbox_label">CSS</label></div>
                                <div class="checkbox"><input type="checkbox" id="language3" name="language[]"
                                        value="3"><label for="language3" class="checkbox_label">JavaScript</label>
                                </div>
                                <div class="checkbox"><input type="checkbox" id="language4" name="language[]"
                                        value="4"><label for="language4" class="checkbox_label">PHP</label></div>
                                <div class="checkbox"><input type="checkbox" id="language5" name="language[]"
                                        value="5"><label for="language5" class="checkbox_label">Laravel</label>
                                </div>
                                <div class="checkbox"><input type="checkbox" id="language6" name="language[]"
                                        value="6"><label for="language6" class="checkbox_label">SQL</label></div>
                                <div class="checkbox"><input type="checkbox" id="language7" name="language[]"
                                        value="7"><label for="language7" class="checkbox_label">SHELL</label>
                                </div>
                                <div class="checkbox"><input type="checkbox" id="language8" name="language[]"
                                        value="8"><label for="language8"
                                        class="checkbox_label">情報システム基礎(その他)</label></div>
                            </div>
                        </div>
                    </div>
                    <div class="modal_inner_right">
                        <div class="modal_hour">
                            <p class="label">学習時間</p>
                            <input type="text" id="hour" name="hour">
                        </div>
                        <div class="modal_twitter">
                            <p class="label">Twitter用コメント</p>
                            <input type="text" id="twitter" name="twitter">
                        </div>
                        <input type="checkbox" id="share_button"><label for="share_button"
                            class="share_button_label">Twiterにシェアする</label>
                    </div>
                </div>
                <input type="submit" value="記録・投稿" id="modalRecordButton" class="modal_record-button">
            </form>
            <!-- <button id="modalRecordButton" class="modal_record-button">記録・投稿</button> -->
            <button id="js-closeButton" class="modal_close-button">×</button>
        </div>
        <div id="js-calendar" class="calendar">
            <button id="js-backButton" class="calendar_close-button">←</button>
            <table>
                <thead>
                    <tr>
                        <th id="prev">&lt;</th>
                        <th id="title" colspan="5">2022年10月</th>
                        <th id="next">&gt;</th>
                    </tr>
                    <tr>
                        <th class="week">Sun</th>
                        <th class="week">Mon</th>
                        <th class="week">Tue</th>
                        <th class="week">Wed</th>
                        <th class="week">Thu</th>
                        <th class="week">Fri</th>
                        <th class="week">Sat</th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
                <tfoot>
                    <th id="calendarButton" class="calendar_button">決定</th>
                </tfoot>
            </table>
        </div>
        <div id="js-loading" class="loading">
            <div class="loader">
                <div class="one"></div>
                <div class="two"></div>
                <div class="three"></div>
            </div>
            <button id="js-closeButton2" class="modal_close-button">×</button>
        </div>
        <div id="js-done" class="done">
            <div class="done_inner">
                <p class="done_message">AWESOME!</p>
                <div class="done_mark"></div>
                <p class="done_comment">記録・投稿<br>完了しました</p>
            </div>
            <button id="js-closeButton3" class="modal_close-button">×</button>
        </div>
    </div>
    <main>
        <div class="main_content">
            <div class="main_content_left">
                <div class="main_content_hours">
                    <div class="hour_data">
                        <p class="hour_data_title">Today</p>
                        <p class="hour_data_figure">{{ $hour_today }}</p>
                        <p class="hour_data_unit">hour</p>
                    </div>
                    <div class="hour_data">
                        <p class="hour_data_title">Month</p>
                        <p class="hour_data_figure">{{ $hour_month }}</p>
                        <p class="hour_data_unit">hour</p>
                    </div>
                    <div class="hour_data">
                        <p class="hour_data_title">Total</p>
                        <p class="hour_data_figure">{{ $hour_total }}</p>
                        <p class="hour_data_unit">hour</p>
                    </div>
                </div>
                <div class="main_content_bar-graph">
                    <canvas id="barGraph" class="bar-graph">
                        Canvas not supported...
                    </canvas>
                </div>
            </div>
            <div class="main_content_right">
                <div class="main_content_language">
                    <div class="chart_area">
                        <canvas id="languageChart" class="language_chart" height="303px" width="183px">
                            Canvas not supported...
                        </canvas>
                    </div>
                    <div class="legend_area">
                        <p class="legend_label label_html">HTML</p>
                        <p class="legend_label label_css">CSS</p>
                        <p class="legend_label label_js">JavaScript</p>
                        <p class="legend_label label_php">PHP</p>
                        <p class="legend_label label_laravel">Larabel</p>
                        <p class="legend_label label_sql">SQL</p>
                        <p class="legend_label label_shell">SHELL</p>
                        <p class="legend_label label_info">情報システム基礎知識(その他)</p>
                    </div>
                </div>
                <div class="main_content_study-content">
                    <div class="chart_area">
                        <canvas id="contentChart" class="study_chart">
                            Canvas not supported...
                        </canvas>
                    </div>
                    <div class="legend_area">
                        <p class="legend_label label_input">インプット</p>
                        <p class="legend_label label_drill">ドリル</p>
                        <p class="legend_label label_task">課題</p>
                        <p class="legend_label label_self">自主学習</p>
                    </div>

                </div>
            </div>
        </div>
        <div class="main_bottom">
            <div class="main_bottom_arrow arrow_left"></div>
            <p class="main_bottom_month">
                2020年10月
            </p>
            <div class="main_bottom_arrow arrow_right"></div>
        </div>
    </main>

</body>

<!-- chartjs読み込み -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.9.1/chart.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels@2.0.0"></script>
<script>
    'use strict';
    {
        // 棒グラフ
        (async function() {
            function hoursGraph() {

                let type = 'bar';

                const ctx = document.getElementById('barGraph').getContext('2d');
                const gradientStroke = ctx.createLinearGradient(0, 0, 0, 100);
                gradientStroke.addColorStop(0, 'rgb(20, 191, 250)');
                gradientStroke.addColorStop(0.5, 'rgb(20, 180, 240)')
                gradientStroke.addColorStop(1, 'rgb(19, 131, 201)');

                const data = {
                    labels: [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22,
                        23, 24, 25, 26, 27, 28, 29, 30, 31
                    ],
                    datasets: [{
                        label: '',
                        data: @json($data_study),
                        backgroundColor: gradientStroke,
                        borderRadius: 50,
                        barThickness: 4,
                    }]
                };

                const options = {
                    scales: {
                        x: {
                            grid: {
                                display: false,
                                drawBorder: false,
                            },
                            ticks: {
                                autoSkip: false,
                                maxRotation: 0, // 数字が傾かないように
                                minRotation: 0,
                                color: 'rgb(50, 101, 255)',
                                callback: (value) => {
                                    if (value % 2 == 0) {
                                        return '';
                                    } else {
                                        return value + 1;
                                    };
                                },
                            },
                        },
                        y: {
                            ticks: {
                                color: 'rgb(50, 101, 255)',
                                suggestedMin: 0,
                                suggestedMax: 8,
                                stepSize: 2,
                                callback: (value) => value + 'h'
                            },
                            grid: {
                                display: false,
                                drawBorder: false,
                            }
                        },
                    },
                    animation: false,
                    plugins: {
                        legend: {
                            display: false
                        },
                    },
                };
                const myChart = new Chart(ctx, {
                    type: type,
                    data: data,
                    options: options,
                });
                myChart;
            };
            hoursGraph();
        })();
    }

    {
        // 学習言語チャート
        (async function() {
            function languageChart() {

                let type = 'doughnut';
                const ctx = document.getElementById('languageChart').getContext('2d');

                const data = {
                    labels: ['HTML', 'CSS', 'JavaScript', 'PHP', 'Laravel', 'SQL', 'SHELL',
                        '情報システム基礎知識(その他)'
                    ],
                    datasets: [{
                        data: [{{ $data_lang1 }}, {{ $data_lang2 }}, {{ $data_lang3 }},
                            {{ $data_lang4 }}, {{ $data_lang5 }}, {{ $data_lang6 }},
                            {{ $data_lang7 }}, {{ $data_lang8 }}
                        ],
                        backgroundColor: ['LightSkyBlue', 'SkyBlue', 'CornflowerBlue', 'RoyalBlue',
                            'Blue', 'MediumBlue', 'SlateBlue', 'BlueViolet'
                        ],
                        borderWidth: 0,
                    }],

                };

                const options = {
                    plugins: {
                        title: {
                            display: true,
                            text: '学習言語',
                            align: 'start',
                            font: {
                                size: 15,
                            },
                        },
                        legend: {
                            display: false,
                        },
                        datalabels: {
                            font: {
                                size: 13,
                            },
                            formatter: function(value) {
                                let dataSum = {{$data_lang1}} + {{$data_lang2}} + {{$data_lang3}} + {{$data_lang4}} + {{$data_lang5}} + {{$data_lang6}} + {{$data_lang7}} + {{$data_lang8}};
                                return (Math.round(value / dataSum * 100 * 10)/10).toString() + "%";
                            },
                        },
                    },
                    pieHole: 0.2,
                    animation: false,
                    maintainAspectRatio: false,
                };

                const myChart = new Chart(ctx, {
                    type: type,
                    data: data,
                    options: options,
                    plugins: [ChartDataLabels],
                });
                myChart;
            };
            await languageChart();
        })();
    }

    {
        // 学習コンテンツチャート
        (async function() {
            function contentChart() {
                let type = 'doughnut';
                const ctx = document.getElementById('contentChart').getContext('2d');

                const data = {
                    labels: ["インプット", "ドリル", "課題", "自主学習"],
                    datasets: [{
                        data: [{{$data_con1}}, {{$data_con2}}, {{$data_con3}}, {{$data_con4}}],
                        backgroundColor: ['LightSkyBlue', 'CornflowerBlue', 'RoyalBlue', 'BlueViolet'],
                        borderWidth: 0,
                    }],
                };

                const options = {
                    plugins: {
                        title: {
                            display: true,
                            text: '学習コンテンツ',
                            align: 'start',
                            font: {
                                size: 15,
                            },
                        },
                        legend: {
                            display: false,
                        },
                        datalabels: {
                            font: {
                                size: 13,
                            },
                            formatter: function(value) {
                                let dataSum = {{$data_con1}} + {{$data_con2}} + {{$data_con3}} + {{$data_con4}};
                                return (Math.round(value / dataSum * 100 * 10)/10).toString() + "%";
                            },
                        },
                    },
                    pieHole: 0.2,
                    animation: false,
                    maintainAspectRatio: false,
                };

                const myChart = new Chart(ctx, {
                    type: type,
                    data: data,
                    options: options,
                    plugins: [ChartDataLabels],
                });

                myChart;
            };
            await contentChart();
        })();

    }
</script>

</html>
