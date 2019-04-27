<?php
$resetLink = Yii::$app->urlManager->createAbsoluteUrl(['site/reset-password-form', 'token' => $user->password_reset_token]);
?>
Hello <?= $user->username ?>,
Follow the link below to reset your password:
<?= $resetLink ?>