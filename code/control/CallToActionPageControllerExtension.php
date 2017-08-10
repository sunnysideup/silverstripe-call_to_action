<?php

/**
 *@author nicolaas [at] sunnysideup.co.nz
 *
 *
 **/

class CallToActionPageControllerExtension extends Extension
{
    private static $db = [
        'TextField' => 'Varchar(100)'
    ];

    public function updateCMSFields(FieldList $fields)
    {
        $tabTitle = _t('CopyrightSiteConfigExtras.PAGE_ELEMENTS', 'Page Elements');
        $fields->addFieldToTab(
            'Root.'.$tabTitle,
            $editor = HTMLEditorField::createField(
                'CopyrightNotice',
                _t('CopyrightSiteConfigExtras.COPYRIGHT', 'COPYRIGHT'))
        );
        $editor->setRows(4);

        return $fields;
    }
}
