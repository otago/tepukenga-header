<?php

namespace OP\Header\Model;

use OP\Header\Model\Header;
use SilverStripe\Forms\GridField\GridField;
use SilverStripe\Forms\GridField\GridFieldConfig_RecordEditor;
use Symbiote\GridFieldExtensions\GridFieldOrderableRows;
use gorriecoe\Link\Models\Link as ModelsLink;
use gorriecoe\LinkField\LinkField;
use SilverStripe\AssetAdmin\Forms\UploadField;
use SilverStripe\Assets\File;
use SilverStripe\Assets\Image;
use SilverStripe\Forms\CheckboxField;
use SilverStripe\Forms\HTMLEditor\HTMLEditorField;
use SilverStripe\Forms\TextField;

class Link extends ModelsLink
{
    private static $table_name = 'OP_Header_Model_Link';

    private static $db = [
        'Sort' => 'Int',
        'Bold' => 'Boolean',
        'BottomMargin' => 'Varchar(255)',
        'Subtitle' => 'Varchar(255)',
        'Content' => 'HTMLText'
    ];

    private static $has_one = [
        'Header' => Header::class,
        'TopHeader' => Header::class,
        'SocialMedia' => Header::class,
        'LinkTo' => ModelsLink::class,
        'Image' => Image::class,
        'SVG' => File::class
    ];

    private static $has_many = [
        'Links' => ModelsLink::class
    ];

    private static $owns = [
        'Links',
        'Image',
        'SVG'
    ];

    private static $cascade_deletes = [
        'Links'
    ];

    private static $summary_fields = [
        'Title',
        'Subtitle',
        'Sort'
    ];

    private static $default_sort = 'Sort ASC';

    public function getCMSFields()
    {
        $fields = parent::getCMSFields();

        $fields->addFieldToTab(
            'Root.Main',
            TextField::create('Subtitle'),
            'Type'
        );
        if ($this->SocialMediaID) {
            $fields->addFieldsToTab(
                "Root.Settings",
                [
                    UploadField::create('SVG')
                ]
            );
        } else {
            if (!$this->LinkID) {
                $fields->addFieldsToTab(
                    "Root.Settings",
                    [
                        UploadField::create('Image'),
                        LinkField::create('LinkTo', 'Link', $this),
                        HTMLEditorField::create('Content'),
                    ]
                );
                if ($this->ID) {
                    $links = GridField::create("Links", "Links", $this->Links())
                    ->setConfig(
                        (new GridFieldConfig_RecordEditor())
                            ->addComponent(new GridFieldOrderableRows())
                    );
                    $fields->addFieldToTab("Root.Links", $links);
                }
            } else {
                $fields->addFieldsToTab(
                    "Root.Settings",
                    [
                        TextField::create('BottomMargin')
                            ->setDescription("e.g. 25px"),
                        CheckboxField::create('Bold')
                    ]
                );
            }
        }

        return $fields;
    }
}
