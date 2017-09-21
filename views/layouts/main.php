<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Menu;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrap">
    <?php
    
    // sample: Yii::$app->user->identity->org_type_id == 'admins'    
    
    $admin_menu = [ 'label' => 'Администратор',
                    'items' => [
                        ['label' => 'Организации', 'url' => ['/org/']],
                        ['label' => 'Привязки банк-салон', 'url' => ['/org_binding/']],
                        ['label' => 'Пользователи', 'url' => ['/user/']],
                    ],
    ];

    $insalon_menu = ['label' => 'Салон', 'url' => ['/insalon/']];
    $inbank_menu = ['label' => 'Банк', 'url' => ['/inbank/']];


    NavBar::begin([
        'brandLabel' => 'Автокредитование / ' .
            ( Yii::$app->user->identity ? Yii::$app->user->identity->org_name : '' ),
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar-inverse navbar-fixed-top',
        ],
    ]);
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'items' => [
            // sample for home: ['label' => 'Home', 'url' => ['/site/index']],

            // только салонам:
            ( Yii::$app->user->identity && Yii::$app->user->identity->in(['salon','admins']) ?
                $insalon_menu : '' ),

            // только банкам:
            ( Yii::$app->user->identity && Yii::$app->user->identity->in(['bank','admins']) ?
                $inbank_menu : '' ),


            // только админам:
            ( Yii::$app->user->identity && Yii::$app->user->identity->in(['admins']) ?
                $admin_menu : '' ),

            // ['label' => 'Contact', 'url' => ['/site/contact']],
            Yii::$app->user->isGuest ? (
                ['label' => 'Login', 'url' => ['/site/login']]
            ) : (
                '<li>'
                . Html::beginForm(['/site/logout'], 'post')
                . Html::submitButton(
                    'Logout (' . Yii::$app->user->identity->username . ')',
                    ['class' => 'btn btn-link logout']
                )
                . Html::endForm()
                . '</li>'
            )
        ],
    ]);
    NavBar::end();
    ?>

    <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        
        <?= $content ?>
    </div>
</div>

<footer class="footer">
    <div class="container">
        <p class="pull-left">&copy; My Company <?= date('Y') ?></p>

        <p class="pull-right"><?= Yii::powered() ?></p>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
