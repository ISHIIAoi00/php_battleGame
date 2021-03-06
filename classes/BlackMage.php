<?php

class BlackMage extends Human
{
  const MAX_HITPOINT = 80;
  private $hitPoint = self::MAX_HITPOINT;
  private $attackPoint = 10;
  private $intelligence = 30; //魔法攻撃力

  public function __construct($name) {
    parent::__construct($name, $this->hitPoint, $this->attackPoint);
  }

  public function doAttack($enemies) {

    if ($this->hitPoint <= 0) {
      return false;
    }

    $enemyIndex = rand(0, count($enemies)-1);
    $enemy = $enemies[$enemyIndex];
    
    if (rand(1,2) === 1) { //3分の1の確率でスキルを発動する
      
      echo "『".$this->getName()."のスキルが発動した!\n";
      echo "『ファイア』!!\n";
      echo $enemy->getName()."に".$this->intelligence * 1.5."のダメージ!\n";
      $enemy->tookDamage($this->intelligence * 1.5);
    }else {
      parent::doAttack($enemies);
    }

    return true;
  }
}