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
        $link = '/admin/calltoaction/';
        if($this->owner->CallToActionID) {
            $link = $this->owner->CallToAction()->CMSEditLink();
        }
        $fields->addFieldsToTab(
            'Root.'.$tabTitle,
            [
                DropdownField::create(
                    'CallToActionID',
                    $tabTitle,
                    [0 => _t('CallToActionPageExtension', '-- please select --')] +CallToAction::get()->map()->toArray()
                ),
                LiteralField::create(
                    'CallToActionEdit',
                    '<h2><a href="'.$link.'">✎ '.$tabTitle.'</a><h2>'
                )
            ]
        );
        return $fields;
    }
}
