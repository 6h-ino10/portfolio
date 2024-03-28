<?php
require_once('FormValidator.php');
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $validator = new FormValidator($_POST);
    $errors = $validator->validate();
}
?>

<!doctype html>
<!-- サイトで使用する言語 -->
<html lang="ja">
<!-- START__Head__Area -->

<head>
    <!-- 文字コードの設定 -->
    <meta charset="utf-8" />
    <!-- サイトのタイトル -->
    <title>お問い合わせ - Comfy Crullers 自由が丘</title>
    <!-- サイトの詳細 -->
    <meta name="description" content="Comfy Crullers 自由が丘のお問い合わせページです。ご質問、ご要望はこちらのフォームよりお問い合わせください。" />
    <!-- サイトのターゲットキーワード -->
    <meta name="keywords" content="お問い合わせ,自由が丘,ドーナツ,無添加" />
    <!-- ビューポートの設定 -->
    <meta name="viewport" content="width=device-width,initial-scale=1.0,maximum-scale=1.0" />
    <!-- ファビコンの設定 -->
    <link rel="icon" href="../img/logo.png" />

    <!-- Googleフォントの読み込み -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@400;500;700&amp;family=Roboto:wght@400;500;700&amp;family=Roboto+Slab:wght@400;500;700&amp;display=swap" rel="stylesheet" />

    <!-- CSSの読み込み -->
    <link rel="stylesheet" href="./reset.css" />
    <link rel="stylesheet" href="./contact.css" />
</head>
<!-- END__Head__Area -->

<!-- START__Body__Area-->

<body>
    <header id="header-nav">
        <nav aria-label="ヘッダーナビゲーション">
            <ul class="header-nav-list">
                <li>
                    <a href="../index.html">Home</a>
                </li>
                <li>
                    <a href="../Menu/menu.html">Menu</a>
                </li>
                <li>
                    <a href="../News/news.html">News</a>
                </li>
                <li>
                    <a href="../index.html#access-section">Access</a>
                </li>
                <li>
                    <a href="contact.php">Contact</a>
                </li>
            </ul>
        </nav>
        <div class="header-nav-title">
            <h1>Contact</h1>
        </div>
    </header>

    <main>
        <section id="contact-form-section">
            <?php if ($_SERVER["REQUEST_METHOD"] == "POST" && empty($errors)) : ?>
                <!-- 送信完了後の内容 -->
                <header class="contact-title-box">
                    <h2>送信完了</h2>
                    <p>
                        以下の内容でお問い合わせを受け付けました。<br />
                        通常、24時間以内にご返答を差し上げます。
                    </p>
                </header>
                <div class="form-card">
                    <div class="form-item-box">
                        <div class="label-box">
                            <h3 class="form-item-label" for="name">お名前</h3>
                            <span class="required-badge">必須</span>
                        </div>
                        <p>
                            <?= $_POST["name"] ?>
                        </p>
                    </div>
                    <div class="form-item-box">
                        <div class="label-box">
                            <h3 class="form-item-label" for="email">email</h3>
                            <span class="required-badge">必須</span>
                        </div>
                        <p>
                            <?= $_POST["email"] ?>
                        </p>
                    </div>
                    <div class="form-item-box">
                        <div class="label-box">
                            <h3 class="form-item-label" for="message">本文</h3>
                            <span class="required-badge">必須</span>
                        </div>
                        <p>
                            <?= nl2br($_POST["message"]) ?>
                        </p>
                    </div>
                    <a class="submit-button" href="../index.html">戻る</a>
                </div>
                <!-- 送信完了後の内容ここまで -->
            <?php else : ?>
                <header class="contact-title-box">
                    <h2>お問い合わせ</h2>
                    <p>
                        ご不明な点やご要望がございましたら、<br />
                        下記フォームよりお気軽にお問い合わせください。
                    </p>
                </header>
                <?php if ($_SERVER["REQUEST_METHOD"] == "POST" && !empty($errors)) : ?>
                    <div>
                        <ul>
                            <?php foreach ($errors as $error) : ?>
                                <li><?php echo $error; ?></li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                <?php endif; ?>
                <form class="form-card" action="contact.php" method="post">
                    <div class="form-item-box">
                        <div class="label-box">
                            <label class="form-item-label" for="name">お名前</label>
                            <span class="required-badge">必須</span>
                        </div>
                        <input class="text-input" type="text" id="name" name="name" value="<?php echo htmlspecialchars($_POST['name'] ?? ''); ?>" required />
                    </div>
                    <div class="form-item-box">
                        <div class="label-box">
                            <label class="form-item-label" for="email">email</label>
                            <span class="required-badge">必須</span>
                        </div>
                        <input class="text-input" type="text" id="email" name="email" value="<?php echo htmlspecialchars($_POST['email'] ?? ''); ?>" required />
                    </div>
                    <div class="form-item-box">
                        <div class="label-box">
                            <label class="form-item-label" for="message">本文</label>
                            <span class="required-badge">必須</span>
                        </div>
                        <textarea class="text-area-input" id="message" name="message" required><?php echo htmlspecialchars($_POST['message'] ?? ''); ?></textarea>
                    </div>
                    <button class="submit-button" type="submit">送信する</button>
                </form>
            <?php endif; ?>
        </section>
    </main>

    <footer id="footer-nav">
        <div class="footer-nav-inner-box">
            <div class="footer-left-box">
                <nav aria-label="フッターナビゲーション">
                    <ul class="footer-nav-list">
                        <li>
                            <a href="#">プライバシーポリシー</a>
                        </li>
                        <li>
                            <a href="#">サイトマップ</a>
                        </li>
                        <li>
                            <a href="#">利用規約</a>
                        </li>
                    </ul>
                </nav>
            </div>

            <div class="footer-right-box">
                <div class="sns-box">
                    <a href="#">
                        <img width="24" height="24" decoding="auto" src="../svg/twitter.svg" alt="Twitter" />
                    </a>
                    <a href="#">
                        <img width="24" height="24" decoding="auto" src="../svg/facebook.svg" alt="Facebook" />
                    </a>
                    <a href="#">
                        <img width="24" height="24" decoding="auto" src="../svg/instagram.svg" alt="Instagram" />
                    </a>
                    <a href="#">
                        <img width="24" height="24" decoding="auto" src="../svg/youtube.svg" alt="Youtube" />
                    </a>
                </div>

                <small class="copyright">
                    &copy; このサイトはポートフォリオのためのサンプルサイトです。<br />
                    実在する団体・個人とは一切関係ありません。
                </small>
            </div>

        </div>
    </footer>
</body>
<!-- END__Body__Area-->

</html>