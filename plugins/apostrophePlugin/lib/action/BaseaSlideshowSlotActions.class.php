<?php

class BaseaSlideshowSlotActions extends BaseaSlotActions
{
  public function executeEdit(sfRequest $request)
  {
    $this->logMessage("====== in aSlideshowSlotActions::executeEdit", "info");
    if ($request->getParameter('aMediaCancel'))
    {
      return $this->redirectToPage();
    }
    
    $this->editSetup();
    $ids = preg_split('/,/', $request->getParameter('aMediaIds'));
    $q = Doctrine::getTable('aMediaItem')->createQuery('m')->select('m.*')->whereIn('m.id', $ids)->andWhere('m.type = "image"');
    // Let the query preserve order for us
    $items = aDoctrine::orderByList($q, $ids)->execute();
    $this->slot->unlink('MediaItems');
    $links = aArray::getIds($items);
    $this->slot->link('MediaItems', $links);
    // Save just the order in the value field. Use a hash so we can add
    // other metadata later
    // Use getArrayValue and setArrayValue so that any additional fields that have been
    // added at the app level don't get smooshed
    $value = $this->slot->getArrayValue();
    $value['order'] = $links;
    $this->slot->setArrayValue($value);
    $this->editSave();
  }
}
