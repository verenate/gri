<?php

class cultureActions extends sfActions
{
  public function executeSwitch(sfWebRequest $request)
  {
    $culture = $request->getParameter('culture');
    if (!preg_match("/^\w+$/", $culture))
    {
      $this->forward404();
    }
    $this->getUser()->setCulture($culture);
    return $this->redirect('/');
  }
}
