<?php

namespace App\Twill\Capsules\Homepages\Repositories;

use A17\Twill\Repositories\Behaviors\HandleTranslations;
use App\Twill\Capsules\Base\ModuleRepository;
use App\Twill\Capsules\Base\Scopes\MustBePublished;
use A17\Twill\Repositories\Behaviors\HandleBlocks;
use A17\Twill\Repositories\Behaviors\HandleMedias;
use A17\Twill\Repositories\Behaviors\HandleFiles;
use A17\Twill\Repositories\Behaviors\HandleRevisions;
use App\Twill\Capsules\Homepages\Models\Homepage;
use App\Twill\Capsules\Base\Models\Template;

class HomepageRepository extends ModuleRepository
{
    use HandleBlocks, HandleTranslations ,HandleMedias, HandleFiles, HandleRevisions;

    public function __construct(Homepage $model)
    {
        $this->model = $model;
    }

    public function getHomepage()
    {
        if (filled($homepage = $this->theOnlyOne())) {
            return $homepage;
        }

        return $this->generate();
    }

    private function theOnlyOne()
    {
        return $this->model
            ->newQuery()
            ->withoutGlobalScope(MustBePublished::class)
            ->orderBy('id')
            ->take(1)
            ->get()
            ->first();
    }

    private function generate()
    {
        $template = Template::firstOrCreate([
                'uid' => 'home',
                'title' => 'Home',
                'admin_only' => 1,
                'show_content_editor' => 0,
        ]);

        return app(HomepageRepository::class)->create([
            'title' => config('app.name'),
            'template_id' => $template->id,
            'published' => true,
        ]);
    }
}
