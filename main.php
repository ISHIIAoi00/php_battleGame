<?php

require_once('./classes/Lives.php');
require_once('./classes/Human.php');
require_once('./classes/Enemy.php');
require_once('./classes/Brave.php');
require_once('./classes/BlackMage.php');
require_once('./classes/WhiteMage.php');
require_once('./classes/Message.php');

$members = array();
$members[] = new Brave("ティーダ");
$members[] = new WhiteMage("ユウナ");
$members[] = new BlackMage("ルールー");

$enemies = array();
$enemies[] = new Enemy("ゴブリン", 20);
$enemies[] = new Enemy("ボム", 25);
$enemies[] = new Enemy("モルボル", 30);

$turn = 1;
$isFinishFlg = false;
$messageObj = new Message;

function isFinish($objects) {
  $deathCount = 0;
  foreach ($objects as $object) {
    if ($object->getHitPoint() > 0) {
      return false;
    }
    $deathCount++;
  }
  if ($deathCount === count($objects)) {
    return true;
  }
}

while (!$isFinishFlg) {

  echo "***".$turn."ターン目***\n";

  $messageObj->displayStatusMessage($members);
  $messageObj->displayStatusMessage($enemies);

  // 攻撃
  $messageObj->displayAttackMessage($members, $enemies);
  $messageObj->displayAttackMessage($enemies, $members);

  $isFinishFlg = isFinish($members);
  if ($isFinishFlg) {
    $message = "Game Over...\n\n";
    break;
  }
  $isFinishFlg = isFinish($enemies);
  if ($isFinishFlg) {
    $message = "♪♪♪ファンファーレ♪♪♪\n\n";
    break;
  }

  $turn++;
}

echo "★★★戦闘終了★★★\n\n";
echo $message;
$messageObj->displayStatusMessage($members);
$messageObj->displayStatusMessage($enemies);