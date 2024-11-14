<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        * {
            box-sizing: border-box;
            color: #505050
        }

        .header {
            height: 180px;
            margin: auto;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .logo {
            height: 180px;
            width: 180px;
            border: 1px solid white;
            border-radius: 100px;
            background-image: url("https://scontent.ftpe7-1.fna.fbcdn.net/v/t39.30808-6/406192317_122108782730121841_2880914551778070246_n.jpg?_nc_cat=110&ccb=1-7&_nc_sid=6ee11a&_nc_ohc=6MjooW5FRb4Q7kNvgF_olMz&_nc_zt=23&_nc_ht=scontent.ftpe7-1.fna&_nc_gid=Aap9IuzaQuIEt4PrE0XtJnp&oh=00_AYAczIkDCLJJsmfCecY8zGTtok7OUfR0Ae7SAnwC4PCgmg&oe=673B2BC8");
            justify-content: center;
            align-items: center;
            text-align: center;
            background-size: cover;
            background-position: center;
        }

        .box {
            width: 570px;
            margin: auto;
            background-color: white;
            display: flex;
            flex-direction: column;
            /* 使用垂直方向排列 .line 元素 */
            padding: 10px;
            gap: 10px;
            font-size: 1em;
            font-family: Arial, Helvetica, sans-serif;
        }

        /* 預設寬度(最小)為190px，以下設置其他寬度 */
        /* 當視窗寬度大於768px，設置固定寬度570px */
        @media (min-width: 768px) {
            .box {
                width: 570px;
            }
        }

        /* 當視窗寬度大於992px，設置固定寬度760px*/
        @media (min-width: 992px) {
            .box {
                width: 760px;
            }
        }

        /* 當視窗寬度大於992px，設置固定寬度760px*/
        @media (min-width: 1200px) {
            .box {
                width: 1000px;
            }
        }

        .line {
            width: 100%;
            height: 170px;
            background-color: white;
            display: flex;
            justify-content: space-between;
            align-items: center;
            border: 0.1em solid #e4e4e4;
            border-radius: 15px;
            padding: 5px;
            gap: 10px;
            box-shadow: 0.7px 1px 5px rgba(0, 0, 0, 0.1);
            margin-bottom: 10px;
        }

        .line:nth-child(1) {
            height: 50px;
        }

        .row {
            width: 150px;
            height: 150px;
            background-color: #FFE8E9;
            margin: 5px;
            display: flex;
            justify-content: center;
            align-items: center;
            text-align: center;
        }

        .row:nth-child(1),
        .row:nth-child(2),
        .row:nth-child(3),
        .row:nth-child(4) {
            height: 100%;
            background-color: rgb(255, 255, 255, 0);
        }

        .pic img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .row2 {
            width: 150px;
            height: 150px;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        input {
            width: 60px;
            text-align: center;
            border-radius: 5px;
            border: 0.2em solid #C7C7C7;
        }


        .line:last-child {
            justify-content: flex-end;
            align-items: flex-start;
            height: 50px;
        }

        .line:last-child .row {
            height: auto;
            font-weight: bold;
            margin: 0;
            padding: 9px 40px 0px 0px;
            text-align: right;
        }
    </style>
</head>

<body>
    <div class="header">
        <div class="logo"></div>
    </div>

    <?php
    // 初始化變量，如果未設置，設置為 0
    $mount1 = isset($_GET['mount1']) ? (int)$_GET['mount1'] : 1;
    $mount2 = isset($_GET['mount2']) ? (int)$_GET['mount2'] : 1;
    $mount3 = isset($_GET['mount3']) ? (int)$_GET['mount3'] : 1;
    ?>

    <div class="box">
        <div class="line">
            <div class="row">餐點</div>
            <div class="row">價格</div>
            <div class="row">數量</div>
            <div class="row">金額</div>
        </div>

        <!-- 訂單第一項 -->
        <div class="line">
            <div class="row pic">
                <img src="./img/bf_75.jpg" alt="圖片">
            </div>
            <div class="row">75元</div>
            <div class="row2">
            <form action="12.php" method="get">
                <input type="number" name="mount1" value="<?= $mount1; ?>" min="1" onchange="this.form.submit()">
            </form>
            </div>
            <div class="row2"><?=75*$mount1;?></div>
        </div>

        <!-- 訂單第二項 -->
        <div class="line">
            <div class="row pic">
                <img src="./img/bf_90.jpg" alt="圖片">
            </div>
            <div class="row">90元</div>
            <div class="row2">
            <form action="" method="get">
                    <input type="number" name="mount2" value="<?= $mount1; ?>" min="1" onchange="this.form.submit()">
                    <input type="hidden" name="mount1" value="<?= $mount2; ?>">
                    <input type="hidden" name="mount3" value="<?= $mount3; ?>">
                </form>
                </form>
            </div>
            <div class="row2"><?=90*$mount2;?></div>
        </div>

        <!-- 訂單第三項 -->
        <div class="line">
            <div class="row pic">
                <img src="./img/bf_95.jpg" alt="圖片">
            </div>
            <div class="row">95元</div>
            <div class="row2">
            <form action="" method="get">
                    <input type="number" name="mount3" value="<?= $mount3; ?>" min="1" onchange="this.form.submit()">
                    <input type="hidden" name="mount1" value="<?= $mount1; ?>">
                    <input type="hidden" name="mount2" value="<?= $mount2; ?>">
                </form>
            </div>
            <div class="row2"><?=95*$mount3;?></div>
        </div>

        <!-- 總金額 -->
        <div class="line">
        <div class="row">總金額 <?= 75 * $mount1 + 90 * $mount2 + 95 * $mount3; ?> 元</div>
        </div>
    </div>
</body>


</html>