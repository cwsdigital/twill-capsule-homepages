<?php

namespace App\Twill\Capsules\Homepages\Models;

use A17\Twill\Models\Behaviors\HasBlocks;
use A17\Twill\Models\Behaviors\HasMedias;
use A17\Twill\Models\Behaviors\HasFiles;
use A17\Twill\Models\Behaviors\HasRevisions;
use A17\Twill\Models\Behaviors\HasTranslation;
use A17\Twill\Models\Model;
use App\Twill\Capsules\Base\Crops;
use App\Twill\Capsules\Base\Models\Behaviours\HasHeading;
use App\Twill\Capsules\Base\Models\Behaviours\HasTemplate;
use CwsDigital\TwillMetadata\Models\Behaviours\HasMetadata;

class Homepage extends Model
{
    use HasBlocks, HasTranslation, HasMedias, HasFiles, HasRevisions, HasHeading, HasMetadata, HasTemplate;

    protected $fillable = [
        'published',
        'title',
        'heading',
        'subheading',
        'intro_content',
    ];

    public $translatedAttributes = [
      'title',
      'heading',
      'subheading',
      'intro_content',
      'active',
    ];

    public $metadataFallbacks = [
        'title' => 'heading',
    ];

    public $mediasParams = Crops::HOMEPAGE;
}
