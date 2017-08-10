<?php

/**
 *@author nicolaas [at] sunnysideup.co.nz
 *
 *
 **/

class CallToActionPageControllerExtension extends Extension
{
    public function onAfterInit()
    {
        if($this->owner->LargeImageID && $this->owner->LargeImage()->exists()) {
            Requirements::customCSS('
                .large-image {background-image: url('.$this->LargeImage()->Link().');}
                @media
                (-webkit-min-device-pixel-ratio: 1.5),
                (min-resolution: 144dpi){
                    .large-image {background-image: url('.$this->LargeImage()->setWidth(4800)->Link().');}
                }
            ',
            'large-image');
        }
    }
}
