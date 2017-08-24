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
        if($this->CallToAction()->exists()){
            $fields->addFieldToTab(
                'Root.'.$tabTitle,
                ReadonlyField::create("add", "CallToAction", $this->Address()->toString())
            );
        }
        $fields->removeByName("CallToActionID");
        $fields->addFieldToTab(
            'Root.'.$tabTitle,
            HasOneButtonField::create("CallToAction", "CallToAction", $this) //here!
        );

        return $fields;
    }
}
