
<? use yii\widgets\LinkPager; ?>

<h1>Пользователи</h1>
<ul>
<? foreach( $userlist as $user ): ?>
    <li><b><a href="<?= Yii::$app->urlManager->createUrl(['site/user','id'=>$user->id]) ?>"><?= $user->username ?></a> [ <?= $user->org_id ?> ] </b></li>
<? endforeach;?>
</ul>

<?= LinkPager::widget( ['pagination' => $pagination ]) ?>

