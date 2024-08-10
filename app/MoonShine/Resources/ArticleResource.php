<?php

declare(strict_types=1);

namespace App\MoonShine\Resources;

use App\Models\Category;
use Illuminate\Database\Eloquent\Model;
use App\Models\Article;

use Illuminate\Support\Str;
use MoonShine\Fields\Fields;
use MoonShine\Fields\Relationships\BelongsToMany;
use MoonShine\Fields\Select;
use MoonShine\Fields\Text;
use MoonShine\Fields\TinyMce;
use MoonShine\Resources\ModelResource;
use MoonShine\Decorations\Block;
use MoonShine\Fields\ID;

/**
 * @extends ModelResource<Article>
 */
class ArticleResource extends ModelResource
{
    protected string $model = Article::class;

    protected string $title = 'Articles';

    public function fields(): array
    {
        return [
            Block::make([
                ID::make()->sortable(),
                Text::make('Title', 'title'),
                TinyMce::make('Text', 'text')->changePreview(fn($item) => Str::words($item, 10)),
                Select::make('Category', 'category_id')
                    ->options(Category::all()->pluck('title', 'id')->toArray()),
                BelongsToMany::make('Tags', 'tags', 'title', new TagResource())
                    ->selectMode()
                    ->inLine(
                        separator: ' ',
                        badge: true
                    )
            ]),
        ];
    }

    public function rules(Model $item): array
    {
        return [];
    }
}
