<?php

namespace AntonyThorpe\SilverShopProductImages;

use SilverStripe\ORM\DataExtension;
use SilverStripe\Forms\FieldList;
use SilverStripe\Assets\Image;
use SilverStripe\Forms\LiteralField;
use SilverStripe\ORM\ArrayList;
use SilverStripe\ORM\DataList;
use Bummzack\SortableFile\Forms\SortableUploadField;

/**
 * Extends SilverShop\Page\Product
 */
class ProductImages extends DataExtension
{
    /**
     * @config
     */
    private static array $many_many = [
        'AdditionalImages' => Image::class,
    ];

    /**
     * @config
     */
    private static array $many_many_extraFields = [
        'AdditionalImages' => ['SortOrder' => 'Int'],
    ];

    public function updateCMSFields(FieldList $fields): void
    {
        $newfields = [
            SortableUploadField::create(
                'AdditionalImages',
                _t(self::class . '.AdditionalImages', 'Additional Images')
            ),
            LiteralField::create(
                'additionalimagesinstructions',
                '<p>' . _t(self::class . '.Instructions', 'You can change the order of the Additional Images by clicking and dragging on the image thumbnail.') . '</p>'
            )
        ];
        if ($fields->hasTabset()) {
            $fields->addFieldsToTab('Root.Images', $newfields);
        } else {
            foreach ($newfields as $field) {
                $fields->push($field);
            }
        }
    }

    /**
     * Combines the main image and the secondary images
     */
    public function getAllImages(): ArrayList
    {
        $list = ArrayList::create(
            $this->getOwner()->AdditionalImages()->sort('SortOrder')->toArray()
        );
        $main = $this->getOwner()->Image();
        if ($main && $main->exists()) {
                $list->unshift($main);
        }
        return $list;
    }

    /**
     * Sorted images
     */
    public function getSortedAdditionalImages(): DataList
    {
        return $this->getOwner()->AdditionalImages()->sort('SortOrder');
    }
}
