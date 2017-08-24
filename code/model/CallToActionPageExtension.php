<?php

/**
 *@author nicolaas [at] sunnysideup.co.nz
 *
 *
 **/

class CallToActionPageExtension extends DataExtension
{
    private static $has_one = [
        'CallToAction' => 'CallToAction'
    ];

    private static $field_labels = [
        'CallToAction' => 'Call to action'
    ];

    private static $field_labels_right = [
        'CallToAction' => 'Big image with optional text'
    ];

    public function updateCMSFields(FieldList $fields)
    {
        $fieldLabels = $this->owner->FieldLabels();
        $fieldLabelsRight = Config::inst()->get('CallToActionPageExtension', 'field_labels_right');
        $tabTitle = _t('CallToActionPageExtension.CALL_TO_ACTION', 'Call to Action');
        $fields->addFieldsToTab(
            'Root.'.$tabTitle,
            [
                DropdownField::create(
                    'CallToActionID',
                    $tabTitle,
                    [0 => _t('CallToActionPageExtension', '-- please select --')] +CallToAction::get()->map()->toArray()
                ),

            ]
        );
        return $fields;
    }
}
