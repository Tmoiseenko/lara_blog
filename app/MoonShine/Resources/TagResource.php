<?php

declare(strict_types=1);

namespace App\MoonShine\Resources;

use Illuminate\Database\Eloquent\Model;
use App\Models\Tag;

use MoonShine\Fields\Text;
use MoonShine\Resources\ModelResource;
use MoonShine\Decorations\Block;
use MoonShine\Fields\ID;

/**
 * @extends ModelResource<Tag>
 */
class TagResource extends ModelResource
{
    protected string $model = Tag::class;

    protected string $title = 'Tags';

    public function fields(): array
    {
        return [
            Block::make([
                ID::make()->sortable(),
                Text::make('title', 'title')
            ]),
        ];
    }

    public function rules(Model $item): array
    {
        return [];
    }
}
