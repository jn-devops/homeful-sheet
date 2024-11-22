<?php

namespace App\Models;

use Spatie\MediaLibrary\{HasMedia, InteractsWithMedia, MediaCollections\Models\Media};
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Vinkla\Hashids\Facades\Hashids;

/**
 * Class Link
 *
 * @property int $id
 * @property string $original_url
 * @property string $short_url
 * @property Media $document
 *
 * @method int getKey()
 */
class Link extends Model implements HasMedia
{
    /** @use HasFactory<\Database\Factories\LinkFactory> */
    use InteractsWithMedia;
    use HasFactory;

    protected $fillable = [
        'original_url',
        'short_url',
        'document'
    ];

    public static function shortenUrl($originalUrl)
    {
        $link = self::create(['original_url' => $originalUrl]);
        $link->short_url = Hashids::encode($link->id);
        $link->save();

        return $link;
    }

    public static function getOriginalUrl($shortUrl)
    {
        $linkId = Hashids::decode($shortUrl);
        $link = self::find($linkId)->first();

        return $link ? $link->original_url : null;
    }

    public function setDocumentAttribute(string $sourcePath): self
    {
        $this
            ->addMedia($sourcePath)
            ->toMediaCollection('excel');

        return $this;
    }

    public function getDocumentAttribute(): ?Media
    {
        return $this->getFirstMedia('excel');
    }

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('excel')->acceptsMimeTypes([
            'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet'
        ])
            ->singleFile();
    }

    public static function newDocument(string $documentPath): self
    {

        $link = new static;
        $link->document = $documentPath;
        $link->save();
        $link->original_url = $link->document->getUrl();
        $link->short_url = Hashids::encode($link->id);
        $link->save();

        return $link;
    }

    public function getUrl(): string
    {
        return route('link.show', ['shortUrl' => $this->short_url]);
    }
}
