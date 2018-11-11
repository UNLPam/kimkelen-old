<?php

class Situation_R extends BaseSituation_R
{
/**
   * This method implements __toString method to print the object
   *
   * @return string
   */
  public function __toString()
  {
    return $this->getName();

  }

}
