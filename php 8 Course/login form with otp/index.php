<?php session_start(); ?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>فرم ثبت نام روت وان </title>
    <link rel="stylesheet" href="style.css">
</head>

<body>

    <h2 class="rtl">طراحی فرم ثبت نام با PHP</h2>
    <div class="container" id="container">
        <div class="form-container sign-up-container">
            <form action="data.php" class="rtl" method="post" autocomplete="off">
                <h1>عضویت</h1>
                <span>برای ثبت نام از ایمیل استفاده کنید</span>
                <input type="text" name="name" placeholder="نام" autocomplete="false" />
                <input type="email" name="email" placeholder="ایمیل" autocomplete="false" />
                <input type="text" maxlength="11" name="phone" placeholder="تلفن" autocomplete="false" />
                <input type="password" name="pass" placeholder="رمز عبور" autocomplete="false" />
                <button type="submit" name="signup">ثبت نام </button>
            </form>
        </div>
        <div class="form-container sign-in-container">
            <?php if ($_SESSION['code']) { ?>
                <h1>کد تایید را وارد کنید</h1>
                <form class="rtl" action="data.php" method="post">
                    <input type="text" name="code" placeholder="کد تایید  " />
                    <button type="submit" name="codesubmit">تایید</button>
                </form>
            <?php  } else { ?>
                <form action="data.php" class="rtl" method="post" autocomplete="off">
                    <h1>ورود</h1>

                    <span>نام کاربری و رمز عبور خود را وارد نمایید</span>
                    <input type="text" name="username" placeholder="ایمیل یا تلفن" />
                    <input type="password" name="password" placeholder="رمز عبور" />
                    <a href="#">رمز خود را فراموش کرده اید ؟</a>
                    <button type="submit" name="login">ورود</button>
                    <h3 style="color:red"> <?php if (isset($_SESSION['error'])) {
                                                echo 'نام کاربری و رمز اشتباه است';
                                            } ?></h3>

                </form>
            <?php } ?>
        </div>
        <div class="overlay-container">
            <div class="overlay">
                <div class="overlay-panel overlay-left">
                    <h1 class="rtl">دوباره خوش اومدی!</h1>
                    <p>برای حفظ ارتباط با ما لطفا با اطلاعات شخصی خود وارد شوید</p>
                    <button class="ghost" id="signIn">ورود به سایت</button>
                </div>
                <div class="overlay-panel overlay-right">
                    <h1 class="rtl">سلام رفیق!</h1>
                    <p>مشخصات شخصی خود را وارد کنید و سفر را با ما آغاز کنید</p>
                    <button class="ghost" id="signUp">ثبت نام در سایت </button>
                </div>
            </div>
        </div>
    </div>

    <footer>
        <p>
            ساخته شده <i class="fa fa-heart"></i> توسط
            <a target="_blank" href="https://youtube.com/root_one">روت وان</a>
            - برای دانلود این سورس کد یه نگاه به کانال تلگرام روت وان بنداز ایدی کانال:
            <a target="_blank" href="https://t.me/rootCodes/" dir='ltr'>@rootCodes</a>.<br>
            <a href="https://rootone.ir" target="_blank">وبسایت روت وان</a>
        </p>
    </footer>

    <script>
        const signUpButton = document.getElementById('signUp');
        const signInButton = document.getElementById('signIn');
        const container = document.getElementById('container');

        signUpButton.addEventListener('click', () => {
            container.classList.add("right-panel-active");
        });

        signInButton.addEventListener('click', () => {
            container.classList.remove("right-panel-active");
        });
    </script>
</body>
<?php unset($_SESSION['error']); ?>

</html>