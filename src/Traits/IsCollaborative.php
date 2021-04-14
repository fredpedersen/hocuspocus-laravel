<?php


namespace Ueberdosis\HocuspocusLaravel\Traits;


use Ueberdosis\HocuspocusLaravel\Models\Document;

trait IsCollaborative
{
    protected array $collaborativeAttributes = [];

    public static function bootIsCollaborative()
    {
        static::deleted(fn($model) => $model->documents->each->delete());
    }

    public function documents()
    {
        return $this->morphMany(Document::class, 'model');
    }

    public function getCollaborationDocumentName(): string
    {
        return get_called_class() . ":" . $this->id;
    }
}
