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
        $callToAction = CallToAction::singleton();
        $fieldLabelsRight = Config::inst()->get('CallToActionPageExtension', 'field_labels_right');
        $tabTitle0 = $callToAction->i18n_singular_name();
        $link1 = '/admin/calltoaction/';
        $tabTitle1 = _t('CallToActionPageExtension.CREATE_NEW', 'view all');
        if ($this->owner->CallToActionID) {
            $callToAction = $this->owner->CallToAction();
            if ($callToAction && $callToAction->exists()) {
                $link2 = $this->owner->CallToAction()->CMSEditLink();
                $tabTitle2 = _t('CallToActionPageExtension.EDIT_CURRENT', 'edit').' '.$callToAction->getTitle();
            }
        }
        if (! isset($link2)) {
            $link2 = $callToAction->CMSAddLink();
            $tabTitle2 = _t('CallToActionPageExtension.CREATE_NEW', 'create new').' '.$callToAction->i18n_singular_name();
        }
        $fields->addFieldsToTab(
            'Root.'.$tabTitle0,
            [
                DropdownField::create(
                    'CallToActionID',
                    _t('CallToActionPageExtension.SELECT', 'select'),
                    [0 => _t('CallToActionPageExtension.PLEASE_SELECT', '-- please select --')] +CallToAction::get()->map()->toArray()
                ),
                LiteralField::create(
                    'CallToActionList',
                    '<h2>
                        ✎
                        <a href="'.$link1.'" target="_blank">'.$tabTitle1.'</a> |
                        <a href="'.$link2.'" target="_blank">'.$tabTitle2.'</a>
                    <h2>'
                ),
                LiteralField::create(
                    'CallToActionEdit',
                    ''
                )
            ]
        );
        return $fields;
    }
}
