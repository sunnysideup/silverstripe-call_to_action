<?php

/**
 *@author nicolaas [at] sunnysideup.co.nz
 *
 *
 **/

class CallToActionPageExtension extends DataExtension
{
    private static $db = [
        'LargeText' => 'Varchar(255)',
        'LargeTextFontColour' => 'enum("white,black", "white")',
        'LargeImageFocusPoint' => 'enum("Centre,N,NW,W,SW,S,SE,E,NE", "Centre")',
        'CallToAction' => 'Varchar(50)'
    ];

    private static $has_one = [
        'LargeImage' => 'Image',
        'CallToActionLink' => 'SiteTree'
    ];

    private static $field_labels = [
        'LargeText' => 'Text',
        'LargeTextFontColour' => 'Text Colour',
        'LargeImageFocusPoint' => 'Focus Point',
        'CallToAction' => 'Call to Action',
        'LargeImage' => 'Image',
        'CallToActionLink' => 'Link'
    ];

    private static $colour_font_options = [
        'white' => 'white',
        'black' => 'black'
    ];

    private static $field_labels_right = [
        'LargeText' => 'A short sentence showing as the main text on the image.'
        'LargeTextFontColour' => 'Text Colour',
        'LargeImageFocusPoint' => 'What part of the image should be visible no matter what?',
        'LargeImage' => 'Please ensure it is at least 2800px wide, but preferably a highly compressed image of 4800px wide',
        'CallToAction' => 'The text on the button - e.g. Sign Up Now (Optional)',
        'CallToActionLink' => 'Optional link on button, if left blank users will simply scroll down.'
    ];

    public function updateCMSFields(FieldList $fields)
    {
        $fieldLabels = $this->owner->FieldLabels();
        $fieldLabelsRight = $this->Config()->get('field_labels_right');
        $tabTitle = _t('CallToActionPageExtension.CALL_TO_ACTION', 'Call to Action');
        $fields->addFieldsToTab(
            'Root.'.$tabTitle,
            [
                UploadField::create(
                    'LargeImage',
                    $fieldLabels['LargeImage']
                )->setRightTitle($fieldLabelsRight['LargeImage']),
                TextareaField::create(
                    'LargeText',
                    $fieldLabels['LargeText']
                )->setRightTitle($fieldLabelsRight['LargeText']),
                DropdownField::create(
                    'LargeTextFontColour',
                    $fieldLabels['LargeTextFontColour']
                    $this->Config()->get('colour_font_options')
                )->setRightTitle($fieldLabelsRight['LargeTextFontColour']),
                TextField::create(
                    'CallToAction',
                    $fieldLabels['CallToAction']
                )->setRightTitle($fieldLabelsRight['CallToAction']),
                TreeDropdownField::create(
                    'CallToActionLinkID',
                    $fieldLabels['CallToActionLinkID']
                    'SiteTree'
                )->setRightTitle($fieldLabelsRight['CallToActionLinkID']),
                DropdownField::create(
                    'LargeImagFocusPoint',
                    $fieldLabels['LargeImagFocusPoint']
                    $this->owner->dbObject('LargeImageFocusPoint')->enumValues()
                )->setRightTitle($fieldLabelsRight['LargeImagFocusPoint'])
            )
        );

        return $fields;
    }
}
