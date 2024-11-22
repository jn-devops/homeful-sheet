<?php

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use App\Models\Link;

uses(RefreshDatabase::class, WithFaker::class);

test('link shortens', function () {
    $originalUrl = $this->faker->url();
    $link = Link::shortenUrl($originalUrl);
    expect(strlen($link->short_url))->toBeLessThan(strlen($originalUrl));
    $url = route('link.show', ['shortUrl' => $link->short_url]);
    $response = $this->get($url);
    expect($response->status())->toBe(302);
    expect($response->getTargetUrl())->toBe($originalUrl);
});

test('link has media', function () {
    $link = Link::factory()->create();
    $sourcePath = docs_path(config('homeful-sheet.defaults.document.name'));
    if (!file_exists($sourcePath))
        dd($sourcePath);
    $link
        ->addMedia($sourcePath)
        ->preservingOriginal()
        ->toMediaCollection();
    $mediaItems = $link->getMedia();
    expect($mediaItems[0])->toBeInstanceOf(\Spatie\MediaLibrary\MediaCollections\Models\Media::class);
    expect($link->getFirstMedia()->is($mediaItems[0]))->toBeTrue();
    $link->clearMediaCollection();
});

test('link has document media', function () {
    $link = Link::factory()->create();
    $sourcePath = docs_path(config('homeful-sheet.defaults.document.name'));
    $tempPath = tempES($sourcePath);
    $link->document = $tempPath;
    expect(file_exists($tempPath))->toBeFalse();
    expect($link->document)->toBeInstanceOf(\Spatie\MediaLibrary\MediaCollections\Models\Media::class);
    $link->clearMediaCollection('excel');
});

test('link can accept document media', function () {
    $sourcePath = docs_path(config('homeful-sheet.defaults.document.name'));
    $tempPath = tempES($sourcePath);
    $link = Link::factory()->create(['document' => $tempPath]);
    expect(file_exists($tempPath))->toBeFalse();
    expect($link->document)->toBeInstanceOf(\Spatie\MediaLibrary\MediaCollections\Models\Media::class);
    $link->clearMediaCollection('excel');
});

test('link can instantiate new document', function () {
    $sourcePath = docs_path(config('homeful-sheet.defaults.document.name'));
    $tempPath = tempES($sourcePath);
    $link = Link::newDocument($tempPath);
    expect(file_exists($tempPath))->toBeFalse();
    expect($link->document)->toBeInstanceOf(\Spatie\MediaLibrary\MediaCollections\Models\Media::class);
    $response = $this->get($link->getUrl());
    expect($response->status())->toBe(302);
    expect($response->getTargetUrl())->toBe($link->document->getUrl());
    $link->clearMediaCollection('excel');
});
