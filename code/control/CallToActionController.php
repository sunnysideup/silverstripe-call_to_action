<?php


class CallToActionController extends Extension
{

    function HasCallToAction()
    {
        if($this->owner->dataRecord->CallToActionID && $this->owner->dataRecord->CallToAction()->exists()   ) {
            if(! $this->owner->request->param('Action')) {
                return true;
            }
        }
    }
}
