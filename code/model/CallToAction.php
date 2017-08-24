<?php

/**
 *@author nicolaas [at] sunnysideup.co.nz
 *
 *
 **/

class CallToAction extends DataObject
{
    private static $db = [
        'Title' => 'Varchar(50)',
        'Text' => 'Varchar(255)',
        'FontColour' => 'enum("white,black", "white")',
        'ImageFocusPoint' => 'enum("Centre,N,NW,W,SW,S,SE,E,NE", "Centre")',
        'CallToAction' => 'Varchar(50)'
    ];

    private static $has_one = [
        'Image' => 'Image',
        'Link' => 'SiteTree'
    ];

    private static $summary_fields = [
        'Title' => 'Title',
        'Text' => 'Text',
        'Link.Title' => 'Link',
        'Image.CMSThumbNail' => 'Image'
    ];

    private static $has_many = [
        'Pages' => 'Page'
    ];

    private static $default_sort = [
        'Title' => 'ASC'
    ];

    private static $singular_name  = 'Call To Action';

    private static $plural_name = 'Calls To Action';

    private static $field_labels = [
        'Title' => 'Title',
        'Text' => 'Text',
        'FontColour' => 'Text Colour',
        'ImageFocusPoint' => 'Focus Point',
        'CallToAction' => 'Call to Action',
        'Image' => 'Image',
        'Link' => 'Link'
    ];

    private static $colour_font_options = [
        'white' => 'white',
        'black' => 'black'
    ];

    private static $field_labels_right = [
        'Title' => 'A few words.',
        'Text' => 'A short sentence showing as the main text on the image.',
        'FontColour' => 'Text colour',
        'ImageFocusPoint' => 'What part of the image should be visible no matter what?',
        'Image' => 'Please ensure it is at least 2800px wide, but preferably a highly compressed image of 4800px wide',
        'CallToAction' => 'The text on the button - e.g. Sign Up Now (Optional)',
        'Link' => 'Optional link on button, if left blank users will simply scroll down.'
    ];

    public function getCMSFields()
    {
        $fields = parent::getCMSFields();
        $fieldLabels = $this->FieldLabels();
        $fieldLabelsRight = Config::inst()->get('CallToAction', 'field_labels_right');
        $fields->addFieldsToTab(
            'Root.Main',
            [
                UploadField::create(
                    'Image',
                    $fieldLabels['Image']
                )->setRightTitle($fieldLabelsRight['Image']),
                TextField::create(
                    'Title',
                    $fieldLabels['Title']
                )->setRightTitle($fieldLabelsRight['Title']),
                TextareaField::create(
                    'Text',
                    $fieldLabels['Text']
                )->setRightTitle($fieldLabelsRight['Text']),
                DropdownField::create(
                    'FontColour',
                    $fieldLabels['FontColour'],
                    Config::inst()->get('CallToAction', 'colour_font_options')
                )->setRightTitle($fieldLabelsRight['FontColour']),
                TextField::create(
                    'CallToAction',
                    $fieldLabels['CallToAction']
                )->setRightTitle($fieldLabelsRight['CallToAction']),
                TreeDropdownField::create(
                    'LinkID',
                    $fieldLabels['Link'],
                    'SiteTree'
                )->setRightTitle($fieldLabelsRight['Link']),
                DropdownField::create(
                    'ImageFocusPoint',
                    $fieldLabels['ImageFocusPoint'],
                    $this->dbObject('ImageFocusPoint')->enumValues()
                )->setRightTitle($fieldLabelsRight['ImageFocusPoint'])
            ]
        );
        $fields->removeByName('Pages');
        
        return $fields;
    }

    function CMSEditLink()
    {

    }

    function CMSAddLink()
    {

    }

    /**
     * left top
     */
    function BackgroundPosition()
    {
        $str = 'center';
        switch($this->ImageFocusPoint) {
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
