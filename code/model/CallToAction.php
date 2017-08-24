<?php

/**
 *@author nicolaas [at] sunnysideup.co.nz
 *
 *
 **/

class CallToAction extends DataObject
{
    private static $db = [
        'LargeTextTitle' => 'Varchar(50)',
        'LargeText' => 'Varchar(255)',
        'LargeTextFontColour' => 'enum("white,black", "white")',
        'LargeImageFocusPoint' => 'enum("Centre,N,NW,W,SW,S,SE,E,NE", "Centre")',
        'CallToAction' => 'Varchar(50)'
    ];

    private static $has_one = [
        'LargeImage' => 'Image',
        'CallToActionLink' => 'SiteTree'
    ];

    private static $belongs_to = [
        'Page' => 'Page'
    ];

    private static $singular_name  = 'Call To Action';

    private static $plural_name = 'Calls To Action';

    private static $field_labels = [
        'LargeTextTitle' => 'Title',
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
        'LargeTextTitle' => 'A few words.',
        'LargeText' => 'A short sentence showing as the main text on the image.',
        'LargeTextFontColour' => 'Text colour',
        'LargeImageFocusPoint' => 'What part of the image should be visible no matter what?',
        'LargeImage' => 'Please ensure it is at least 2800px wide, but preferably a highly compressed image of 4800px wide',
        'CallToAction' => 'The text on the button - e.g. Sign Up Now (Optional)',
        'CallToActionLink' => 'Optional link on button, if left blank users will simply scroll down.'
    ];

    public function updateCMSFields(FieldList $fields)
    {
        $fieldLabels = $this->FieldLabels();
        $fieldLabelsRight = Config::inst()->get('CallToActionPageExtension', 'field_labels_right');
        $tabTitle = _t('CallToActionPageExtension.CALL_TO_ACTION', 'Call to Action');
        $fields->addFieldsToTab(
            'Root.'.$tabTitle,
            [
                UploadField::create(
                    'LargeImage',
                    $fieldLabels['LargeImage']
                )->setRightTitle($fieldLabelsRight['LargeImage']),
                TextField::create(
                    'LargeTextTitle',
                    $fieldLabels['LargeTextTitle']
                )->setRightTitle($fieldLabelsRight['LargeTextTitle']),
                TextareaField::create(
                    'LargeText',
                    $fieldLabels['LargeText']
                )->setRightTitle($fieldLabelsRight['LargeText']),
                DropdownField::create(
                    'LargeTextFontColour',
                    $fieldLabels['LargeTextFontColour'],
                    Config::inst()->get('CallToActionPageExtension', 'colour_font_options')
                )->setRightTitle($fieldLabelsRight['LargeTextFontColour']),
                TextField::create(
                    'CallToAction',
                    $fieldLabels['CallToAction']
                )->setRightTitle($fieldLabelsRight['CallToAction']),
                TreeDropdownField::create(
                    'CallToActionLinkID',
                    $fieldLabels['CallToActionLink'],
                    'SiteTree'
                )->setRightTitle($fieldLabelsRight['CallToActionLink']),
                DropdownField::create(
                    'LargeImageFocusPoint',
                    $fieldLabels['LargeImageFocusPoint'],
                    $this->dbObject('LargeImageFocusPoint')->enumValues()
                )->setRightTitle($fieldLabelsRight['LargeImageFocusPoint'])
            ]
        );

        return $fields;
    }

    /**
     * left top
     */
    function BackgroundPosition()
    {
        $str = 'center';
        switch($this->LargeImageFocusPoint) {
            case 'Centre': $str = 'center'; break;
            case 'NE': $str = 'top right'; break;
            case 'E': $str = 'center right'; break;
            case 'SE': $str = 'bottom right'; break;
            case 'S': $str = 'bottom center'; break;
            case 'SW': $str = 'bottom left'; break;
            case 'W': $str = 'bottom left'; break;
            case 'NW': $str = 'top left'; break;
            case 'N': $str = 'top center'; break;
        }

        return $str;
    }
}
