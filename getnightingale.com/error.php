<!DOCTYPE html>
<html>
    <head>
        <!-- meta info -->
        <meta charset="utf-8">
        <title data-l10n-id="error_title" data-l10n-args='{"code":"<?php echo $_GET['code']; ?>"}'>Error <?php echo $_GET['code']; ?></title>
        <?php include "../static.getnightingale.com/php/head.php"; ?>
    </head>
    <body>
        <div id="ngalemainheadwrapper" class="wrapper">
            <?php include "../static.getnightingale.com/php/header.php"; ?>
        </div>
        <div class="wrapper" id="wrapper">
            <main id="main" class="container">
                <h1 data-l10n-title="error_title" data-l10n-args='{"code":"<?php echo $_GET['code']; ?>"}'>Error <?php echo $_GET['code']; ?></h1>
                <?php
                    switch($_GET['code']) {
                        case "500":
                            echo "<p data-l10n-id='error_500'>Hang on, the server encountered a problem while responding to your request.</p>";
                            break;
                        case "400":
                            echo "<p data-l10n-id='error_400'>Cannot fulfill request due to an error in the request.</p>";
                            break;
                        case "401":
                            echo "<p data-l10n-id='error_401'>You are not allowed to see the requested resource. Please log in, if you are sure you are authorized to see that page.</p>";
                            break;
                        case "403":
                            echo "<p data-l10n-id='error_403'>Cannot return content for this request.</p>";
                            break;
                        case "410":
                            echo "<p data-l10n-id='error_410'>We've removed this page, an appropriate replacement is probably available somewhere else.";
                            break;
                        case "404":
                        default:
                            echo "<p data-l10n-id='error_404'>The requested resource is not yet available or not found.</p>";
                    }
                ?>
            </main>
        </div>
        <div class="wrapper" id="ngalemainfooterwrapper">
            <?php include "../static.getnightingale.com/php/footer.php"; ?>
        </div>
    </body>
</html>