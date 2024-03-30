<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">


    <title>Tasks Admin Tool</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style type="text/css">
        .gradient-section {
            background: linear-gradient(-45deg, #6026ba 0%, #351567 35%, #212529);
            background-size: 400% 400%;
            position: relative;
            height: 800px;
            animation: gradient 15s linear infinite;
            padding: 70px 0;
        }

        @keyframes gradient {
            0% {
                background-position: 0% 50%;
            }

            50% {
                background-position: 100% 50%;
            }

            100% {
                background-position: 0% 50%;
            }
        }

        .card.statistics-card {
            position: relative;
            background: none;
            border: none;
            padding: 2rem;
        }

        .card.statistics-card i {
            position: absolute;
            font-size: 10rem;
            top: -3%;
            opacity: 0.2;
        }

        @media only screen and (max-width: 921px) {
            .card.statistics-card i {
                font-size: 5rem;
            }
        }

        .card.statistics-card i.fa-users {
            color: #dedede;
        }

        .card.statistics-card i.fa-font {
            color: #df151b;
        }

        .card.statistics-card i.fa-link {
            color: #409fdc;
        }

        .card.statistics-card i.fa-coffee {
            color: #301d15;
        }

        .card.statistics-card .info {
            margin-left: 20%;
            text-align: right;
        }

        .card.statistics-card .info span {
            color: #fff;
            font-weight: bold;
            font-size: 12px;
            text-transform: uppercase;
        }

        .card.statistics-card .info div {
            font-size: 3rem;
            font-weight: bold;
            color: #ffae00;
        }

        .section-title {
            padding-bottom: 40px;
        }

        .section-title h2 {
            font-size: 14px;
            font-weight: 500;
            padding: 0;
            line-height: 1px;
            margin: 0 0 5px 0;
            letter-spacing: 2px;
            text-transform: uppercase;
            color: #aaaaaa;
            font-family: "Poppins", sans-serif;
        }

        .section-title h2:after {
            content: "";
            width: 120px;
            height: 1px;
            display: inline-block;
            background: #fff;
            margin: 4px 10px;
        }

        .section-title h1,
        .section-title p {
            margin: 0;
            font-weight: 700;
            text-transform: uppercase;
            font-family: "Poppins", sans-serif;
            color: #3c1874;
            font-size: 2rem;
        }

        .section-title h1 strong,
        .section-title p strong {
            color: #dc8615;
        }
    </style>
</head>

<body>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <title></title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"
            integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
            integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"
            integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ=="
            crossorigin="anonymous" referrerpolicy="no-referrer" />
    </head>

    <body>
        <section class="gradient-section">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="section-title">
                            <h2>Statistics</h2>
                            <p><strong>Top 10 users</strong></p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    @foreach($usersTasksCounts as $userCount)
                    <div class="col-md-3 col-6">
                        <div class="card statistics-card">
                            <div class="info d-flex flex-column">
                                <span class="mb-3">{{ $userCount->user->name}}</span>
                                <div class="incremental" data-increment="{{ $userCount->number_of_tasks }}<">{{ $userCount->number_of_tasks }}</div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </section>
    </body>
    <div style="position: fixed;bottom: 5%;right: 5%;">
        <div style="display: flex;align-items: center;">
            <a id="create_task" style="margin-right:1rem;background: #d1e6fd;display: block;padding: 1rem;border-radius: 0.25rem;border: 1px solid #e9ecef;color: #000;font-weight: bold;"
                href="{{ route('create_new_task') }}"> Create New Task</a>
            <a id="view_tasks" style="background: #d1e6fd;display: block;padding: 1rem;border-radius: 0.25rem;border: 1px solid #e9ecef;color: #000;font-weight: bold;"
                href="{{ route('tasks') }}">View Tasks</a>
        </div>
    </div>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
        crossorigin="anonymous"></script>

    </html>
    <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            increment();
        });
        function increment() {
            $.each($(document).find('.incremental'), function () {
                let me = $(this);
                me.html('');
                $({ value: parseInt(me.html()) }).animate({ value: parseInt(me.attr('data-increment')) }, {
                    duration: Math.floor(Math.random() * (5000 - 1500 + 1) + 1500),
                    easing: 'swing',
                    step: function () {
                        me.text(commaSeparateNumber(Math.round(this.value)));
                    }
                });
            })
        }
        function commaSeparateNumber(val) {
            while (/(\d+)(\d{3})/.test(val.toString())) {
                val = val.toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,");
            }
            return val;
        }
    </script>
</body>

</html>