<?php

namespace App\Http\Resources;

use App\Models\Category;
use App\Models\Comment;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ArticleResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        /**
         * Transform the resource into an array.
         *
         * @return array<string, mixed>
         */
        Carbon::setLocale('fr'); // Définir la langue en français

        return [
            'id' => $this->id,
            'title' => $this->title,
            'slug' => $this->slug,
            "photo" => $this->photo,
            "auteur" => new UserResource($this->user),
            "content" => $this->content,
            'nbr_comment' => $this->comments->count(),
            'nbr_vue' => $this->vues->first() ? $this->vues->first()->nbr_vue : 0,
            'nb_likes' => $this->likes->count(),
            'category' => CategoryResource::collection($this->categories),
            'tags' => $this->tags,
            'date_creation' => Carbon::parse($this->created_at)->diffForHumans(),
            'last_modif' => $this->updated_at,
        ];

    }
}
